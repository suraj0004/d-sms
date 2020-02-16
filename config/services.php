<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, SparkPost and others. This file provides a sane default
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'google' => [
        'client_id' => '327948054466-8ubent4i3rvtsqehmtho4ac4n7kahaf7.apps.googleusercontent.com',
        'client_secret' => 'nc6Gn4b7s6ZX1CNznIXi3Lu2',
        'redirect' => 'http://email-module.disc-in.com/auth/google/callback',
    ],

    'facebook' => [
        'client_id' => '493684311295502',
        'client_secret' => '1543cd7749557f0a9482147e148226b6',
        'redirect' => 'http://email-module.disc-in.com/auth/facebook/callback',
      ], 

];
