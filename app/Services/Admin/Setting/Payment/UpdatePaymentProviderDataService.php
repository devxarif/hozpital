<?php

namespace App\Services\Admin\Setting\Payment;

class UpdatePaymentProviderDataService
{
    public function execute(object $data): bool
    {
        switch ($data->provider) {
            case 'paypal':
                if ($data->paypal_mode == 'sandbox') {
                    $data->validate([
                        'paypal_sandbox_client_id' => 'required',
                        'paypal_sandbox_client_secret' => 'required',
                        'paypal_conversion_rate' => 'required|numeric',
                    ]);
                }else{
                    $data->validate([
                        'paypal_live_client_id' => 'required',
                        'paypal_live_client_secret' => 'required',
                        'paypal_conversion_rate' => 'required|numeric',
                    ]);
                }

                checkSetConfig('paypal.live.client_id', $data->paypal_live_client_id);
                checkSetConfig('paypal.live.client_secret', $data->paypal_live_client_secret);
                checkSetConfig('paypal.sandbox.client_id', $data->paypal_sandbox_client_id);
                checkSetConfig('paypal.sandbox.client_secret', $data->paypal_sandbox_client_secret);
                checkSetConfig('paypal.paypal_conversion_rate', $data->paypal_conversion_rate);

                setConfig('paypal.mode', $data->paypal_mode);
                setConfig('paypal.active', $data->paypal_active ? true : false);
                break;
            case 'stripe':
                $data->validate([
                    'stripe_key' => 'required',
                    'stripe_secret' => 'required',
                    'stripe_conversion_rate' => 'required|numeric',
                ]);

                checkSetConfig('kodebazar.stripe_key', $data->stripe_key);
                checkSetConfig('kodebazar.stripe_secret', $data->stripe_secret);
                checkSetConfig('kodebazar.stripe_conversion_rate', $data->stripe_conversion_rate);
                setConfig('kodebazar.stripe_active', $data->stripe_active ? true : false);
                break;
            case 'razorpay':
                $data->validate([
                    'razorpay_key' => 'required',
                    'razorpay_secret' => 'required',
                    'razorpay_conversion_rate' => 'required|numeric',
                ]);

                checkSetConfig('kodebazar.razorpay_key', $data->razorpay_key);
                checkSetConfig('kodebazar.razorpay_secret', $data->razorpay_secret);
                checkSetConfig('kodebazar.razorpay_conversion_rate', $data->razorpay_conversion_rate);
                setConfig('kodebazar.razorpay_active', $data->razorpay_active ? true : false);
                break;
            case 'flutterwave':
                $data->validate([
                    'flw_public_key' => 'required',
                    'flw_secret' => 'required',
                    'flw_secret_hash' => 'required',
                    'flw_conversion_rate' => 'required|numeric',
                ], [
                    'flw_public_key.required' => 'The flutterwave public key field is required',
                    'flw_secret.required' => 'The flutterwave secret field is required',
                    'flw_secret_hash.required' => 'The flutterwave secret hash field is required',
                    'flw_conversion_rate.required' => 'The flutterwave conversion field is required',
                ]);

                checkSetConfig('kodebazar.flw_public_key', $data->flw_public_key);
                checkSetConfig('kodebazar.flw_secret', $data->flw_secret);
                checkSetConfig('kodebazar.flw_secret_hash', $data->flw_secret_hash);
                checkSetConfig('kodebazar.fl_conversion_rate', $data->fl_conversion_rate);
                setConfig('kodebazar.flw_active', $data->flw_active ? true : false);
                break;
            case 'mollie':
                $data->validate([
                    'mollie_key' => 'required',
                    'mollie_conversion_rate' => 'required|numeric',
                ]);

                checkSetConfig('kodebazar.mollie_key', $data->mollie_key);
                checkSetConfig('kodebazar.mollie_conversion_rate', $data->mollie_conversion_rate);
                setConfig('kodebazar.mollie_active', $data->mollie_active ? true : false);
                break;
            case 'paystack':
                $data->validate([
                    'paystack_key' => 'required',
                    'paystack_secret' => 'required',
                    'paystack_conversion_rate' => 'required|numeric',
                ]);

                checkSetConfig('kodebazar.paystack_key', $data->paystack_key);
                checkSetConfig('kodebazar.paystack_secret', $data->paystack_secret);
                checkSetConfig('kodebazar.paystack_conversion_rate', $data->paystack_conversion_rate);
                setConfig('kodebazar.paystack_active', $data->paystack_active ? true : false);
                break;
            case 'instamojo':
                $data->validate([
                    'im_key' => 'required',
                    'im_secret' => 'required',
                    'im_conversion_rate' => 'required|numeric',
                ], [
                    'im_key.required' => 'The instamojo key field is required',
                    'im_secret.required' => 'The instamojo auth token field is required',
                    'im_conversion_rate.required' => 'The instamojo conversion field is required',
                ]);

                checkSetConfig('kodebazar.im_key', $data->im_key);
                checkSetConfig('kodebazar.im_secret', $data->im_secret);
                checkSetConfig('kodebazar.im_conversion_rate', $data->im_conversion_rate);
                setConfig('kodebazar.im_active', $data->im_active ? true : false);
                break;
            case 'midtrans':
                $data->validate([
                    'midtrans_id' => 'required',
                    'midtrans_key' => 'required',
                    'midtrans_secret' => 'required',
                    'midtrans_conversion_rate' => 'required|numeric',
                ]);

                checkSetConfig('kodebazar.midtrans_id', $data->midtrans_id);
                checkSetConfig('kodebazar.midtrans_key', $data->midtrans_key);
                checkSetConfig('kodebazar.midtrans_secret', $data->midtrans_secret);
                checkSetConfig('kodebazar.midtrans_conversion_rate', $data->midtrans_conversion_rate);
                setConfig('kodebazar.midtrans_active', $data->midtrans_active ? true : false);
                setConfig('kodebazar.midtrans_mode', $data->midtrans_mode ? true : false);
                break;
        }

        return true;
    }
}
