<?php

return [
    'active' => true,
    'mode' => 'sandbox', // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
    'sandbox' => [
        'client_id' => 'Aa5dMaGzSheN82k47r5ZzdlbhGZavLnybxbcjBiKuQAM-2l27ANG7w3PHlzLwi2aNeyT7uCgPGTCrblg',
        'client_secret' => 'EE3hQ9KwbPOQ_PNZUjZ_prJgHc0NKVgWcV7qgZkGgm0oPB9M0XcmsixnC8g-PmAG8i46L_6YMRR1hs8O',
        'app_id' => '', // APP-80W284485P519543T
    ],
    'live' => [
        'client_id' => '',
        'client_secret' => '',
        'app_id' => '',
    ],

    'payment_action' => env('PAYPAL_PAYMENT_ACTION', 'Sale'), // Can only be 'Sale', 'Authorization' or 'Order'
    'currency' => env('PAYPAL_CURRENCY', 'USD'),
    'notify_url' => env('PAYPAL_NOTIFY_URL', ''), // Change this accordingly for your application.
    'locale' => env('PAYPAL_LOCALE', 'en_US'), // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
    'validate_ssl' => env('PAYPAL_VALIDATE_SSL', true), // Validate SSL when creating api client.
];
