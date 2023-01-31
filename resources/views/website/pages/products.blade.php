@extends('website.layout.app')

@section('main')
<main class="relative flex-grow bg-gray-100" style="min-height: -webkit-fill-available;">
    <div class="mx-auto max-w-[1920px] px-4 md:px-8 2xl:px-16">
        <div class="flex pt-8 pb-16 lg:pb-20">
            <div class="flex-shrink-0 pr-24 hidden lg:block w-96">
                <div style="position: sticky; top: 50px;">
                    <div class="pb-7">
                        <div class="chawkbazarBreadcrumb flex items-center">
                            <ol class="flex items-center w-full overflow-hidden">
                                <li
                                    class="text-sm text-body px-2.5 transition duration-200 ease-in first:ps-0 last:pe-0 hover:text-heading">
                                    <a href="/">Home</a></li>
                                <li class="text-base text-body mt-0.5">/</li>
                                <li
                                    class="text-sm text-body px-2.5 transition duration-200 ease-in first:ps-0 last:pe-0 hover:text-heading">
                                    <a class="capitalize font-semibold text-heading" href="/search">Search</a></li>
                            </ol>
                        </div>
                    </div>
                    <div class="pt-1">
                        <div class="block border-b border-gray-300 pb-7 mb-7">
                            <div class="flex items-center justify-between mb-2.5">
                                <h2 class="font-semibold text-heading text-xl md:text-2xl">Filters</h2><button
                                    class="flex-shrink text-xs mt-0.5 transition duration-150 ease-in focus:outline-none hover:text-heading">Clear All</button>
                            </div>
                            <div class="flex flex-wrap -m-1.5 pt-2"></div>
                        </div>
                        <div class="block border-b border-gray-300 pb-7 mb-7">
                            <h3 class="text-heading text-sm md:text-base font-semibold mb-7">Category</h3>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                  <input id="color-0" name="color[]" value="white" type="checkbox" class="h-5 w-5 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                  <label for="color-0" class="ml-3 text-lg text-gray-600">White</label>
                                </div>

                                <div class="flex items-center">
                                  <input id="color-1" name="color[]" value="beige" type="checkbox" class="h-5 w-5 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                  <label for="color-1" class="ml-3 text-lg text-gray-600">Beige</label>
                                </div>

                                <div class="flex items-center">
                                  <input id="color-2" name="color[]" value="blue" type="checkbox" class="h-5 w-5 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                  <label for="color-2" class="ml-3 text-lg text-gray-600">Blue</label>
                                </div>

                                <div class="flex items-center">
                                  <input id="color-3" name="color[]" value="brown" type="checkbox" class="h-5 w-5 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                  <label for="color-3" class="ml-3 text-lg text-gray-600">Brown</label>
                                </div>

                                <div class="flex items-center">
                                  <input id="color-4" name="color[]" value="green" type="checkbox" class="h-5 w-5 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                  <label for="color-4" class="ml-3 text-lg text-gray-600">Green</label>
                                </div>

                                <div class="flex items-center">
                                  <input id="color-5" name="color[]" value="purple" type="checkbox" class="h-5 w-5 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                  <label for="color-5" class="ml-3 text-lg text-gray-600">Purple</label>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full lg:-ms-9">
                <div class="flex justify-between items-center mb-7">
                    <h1 class="text-heading text-2xl font-bold hidden lg:inline-flex pb-1">Casual Wear</h1><button
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
                        <div
                            class="flex-shrink-0 text-body text-xs md:text-sm leading-4 pe-4 md:me-6 ps-2 hidden lg:block">
                            9,608 items</div>
                        <div class="relative ms-2 lg:ms-0 z-10 min-w-[180px]">

                            {{-- <button
                                class="border border-gray-300 text-heading text-[13px] md:text-sm font-semibold relative w-full py-2 ps-3 pe-10 text-start bg-white rounded-lg shadow-xl focus:outline-none focus-visible:ring-2 focus-visible:ring-opacity-75 focus-visible:ring-white focus-visible:ring-offset-orange-300 focus-visible:ring-offset-2 focus-visible:border-indigo-500 sm:text-sm cursor-pointer"
                                id="headlessui-listbox-button-:r2:" type="button" aria-haspopup="true"
                                aria-expanded="false" data-headlessui-state=""><span class="block truncate">Sorting
                                    Options</span><span
                                    class="absolute inset-y-0 end-0 flex items-center pe-2 pointer-events-none"><svg
                                        stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24"
                                        class="w-5 h-5 text-gray-400" aria-hidden="true" height="1em" width="1em"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg></span></button> --}}
                                </div>
                    </div>
                </div>
                <div
                    class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-x-3 lg:gap-x-5 xl:gap-x-7 gap-y-3 xl:gap-y-5 2xl:gap-y-8 ">
                    <a href="{{ route('website.product.details') }}" class="group box-border overflow-hidden flex rounded-md cursor-pointer pe-0 pb-2 lg:pb-3 flex-col items-start transition duration-200 ease-in-out transform hover:-translate-y-1 md:hover:-translate-y-1.5 hover:shadow-product bg-white"
                        role="button" title="12 Eco-Friendly Clothing Brands That">
                        <div class="flex mb-3 md:mb-3.5"><span
                                style="box-sizing: border-box; display: inline-block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative; max-width: 100%;"><span
                                    style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; max-width: 100%;"><img
                                        alt="" aria-hidden="true"
                                        src="https://templates.envytheme.com/bexi/default/assets/images/products/product-6.jpg"
                                        style="display: block; max-width: 100%; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px;"></span><img
                                    alt="12 Eco-Friendly Clothing Brands That"
                                    src="https://templates.envytheme.com/bexi/default/assets/images/products/product-6.jpg"
                                    decoding="async" data-nimg="intrinsic"
                                    class="bg-gray-300 object-cover rounded-s-md w-full transition duration-200 ease-in rounded-md group-hover:rounded-b-none"
                                    style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;"></span>
                            <div
                                class="absolute top-3.5 md:top-5 3xl:top-7 start-3.5 md:start-5 3xl:start-7 flex flex-col gap-y-1 items-start">
                            </div>
                        </div>
                        <div class="w-full overflow-hidden p-2 md:px-2.5 xl:px-4">
                            <h2 class="truncate mb-1 text-sm md:text-base font-semibold text-heading">12 Eco-Friendly
                                Clothing Brands That</h2>
                            <p
                                class="text-body text-xs lg:text-sm leading-normal xl:leading-relaxed max-w-[250px] truncate">
                                12 Eco-Friendly Clothing Brands That, has a scoop neck, sleeveless, straight hem</p>
                            <div class="font-semibold text-sm sm:text-base mt-1.5 space-s-2 lg:text-lg lg:mt-2.5
           text-heading"><span class="inline-block false">$20.00</span><del
                                    class="sm:text-base font-normal text-gray-800">$28.00</del></div>
                        </div>
                    </a>
                </div>
                <div class="text-center pt-8 xl:pt-14"><button data-variant="slim"
                        class="text-[13px] md:text-sm leading-4 inline-flex items-center cursor-pointer transition ease-in-out duration-300 font-semibold font-body text-center justify-center border-0 border-transparent focus-visible:outline-none focus:outline-none rounded-md  h-11 md:h-12 px-5 bg-gray-900 text-white py-2 transform-none normal-case hover:text-white hover:bg-gray-600 hover:shadow-cart">Load
                        More</button></div>
            </div>
        </div>
    </div>
</main>
@endsection
