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
        'sk' => env('STRIPE_SECRET')

    ];