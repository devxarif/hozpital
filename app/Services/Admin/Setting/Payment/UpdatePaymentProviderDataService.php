<?php

namespace App\Services\Admin\Setting\Payment;

class UpdatePaymentProviderDataService
{
    public function execute(object $data): bool
    {
        switch ($data->provider) {
            case 'paypal':
                checkSetConfig('paypal.live.client_id', $data->paypal_live_client_id);
                checkSetConfig('paypal.live.client_secret', $data->paypal_live_client_secret);
                checkSetConfig('paypal.sandbox.client_id', $data->paypal_sandbox_client_id);
                checkSetConfig('paypal.sandbox.client_secret', $data->paypal_sandbox_client_secret);

                setConfig('paypal.mode', $data->paypal_mode);
                setConfig('paypal.active', $data->paypal_active ? true : false);
                break;
            case 'stripe':
                $data->validate([
                    'stripe_key' => 'required',
                    'stripe_secret' => 'required',
                ]);

                checkSetConfig('kodebazar.stripe_key', $data->stripe_key);
                checkSetConfig('kodebazar.stripe_secret', $data->stripe_secret);
                setConfig('kodebazar.stripe_active', $data->stripe_active ? true : false);
                break;
            case 'razorpay':
                $data->validate([
                    'razorpay_key' => 'required',
                    'razorpay_secret' => 'required',
                ]);

                checkSetConfig('kodebazar.razorpay_key', $data->razorpay_key);
                checkSetConfig('kodebazar.razorpay_secret', $data->razorpay_secret);
                setConfig('kodebazar.razorpay_active', $data->razorpay_active ? true : false);
                break;
            case 'flutterwave':
                $data->validate([
                    'flw_public_key' => 'required',
                    'flw_secret' => 'required',
                    'flw_secret_hash' => 'required',
                ], [
                    'flw_public_key.required' => 'The flutterwave public key field is required',
                    'flw_secret.required' => 'The flutterwave secret field is required',
                    'flw_secret_hash.required' => 'The flutterwave secret hash field is required',
                ]);

                checkSetConfig('kodebazar.flw_public_key', $data->flw_public_key);
                checkSetConfig('kodebazar.flw_secret', $data->flw_secret);
                checkSetConfig('kodebazar.flw_secret_hash', $data->flw_secret_hash);
                setConfig('kodebazar.flw_active', $data->flw_active ? true : false);
                break;
            case 'mollie':
                $data->validate([
                    'mollie_key' => 'required',
                ]);

                checkSetConfig('kodebazar.mollie_key', $data->mollie_key);
                setConfig('kodebazar.mollie_active', $data->mollie_active ? true : false);
                break;
            case 'paystack':
                $data->validate([
                    'paystack_key' => 'required',
                    'paystack_secret' => 'required',
                ]);

                checkSetConfig('kodebazar.paystack_key', $data->paystack_key);
                checkSetConfig('kodebazar.paystack_secret', $data->paystack_secret);
                setConfig('kodebazar.paystack_active', $data->paystack_active ? true : false);
                break;
            case 'instamojo':
                $data->validate([
                    'im_key' => 'required',
                    'im_secret' => 'required',
                ], [
                    'im_key.required' => 'The instamojo key field is required',
                    'im_secret.required' => 'The instamojo auth token field is required',
                ]);

                checkSetConfig('kodebazar.im_key', $data->im_key);
                checkSetConfig('kodebazar.im_secret', $data->im_secret);
                setConfig('kodebazar.im_active', $data->im_active ? true : false);
                break;
            case 'midtrans':
                $data->validate([
                    'midtrans_id' => 'required',
                    'midtrans_key' => 'required',
                    'midtrans_secret' => 'required',
                ]);

                checkSetConfig('kodebazar.midtrans_id', $data->midtrans_id);
                checkSetConfig('kodebazar.midtrans_key', $data->midtrans_key);
                checkSetConfig('kodebazar.midtrans_secret', $data->midtrans_secret);
                setConfig('kodebazar.midtrans_active', $data->midtrans_active ? true : false);
                setConfig('kodebazar.midtrans_mode', $data->midtrans_mode ? true : false);
                break;
        }

        return true;
    }
}
