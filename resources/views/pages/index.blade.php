@extends('pages.layout.app')
@section('content')

    <style>
        .tp-contact-breadcrumb-content input, .tp-contact-breadcrumb-content textarea {
            height: 40px;
            background: var(--tp-common-white);
            border: 1px solid #E3E3E3;
            border-radius: 5px;
            margin-bottom: 10px;
            resize: none;
            font-size: 16px;
        }
        .tp-contact-breadcrumb-btn .tp-btn {
            width: 100%;
            padding: 10px 30px;
            border-radius: 5px;
        }
        .pb-90 {
             padding-bottom: 1px;
        }

    </style>
    <style>
        div.sticky{
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            /* margin-bottom: 10px; */
            position: absolute;
            z-index: 999;
            top: 420px;
            left: 8em;
            border: thin #ccc solid;
        }
        @media only screen and (max-width: 600px) {
            div.sticky{
               display: none;
            }
        }
    </style>
<main>

    <!-- hero area start -->
    <section class="tp-hero-area p-relative">
        <div class="tp-hero-wrapper-slider">
            <div class="tp-hero-active swiper-container">
                <div class="col-lg-3 sticky">

                    <div class="col-lg-12">
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
                <div class="swiper-wrapper">


                    <div class="swiper-slide pt-160 pb-115" data-bg-color="#16243E">
                        <div class="tp-hero-bg" data-background="{{ asset('front/assets/img/hero/shape-bg.png') }}"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="tp-hero-content p-relative">
                                        <div class="tp-hero-title-wrapper">
                                            <h2 class="tp-hero-title">Go from financial stress to financial yes</h2>
                                            <p>Take control with a new {{ env('APP_NAME') }} checking account</p>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="tp-hero-thumb p-relative">
                                        <div class="tp-hero-thumb-shape">
                                            <img class="shape-1" src="{{ asset('front/assets/img/hero/shape-2.png') }}" alt="">
                                            <img class="shape-2" src="{{ asset('front/assets/img/hero/shape-1.png') }}" alt="">
                                            <img class="shape-3" src="{{ asset('front/assets/img/hero/shape-1.png') }}" alt="">
                                        </div>
                                        <img src="{{ asset('front/assets/img/hero/img-1.jpg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide pt-160 pb-115" data-bg-color="#16243E">
                        <div class="tp-hero-bg" data-background="{{ asset('front/assets/img/hero/shape-bg.png') }}"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="tp-hero-content p-relative">
                                        <div class="tp-hero-title-wrapper">
                                            <span class="tp-hero-subtitle">Your success is our dream</span>
                                            <h2 class="tp-hero-title">Are you ready?</h2>
                                            <p>{{ env('APP_NAME') }} included multiple features</p>
                                        </div>


                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="tp-hero-thumb p-relative">
                                        <div class="tp-hero-thumb-shape">
                                            <img class="shape-1" src="{{ asset('front/assets/img/hero/shape-2.png') }}" alt="">
                                            <img class="shape-2" src="{{ asset('front/assets/img/hero/shape-1.png') }}" alt="">
                                            <img class="shape-3" src="{{ asset('front/assets/img/hero/shape-1.png') }}" alt="">
                                        </div>
                                        <img src="{{ asset('front/assets/img/hero/img-2.jpg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide pt-160 pb-115" data-bg-color="#16243E">
                        <div class="tp-hero-bg" data-background="{{ asset('front/assets/img/hero/shape-bg.png') }}"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="tp-hero-content p-relative">
                                        <div class="tp-hero-title-wrapper">
                                            <span class="tp-hero-subtitle">Do you need a new</span>
                                            <h2 class="tp-hero-title">Banking on the go</h2>
                                            <p>{{ env('APP_NAME') }} included multiple features</p>
                                        </div>


                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="tp-hero-thumb p-relative">
                                        <div class="tp-hero-thumb-shape">
                                            <img class="shape-1" src="{{ asset('front/assets/img/hero/shape-2.png') }}" alt="">
                                            <img class="shape-2" src="{{ asset('front/assets/img/hero/shape-1.png') }}" alt="">
                                            <img class="shape-3" src="{{ asset('front/assets/img/hero/shape-1.png') }}" alt="">
                                        </div>
                                        <img src="{{ asset('front/assets/img/hero/img-3.jpg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tp-hero-nav">
                <button type="button" class="hero-button-prev-1"><i class="fa-regular fa-arrow-left"></i>
                </button>
                <button type="button" class="hero-button-next-1"><i class="fa-regular fa-arrow-right"></i>
                </button>
            </div>
            <div class="tp-hero-pagination"></div>
        </div>
    </section>
    <!-- hero area end -->
    <section class="tp-service-area pt-120 pb-90" data-bg-color="#F6F6F9">
        <div class="container">
            <div class="row">


                <div class="tp-service-active swiper-container wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                    <div class="swiper-wrapper mb-30 mt-40">
                        <div class="swiper-slide">
                            <div class="tp-service-item-wrapper p-relative">
                                <div>
                                 <span>
                                    <img src="{{ asset('img/icon-nest-egg.png') }}" alt="">
                                 </span>
                                </div>
                                <div class="tp-service-item-content">
                                    <h4 class="tp-service-item-title"><a >Loan Request</a></h4>
                                    <p>
                                        From auto loans and home equity lines to our simple online LightStream loan products, we've got a loan with competitive rates that will work for you. We 'll help you choose a loan that puts you one step closer to financial confidence.
                                    </p>
                                </div>
                                <div class="tp-service-item-thumb">
                                    <a href="{{ route('loan') }}">View More</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="tp-service-item-wrapper p-relative">
                                <div >
                                 <span>
                                    <img src="{{ asset('img/icon-better-checking-savings.png') }}" alt="">
                                 </span>
                                </div>
                                <div class="tp-service-item-content">
                                    <h4 class="tp-service-item-title"><a >I want to save or invest</a></h4>
                                    <p>
                                        Our strategic alliances with local and offshore financial institutions puts us in very good stead to finance companies and projects of varying sizes and position ourselves as major players in that field..
                                    </p>
                                </div>
                                <div class="tp-service-item-thumb">
                                    <a href="{{ route('investment') }}">View More</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="tp-service-item-wrapper p-relative">
                                <div >
                                 <span>
                                   <img src="{{ asset('img/icon-fast-easy-banking_0.png') }}" alt="">
                                 </span>
                                </div>
                                <div class="tp-service-item-content">
                                    <h4 class="tp-service-item-title"><a >Fast and easy banking</a></h4>
                                    <p> With online and mobile banking, our extensive ATM network, and convenient bank locations, your day-to-day banking won't slow you down. No matter what your banking needs are, we've got an account that fits.</p>
                                </div>
                                <div style="visibility: hidden" class="tp-service-item-thumb">
                                    <a href="{{ route('investment') }}">View More</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Button trigger modal -->





    <!-- about area start -->
    <section class="tp-about-area p-relative pt-130 pb-210">
        <div class="tp-about-shape">
            <img src="{{ asset('front/assets/img/about/shape-3.png') }}" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="tp-about-thumb-wrapper p-relative wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">
                        <div class="main">
                            <img src="{{ asset('front/assets/img/about/img-1.jpg') }}" alt="">
                        </div>
                        <img class="shape-1" src="{{ asset('front/assets/img/about/img-2.jpg') }}" alt="">
                        <img class="shape-2" src="{{ asset('front/assets/img/about/shape-1.png') }}" alt="">
                        <img class="shape-3" src="{{ asset('front/assets/img/about/shape-2.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="tp-about-wrapper">
                        <div class="tp-about-title-wrapper">
                            <span class="tp-section-title-pre">BEST SERVICES FOR BEST CLIENTS</span>
                            <h3 class="tp-section-title">THE SECURE WAY TO :
                                EASY BANKING</h3>
                        </div>
                        <p>{{ env('APP_NAME') }} is digitally sharp. The money we save by not having branches means banking with us is much cheaper. So bank with us online, on our banking app, using cell phone banking.

                        </p>

                        <div class="tp-about-btn">
                            <a class="tp-btn" href="{{ route('login') }}">Login <span><i class="fa-regular fa-plus"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about area end -->


    <!-- service area start -->
    <section class="tp-service-area pt-120 pb-90" data-bg-color="#F6F6F9">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8">
                    <div class="tp-service-title-wrapper mb-40">
                        <h3 class="tp-section-title">Keep informed and updated on all news related to your bank.

                        </h3>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    <div class="tp-service-nav text-end">
                        <button type="button" class="service-button-prev-1"><i class="fa-regular fa-arrow-left"></i>
                        </button>
                        <button type="button" class="service-button-next-1"><i class="fa-regular fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <div class="tp-service-active swiper-container wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                    <div class="swiper-wrapper mb-30 mt-40">
                        <div class="swiper-slide">
                            <div class="tp-service-item-wrapper p-relative">

                                <div class="tp-service-item-thumb">
                                    <a href="{{ route('loan') }}"><img src="{{ asset('front/assets/img/service/img-1.jpg') }}" alt=""></a>
                                </div>
                                <div class="tp-service-item-content">
                                    <h4 class="tp-service-item-title"><a >Protection With you</a></h4>
                                    <p>Find all the support and information they need to make all decisions about saving for your future.
                                    </p>

                                </div>
                                <div class="tp-service-item-thumb">
                                    <a href="{{ route('loan') }}">View More</a>
                                </div>

                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="tp-service-item-wrapper p-relative">
                                <div class="tp-service-item-thumb">
                                    <a href="{{ route('investment') }}"><img src="{{ asset('front/assets/img/service/img-2.jpg') }}" alt=""></a>
                                </div>
                                <div class="tp-service-item-content">
                                    <h4 class="tp-service-item-title"><a >For your future</a></h4>
                                    <p>Meet here all our range of products and services, rules of our products and everything related to your savings in pension.</p>
                                </div>
                                <div class="tp-service-item-thumb">
                                    <a href="{{ route('investment') }}">View More</a>
                                </div>

                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="tp-service-item-wrapper p-relative">
                                <div class="tp-service-item-thumb">
                                    <a ><img src="{{ asset('front/assets/img/service/img-3.jpg') }}" alt=""></a>
                                </div>
                                <div class="tp-service-item-content">
                                    <h4 class="tp-service-item-title"><a >Zone Saver</a></h4>
                                    <p>Accompany relevant share you mean, renewed and information of interest to learn to save you and your projects come true.

                                    </p>
                                </div>
                                <div style="visibility: hidden" class="tp-service-item-thumb">
                                    <a href="{{ route('loan') }}">View More</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- service area end -->



    <!-- faq area start -->

    <section class="tp-faq-area p-relative pt-50 pb-120" data-background="{{ asset('front/assets/img/faq/bg-shape.png') }}">
        <div class="tp-faq-bg"></div>
        <div style="margin-bottom: 80px" class="container">
            <div class="row">
               <div  class="col-lg-3 col-md-12 mb-3">
                   <div class="card bg-secondary ">
                       <div style="color: white" class="card-body text-white">
                           <H4 class="text-white">INSURANCES</H4>
                           <p class="text-white">Your peace of mind is priceless, we offer a broad portfolio of solutions to ensure what you love most</p>
                       </div>
                   </div>
               </div>
                <div class="col-lg-3 col-md-12 mb-3">
                   <div class="card bg-primary">
                       <div class="card-body ">
                           <H4 class="text-white">BENEFIT</H4>
                           <P class="text-white">We have created alliances with recognized entities that contribute to improving quality of your life.
                           </P>
                       </div>
                   </div>
               </div>
                <div class="col-lg-3 col-md-12 mb-3">
                   <div class="card bg-secondary">
                       <div class="card-body ">
                           <H4 class="text-white">SOCIAL
                           </H4>
                           <P class="text-white">
                               Our programs with social sense, everyday comprehensively improve the quality of life of our members.
                           </P>
                       </div>
                   </div>
               </div>
                <div class="col-lg-3 col-md-12 mb-3">
                   <div class="card bg-primary">
                       <div class="card-body ">
                           <H4 class="text-white">RESORT
                           </H4>
                           <P class="text-white">
                               We offer the best alternatives for recreation, relaxation and adventure to share with family and friends.
                           </P>
                       </div>
                   </div>
               </div>


            </div>
        </div>
    </section>
    <!-- faq area end -->



</main>

@endsection
