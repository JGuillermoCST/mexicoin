<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\SubscriptionInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Subscription as StripeSubscription;
use Stripe\Webhook;
use Stripe\Exception\SignatureVerificationException;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Requisitos
|--------------------------------------------------------------------------
| composer require stripe/stripe-php
|
| .env:
|   STRIPE_KEY=pk_test_xxx
|   STRIPE_SECRET=sk_test_xxx
|   STRIPE_WEBHOOK_SECRET=whsec_xxx
|
| config/services.php:
|   'stripe' => [
|       'key'            => env('STRIPE_KEY'),
|       'secret'         => env('STRIPE_SECRET'),
|       'webhook_secret' => env('STRIPE_WEBHOOK_SECRET'),
|   ],
|
| Price IDs de tus productos en el Dashboard de Stripe:
|   STRIPE_PRICE_PLUS=price_xxx
|   STRIPE_PRICE_PRO=price_xxx
*/

class SubscriptionController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }

    public function checkout(Request $request, String $plan, String $price)
    {
        return $request->user()
        ->newSubscription($plan, $price)
        ->checkout([
            'success_url' => route('subscription.success'),
            'cancel_url' => route('subscription.error'),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | 2. Cancelar suscripción
    |--------------------------------------------------------------------------
    | POST /subscription/cancel
    | Cancela al final del periodo (el usuario conserva acceso hasta ends_at).
    */
    public function cancel(Request $request)
    {
        // $request->validate([
        //     'confirm' => 'required|in:CANCELAR',
        // ], [
        //     'confirm.in' => 'Escribe exactamente "CANCELAR" para confirmar.',
        // ]);

        // $user         = Auth::user();
        // $subscription = $user->subscription;

        // if (! $subscription || ! $subscription->isActive()) {
        //     return back()->with('error', 'No tienes una suscripción activa.');
        // }

        // try {
        //     // Cancelar en Stripe al final del periodo actual
        //     StripeSubscription::update($subscription->stripe_subscription_id, [
        //         'cancel_at_period_end' => true,
        //     ]);

        //     // Actualizar en BD
        //     $subscription->update([
        //         'cancelled_at' => now(),
        //         'ends_at'      => $subscription->current_period_end,
        //     ]);

        //     Log::info('Suscripción cancelada', ['user_id' => $user->id, 'plan' => $subscription->plan]);

        //     return redirect()->route('main')
        //         ->with('success', 'Suscripción cancelada. Mantienes acceso hasta ' . $subscription->ends_at->format('d/m/Y') . '.');

        // } catch (\Exception $e) {
        //     Log::error('Stripe cancel error: ' . $e->getMessage(), ['user_id' => $user->id]);
        //     return back()->with('error', 'No se pudo cancelar. Por favor contáctanos.');
        // }

        return Auth::user()->redirectToBillingPortal(route('dashboard'));
    }

    /*
    |--------------------------------------------------------------------------
    | Handlers internos del webhook
    |--------------------------------------------------------------------------
    */

    /**
     * Cobro exitoso → registrar factura y renovar fechas.
     */
    private function onInvoicePaid(object $invoice): void
    {
        $subscription = Subscription::where(
            'stripe_subscription_id', $invoice->subscription
        )->first();

        if (! $subscription) return;

        // Registrar la factura
        SubscriptionInvoice::updateOrCreate(
            ['stripe_invoice_id' => $invoice->id],
            [
                'user_id'                  => $subscription->user_id,
                'subscription_id'          => $subscription->id,
                'stripe_payment_intent_id' => $invoice->payment_intent,
                'stripe_charge_id'         => $invoice->charge,
                'plan'                     => $subscription->plan,
                'amount'                   => $invoice->amount_paid / 100,
                'currency'                 => strtoupper($invoice->currency),
                'status'                   => 'paid',
                'period_start'             => now()->timestamp($invoice->period_start),
                'period_end'               => now()->timestamp($invoice->period_end),
                'paid_at'                  => now(),
                'invoice_pdf_url'          => $invoice->invoice_pdf,
            ]
        );

        // Actualizar estado y fechas del periodo
        $subscription->update([
            'status'                   => 'active',
            'stripe_latest_invoice_id' => $invoice->id,
            'current_period_start'     => now()->timestamp($invoice->period_start),
            'current_period_end'       => now()->timestamp($invoice->period_end),
        ]);
    }

    /**
     * Cobro fallido → marcar como past_due.
     */
    private function onInvoiceFailed(object $invoice): void
    {
        $subscription = Subscription::where(
            'stripe_subscription_id', $invoice->subscription
        )->first();

        if (! $subscription) return;

        $subscription->update(['status' => 'past_due']);

        // Aquí puedes enviar un correo al usuario:
        // $subscription->user->notify(new PaymentFailedNotification($subscription));

        Log::warning('Cobro fallido', [
            'user_id' => $subscription->user_id,
            'invoice' => $invoice->id,
        ]);
    }

    /**
     * Suscripción actualizada en Stripe (cambio de plan, pause, etc.)
     */
    private function onSubscriptionUpdated(object $stripeSub): void
    {
        $subscription = Subscription::where(
            'stripe_subscription_id', $stripeSub->id
        )->first();

        if (! $subscription) return;

        $subscription->update([
            'status'               => $stripeSub->status,
            'current_period_start' => now()->timestamp($stripeSub->current_period_start),
            'current_period_end'   => now()->timestamp($stripeSub->current_period_end),
            // Si Stripe confirma la cancelación al fin del periodo
            'ends_at' => $stripeSub->cancel_at
                ? now()->timestamp($stripeSub->cancel_at)
                : $subscription->ends_at,
        ]);
    }

    /**
     * Suscripción eliminada en Stripe (cancelación inmediata o expiró).
     */
    private function onSubscriptionDeleted(object $stripeSub): void
    {
        $subscription = Subscription::where(
            'stripe_subscription_id', $stripeSub->id
        )->first();

        if (! $subscription) return;

        $subscription->update([
            'status'       => 'canceled',
            'cancelled_at' => $subscription->cancelled_at ?? now(),
            'ends_at'      => now(),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Helper: crear o recuperar Customer en Stripe
    |--------------------------------------------------------------------------
    */
    private function getOrCreateCustomer($user, string $paymentMethodId): string
    {
        // Si el usuario ya tiene un customer_id guardado, reutilizarlo
        $existing = Subscription::where('user_id', $user->id)
            ->whereNotNull('stripe_customer_id')
            ->value('stripe_customer_id');

        if ($existing) return $existing;

        $customer = Customer::create([
            'email'          => $user->email,
            'name'           => $user->name,
            'payment_method' => $paymentMethodId,
            'metadata'       => ['user_id' => $user->id],
        ]);

        return $customer->id;
    }
}