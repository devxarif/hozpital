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
            {{ $quantity }}

            <div class="mt-4 flex items-center sm:block sm:absolute sm:top-0 sm:left-1/2 sm:mt-0">
                <label class="block font-medium text-sm text-gray-700 sr-only" for="item-0-quantity">
                    Quantity
                </label>
                <input wire:model="quantity" class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md block w-20 text-center sm:text-sm show-spinners disabled:bg-gray-100" type="number" min="1">
                {{-- <input
                    class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md block w-20 text-center sm:text-sm show-spinners disabled:bg-gray-100"
                    type="number" wire:model.defer="cart.items.0.quantity"
                    wire:change.debounce.500ms="save" wire:loading.attr="disabled"
                    wire:target="items.0.quantity" id="item-0-quantity" min="1" value="{{ $item->quantity }}"> --}}
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
