<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id' => '799453836707-unv90kt1btlqnsebj60r9kt10jqpmu4u.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => '/auth/google/callback',
        'active' => false
    ],

    'facebook' => [
        'client_id' => '3000423683503536',
        'client_secret' => 'dbadc3d313c9777cc87eb48b2ec28b71',
        'redirect' => '/auth/facebook/callback',
        'active' => false
    ],

    'twitter' => [
        'client_id' => 'xvz1evFS4wEEPTGEFPHBog',
        'client_secret' => 'kYjzVBB8Y0ZFabxSWbWovY3uYSQ2pTgmZeNu2VS4cg',
        'redirect' => '/auth/twitter/callback',
        'active' => false
    ],

    'linkedin' => [
        'client_id' => '773fku0c19tyhf',
        'client_secret' => 'jrR03bH0bhMkrjut',
        'redirect' => '/auth/linkedin/callback',
        'active' => false
    ],

    'demo' => [
        'client_id' => 'clientid',
        'client_secret' => 'abcdefghijklmnopqrstuvwxyz123456789',
        'active' => true
    ],
];
