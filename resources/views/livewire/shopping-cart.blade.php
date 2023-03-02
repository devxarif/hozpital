@if ($cart_items && count($cart_items))
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">Shopping Cart</h1>

        <form wire:submit.prevent="save" class="mt-12">
            <section aria-labelledby="cart-heading">
                <h2 id="cart-heading" class="sr-only">
                    Items in your shopping cart
                </h2>

                <ul role="list" class="border-t border-b border-gray-200 divide-y divide-gray-200">
                    @foreach ($cart_items as $item)
                        <li class="flex py-5 sm:py-5">
                            <div class="flex-shrink-0">
                                <img src="{{ $item->attributes['image'] }}" alt="{{ $item->name }}"
                                    class="rounded-lg object-center object-cover w-20 h-20 sm:w-20 sm:h-20">
                            </div>

                            <div class="relative ml-4 flex-1 flex flex-col justify-between sm:ml-6">
                                <div>
                                    <div class="flex justify-between sm:grid sm:grid-cols-2">
                                        <div class="pr-6">
                                            <h3 class="text-sm">
                                                <a href="{{ route('website.product.details', $item->associatedModel['slug']) }}"
                                                    class="font-medium text-gray-700 hover:text-gray-800 line-clamp-2">
                                                    {{ $item->name }}
                                                </a>
                                            </h3>
                                            <p class="mt-1 text-sm text-gray-500">
                                                White
                                            </p>
                                        </div>

                                        <p class="flex justify-end text-sm font-medium text-gray-900 text-right">
                                            <svg wire:loading.flex="1" wire:target="cart.items.0.quantity"
                                                class="hidden animate-spin h-5 w-5 text-blue-600"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                                    stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor"
                                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                </path>
                                            </svg>
                                            <span wire:loading.remove="" wire:target="cart.items.0.quantity">
                                                ${{ $item->price }}
                                            </span>
                                        </p>
                                    </div>
                                    <div class="mt-4 flex items-center sm:block sm:absolute sm:top-0 sm:left-1/2 sm:mt-0">
                                        <label class="block font-medium text-sm text-gray-700 sr-only" for="item-0-quantity">
                                            Quantity
                                        </label>
                                        <div class="flex justify-center gap-2">
                                            <svg wire:click.prevent="decrementQty({{ $item->id }})" class="cursor-pointer fill-current text-gray-600 w-3" viewBox="0 0 448 512"><path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
                                            </svg>
                                            <input readonly class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md block w-12 text-center sm:text-sm show-spinners disabled:bg-gray-100" type="text" value="{{ $item->quantity }}">
                                            <svg wire:click.prevent="incrementQty({{ $item->id }})" class="cursor-pointer fill-current text-gray-600 w-3" viewBox="0 0 448 512">
                                            <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 flex items-end justify-between">
                                    <p class="flex items-center text-sm text-gray-900 space-x-2">
                                        ${{ $item->price * $item->quantity }}
                                    </p>
                                    <button wire:click="removeFromCart({{ $item->id }})" type="button"
                                        class="flex text-sm font-medium text-blue-600 hover:text-blue-500">
                                        <span>Remove</span>
                                    </button>
                                </div>
                            </div>
                        </li>
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
                            Browse Products
                            <span aria-hidden="true"> →</span>
                        </a>
                    </p>
                </div>
            </div>
        </form>
    </div>
@else
    <div class="max-w-2xl mx-auto pt-16 pb-24 px-4 sm:pt-24 sm:pb-32 sm:px-6 lg:max-w-7xl">
        <div class="max-w-4xl mx-auto">
            <div class="text-center">
                <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">
                    Your cart is currently empty
                </h1>
                <p class="mt-2 text-gray-700">
                    Before proceed to checkout you must add some products to your shopping cart.
                </p>
                <a class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-medium text-white hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 transition mt-5 px-8 " href="{{ route('website.products') }}">
                    Browse Products
                </a>
            </div>
        </div>
    </div>
@endif
