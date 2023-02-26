<div class="max-w-4xl mx-auto">
    <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">Shopping Cart</h1>

    <form wire:submit.prevent="save" class="mt-12">
        <section aria-labelledby="cart-heading">
            <h2 id="cart-heading" class="sr-only">
                Items in your shopping cart
            </h2>

            <ul role="list" class="border-t border-b border-gray-200 divide-y divide-gray-200">
                @foreach ($cart_items as $item)
                    <livewire:single-cart :item="$item" :quantity="$item->quantity"/>
                @endforeach
            </ul>
        </section>

        <div class="mt-10">
            <div class="rounded-lg bg-gray-50 px-4 py-6 sm:p-6 lg:p-8">
                <h2 class="sr-only">Order summary</h2>

                <div class="flow-root">
                    <dl class="-my-4 divide-y divide-gray-200 text-sm">
                        <div class="flex items-center justify-between py-4">
                            <dt class="text-gray-600">Subtotal</dt>
                            <dd class="font-medium text-gray-900">${{ $subtotal }}</dd>
                        </div>
                        {{--
                            <div class="flex items-center justify-between py-4">
                                <dt class="text-gray-600">Shipping</dt>
                                <dd class="font-medium text-gray-900">$5.00</dd>
                            </div>
                            <div class="flex items-center justify-between py-4">
                                <dt class="text-gray-600">Tax</dt>
                                <dd class="font-medium text-gray-900">$8.32</dd>
                            </div>
                        --}}
                        <div class="flex items-center justify-between py-4">
                            <dt class="text-base font-medium text-gray-900">Order total</dt>
                            <dd class="text-base font-medium text-gray-900">$112.32</dd>
                        </div>
                    </dl>
                </div>
            </div>
            <div class="mt-10">
                <a class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-medium text-white hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 transition block w-full py-3 px-4"
                    href="{{ route('website.checkout') }}">
                    Proceed to Checkout
                </a>
            </div>
            <div class="mt-6 text-center text-sm text-gray-500">
                <p>
                    or
                    <a href="{{ route('website.products') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                        Continue Shopping
                        <span aria-hidden="true"> →</span>
                    </a>
                </p>
            </div>
        </div>
    </form>
</div>
