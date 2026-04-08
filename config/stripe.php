<?php

    return [

        /*
        |--------------------------------------------------------------------------
        | Stripe API Key
        |--------------------------------------------------------------------------
        |
        | This option defines the Stripe API key used for processing payments.
        | Make sure to set this value in your environment file (.env) as well.
        |
        */

        'pk' => env('STRIPE_KEY'),
        'sk' => env('STRIPE_SECRET'),
        'webhook' => env('STRIPE_WEBHOOK_SECRET'),
        'prices' => [
            'plus' => env('STRIPE_PRICE_PLUS'),
            'pro' => env('STRIPE_PRICE_PRO'),
        ],
        'plans' => [
            'plus' => env('STRIPE_PLAN_PLUS'),
            'pro' => env('STRIPE_PLAN_PRO'),
        ],

    ];