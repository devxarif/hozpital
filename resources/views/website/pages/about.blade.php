@extends('website.layout.app')

@section('title', 'About Us')

@section('content')
<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block text-center">
                    <span class="text-white">About Us</span>
                    <h1 class="text-capitalize mb-5 text-lg">About Us</h1>

                    <ul class="list-inline breadcumb-nav">
                        <li class="list-inline-item"><a href="{{ route('website.home') }}" class="text-white">Home</a>
                        </li>
                        <li class="list-inline-item"><span class="text-white">/</span></li>
                        <li class="list-inline-item"><a href="#" class="text-white-50">About Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@if ($cms->about_status)
<section class="section about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 col-sm-6">
                <div class="about-img">
                    <img src="{{ asset($cms->about_image) }}" alt="" class="img-fluid">
                    <img src="{{ asset($cms->about_image2) }}" alt="" class="img-fluid mt-4">
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="about-img mt-4 mt-lg-0">
                    <img src="{{ asset($cms->about_image3) }}" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="about-content pl-4 mt-4 mt-lg-0">
                    <h2 class="title-color">{{ $cms->about_title }}</h2>
                    <p class="mt-4 mb-5">{{ $cms->about_description }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@if ($cms->about_service_status)
<section class="section about-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h2 class="title-color">{{ $cms->about_service_title }}</h2>
            </div>
            <div class="col-lg-8">
                <p>{{ $cms->about_service_description }}</p>
            </div>
        </div>
    </div>
</section>
@endif

@if ($cms->about_service_status)
<section class="fetaure-page ">
    <div class="container">
        <div class="row">
            @foreach ($services as $service)
            <div class="col-lg-3 col-md-6">
                <div class="about-block-item mb-5 mb-lg-0">
                    <img height="100px" width="100px" src="{{ $service->image_url }}" alt="" class="object-contain">
                    <h4 class="mt-3">{{ $service->name }}</h4>
                    <p> {{ Str::limit($service->short_description, 100, '...') }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@if ($cms->about_partner_status)
<section class="section awards">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <h2 class="title-color">{{ $cms->about_partner_title }}</h2>
                <div class="divider mt-4 mb-5 mb-lg-0"></div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    @foreach ($partners as $partner)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="award-img">
                            <img src="{{ $partner->image_url }}" alt="" class="img-fluid">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@if ($cms->about_meet_specialist_status)
<section class="section team">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center">
                    <h2 class="mb-4">{{ $cms->about_meet_specialist_title }}</h2>
                    <div class="divider mx-auto my-4"></div>
                    <p>{{ $cms->about_meet_specialist_description }}</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="team-block mb-5 mb-lg-0">
                    <img src="{{ asset('assets') }}/images/team/1.jpg" alt="" class="img-fluid w-100">

                    <div class="content">
                        <h4 class="mt-4 mb-0"><a href="{{ route('website.doctor.details', 'username') }}">John
                                Marshal</a></h4>
                        <p>Internist, Emergency Physician</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="team-block mb-5 mb-lg-0">
                    <img src="{{ asset('assets') }}/images/team/2.jpg" alt="" class="img-fluid w-100">

                    <div class="content">
                        <h4 class="mt-4 mb-0"><a href="{{ route('website.doctor.details', 'username') }}">Marshal
                                Root</a></h4>
                        <p>Surgeon, Сardiologist</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="team-block mb-5 mb-lg-0">
                    <img src="{{ asset('assets') }}/images/team/3.jpg" alt="" class="img-fluid w-100">

                    <div class="content">
                        <h4 class="mt-4 mb-0"><a href="{{ route('website.doctor.details', 'username') }}">Siamon
                                john</a></h4>
                        <p>Internist, General Practitioner</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="team-block">
                    <img src="{{ asset('assets') }}/images/team/4.jpg" alt="" class="img-fluid w-100">

                    <div class="content">
                        <h4 class="mt-4 mb-0"><a href="{{ route('website.doctor.details', 'username') }}">Rishat
                                Ahmed</a></h4>
                        <p>Orthopedic Surgeon</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@if ($cms->about_testimonial_status)
<section class="section testimonial">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-6">
                <div class="section-title">
                    <h2 class="mb-4">{{ $cms->about_testimonial_title }}</h2>
                    <div class="divider  my-4"></div>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6 testimonial-wrap offset-lg-6">
                @foreach ($testimonials as $testimonial)
                <div class="testimonial-block">
                    <div class="client-info ">
                        <h4>{{ $testimonial->title }}</h4>
                        <span>{{ $testimonial->name }}</span>
                    </div>
                    <p>
                        {{ $testimonial->description }}
                    </p>
                    <i class="icofont-quote-right"></i>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif
@endsection

@section('links')
<style>
    .testimonial:before {
        background: url("{{ asset('assets/images/bg/about-testimonial.jpg') }}") no-repeat 50% 50%;
    }
</style>
@endsection
