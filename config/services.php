<?php
    // dd(env("GOOGLE_ID"));

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'google' => [
        'client_id'     =>  /*env("GOOGLE_ID"),  */     "354209270161-hg2qirmo8nr0d5rn1sjsdbeukc9j3qev.apps.googleusercontent.com",      // env('GOOGLE_ID'),
        'client_secret' =>  /*env("GOOGLE_SECRET"), */  "o2YIXkvehbDSR7u3iraZOJcr",                                                      // env('GOOGLE_SECRET'),
        'redirect'      =>  /*env("GOOGLE_RLU"), */     "http://neotech.com/login/google/callback",                                      // env('GOOGLE_URL'),
    ],

];
