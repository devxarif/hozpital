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
                            src="https://demo.cartify.dev/storage/media/540/conversions/insulated-travel-mug-18-oz-white-1-thumb.jpg"
                            alt="insulated-travel-mug-18-oz-white-1.jpg">

                    </div>
                    <div class="ml-6 flex-1 flex flex-col">
                        <div class="flex">
                            <div class="min-w-0 flex-1">
                                <h4 class="text-sm">
                                    <a href="https://demo.cartify.dev/products/insulated-travel-mug-18-oz"
                                        class="font-medium text-gray-700 hover:text-gray-800">
                                        Insulated Travel Mug 18 Oz.
                                    </a>
                                </h4>
                                <p class="mt-1 text-sm text-gray-500">
                                    White
                                </p>
                            </div>
                        </div>
                        <div class="flex-1 pt-2 flex items-end justify-between">
                            <p class="mt-1 text-sm font-medium text-gray-900">
                                $28.00
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
                        $28.00
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
                        $25.00
                    </dd>
                </div>
                <div class="flex items-center justify-between border-t border-gray-200 pt-6">
                    <dt class="text-base font-medium">Total</dt>
                    <dd class="text-base font-medium text-gray-900">
                        $53.00
                    </dd>
                </div>
            </dl>
        </div>
    </section>

    <section class="py-16 lg:max-w-lg lg:w-full lg:mx-auto lg:pt-0 lg:pb-24 lg:row-start-1 lg:col-start-1">
        <div class="max-w-2xl mx-auto px-4 lg:max-w-none lg:px-0">
            <div wire:id="IYZpYPPUYk5Xoc78TJtl">
                <div wire:id="XvF8MCHBr2NC03gUZcBo">
                    <div class="hidden mb-6 sm:block">
                        <nav class="flex" aria-label="Progress">
                            <ol role="list" class="flex items-center space-x-4">
                                <li class="flex items-center">
                                    <a href="https://demo.cartify.dev/cart"
                                        class="text-sm font-medium text-gray-500 hover:text-gray-700">
                                        Cart
                                    </a>
                                </li>

                                <li wire:click="showStep('checkout-contact-step')" class="flex items-center">
                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg> <span
                                        class="ml-4 text-sm font-medium text-gray-500 cursor-pointer hover:text-gray-600">
                                        Information
                                    </span>
                                </li>
                                <li class="flex items-center">
                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg> <span
                                        class="ml-4 text-sm font-medium text-gray-500 cursor-pointer text-blue-600">
                                        Shipping
                                    </span>
                                </li>
                                <li class="flex items-center">
                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg> <span
                                        class="ml-4 text-sm font-medium text-gray-500 cursor-pointer hover:text-gray-600">
                                        Payment
                                    </span>
                                </li>
                            </ol>
                        </nav>
                    </div>

                    <!-- Shipping method -->
                    <form wire:submit.prevent="save">
                        <fieldset>
                            <legend class="text-lg font-medium text-gray-900">Shipping method</legend>
                            <div class="mt-4 space-y-4">
                                <label
                                    class="relative block border rounded-lg shadow-sm px-6 py-4 cursor-pointer sm:flex sm:justify-between focus:outline-none border-blue-300 bg-blue-50">
                                    <input
                                        class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 sr-only"
                                        type="radio" wire:model="cart.shipping_method" name="shipping-method" value="6">
                                    <div class="flex items-center">
                                        <div class="text-sm">
                                            <p class="font-medium text-gray-900">
                                                Standard
                                            </p>
                                            <p class="text-gray-500">
                                                7-10 business days
                                            </p>
                                        </div>
                                    </div>
                                    <div class="mt-2 flex self-center text-sm sm:mt-0 sm:block sm:ml-4 sm:text-right">
                                        <div class="font-medium text-gray-900">
                                            $25.00
                                        </div>
                                    </div>
                                    <div class="absolute -inset-px rounded-lg border pointer-events-none border-blue-300"
                                        aria-hidden="true"></div>
                                </label>
                                <label
                                    class="relative block border rounded-lg shadow-sm px-6 py-4 cursor-pointer sm:flex sm:justify-between focus:outline-none border-gray-200 bg-white">
                                    <input
                                        class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 sr-only"
                                        type="radio" wire:model="cart.shipping_method" name="shipping-method" value="7">
                                    <div class="flex items-center">
                                        <div class="text-sm">
                                            <p class="font-medium text-gray-900">
                                                Express
                                            </p>
                                            <p class="text-gray-500">
                                                3-5 business days
                                            </p>
                                        </div>
                                    </div>
                                    <div class="mt-2 flex self-center text-sm sm:mt-0 sm:block sm:ml-4 sm:text-right">
                                        <div class="font-medium text-gray-900">
                                            $45.00
                                        </div>
                                    </div>
                                    <div class="absolute -inset-px rounded-lg border pointer-events-none border-gray-200"
                                        aria-hidden="true"></div>
                                </label>
                            </div>
                        </fieldset>

                        <div class="mt-10 pt-6 border-t border-gray-200 sm:flex sm:items-center sm:justify-between">
                            <a href="{{ route('website.payment') }}"
                                class="inline-flex items-center justify-center px-4 py-2 text-sm border border-transparent rounded-md font-medium focus:outline-none focus:ring disabled:opacity-25 disabled:cursor-not-allowed transition bg-blue-600 text-white hover:bg-blue-500 focus:border-blue-700 focus:ring-blue-200 active:bg-blue-600 block w-full sm:ml-6 sm:order-last sm:w-auto"
                                type="submit">
                                Continue to payment
                            </a>
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

                <!-- Livewire Component wire-end:XvF8MCHBr2NC03gUZcBo -->
            </div>
        </div>
    </section>
</div>
@endsection
