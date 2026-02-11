<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session as Session;
use Stripe\Customer;

class CheckoutController extends Controller {
    
    public function index() {

        return view('checkout.index');
    }

    public function checkout(Request $request) {

        //var_dump($request->cart_data);
        $cart_data = json_decode($request->cart_data, true);

        Stripe::setApiKey(config('stripe.sk'));

        $customer = Customer::create([
            'email' => auth()->user()->email,
        ]);

        $session = Session::create([
            'customer' => $customer->id,
            'payment_method_types' => ['customer_balance'],
            'payment_method_options' => [
                'customer_balance' => [
                'funding_type' => 'bank_transfer',
                'bank_transfer' => ['type' => 'mx_bank_transfer'],
                ],
            ],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'mxn',
                        'product_data' => [
                            'name' => 'Compra en Mexicoin',
                        ],
                        'unit_amount' => intval(($request->total_amount)),
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('checkout.success'),
            'cancel_url' => route('checkout.cancel'),
        ]);

        return redirect()->away($session->url);
    }

    public function success() {
        return view('checkout.success');
    }

    public function cancel() {
        return view('checkout.cancel');
    }
}
