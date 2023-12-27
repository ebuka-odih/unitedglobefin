<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }} </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/favicon.png">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/font-awesome-pro.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/main.css') }}">

    <style>
        /* Default styles for the button */
        .login_btn {
            display: none; /* Hidden by default on all devices */
        }

        /* Media query for screens with a maximum width of 768 pixels (typical for phones and smaller tablets) */
        @media only screen and (max-width: 768px) {
            .login_btn {
                display: block; /* Display the button on smaller screens */
            }
        }
    </style>
</head>
<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->


<!-- pre loader area start -->
<div id="loading">
    <div id="loading-center">
        <div class="preloader"></div>
    </div>
</div>
<!-- pre loader area end -->


<!-- back to top start -->
<div class="back-to-top-wrapper">
    <button id="back_to_top" type="button" class="back-to-top-btn">
        <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </button>
</div>
<!-- back to top end -->


<!-- offcanvas area start -->
<div class="offcanvas__area">
    <div class="offcanvas__wrapper">
        <div class="offcanvas__close">
            <button class="offcanvas__close-btn offcanvas-close-btn">
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11 1L1 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M1 1L11 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        </div>
        <div class="offcanvas__content">
            <div class="offcanvas__top mb-50 d-flex justify-content-between align-items-center">
                <div class="offcanvas__logo logo">
                    <a href="{{ route('index') }}">
                        <img height="50" width="150" src="{{ asset('img/logo.png') }}" alt="">
                    </a>
                </div>
            </div>

            <div class="tp-main-menu-mobile fix d-xl-none mb-40">

            </div>
            <div style="margin-bottom: 20px; margin-top: 10px">
                <a style="color: cadetblue; font-weight: bolder" class="new_acct " target="_blank" href="{{ route('personalInfo') }}">Open an Account <i class="fa-regular fa-arrow-right"></i></a>

            </div>

            <div class="offcanvas__contact">
                <h4 class="offcanvas__title">Contacts</h4>

                <div class="offcanvas__contact-content d-flex">
                    <div class="offcanvas__contact-content-icon">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div class="offcanvas__contact-content-content">
                        <a href="https://template.wphix.com/cdn-cgi/l/email-protection#b5dbd0d0d1ddd0d9c5f5d6dad8c5d4dbcc9bd6dad8"> <span>info@ctbcommerce.com</span>  </a>
                    </div>
                </div>


            </div>

        </div>
    </div>
</div>
<div class="body-overlay"></div>
<!-- offcanvas area end -->


<!-- header area start -->
<header  class="tp-header-area p-relative">
    <div class="tp-header-box p-relative">
        <div class="tp-header-logo p-relative">
            <span class="tp-header-logo-bg"></span>
            <a href="{{ route('index') }}">
                <img height="50" width="150" src="{{ asset('img/logo.png') }}" alt="">
            </a>

        </div>

        <div class="tp-header-wrapper-inner header__sticky p-relative">


            <div class="tp-header-main-menu d-flex align-items-center justify-content-between">
                <div class="tp-main-menu d-none d-xl-block">
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
                                <a >Corporate Banking</a>
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

                        </ul>
                    </nav>
                </div>

            </div>
        </div>
        <a style="margin: 30px; background-color: cadetblue; font-weight: bolder; " href="#" class="login_btn btn btn-sm text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Login
        </a>
        <div class="tp-header-btn">
            <a style="color: cadetblue; font-weight: bolder;" class="tp- d-none d-xl-block" target="_blank" href="{{ route('personalInfo') }}">Open An Account <i class="fa-regular fa-arrow-right"></i></a>
            <div class="tp-header-main-right-hamburger-btn d-xl-none offcanvas-open-btn">
                <button class="hamburger-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </div>
</header>
<!-- header area end -->

<!-- sticky header start -->
@include('pages.layout.header')
<!-- sticky header end -->
@yield('content')

