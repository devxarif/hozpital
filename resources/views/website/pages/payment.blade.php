@extends('website.layout.app')

@section('main')
<div class="relative grid grid-cols-1 gap-x-16 max-w-7xl mx-auto lg:px-8 lg:grid-cols-2 mt-20">
    <h1 class="sr-only">Checkout</h1>

    <section
        class="bg-gray-50 pt-6 pb-12 md:px-10 lg:max-w-lg lg:w-full lg:mx-auto lg:px-0 lg:pt-0 lg:pb-24 lg:bg-transparent lg:row-start-1 lg:col-start-2">
        <div class="max-w-2xl mx-auto px-4 lg:max-w-none lg:px-0">
            <h2 class="sr-only">Order summary</h2>

            <ul class="text-sm font-medium text-gray-900 divide-y divide-gray-200">
                <li class="flex items-start space-x-4 pb-6">
                    <div class="flex-shrink-0">
                        <img class="w-20 h-auto rounded-md"
                            src="https://demo.cartify.dev/storage/media/350/conversions/hello-friend-tee-all-gender-white-1-thumb.jpg"
                            alt="hello-friend-tee-all-gender-white-1.jpg">

                    </div>
                    <div class="ml-6 flex-1 flex flex-col">
                        <div class="flex">
                            <div class="min-w-0 flex-1">
                                <h4 class="text-sm">
                                    <a href="https://demo.cartify.dev/products/hello-friend-tee-all-gender"
                                        class="font-medium text-gray-700 hover:text-gray-800">
                                        Hello Friend Tee - All-Gender
                                    </a>
                                </h4>
                                <p class="mt-1 text-sm text-gray-500">
                                    White
                                </p>
                                <p class="mt-1 text-sm text-gray-500">
                                    XS
                                </p>
                            </div>
                        </div>
                        <div class="flex-1 pt-2 flex items-end justify-between">
                            <p class="mt-1 text-sm font-medium text-gray-900">
                                $36.00
                            </p>

                            <div class="ml-4 text-sm font-medium text-gray-900">
                                x1
                            </div>
                        </div>
                    </div>
                </li>
            </ul>

            <dl class="text-sm font-medium text-gray-900 space-y-6 border-t border-gray-200 pt-6 lg:block">
                <div class="flex items-center justify-between">
                    <dt class="text-sm">Subtotal</dt>
                    <dd class="text-sm font-medium text-gray-900">
                        $36.00
                    </dd>
                </div>
                <div class="flex items-center justify-between">
                    <dt class="text-sm">Taxes</dt>
                    <dd class="text-sm font-medium text-gray-900">
                        $0.00
                    </dd>
                </div>
                <div class="flex items-center justify-between">
                    <dt class="text-sm">Shipping</dt>
                    <dd class="text-sm font-medium text-gray-900">
                        $30.00
                    </dd>
                </div>
                <div class="flex items-center justify-between border-t border-gray-200 pt-6">
                    <dt class="text-base font-medium">Total</dt>
                    <dd class="text-base font-medium text-gray-900">
                        $66.00
                    </dd>
                </div>
            </dl>
        </div>
    </section>

    <section class="py-16 lg:max-w-lg lg:w-full lg:mx-auto lg:pt-0 lg:pb-24 lg:row-start-1 lg:col-start-1">
        <div class="max-w-2xl mx-auto px-4 lg:max-w-none lg:px-0">
            <div wire:id="yHqQpwtDd5BsKYXu4O2I">
                <div wire:id="4SRMssQarDGO7FJ5KtPv">

                    <form wire:submit.prevent="save"
                        data-secret="pi_3MWLO3IhLpEpBtsP17Re87kQ_secret_Q27hrmCaXCFfJWh8HoR4aEXek">
                        <!-- Payment method -->
                        <div
                            x-data="{ selectedPaymentMethod: window.Livewire.find('4SRMssQarDGO7FJ5KtPv').entangle('selectedPaymentMethod') }">
                            <h2 class="text-lg font-medium text-gray-900">Payment method</h2>
                            <fieldset>
                                <legend class="sr-only">Payment method</legend>
                                <div class="mt-4 space-y-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-10">
                                    <div class="flex items-center">
                                        <input
                                            class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                            type="radio" wire:model="selectedPaymentMethod"
                                            id="payment-method-credit_card" name="payment-type" value="credit_card">
                                        <label class="block font-medium text-sm text-gray-700 ml-3"
                                            for="payment-method-credit_card">
                                            Credit card
                                        </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input
                                            class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                            type="radio" wire:model="selectedPaymentMethod" id="payment-method-paypal"
                                            name="payment-type" value="paypal" checked="checked">
                                        <label class="block font-medium text-sm text-gray-700 ml-3"
                                            for="payment-method-paypal">
                                            PayPal
                                        </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input
                                            class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                            type="radio" wire:model="selectedPaymentMethod" id="payment-method-cash"
                                            name="payment-type" value="cash">
                                        <label class="block font-medium text-sm text-gray-700 ml-3"
                                            for="payment-method-cash">
                                            Cash
                                        </label>
                                    </div>
                                </div>
                            </fieldset>

                            <!-- Stripe payment widget -->
                            <div wire:ignore="" x-show="selectedPaymentMethod === 'credit_card'" class="mt-6"
                                style="display: none;">
                                <div x-data="{
                    init() {
                        // Stripe publishable API key.
                        stripe = Stripe('pk_test_51KqdqFIhLpEpBtsPJng9sd7EbLWvPqD8cLpcZcTtfm6m9vXIpnnnVO784x2INbwLpG6nbMDetbjqoNwDAaEke6FR00dIuSTnC4');

                        // Set up Stripe.js and Elements to use in checkout form
                        elements = stripe.elements({
                            clientSecret: 'pi_3MWLO3IhLpEpBtsP17Re87kQ_secret_Q27hrmCaXCFfJWh8HoR4aEXek'
                        });

                        // Create and mount the Payment Element
                        paymentElement = elements.create('payment');
                        paymentElement.mount($refs.stripePaymentElement);
                    }
                }" @submit-stripe-payment.window="
                    $event.preventDefault();

                    const {error} = await stripe.confirmPayment({
                        elements,
                        confirmParams: {
                            return_url: 'https://demo.cartify.dev/checkout/review',
                        },
                        redirect: 'if_required',
                    });

                    if (error) {
                        $wire.emit('stripe-payment-fail', error.message);
                    } else {
                        $wire.emit('stripe-payment-success');
                    }
                ">
                                    <div x-ref="stripePaymentElement" class="StripeElement">
                                        <div class="__PrivateStripeElement"
                                            style="margin: -4px 0px !important; padding: 0px !important; border: none !important; display: block !important; background: transparent !important; position: relative !important; opacity: 1 !important; clear: both !important; transition: height 0.35s ease 0s !important;">
                                            <iframe name="__privateStripeFrame3367" frameborder="0"
                                                allowtransparency="true" scrolling="no" role="presentation"
                                                allow="payment *"
                                                src="https://js.stripe.com/v3/elements-inner-payment-9bff9b5d93a2723eca798a4a7cd0e344.html#wait=false&amp;rtl=false&amp;componentName=payment&amp;keyMode=test&amp;apiKey=pk_test_51KqdqFIhLpEpBtsPJng9sd7EbLWvPqD8cLpcZcTtfm6m9vXIpnnnVO784x2INbwLpG6nbMDetbjqoNwDAaEke6FR00dIuSTnC4&amp;referrer=https%3A%2F%2Fdemo.cartify.dev%2Fcheckout&amp;controllerId=__privateStripeController3361"
                                                title="Secure payment input frame"
                                                style="border: none !important; margin: -4px; padding: 0px !important; width: calc(100% + 8px); min-width: 100% !important; overflow: hidden !important; display: block !important; user-select: none !important; transform: translate(0px) !important; color-scheme: light only !important; height: 0px; opacity: 1; transition: opacity 0.4s ease 0.1s;"></iframe>
                                        </div>
                                    </div>
                                </div>
                                <!--Stripe.js injects the Payment Element-->
                            </div>

                            <!-- PayPal payment instruction -->
                            <div x-show="selectedPaymentMethod === 'paypal'" class="mt-6">
                                <div class="rounded-md bg-blue-50 border border-blue-200 p-4">
                                    <div class="flex">
                                        <p class="text-sm text-blue-700">
                                            You will be redirected to PayPal to complete the payment.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Cash payment instruction -->
                            <div x-show="selectedPaymentMethod === 'cash'" class="mt-6" style="display: none;">
                                <div class="rounded-md bg-blue-50 border border-blue-200 p-4">
                                    <div class="flex">
                                        <p class="text-sm text-blue-700">
                                            Pay by cash.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Billing address -->

                        <div class="mt-10 pt-6 border-t border-gray-200 sm:flex sm:items-center sm:justify-between">
                            <button
                                class="inline-flex items-center justify-center px-4 py-2 text-sm border border-transparent rounded-md font-medium focus:outline-none focus:ring disabled:opacity-25 disabled:cursor-not-allowed transition bg-blue-600 text-white hover:bg-blue-500 focus:border-blue-700 focus:ring-blue-200 active:bg-blue-600 block w-full sm:text-sm sm:ml-6 sm:order-last sm:w-auto"
                                type="submit">
                                Complete order
                            </button>
                            <button type="button" wire:click="previousStep"
                                class="flex items-center justify-center mt-4 mx-auto text-sm text-gray-500 sm:mt-0 sm:mx-0 sm:text-left hover:text-gray-700">
                                <svg class="mr-2 w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 16l-4-4m0 0l4-4m-4 4h18">
                                    </path>
                                </svg> Return to information
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Livewire Component wire-end:4SRMssQarDGO7FJ5KtPv -->
            </div>

            <!-- Livewire Component wire-end:yHqQpwtDd5BsKYXu4O2I -->
        </div>
    </section>
</div>
@endsection
