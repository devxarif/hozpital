<div class="mt-10 flex gap-3">
    <input class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md block w-20 text-center sm:text-sm show-spinners disabled:bg-gray-100" type="number" wire:model="quantity" id="item-0-quantity" min="1">
    <button wire:click="addToCart" type="button" class="flex max-w-xs flex-1 items-center justify-center rounded-md border border-transparent bg-blue-600 py-3 px-8 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-50 sm:w-full">Add to cart</button>
</div>
