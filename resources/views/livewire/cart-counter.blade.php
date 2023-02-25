<div class="ml-4 flow-root lg:ml-6 relative" x-data="{open:false}">
    <a @click="open = !open" href="#" class="group -m-2 flex items-center p-2">
        <svg class="h-6 w-6 flex-shrink-0 text-gray-400 group-hover:text-gray-500"
            x-description="Heroicon name: outline/shopping-bag"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z">
            </path>
        </svg>
        <span class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">{{ $cart_count }}</span>
        <span class="sr-only">items in cart, view bag</span>
    </a>
    {{-- <a  class="group -m-2 flex items-center p-2">
        <svg class="h-6 w-6 flex-shrink-0 text-gray-400 group-hover:text-gray-500"
            x-description="Heroicon name: outline/shopping-bag"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z">
            </path>
        </svg>
        <span class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">{{ $cart_count }}</span>
        <span class="sr-only">items in cart, view bag</span>
    </a> --}}

    <div x-show="open" x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="transform opacity-0 scale-95"
    x-transition:enter-end="transform opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-75"
    x-transition:leave-start="transform opacity-100 scale-100"
    x-transition:leave-end="transform opacity-0 scale-95" @click.outside="open = false"
    class="absolute z-50 mt-2 w-80 rounded-md shadow-lg origin-top-right right-0">
    <div class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white">
        <div class="px-4 mt-px pb-6">
            <h2 class="sr-only">Shopping Cart</h2>
            <ul role="list" class="divide-y divide-gray-200">
                @foreach ($cart_items as $item)
                    <li class="py-2 flex">
                        <img src="{{ $item->attributes['image'] }}"alt="Insulated Travel Mug 18 Oz." class="flex-none w-16 rounded-md border border-gray-200">
                        <div class="ml-4 flex flex-auto flex-col justify-between">
                            <h3 class="font-medium text-gray-900">
                                <a href="{{ route('website.product.details', $item->associatedModel['slug']) }}" class="line-clamp-2">
                                    {{ $item->name }}
                                </a>
                            </h3>
                            <p class="text-gray-500">
                                x{{ $item->quantity }}
                            </p>
                            <p class="text-gray-500">
                                ${{ $item->price*$item->quantity }}
                            </p>
                        </div>

                        <svg wire:click.prevent="removeFromCart({{ $item->id }})" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 cursor-pointer">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </li>
                @endforeach
            </ul>
            @if ($cart_items && count($cart_items))
                <a class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-medium text-white hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 transition block w-full text-sm"
                href="{{ route('website.checkout') }}">
                    Checkout
                </a>
                <p class="mt-6 text-center">
                    <a href="{{ route('website.bag') }}"
                        class="text-sm font-medium text-blue-600 hover:text-blue-500">
                        View Shopping Cart
                    </a>
                </p>
            @else
                <a class="mt-5 text-center items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-medium text-white hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 transition block w-full text-sm"
                href="{{ route('website.products') }}">
                    Browse Product
                </a>
            @endif

        </div>
    </div>
    </div>
</div>
