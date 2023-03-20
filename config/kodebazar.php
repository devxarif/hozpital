<?php

return [
    'app_version' =>  '1.0.0',

    'google_api' => env('GOOGLE_API_KEY', 'AIzaSyAUPpqerpKmENrKzgpr_pzcmiSKE58cA7k'),

    'default_language' => env('APP_DEFAULT_LANGUAGE'),
    'timezone' => env('APP_TIMEZONE'),
    'currency' => env('APP_CURRENCY'),
    'currency_symbol' => env('APP_CURRENCY_SYMBOL'),
    'currency_symbol_position' => env('APP_CURRENCY_SYMBOL_POSITION'),

    // Payment Provider
    'stripe_key' => 'pk_test_51JAbnoDHsbz9CBNMjbDtUrA8pfBWkC9yvXqzFQYHeEJokRKFvpAedEruhqCxJhzqOflDi0KH1E020J5kitkMWV4q00fl2LBk6p',
    'stripe_secret' => 'sk_test_51JAbnoDHsbz9CBNM3FjZDwFH9rC3sr8q06vu9dDS0cjzY0o7a0VnC5KbcED1YUAEcryuro0xkDUKq8rKqVi1R9SX00idI7OL7i',
    'stripe_conversion_rate' => 1,
    'stripe_active' => true,

    'razorpay_key' => 'rzp_test_V7zKmP7nti57DU',
    'razorpay_secret' => '3cbGRKMlwixOtuLXXdaHkrfn',
    'razorpay_conversion_rate' => '82.1',
    'razorpay_active' => true,

    'flw_public_key' => 'FLWPUBK_TEST-098b99f9b47a66c7cc6417f026ffd0f3-X',
    'flw_secret' => 'FLWSECK_TEST-eda3cd52868c3849d6a487196049dc49-X',
    'flw_secret_hash' => 'FLWSECK_TEST542b3c6c1380',
    'flw_conversion_rate' => 460,
    'flw_active' => true,

    'paystack_key' => 'sk_test_13cb7967851092da5996bab4cfe4f834e5795895',
    'paystack_secret' => 'pk_test_934e46b979e2f764fe7e0fd411cb07c1771ad200',
    'paystack_url' => 'https://api.paystack.co',
    'paystack_conversion_rate' => 460,
    'paystack_active' => true,

    'midtrans_mode' => true,
    'midtrans_id' => 'G865515342',
    'midtrans_key' => 'SB-Mid-client-caufytlQKEoG7PPN',
    'midtrans_secret' => 'SB-Mid-server-tySk6pPqYvrW7VbYzaq8dw-4',
    'midtrans_conversion_rate' => 15374,
    'midtrans_active' => true,

    'mollie_key' => 'test_Q9JvB3aM6e2Wkc92QjpBV3k88AF3x6',
    'mollie_conversion_rate' => 0.93,
    'mollie_active' => false,

    'im_key' => 'test_d883b3a8d2bc1adc7a535506713',
    'im_secret' => 'test_dc229039d2232a260a2df3f7502',
    'im_conversion_rate' => 82.54,
    'im_active' => false,

    // Recaptcha
    'recaptcha_site_key' => '6Lc6aGgfAAAAAP0JZTtfMKjGyQ0M8AQ0JfW5oPlY',
    'recaptcha_secret_key' => '6Lc6aGgfAAAAALl6s7fISbuHujjCQtdSqclz0gla',
    'recaptcha_active' => false,

    // SMS Provider
    'twilio_secret' => env('TWILIO_SID'),
    'twilio_token' => env('TWILIO_TOKEN'),
    'twilio_from' => env('TWILIO_FROM'),
    'twilio_active' => env('TWILIO_ACTIVE'),

    'vonage_key' => env('VONAGE_KEY'),
    'vonage_secret' => env('VONAGE_SECRET'),
    'vonage_from_name' => env('VONAGE_FROM_NAME'),
    'vonage_active' => env('VONAGE_ACTIVE'),

    // System Information
    'minimum_php_version' => 8.1,
    'minimum_mysql_version' => '5.6+',
];
