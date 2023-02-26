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

            <livewire:details-cart :product="$product"/>
        </div>
      </div>
      <div class="space-y-6 text-base text-gray-700 mt-20">
        <h1 class="text-2xl font-bold tracking-tight text-gray-900">Description</h1>
        <p>{{ $product->description }}</p>
      </div>
      <section class="mt-10 border-t border-gray-200 py-16 px-4 sm:px-0">
        <h2 id="related-heading" class="text-xl font-bold text-gray-900">Related Products</h2>
        <div class="mt-8 grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
            @foreach ($related_products as $product)
                <livewire:single-product :product="$product" />
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
