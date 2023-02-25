<a href="{{ route('website.product.details', $product->slug) }}" class="releative group box-border overflow-hidden flex rounded-md cursor-pointer pe-0 pb-2 lg:pb-3 flex-col items-start transition duration-200 ease-in-out transform hover:-translate-y-1 md:hover:-translate-y-1.5 hover:shadow-product bg-white">
    <div class="flex mb-3 md:mb-3.5">
        <img alt="{{ $product->name }}" src="{{ $product->image }}">
    </div>
    <div class="w-full overflow-hidden p-2 md:px-2.5 xl:px-4">
        <h2 class="truncate mb-1 text-sm md:text-base font-semibold text-heading">{{ $product->name }}</h2>
        <p class="text-body text-xs lg:text-sm leading-normal xl:leading-relaxed max-w-[250px] truncate">
            {{ $product->productCategory->name ?? '' }}
        </p>
        <div class="font-semibold text-sm sm:text-base mt-1.5 space-s-2 lg:text-lg lg:mt-2.5 text-heading">
            <span class="inline-block false">${{ $product->selling_price }}</span>
        </div>
        <button wire:click.prevent="addToCart({{ $product->id }})" class="mt-3 w-full flex items-center justify-center rounded-md border border-transparent bg-gray-200 py-2 px-8 text-sm font-medium text-gray-900 hover:bg-gray-300">Add to bag</button>
    </div>
</a>
