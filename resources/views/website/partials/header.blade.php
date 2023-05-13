<header>
    <div class="header-top-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <ul class="top-bar-info list-inline-item pl-0 mb-0">
                        <li class="list-inline-item"><a href="mailto:support@gmail.com"><i
                                    class="icofont-support-faq mr-2"></i>support@novena.com</a></li>
                        <li class="list-inline-item"><i class="icofont-location-pin mr-2"></i>Address Ta-134/A, New
                            York, USA </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="text-lg-right top-right-bar mt-2 mt-lg-0">
                        <a href="tel:+23-345-67890">
                            <span>Call Now : </span>
                            <span class="h4">823-4565-13456</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navigation" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('website.home') }}">
                <img src="{{ asset('assets') }}/images/logo.png" alt="" class="img-fluid">
            </a>

            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain"
                aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icofont-navigation-menu"></span>
            </button>

            {{-- <a href="{{ route('website.home') }}" class="{{ request()->routeIs('website.home') ? 'text-blue-500':'text-gray-500' }} text-base font-medium hover:text-gray-900">Home</a>
            <a href="{{ route('website.products') }}" class="{{ request()->routeIs('website.products') ? 'text-blue-500':'text-gray-500' }} text-base font-medium text-gray-500 hover:text-gray-900">Pharmacy & Store</a>
            <a href="{{ route('website.department') }}" class="{{ request()->routeIs('website.department') ? 'text-blue-500':'text-gray-500' }} text-base font-medium text-gray-500 hover:text-gray-900">Departments</a>
            <a href="{{ route('website.doctor') }}" class="{{ request()->routeIs('website.doctor') ? 'text-blue-500':'text-gray-500' }} text-base font-medium text-gray-500 hover:text-gray-900">Doctors</a> --}}

            {{-- <div class="pb-6">
                <a href="{{ route('website.home') }}" class="text-sm leading-6 text-gray-600 hover:text-gray-900">Home</a>
            </div>
            <div class="pb-6">
                <a href="{{ route('website.about') }}" class="text-sm leading-6 text-gray-600 hover:text-gray-900">About</a>
            </div>
            <div class="pb-6">
                <a href="{{ route('website.products') }}" class="text-sm leading-6 text-gray-600 hover:text-gray-900">Pharmacy & Store</a>
            </div>
            <div class="pb-6">
                <a href="{{ route('website.policy') }}" class="text-sm leading-6 text-gray-600 hover:text-gray-900">Privacy Policy</a>
            </div>
            <div class="pb-6">
                <a href="{{ route('website.terms') }}" class="text-sm leading-6 text-gray-600 hover:text-gray-900">Terms & Condition</a>
            </div>
            <div class="pb-6">
                <a href="{{ route('website.contact') }}" class="text-sm leading-6 text-gray-600 hover:text-gray-900">Contact</a>
            </div> --}}

            <div class="collapse navbar-collapse" id="navbarmain">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a class="nav-link" href="{{ route('website.home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('website.about') }}">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('website.services') }}">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('website.department') }}">Departments</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('website.doctor') }}">Doctors</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('website.news') }}">News</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('website.contact') }}">Contact</a></li>
                    {{-- <li class="nav-item"><a class="nav-link" href="{{ route('website.appointment') }}">Appointment</a></li> --}}
                </ul>

                <a href="{{ route('website.appointment') }}" class="btn btn-main-2 btn-round-full mx-2">
                    Get appoinment
                    <i class="icofont-simple-right  ml-2"></i>
                </a>
            </div>
        </div>
    </nav>
</header>
