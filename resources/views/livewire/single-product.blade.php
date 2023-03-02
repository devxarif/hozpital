<a href="{{ route('website.product.details', $product->slug) }}" class="releative group box-border overflow-hidden flex rounded-md cursor-pointer pe-0 pb-2 lg:pb-3 flex-col items-start transition duration-200 ease-in-out transform hover:-translate-y-1 md:hover:-translate-y-1.5 hover:shadow-md bg-white">
    <div class="flex mb-3 md:mb-3.5">
        <img alt="{{ $product->name }}" src="{{ $product->image }}">
    </div>
    <div class="w-full overflow-hidden p-2 md:px-2.5 xl:px-4">
        <h2 class="truncate mb-1 text-sm md:text-base font-semibold text-heading">{{ $product->name }}</h2>
        <p class="text-body text-xs lg:text-sm leading-normal xl:leading-relaxed max-w-[250px] truncate">
            {{ $product->productCategory->name ?? '' }}
        </p>
        <div class="flex justify-between align-middle items-center font-semibold text-sm sm:text-base mt-1.5 space-s-2 lg:text-lg lg:mt-2.5 text-heading">
            <span class="inline-block false">${{ $product->selling_price }}</span>
            <button wire:click.prevent="addToCart({{ $product->id }})" class="mt-3 flex items-center justify-center rounded-md border border-transparent bg-blue-500 p-2 text-sm font-medium text-white hover:bg-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                  </svg>
            </button>
        </div>
    </div>
</a>
