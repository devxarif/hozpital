@extends('website.layout.app')

@section('title', 'Services')

@section('content')
<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="block text-center">
            <span class="text-white">Our services</span>
            <h1 class="text-capitalize mb-5 text-lg">What We Do</h1>

            <ul class="list-inline breadcumb-nav">
              <li class="list-inline-item"><a href="{{ route('website.home') }}" class="text-white">Home</a></li>
              <li class="list-inline-item"><span class="text-white">/</span></li>
              <li class="list-inline-item"><a href="#" class="text-white-50">Our services</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="section service-2">
      <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center">
                    <h2 class="mb-4">Our Services</h2>
                    <div class="divider mx-auto my-4"></div>
                    <p>Today’s users expect effortless experiences. Don’t let essential people and processes stay stuck in the past. Speed it up, skip the hassles</p>
                </div>
            </div>
        </div>
          <div class="row">
                @foreach ($services as $service)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="service-block mb-5">
                            <img height="120px" width="120px" src="{{ $service->image_url }}" alt="" class="object-contain" >
                            <div class="content">
                                <h4 class="mt-4 mb-2 title-color">{{ $service->name }}</h4>
                                <p class="mb-4">
                                    {{ Str::limit($service->short_description, 100, '...') }}
                                </p>
                            <a href="{{ route('website.service.details', $service->slug) }}" class="read-more">Learn More  <i class="icofont-simple-right ml-2"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
          </div>
      </div>
  </section>
@endsection
