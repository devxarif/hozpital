@extends('website.layout.app')

@section('content')
<div class="max-w-3xl mx-auto py-16 px-4 sm:px-6 sm:py-24 lg:px-8 lg:py-32">
    <div class="lg:col-start-2">
        <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl">Thanks for shopping with us!</h1>
        <p class="mt-2 text-base text-gray-500">We appreciate your order, we’re currently processing it. So hang tight,
            and we’ll send you confirmation very soon!</p>
        <div class="mt-16 grid grid-cols-1 sm:grid-cols-4 gap-6">
            <dl class="text-sm font-medium">
                <dt class="text-gray-900">Order number</dt>
                <dd class="mt-2 text-blue-600">#1717</dd>
            </dl>
            <dl class="text-sm font-medium">
                <dt class="text-gray-900">Payment status</dt>
                <dd class="mt-2 text-blue-600">
                    <div class="flex items-center text-sm text-gray-500 space-x-1">
                        <span class="block w-2 h-2 rounded-full" style="background-color: #60a5fa"></span>
                        <span>Paid</span>
                    </div>
                </dd>
            </dl>
            <dl class="text-sm font-medium">
                <dt class="text-gray-900">Shipping status</dt>
                <dd class="mt-2 text-blue-600">
                    <div class="flex items-center text-sm text-gray-500 space-x-1">
                        <span class="block w-2 h-2 rounded-full" style="background-color: #fbbf24"></span>
                        <span>Unshipped</span>
                    </div>
                </dd>
            </dl>
            <dl class="text-sm font-medium">
                <dt class="text-gray-900">Date created</dt>
                <dd class="mt-2 text-blue-600">
                    <div class="flex items-center text-sm text-gray-500 space-x-1">
                        January 31, 2023
                    </div>
                </dd>
            </dl>
        </div>
        <ul role="list"
            class="mt-6 text-sm font-medium text-gray-500 border-t border-gray-200 divide-y divide-gray-200">
            <li class="flex py-6 space-x-6">
                <img src="https://demo.cartify.dev/storage/media/540/insulated-travel-mug-18-oz-white-1.jpg"
                    alt="Insulated Travel Mug 18 Oz."
                    class="flex-none w-24 h-28 bg-gray-100 rounded-md object-center object-cover sm:w-32 sm:h-36">
                <div class="flex-auto flex flex-col space-y-1">
                    <h3 class="text-gray-700 hover:text-gray-800">
                        <a href="https://demo.cartify.dev/products/insulated-travel-mug-18-oz">Insulated Travel Mug 18
                            Oz.</a>
                    </h3>
                    <div class="inline-flex space-x-2 divide-x divide-gray-200">
                        <p class="">White</p>
                    </div>
                    <div class="mt-6 flex-1 flex items-end">
                        <dl class="hidden sm:flex text-sm divide-x divide-gray-200 space-x-4 sm:space-x-6">
                            <div class="flex">
                                <dt class="font-medium text-gray-900">Quantity</dt>
                                <dd class="ml-2 text-gray-700">
                                    1
                                </dd>
                            </div>
                            <div class="pl-4 flex sm:pl-6">
                                <dt class="font-medium text-gray-900">Price</dt>
                                <dd class="ml-2 text-gray-700">
                                    $28.00
                                </dd>
                            </div>
                        </dl>
                        <dl class="sm:hidden flex text-sm divide-x divide-gray-200 space-x-4 sm:space-x-6">
                            <div class="flex">
                                <dt class="font-medium text-gray-900 sr-only">Price</dt>
                                <dd class="text-gray-700">
                                    $28.00
                                    x1
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <p class="hidden sm:block flex-none font-medium text-gray-900">
                    $28.00
                </p>
            </li>
        </ul>

        <dl class="text-sm font-medium text-gray-500 space-y-6 border-t border-gray-200 pt-6">
            <div class="flex justify-between">
                <dt>Subtotal</dt>
                <dd class="text-gray-900">
                    $28.00
                </dd>
            </div>

            <div class="flex justify-between">
                <dt>Taxes</dt>
                <dd class="text-gray-900">
                    $0.00
                </dd>
            </div>

            <div class="flex justify-between">
                <dt>Shipping</dt>
                <dd class="text-gray-900">
                    $25.00
                </dd>
            </div>

            <div class="flex items-center justify-between border-t border-gray-200 text-gray-900 pt-6">
                <dt class="text-base">Total</dt>
                <dd class="text-base">
                    $53.00
                </dd>
            </div>
        </dl>

        <dl class="mt-16 grid grid-cols-2 gap-x-4 text-sm text-gray-600">
            <div>
                <dt class="font-medium text-gray-900">Shipping Address</dt>
                <dd class="mt-2">
                    <address class="not-italic">
                        <span class="block">Karleigh Paul</span>
                        <span class="block">681 Nobel Parkway, Sed quia inventore s</span>
                        <span class="block">Voluptates impedit , Dolor pariatur Volu 475</span>
                        <span class="block">Jordan</span>
                    </address>
                </dd>
            </div>
        </dl>

        <div class="mt-16 border-t border-gray-200 py-6 text-right">
            <a href="/" class="text-sm font-medium text-blue-600 hover:text-blue-500">
                Continue Shopping<span aria-hidden="true"> →</span>
            </a>
        </div>
    </div>
</div>
@endsection
