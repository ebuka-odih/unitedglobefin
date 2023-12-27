@extends('pages.layout.app')
@section('content')

    <main>

        <!-- Blog Details breadcrumb area start -->
        <section class="breadcrumb__area pt-165 pb-150 p-relative z-index-1 fix" data-bg-color="#16243E" style="background-color: rgb(22, 36, 62);">
            <div class="breadcrumb__bg" data-background="assets/img/breadcrumb/bg.png" style="background-image: url(&quot;assets/img/breadcrumb/bg.png&quot;);"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="breadcrumb__content">
                            <h3 class="breadcrumb__title">INDIVIDUAL RETIREMENT ACCOUNTS (IRAS)</h3>
                            <p class="text-white">
                                SAVE FOR RETIREMENT, WITH PLENTY OF OPTIONS.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- Blog Details breadcrumb area end -->


        <!-- postbox area start -->
        <section class="tp-postbox-area pt-120 pb-120">

            <div class="container">
                <div class="mb-5 text-center">
                    <h4>
                        The time is now to start saving for retirement.
                    </h4>
                    <p>Saving for retirement with an IRA offers a number of benefits. We're here to help you choose the right option based on your current needs and future retirement savings goals. What’s more, you can choose from Traditional or Roth IRA when opening your account.

                    </p>
                </div>
                <div class="row mt-5">
                    <div class="col-md-12 col-lg-6">
                        <div class="card" >
                            <img src="{{ asset('img/2.jpg') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">IRA Savings
                                </h5>
                                <p class="card-text">
                                    Saving money with an IRA savings account allows you to add more to your account at any time.
                                </p>
                            </div>
                            <ul class="list-group list-group-flush list-group-numbered">
                                <li class="list-group-item">No minimum balance required to open</li>
                                <li class="list-group-item">Additional deposits as little as $5 can be made at any time</li>
                                <li class="list-group-item">Traditional and Roth IRAs available</li>
                                <li class="list-group-item">Flexible savings solution with minimal investment risk & FDIC Insurance</li>
                                <li class="list-group-item">Competitive interest rates</li>
                            </ul>
                            <div class="card-body">
                                <a href="{{ route('personalInfo') }}" class="btn btn-info">Open Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="card" >
                            <img src="{{ asset('img/3.jpg') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">CD IRA
                                </h5>
                                <p class="card-text">
                                    Save with the guaranteed interest of a CD with the tax advantages of a retirement account.
                                </p>
                            </div>
                            <ul class="list-group list-group-flush list-group-numbered">
                                <li class="list-group-item">Open with as little as $500</li>
                                <li class="list-group-item">Multiple term options to meet your timeframe</li>
                                <li class="list-group-item">Traditional or Roth IRA options available</li>
                                <li class="list-group-item">Tax-advantaged and FDIC-insured</li>
                                <li class="list-group-item">Competitive interest rates and fixed terms</li>
                            </ul>
                            <div class="card-body">
                                <a href="{{ route('personalInfo') }}" class="btn btn-info">Open Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">


                    <div class="col-xxl-4 col-xl-4 col-lg-4">
                        <div class="tp-sidebar-wrapper">

                            <div class="tp-sidebar-widget mb-40">
                                <div class="tp-sidebar-widget-content">
                                    <div class="tp-sidebar-post tp-rc__post">
                                        <div class="tp-rc__post d-flex align-items-center">
                                            <div class="tp-rc__post-content">
                                                <h3 class="tp-rc__post-title">
                                                    <a href="mailto:info@ctbcommerce"><i class="fa-regular fa-envelope"></i> info@ctbcommerce</a>
                                                </h3>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- postbox area end -->


    </main>

@endsection
