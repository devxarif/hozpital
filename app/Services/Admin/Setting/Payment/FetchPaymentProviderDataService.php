<?php

namespace App\Services\Admin\Setting\Payment;

class FetchPaymentProviderDataService
{
    public function execute(string $provider): array
    {
        switch ($provider) {
            case 'paypal':
                return [
                    'paypal_sandbox_client_id' => config('paypal.sandbox.client_id'),
                    'paypal_sandbox_client_secret' => config('paypal.sandbox.client_secret'),
                    'paypal_live_client_id' => config('paypal.live.client_id'),
                    'paypal_live_client_secret' => config('paypal.live.client_secret'),
                    'paypal_active' => config('paypal.active'),
                    'paypal_mode' => config('paypal.mode'),
                ];
                break;
            case 'stripe':
                return [
                    'stripe_active' => config('kodebazar.stripe_active'),
                    'stripe_key' => config('kodebazar.stripe_key'),
                    'stripe_secret' => config('kodebazar.stripe_secret'),
                ];
                break;
            case 'razorpay':
                return [
                    'razorpay_key' => config('kodebazar.razorpay_key'),
                    'razorpay_secret' => config('kodebazar.razorpay_secret'),
                    'razorpay_active' => config('kodebazar.razorpay_active'),
                ];
                break;
            case 'flutterwave':
                return [
                    'flw_public_key' => config('kodebazar.flw_public_key'),
                    'flw_secret' => config('kodebazar.flw_secret'),
                    'flw_secret_hash' => config('kodebazar.flw_secret_hash'),
                    'flw_active' => config('kodebazar.flw_active'),
                ];
                break;
            case 'mollie':
                return [
                    'mollie_key' => config('kodebazar.mollie_key'),
                    'mollie_active' => config('kodebazar.mollie_active'),
                ];
                break;
            case 'paystack':
                return [
                    'paystack_key' => config('kodebazar.paystack_key'),
                    'paystack_secret' => config('kodebazar.paystack_secret'),
                    'paystack_active' => config('kodebazar.paystack_active'),
                ];
                break;
            case 'instamojo':
                return [
                    'im_key' => config('kodebazar.im_key'),
                    'im_secret' => config('kodebazar.im_secret'),
                    'im_active' => config('kodebazar.im_active'),
                ];
                break;
            case 'midtrans':
                return [
                    'midtrans_mode' => config('kodebazar.midtrans_mode'),
                    'midtrans_id' => config('kodebazar.midtrans_id'),
                    'midtrans_key' => config('kodebazar.midtrans_key'),
                    'midtrans_secret' => config('kodebazar.midtrans_secret'),
                    'midtrans_active' => config('kodebazar.midtrans_active'),
                ];
                break;
        }

        return [];
    }
}
