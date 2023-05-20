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
                        <span class="mx-2">|</span>
                        <a href="{{ route('login') }}">
                            <span class="h6">Login/Register</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navigation" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('website.home') }}">
                <img src="{{ $setting->app_dark_logo }}" alt="" class="img-fluid">
            </a>

            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain"
                aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icofont-navigation-menu"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarmain">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ isActive('website.home') }}"><a class="nav-link" href="{{ route('website.home') }}">Home</a></li>
                    <li class="nav-item {{ isActive('website.about') }}"><a class="nav-link" href="{{ route('website.about') }}">About</a></li>
                    <li class="nav-item {{ isActive('website.products') }}"><a class="nav-link" href="{{ route('website.products') }}">Pharmacy</a></li>
                    <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="{{ route('website.services') }}" id="dropdown02" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">Services <i class="icofont-thin-down"></i></a>
						<ul class="dropdown-menu" aria-labelledby="dropdown02">
                            @foreach ($services as $service)
							<li><a class="dropdown-item" href="{{ route('website.service.details', $service->slug) }}">{{ $service->name }}</a></li>
                            @endforeach
							<li><a class="dropdown-item" href="{{ route('website.services') }}">View All</a></li>
						</ul>
					</li>
                    <li class="nav-item dropdown {{ isActive('website.department') }}">
						<a class="nav-link dropdown-toggle" href="{{ route('website.department') }}" id="dropdown02" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">Departments <i class="icofont-thin-down"></i></a>
						<ul class="dropdown-menu" aria-labelledby="dropdown02">
                            @foreach ($header_departments as $department)
							<li><a class="dropdown-item" href="{{ route('website.department.details', $department->slug) }}">{{ $department->name }}</a></li>
                            @endforeach
							<li><a class="dropdown-item" href="{{ route('website.department') }}">View All</a></li>
						</ul>
					</li>
                    {{-- <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="{{ route('website.doctor') }}" id="dropdown02" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">Doctors <i class="icofont-thin-down"></i></a>
						<ul class="dropdown-menu" aria-labelledby="dropdown02">
							<li><a class="dropdown-item" href="department.html">Departments</a></li>
							<li><a class="dropdown-item" href="department-single.html">Department Single</a></li>

							<li class="dropdown dropdown-submenu dropright">
								<a class="dropdown-item dropdown-toggle" href="#!" id="dropdown0301" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sub Menu</a>

								<ul class="dropdown-menu" aria-labelledby="dropdown0301">
									<li><a class="dropdown-item" href="index.html">Submenu 01</a></li>
									<li><a class="dropdown-item" href="index.html">Submenu 02</a></li>
								</ul>
							</li>
						</ul>
					</li> --}}
                    <li class="nav-item {{ isActive('website.news') }}"><a class="nav-link" href="{{ route('website.news') }}">News</a></li>
                </ul>

                <a href="{{ route('website.appointment') }}" class="btn btn-main-2 ml-5">
                    Get appoinment
                    <i class="icofont-simple-right  ml-2"></i>
                </a>
            </div>
        </div>
    </nav>
</header>

{{-- Cart Item  --}}
<div class="f-btn mc-toggler" id="cart">
    <svg height="24px" width="24px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mt-2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
      </svg>
    <div class="label">Cart</div>
    <span class="counter">0</span>
</div>
