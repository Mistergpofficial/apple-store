<?php

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

    'facebook' => [
        'client_id' => '2091838484373383',         // Your facebook Client ID
        'client_secret' => 'bc6b19e476123f0f6bc55549b6e36d36', // Your facebook Client Secret
        'redirect' => 'http://localhost/newartisan/login/facebook/callback',
    ],

/*
    FACEBOOK_ID = 649100348613254
FACEBOOK_SECRET = 0ac15199faf69de7b61a836aaf68b8e2
FACEBOOK_URL = http://istory.com.ng/auth/facebook/callback*/



];