<!-- footer area start -->
<footer class="tp-footer-area pt-80 p-relative z-index-1" data-bg-color="#16243E">
    <div class="tp-footer-bg-shape">
{{--        <img height="70" width="200" src="{{ asset('img/logo.png') }}" alt="">--}}
    </div>
    <div class="tp-footer-main-area tp-footer-border">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="tp-footer-widget tp-footer-col-1 mb-50">
                        <div class="tp-footer-logo mb-20">
                            <a href="{{ route('index') }}">  <img height="70" width="200" src="{{ asset('img/logo.png') }}" alt=""></a>
                        </div>
                        <div class="tp-footer-widget-content">
                            <p>Our mission is to help entrepreneurs, business owners, investors across the world prosper by facilitating the creation of robust corporate structures.</p>

                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="tp-footer-widget tp-footer-col-4 mb-50">
                        <h3 class="tp-footer-widget-title">Contact us</h3>
                        <div class="tp-footer-widget-content">
                            <div class="tp-footer-widget-contact">
                                <div class="tp-footer-widget-contact-inner">
                                    <a href="mailto:info@ctbcommerce.com"><i class="fa-solid fa-envelope"></i>
                                        <span >info@ctbcommerce.com</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="tp-footer-widget tp-footer-col-2 mb-50">
                        <h3 class="tp-footer-widget-title">Featured Services</h3>
                        <div class="tp-footer-widget-content">
                            <ul>
                                <li><a href="{{ route('contact') }}">Foreign Currency Deposit</a></li>
                                <li><a href="{{ route('contact') }}"> Corporate Responsibility</a></li>
                                <li><a href="{{ route('contact') }}"> Information of interest</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="tp-footer-copyright-area p-relative">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="tp-footer-copyright-inner">
                        <p>© {{ env('APP_NAME') }} {{ Date('Y') }} | All Rights Reserved</p>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="tp-footer-copyright-inner text-lg-end">
                        <a href="{{ route('index') }}">Home</a>
                        <a href="{{ route('about') }}">About us</a>
                        <a href="{{ route('portfoliomgt') }}">Services</a>
                        <a href="{{ route('forex') }}">Portfolio</a>
                        <a href="{{ route('contact') }}">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer area end -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Welcome Back</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-lg-10 offset-lg-1">
                    <div class="tp-contact-breadcrumb-content">
                        <h4 class="text-dark text-center">Sign In</h4>
                        <form  method="POST" action="{{ route('login') }}">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="tp-contact-input">
                                        <input name="username" type="text" placeholder="User ID">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="tp-contact-input">
                                        <input name="password" type="password" placeholder="Passcode">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="tp-contact-breadcrumb-btn">
                                        <button type="submit" class="tp-btn">LOGIN</button>
                                        <p class="ajax-response"></p>
                                    </div>
                                </div>
                                @if (Route::has('password.request'))
                                    <a class="btn-link btn-sm pull-right" href="{{ route('password.request') }}">
                                        {{ __('Forgot Password?') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- JS here -->
<script data-cfasync="false" src="https://template.wphix.com/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="{{ asset('front/assets/js/vendor/jquery.js') }}"></script>
<script src="{{ asset('front/assets/js/vendor/waypoints.js') }}"></script>
<script src="{{ asset('front/assets/js/bootstrap-bundle.js') }}"></script>
<script src="{{ asset('front/assets/js/meanmenu.js') }}"></script>
<script src="{{ asset('front/assets/js/swiper-bundle.js') }}"></script>
<script src="{{ asset('front/assets/js/slick.js') }}"></script>
<script src="{{ asset('front/assets/js/jquery-appear.js') }}"></script>
<script src="{{ asset('front/assets/js/jquery-knob.js') }}"></script>
<script src="{{ asset('front/assets/js/magnific-popup.js') }}"></script>
<script src="{{ asset('front/assets/js/nice-select.js') }}"></script>
<script src="{{ asset('front/assets/js/purecounter.js') }}"></script>
<script src="{{ asset('front/assets/js/countdown.js') }}"></script>
<script src="{{ asset('front/assets/js/wow.js') }}"></script>
<script src="{{ asset('front/assets/js/isotope-pkgd.js') }}"></script>
<script src="{{ asset('front/assets/js/imagesloaded-pkgd.js') }}"></script>
<script src="{{ asset('front/assets/js/ajax-form.js') }}"></script>
<script src="{{ asset('front/assets/js/main.js') }}"></script>

</body>
</html>

