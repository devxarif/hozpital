@extends('website.layout.app')

@section('title', 'Home')

@section('content')
@if ($cms->home_banner_status)
 <section class="banner" style="background-image: url('{{ asset($cms->home_banner_bg_image) }}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-xl-7">
                <div class="block">
                    <div class="divider mb-3"></div>
                    <span class="text-uppercase text-sm letter-spacing">{{ $cms->home_banner_subtitle }}</span>
                    <h1 class="mb-3 mt-3">{{ $cms->home_banner_title }}</h1>
                    <p class="mb-4 pr-5">
                        {{ $cms->home_banner_description }}
                    </p>
                    <div class="btn-container ">
                        <a href=" {{ $cms->home_banner_button_url }}" class="btn btn-main-2">
                            {{ $cms->home_banner_button_text }}
                        </a>
                        <a href=" {{ $cms->home_banner_button2_url }}" class="btn btn-main">
                            {{ $cms->home_banner_button2_text }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<section class="features">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="feature-block d-lg-flex">
                    <div class="feature-item mb-5 mb-lg-0">
                        <div class="feature-icon mb-4">
                            <i class="icofont-surgeon-alt"></i>
                        </div>
                        <span>24 Hours Service</span>
                        <h4 class="mb-3">Online Appoinment</h4>
                        <p class="mb-4">Get ALl time support for emergency.We have introduced the principle of
                            family medicine.</p>
                        <a href="{{ route('website.appointment') }}" class="btn btn-main btn-round-full">Make a appoinment</a>
                    </div>

                    <div class="feature-item mb-5 mb-lg-0">
                        <div class="feature-icon mb-4">
                            <i class="icofont-ui-clock"></i>
                        </div>
                        <span>Timing schedule</span>
                        <h4 class="mb-3">Working Hours</h4>
                        <ul class="w-hours list-unstyled">
                            <li class="d-flex justify-content-between">Sun - Wed : <span>8:00 - 17:00</span></li>
                            <li class="d-flex justify-content-between">Thu - Fri : <span>9:00 - 17:00</span></li>
                            <li class="d-flex justify-content-between">Sat - sun : <span>10:00 - 17:00</span></li>
                        </ul>
                    </div>

                    <div class="feature-item mb-5 mb-lg-0">
                        <div class="feature-icon mb-4">
                            <i class="icofont-support"></i>
                        </div>
                        <span>Emegency Cases</span>
                        <h4 class="mb-3">1-800-700-6200</h4>
                        <p>Get ALl time support for emergency.We have introduced the principle of family
                            medicine.Get Conneted with us for any urgency .</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if ($cms->home_about_status)
    <section class="section about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-sm-6">
                    <div class="about-img">
                        <img src="{{ asset($cms->home_about_image) }}" alt="" class="img-fluid">
                        <img src="{{ asset($cms->home_about_image2) }}" alt="" class="img-fluid mt-4">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="about-img mt-4 mt-lg-0">
                        <img src="{{ asset($cms->home_about_image3) }}" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="about-content pl-4 mt-4 mt-lg-0">
                        <h2 class="title-color"> {{ $cms->home_about_title }}</h2>
                        <p class="mt-4 mb-5">
                            {{ $cms->home_about_description }}
                        </p>
                        <a href=" {{ $cms->home_about_button_url }}" class="btn btn-main-2 btn-round-full btn-icon">
                            {{ $cms->home_about_button_text }}
                            <i lass="icofont-simple-right ml-3"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

@if ($cms->home_counter_status)
    <section class="cta-section ">
        <div class="container">
            <div class="cta position-relative" style="background-image: url('{{ asset($cms->home_counter_bg_image) }}')">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="counter-stat">
                            <i class="icofont-doctor"></i>
                            <span class="h3 counter" data-count="{{ $cms->home_counter_count }}">0</span>{{ $cms->home_counter_shortname }}
                            <p>{{ $cms->home_counter_name }}</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="counter-stat">
                            <i class="icofont-flag"></i>
                            <span class="h3 counter" data-count="{{ $cms->home_counter2_count }}">0</span>{{ $cms->home_counter2_shortname }}
                            <p>{{ $cms->home_counter2_name }}</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="counter-stat">
                            <i class="icofont-badge"></i>
                            <span class="h3 counter" data-count="{{ $cms->home_counter3_count }}">0</span>{{ $cms->home_counter3_shortname }}
                            <p>{{ $cms->home_counter3_name }}</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="counter-stat">
                            <i class="icofont-globe"></i>
                            <span class="h3 counter" data-count="{{ $cms->home_counter4_count }}">0</span>{{ $cms->home_counter4_shortname }}
                            <p>{{ $cms->home_counter4_name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section service gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 text-center">
                    <div class="section-title">
                        <h2>{{ $cms->home_counter4_name }}</h2>
                        <div class="divider mx-auto my-4"></div>
                        <p>{{ $cms->home_counter4_name }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($services as $service)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="service-item mb-4">
                            <div class="icon d-flex align-items-center">
                                <img height="70px" width="55px" class="object-contain" src="{{ $service->image_url }}" alt="">
                                <h4 class="mt-3 mb-3">{{ $service->name }}</h4>
                            </div>
                            <div class="content">
                                <p class="mb-4">
                                    {{ Str::limit($service->short_description, 100, '...') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif

@if ($cms->home_appointment_status)
    <section class="section appoinment">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 ">
                    <div class="appoinment-content">
                        <img src="{{ asset($cms->home_appointment_image) }}" alt="" class="img-fluid">
                        <div class="emergency">
                            <h2 class="text-lg"><i class="icofont-phone-circle text-lg"></i>{{ $cms->home_appointment_contact }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-10 ">
                    <div class="appoinment-wrap mt-5 mt-lg-0">
                        <h2 class="mb-2 title-color">{{ $cms->home_appointment_title }}</h2>
                        <p class="mb-4">{{ $cms->home_appointment_description }}</p>
                        <form id="#" class="appoinment-form" method="post" action="#">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option>Choose Department</option>
                                            <option>Software Design</option>
                                            <option>Development cycle</option>
                                            <option>Software Development</option>
                                            <option>Maintenance</option>
                                            <option>Process Query</option>
                                            <option>Cost and Duration</option>
                                            <option>Modal Delivery</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select class="form-control" id="exampleFormControlSelect2">
                                            <option>Select Doctors</option>
                                            <option>Software Design</option>
                                            <option>Development cycle</option>
                                            <option>Software Development</option>
                                            <option>Maintenance</option>
                                            <option>Process Query</option>
                                            <option>Cost and Duration</option>
                                            <option>Modal Delivery</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input name="date" id="date" type="text" class="form-control"
                                            placeholder="dd/mm/yyyy">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input name="time" id="time" type="text" class="form-control"
                                            placeholder="Time">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input name="name" id="name" type="text" class="form-control"
                                            placeholder="Full Name">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input name="phone" id="phone" type="Number" class="form-control"
                                            placeholder="Phone Number">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-2 mb-4">
                                <textarea name="message" id="message" class="form-control" rows="6"
                                    placeholder="Your Message"></textarea>
                            </div>

                            <a class="btn btn-main btn-round-full" href="{{ route('website.appointment') }}">Make Appoinment <i
                                    class="icofont-simple-right ml-2  "></i></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

@if ($cms->home_testimonial_status)
    <section class="section testimonial-2 gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="section-title text-center">
                        <h2>{{ $cms->home_testimonial_title }}</h2>
                        <div class="divider mx-auto my-4"></div>
                        <p>{{ $cms->home_testimonial_description }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 testimonial-wrap-2">
                    @foreach ($testimonials as $testimonial)
                        <div class="testimonial-block style-2  gray-bg">
                            <i class="icofont-quote-right"></i>

                            <div class="testimonial-thumb">
                                <img src="{{ $testimonial->image_url }}" alt="" class="img-fluid">
                            </div>

                            <div class="client-info ">
                                <h4>{{ $testimonial->title }}</h4>
                                <span>{{ $testimonial->name }}</span>
                                <p>
                                    {{ $testimonial->description }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif

@if ($cms->home_partner_status)
<section class="section clients">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="section-title text-center">
                    <h2>{{ $cms->home_partner_title }}</h2>
                    <div class="divider mx-auto my-4"></div>
                    <p>{{ $cms->home_partner_description }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row clients-logo">
            @foreach ($partners as $partner)
                <div class="col-lg-2">
                    <div class="client-thumb">
                        <img src="{{ $partner->image_url }}" alt="" class="img-fluid">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
