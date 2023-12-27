<header id="header-sticky" class="tp-header-main-sticky p-relative">
    <div class="tp-header-space-2">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-6 col-lg-2">
                    <div class="tp-header-logo-2 p-relative">
                        <a href="{{ route('index') }}">
                            <img height="50" width="150" src="{{ asset('img/logo.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 d-none d-xl-block">
                    <div class="tp-main-menu home-2 d-none d-xl-block">
                        <nav class="tp-main-menu-content">
                            <ul>
                                <li><a href="{{ route('index') }}">Home</a></li>
                                <li class="has-dropdown"><a >Personal Banking</a>
                                    <ul class="submenu">
                                        <li><a href="{{ route('personal.checking') }}">Checking</a></li>
                                        <li><a href="{{ route('personal.savings') }}">Savings, Money & CDS</a></li>
                                        <li><a href="{{ route('personal.ira') }}">Individual Retirement Account</a></li>
                                    </ul>
                                </li>
                                <li class="has-dropdown">
                                    <a >Corperate Banking</a>
                                    <ul class="submenu">
                                        <li><a href="{{ route('business.checking') }}">Checking</a></li>
                                        <li><a href="{{ route('business.savings') }}">Savings, Money & CDS</a></li>
                                        <li><a href="{{ route('business.ira') }}">Business IRA</a></li>
                                    </ul>
                                </li>
                                <li class="has-dropdown"><a >Wealth Management</a>
                                    <ul class="submenu">
                                        <li><a href="{{ route('trust-service') }}">Trust Services</a></li>
                                        <li><a href="{{ route('estate-planning') }}">Estate Planning & Settlement</a></li>
                                        <li><a href="{{ route('financial-planning') }}">Financial Planning</a></li>
                                    </ul>
                                </li>

                                {{--                            <li><a href="{{ route('about') }}">About Us</a></li>--}}
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-6 col-lg-2">
                    <a style="margin-top: 10px; background-color: cadetblue; font-weight: bolder; width: 100px" href="#" class="login_btn btn btn-sm text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Login
                    </a>
                    <div class="tp-header-main-right-2 d-flex align-items-center justify-content-xl-end">
                        <a style="color: cadetblue" class="t d-none d-xl-block" target="_blank" href="{{ route('personalInfo') }}">Open An Account <i class="fa-regular fa-arrow-right"></i></a>
                        <div class="tp-header-main-right-hamburger-btn d-xl-none offcanvas-open-btn">
                            <button class="hamburger-btn">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
