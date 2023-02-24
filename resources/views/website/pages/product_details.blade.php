@extends('website.layout.app')

@section('main')
<main class="mx-auto max-w-7xl sm:px-6 sm:pt-16 lg:px-8" x-data="{imageUrl: '{{ $product->image }}'}">
    <div class="mx-auto max-w-2xl lg:max-w-none">
      <div class="lg:grid lg:grid-cols-2 lg:items-start lg:gap-x-8">
        <div class="flex flex-col-reverse">
          <div class="mx-auto mt-6 hidden w-full max-w-2xl sm:block lg:max-w-none">
            <div class="grid grid-cols-4 gap-6" aria-orientation="horizontal" role="tablist">
                <button @click="imageUrl = '{{ $product->image }}'" class="relative flex h-24 cursor-pointer items-center justify-center rounded-md bg-white text-sm font-medium uppercase text-gray-900 hover:bg-gray-50 focus:outline-none focus:ring focus:ring-opacity-50 focus:ring-offset-4" type="button">
                    <span class="absolute inset-0 overflow-hidden rounded-md">
                        <img src="{{ $product->image }}" alt="" class="h-full w-full object-cover object-center">
                    </span>
                    {{-- <span class="pointer-events-none absolute inset-0 rounded-md ring-2 ring-offset-2 ring-transparent"
                    :class="imageUrl == $product->image ? 'ring-blue-500':'ring-transparent'"></span> --}}

                    {{-- <span class="pointer-events-none absolute inset-0 rounded-md ring-2 ring-offset-2 ring-transparent"
                    :class="{ 'ring-blue-500': selected, 'ring-transparent': !(selected) }"></span> --}}
                </button>
                @foreach ($product->galleries as $gallery)
                    <button @click="imageUrl = '{{ $gallery->image }}'" class="relative flex h-24 cursor-pointer items-center justify-center rounded-md bg-white text-sm font-medium uppercase text-gray-900 hover:bg-gray-50 focus:outline-none focus:ring focus:ring-opacity-50 focus:ring-offset-4" type="button">
                    <span class="absolute inset-0 overflow-hidden rounded-md">
                        <img src="{{ $gallery->image }}" alt="" class="h-full w-full object-cover object-center">
                    </span>
                    {{-- <span class="pointer-events-none absolute inset-0 rounded-md ring-2 ring-offset-2 ring-transparent"
                    :class="imageUrl == $gallery->image ? 'ring-blue-500':'ring-transparent'"></span> --}}
                    {{-- <span class="pointer-events-none absolute inset-0 rounded-md ring-2 ring-offset-2 ring-transparent" :class="{ 'ring-blue-500': selected, 'ring-transparent': !(selected) }"></span> --}}
                    </button>
                @endforeach
            </div>
          </div>

          <div class="aspect-w-1 aspect-h-1 w-full">
              <div>
                <img :src="imageUrl" alt="{{ $product->name }}" class="h-full w-full object-cover object-center sm:rounded-lg">
              </div>
          </div>
        </div>

        <!-- Product info -->
        <div class="mt-10 px-4 sm:mt-16 sm:px-0 lg:mt-0">
          <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $product->name }}</h1>

          <div class="mt-3">
            <h2 class="sr-only">Product information</h2>
            <p class="text-3xl tracking-tight text-gray-900">$140</p>
          </div>
          <div class="mt-6">
            <h3 class="sr-only">Short Description</h3>

            <div class="space-y-6 text-base text-gray-700">
                <p>{{ $product->short_description }}</p>
            </div>
          </div>

          <form class="mt-6">
            <div class="mt-10 flex">
              <button type="submit" class="flex max-w-xs flex-1 items-center justify-center rounded-md border border-transparent bg-blue-600 py-3 px-8 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-50 sm:w-full">Add to bag</button>

              <button type="button" class="ml-4 flex items-center justify-center rounded-md py-3 px-3 text-gray-400 hover:bg-gray-100 hover:text-gray-500">
                <svg class="h-6 w-6 flex-shrink-0" x-description="Heroicon name: outline/heart" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"></path>
                </svg>
                <span class="sr-only">Add to favorites</span>
              </button>
            </div>
          </form>

        </div>
      </div>
      <div class="space-y-6 text-base text-gray-700 mt-20">
        <h1 class="text-2xl font-bold tracking-tight text-gray-900">Description</h1>
        <p>{{ $product->description }}</p>
      </div>
      <section aria-labelledby="related-heading" class="mt-10 border-t border-gray-200 py-16 px-4 sm:px-0">
        <h2 id="related-heading" class="text-xl font-bold text-gray-900">Related Products</h2>
        <div class="mt-8 grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">

            @foreach ($related_products as $product)
                <div>
                   <a href="{{ route('website.product.details', $product->slug) }}">
                        <div class="relative">
                            <div class="relative h-72 w-full overflow-hidden rounded-lg">
                            <img src="{{ $product->image }}" alt="Front of zip tote bag with white canvas, black canvas straps and handle, and black zipper pulls." class="h-full w-full object-cover object-center">
                            </div>
                            <div class="relative mt-4">
                            <h3 class="text-sm font-medium text-gray-900">{{ $product->name }}</h3>
                            <p class="mt-1 text-sm text-gray-500">{{ $product->productCategory->name }}</p>
                            </div>
                            <div class="absolute inset-x-0 top-0 flex h-72 items-end justify-end overflow-hidden rounded-lg p-4">
                            <div aria-hidden="true" class="absolute inset-x-0 bottom-0 h-36 bg-gradient-to-t from-black opacity-50"></div>
                            <p class="relative text-lg font-semibold text-white">${{ $product->selling_price }}</p>
                            </div>
                        </div>
                    </a>
                    <div class="mt-6">
                        <a href="#" class="relative flex items-center justify-center rounded-md border border-transparent bg-gray-100 py-2 px-8 text-sm font-medium text-gray-900 hover:bg-gray-200">Add to bag<span class="sr-only">, Zip Tote Basket</span></a>
                    </div>
                </div>
            @endforeach

        </div>
      </section>
    </div>
  </main>
@endsection

{{-- @section('script')
    <script>
        myimages(){
            return {
                imageUrl: 'dfsd'
            }
        }
    </script>
@endsection --}}
