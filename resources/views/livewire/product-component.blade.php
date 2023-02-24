<div class="flex pt-8 pb-16 lg:pb-20">
    <div class="lg:w-1/4 px-4 order-last lg:order-first mt-8 lg:mt-0">
        <div>
            <div class="mb-6">
                <div class="flex justify-between">
                    <h4 class="font-medium text-md lg:text-lg text-dark capitalize mb-10">Search</h4>

                    <div role="status" wire:loading>
                        <svg aria-hidden="true" class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                        </svg>
                    </div>
                </div>
                <div class="pro-sidebar-search mb-50 mt-25">
                    <form class="border-transparent" action="#" method="get">
                        <div class="relative">
                            <input wire:model.debounce.500ms="search" class="border border-gray-300 shadow-sm  w-full h-12 text-sm py-4 pl-4 bg-white text-dark focus:outline-none" type="search" name="search" placeholder="Search">
                        </div>
                    </form>
                </div>
            </div>


            <div class="mb-6">
                <h4 class="font-medium text-md lg:text-lg text-dark capitalize mb-5">Categories</h4>
                <ul>
                    @foreach ($product_categories as $category)
                        <li class="mb-5 flex justify-between items-center transition-all hover:text-orange">
                            <div class="flex items-center">
                                <input wire:model="categories.{{ $category->id }}" id="category_{{ $category->id }}" name="color[]" value="{{ $category->id }}" type="checkbox" class="h-5 w-5 rounded border-gray-300 text-blue-600 focus:outline-none">
                                <label for="category_{{ $category->id }}" class="ml-3 text-md font-semibold text-gray-600 focus:outline-none">{{ $category->name }}</label>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
    <div class="w-full lg:-ms-9">
        <div class="flex justify-between items-center mb-7">
            <h1 class="text-heading text-3xl font-bold hidden lg:inline-flex pb-1">Pharmacy & Store</h1>
            <button
                class="lg:hidden text-heading text-sm px-4 py-2 font-semibold border border-gray-300 rounded-md flex items-center transition duration-200 ease-in-out focus:outline-none hover:bg-gray-200"><svg
                    xmlns="http://www.w3.org/2000/svg" width="18px" height="14px" viewBox="0 0 18 14">
                    <g id="Group_36196" data-name="Group 36196" transform="translate(-925 -1122.489)">
                        <path id="Path_22590" data-name="Path 22590"
                            d="M942.581,1295.564H925.419c-.231,0-.419-.336-.419-.75s.187-.75.419-.75h17.163c.231,0,.419.336.419.75S942.813,1295.564,942.581,1295.564Z"
                            transform="translate(0 -169.575)" fill="currentColor"></path>
                        <path id="Path_22591" data-name="Path 22591"
                            d="M942.581,1951.5H925.419c-.231,0-.419-.336-.419-.75s.187-.75.419-.75h17.163c.231,0,.419.336.419.75S942.813,1951.5,942.581,1951.5Z"
                            transform="translate(0 -816.512)" fill="currentColor"></path>
                        <path id="Path_22593" data-name="Path 22593"
                            d="M1163.713,1122.489a2.5,2.5,0,1,0,1.768.732A2.483,2.483,0,0,0,1163.713,1122.489Z"
                            transform="translate(-233.213)" fill="currentColor"></path>
                        <path id="Path_22594" data-name="Path 22594"
                            d="M2344.886,1779.157a2.5,2.5,0,1,0,.731,1.768A2.488,2.488,0,0,0,2344.886,1779.157Z"
                            transform="translate(-1405.617 -646.936)" fill="currentColor"></path>
                    </g>
                </svg><span class="ps-2.5">Filters</span></button>

            <div class="flex items-center justify-end">
                <div class="flex-shrink-0 text-body text-xs md:text-sm leading-4 pe-4 md:me-6 ps-2 hidden lg:block">
                    {{ $products->total() }} items
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-x-3 lg:gap-x-5 xl:gap-x-7 gap-y-3 xl:gap-y-5 2xl:gap-y-8 ">
            @foreach ($products as $product)
                <a href="{{ route('website.product.details') }}" class="releative group box-border overflow-hidden flex rounded-md cursor-pointer pe-0 pb-2 lg:pb-3 flex-col items-start transition duration-200 ease-in-out transform hover:-translate-y-1 md:hover:-translate-y-1.5 hover:shadow-product bg-white">
                    <div class="flex mb-3 md:mb-3.5">
                        <img alt="" src="{{ $product->image }}">
                    </div>
                    <div class="w-full overflow-hidden p-2 md:px-2.5 xl:px-4">
                        <h2 class="truncate mb-1 text-sm md:text-base font-semibold text-heading">{{ $product->name }}</h2>
                        <p class="text-body text-xs lg:text-sm leading-normal xl:leading-relaxed max-w-[250px] truncate">
                            {{ $product->productCategory->name ?? '' }}
                        </p>
                        <div class="font-semibold text-sm sm:text-base mt-1.5 space-s-2 lg:text-lg lg:mt-2.5 text-heading">
                            <span class="inline-block false">${{ $product->selling_price }}</span>
                        </div>
                        <button class="mt-3 w-full flex items-center justify-center rounded-md border border-transparent bg-gray-200 py-2 px-8 text-sm font-medium text-gray-900 hover:bg-gray-300">Add to bag</button>
                    </div>
                </a>
            @endforeach
        </div>
        @if (!$products->count() && $products->count() == 0)
            <div class="text-center w-full">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                </svg>
                <h3 class="mt-2 text-sm font-semibold text-gray-900">No products found</h3>
                <p class="mt-1 text-sm text-gray-500">Get started by creating a new project.</p>
            </div>
        @endif

        <div class="mt-12">
            {{ $products->onEachSide(0)->links('vendor.pagination.product-pagination') }}
        </div>
    </div>
</div>
