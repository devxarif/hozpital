@extends('website.layout.app')

@section('main')
<div class="relative bg-white py-16 sm:py-24">
    <div class="text-center">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Who We Are</h2>
        <p class="mx-auto mt-3 max-w-2xl text-xl text-gray-500 sm:mt-4">We have all the professional specialists in our hospital</p>
      </div>
    <div class="lg:mx-auto lg:grid lg:max-w-7xl lg:grid-cols-2 lg:items-start lg:gap-24 lg:px-8">
      <div class="sm:py-16 lg:py-0">
        <div class="relative mx-auto max-w-lg px-6 sm:max-w-3xl lg:max-w-none lg:px-0 lg:py-20">
          <!-- Testimonial card-->
          <div class="relative overflow-hidden rounded-2xl pt-64 pb-10 shadow-xl">
            <img class="absolute inset-0 h-full w-full object-cover" src="https://media.istockphoto.com/id/512278456/photo/group-of-doctors-at-the-hospital.jpg?s=170667a&w=0&k=20&c=XKMi1xsHzVJ8JJzQZfGYJooqBJitZT0MDs4W4usP4eg=" alt="">
            {{-- <div class="absolute inset-0 mix-blend-multiply"></div>
            <div class="absolute inset-0 bg-gradient-to-t opacity-90"></div> --}}

          </div>
        </div>
      </div>

      <div class="relative mx-auto max-w-md px-6 sm:max-w-3xl lg:px-0">
        <!-- Content area -->
        <div class="pt-12 sm:pt-16 lg:pt-20">
          <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">On a mission to empower teams</h2>
          <div class="mt-6 space-y-6 text-gray-500">
            <p class="text-lg">Sagittis scelerisque nulla cursus in enim consectetur quam. Dictum urna sed consectetur neque tristique pellentesque. Blandit amet, sed aenean erat arcu morbi. Cursus faucibus nunc nisl netus morbi vel porttitor vitae ut. Amet vitae fames senectus vitae.</p>
            <p class="text-base leading-7">Sollicitudin tristique eros erat odio sed vitae, consequat turpis elementum. Lorem nibh vel, eget pretium arcu vitae. Eros eu viverra donec ut volutpat donec laoreet quam urna. Sollicitudin tristique eros erat odio sed vitae, consequat turpis elementum. Lorem nibh vel, eget pretium arcu vitae. Eros eu viverra donec ut volutpat donec laoreet quam urna.</p>
            <p class="text-base leading-7">Rhoncus nisl, libero egestas diam fermentum dui. At quis tincidunt vel ultricies. Vulputate aliquet velit faucibus semper. Pellentesque in venenatis vestibulum consectetur nibh id. In id ut tempus egestas. Enim sit aliquam nec, a. Morbi enim fermentum lacus in. Viverra.</p>
          </div>
        </div>

        <!-- Stats section -->
        <div class="mt-10">
          <dl class="grid grid-cols-2 gap-x-4 gap-y-8">
            <div class="border-t-2 border-gray-100 pt-6">
              <dt class="text-base font-medium text-gray-500">Founded</dt>
              <dd class="text-3xl font-bold tracking-tight text-gray-900">2021</dd>
            </div>

            <div class="border-t-2 border-gray-100 pt-6">
              <dt class="text-base font-medium text-gray-500">Employees</dt>
              <dd class="text-3xl font-bold tracking-tight text-gray-900">5</dd>
            </div>

            <div class="border-t-2 border-gray-100 pt-6">
              <dt class="text-base font-medium text-gray-500">Beta Users</dt>
              <dd class="text-3xl font-bold tracking-tight text-gray-900">521</dd>
            </div>

            <div class="border-t-2 border-gray-100 pt-6">
              <dt class="text-base font-medium text-gray-500">Raised</dt>
              <dd class="text-3xl font-bold tracking-tight text-gray-900">$25M</dd>
            </div>
          </dl>
          <div class="mt-10">
            <a href="#" class="text-base font-medium text-indigo-600">
              Learn more about how we're changing the world
              <span aria-hidden="true"> &rarr;</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection
