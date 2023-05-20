@extends('website.layout.app')

@section('title', $service->name)

@section('content')
<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="block text-center">
            <span class="text-white">Service Details</span>
            <h1 class="text-capitalize mb-5 text-lg">{{ $service->name }}</h1>

            <ul class="list-inline breadcumb-nav">
              <li class="list-inline-item"><a href="{{ route('website.home') }}" class="text-white">Home</a></li>
              <li class="list-inline-item"><span class="text-white">/</span></li>
              <li class="list-inline-item"><a href="{{ route('website.services') }}" class="text-white">Service</a></li>
              <li class="list-inline-item"><span class="text-white">/</span></li>
              <li class="list-inline-item"><span class="text-white-50">{{ $service->name }}</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="section department-single">
      <div class="container">
          <div class="row">
              <div class="col-lg-8">
                  <div class="department-content mt-5">
                      <h3 class="text-md">
                        {{ $service->name }}
                      </h3>
                      <div class="divider my-4"></div>
                      {!! $service->description !!}
                  </div>
              </div>

              <div class="col-lg-4">
                  <div class="sidebar-widget schedule-widget mt-5">
                      <h5 class="mb-4">Time Schedule</h5>

                      <ul class="list-unstyled">
                        <li class="d-flex justify-content-between align-items-center">
                          <span>Monday - Friday</span>
                          <span>9:00 - 17:00</span>
                        </li>
                        <li class="d-flex justify-content-between align-items-center">
                          <span>Saturday</span>
                          <span>9:00 - 16:00</span>
                        </li>
                        <li class="d-flex justify-content-between align-items-center">
                          <span>Sunday</span>
                          <span>Closed</span>
                        </li>
                      </ul>

                      <div class="sidebar-contatct-info mt-4">
                          <p class="mb-0">Need Urgent Help?</p>
                          <h3>+23-4565-65768</h3>
                      </div>

                      <a href="{{ route('website.appointment') }}" class="btn btn-main-2 btn-round-full mt-3">Make an Appoinment<i class="icofont-simple-right ml-2"></i></a>
                  </div>
              </div>
          </div>
      </div>
  </section>

@endsection
