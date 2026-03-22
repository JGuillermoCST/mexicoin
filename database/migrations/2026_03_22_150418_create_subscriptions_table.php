<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();

            // Usuario dueño de la suscripción
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');

            // ── Datos del plan ──────────────────────────────────────────
            $table->string('plan');               // 'plus' | 'pro'
            $table->decimal('amount', 10, 2);     // 499.00 | 999.00
            $table->string('currency', 3)->default('MXN');
            $table->string('interval')->default('month'); // 'month' | 'year'

            // ── IDs de Stripe ───────────────────────────────────────────
            $table->string('stripe_customer_id')->nullable();     // cus_xxx
            $table->string('stripe_subscription_id')->nullable(); // sub_xxx
            $table->string('stripe_price_id')->nullable();        // price_xxx
            $table->string('stripe_payment_method_id')->nullable(); // pm_xxx
            $table->string('stripe_latest_invoice_id')->nullable(); // in_xxx

            // ── Estado ──────────────────────────────────────────────────
            // Valores posibles de Stripe:
            // active | past_due | unpaid | canceled | incomplete
            // incomplete_expired | trialing | paused
            $table->string('status')->default('incomplete');

            // ── Fechas de ciclo ─────────────────────────────────────────
            $table->timestamp('trial_ends_at')->nullable();
            $table->timestamp('current_period_start')->nullable();
            $table->timestamp('current_period_end')->nullable();   // = next_billing_date
            $table->timestamp('cancelled_at')->nullable();
            $table->timestamp('ends_at')->nullable(); // acceso hasta esta fecha tras cancelar

            // ── Recompensa de fidelidad ─────────────────────────────────
            $table->boolean('reward_claimed')->default(false);
            $table->timestamp('reward_claimed_at')->nullable();

            // ── Metadata extra (útil para auditoría) ────────────────────
            $table->json('stripe_metadata')->nullable(); // respuesta raw de Stripe

            $table->timestamps(); // created_at = fecha de inicio de la suscripción
        });

        /*
        |----------------------------------------------------------------------
        | Tabla: subscription_invoices
        |----------------------------------------------------------------------
        | Historial de cada cobro / factura generada por Stripe.
        */
        Schema::create('subscription_invoices', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');
            $table->foreignId('subscription_id')
                  ->constrained()
                  ->onDelete('cascade');

            // IDs de Stripe
            $table->string('stripe_invoice_id');          // in_xxx
            $table->string('stripe_payment_intent_id')->nullable(); // pi_xxx
            $table->string('stripe_charge_id')->nullable();         // ch_xxx

            // Datos del cobro
            $table->string('plan');
            $table->decimal('amount', 10, 2);
            $table->string('currency', 3)->default('MXN');
            $table->string('status');  // paid | open | void | uncollectible

            // Periodo que cubre esta factura
            $table->timestamp('period_start')->nullable();
            $table->timestamp('period_end')->nullable();
            $table->timestamp('paid_at')->nullable();

            // URL de descarga del PDF (Stripe la genera automáticamente)
            $table->string('invoice_pdf_url')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subscription_invoices');
        Schema::dropIfExists('subscriptions');
    }
};