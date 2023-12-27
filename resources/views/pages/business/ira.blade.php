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
                            <h3 class="breadcrumb__title">BUSINESS IRAS</h3>
                            <p class="text-white">
                                Create individual retirement accounts to achieve retirement goals.
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

                <div class="row mt-5">
                    <div class="col-md-12 col-lg-4">
                        <div class="card" >
                            <img src="{{ asset('img/12.png') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Simplified Employee Pension IRA

                                </h5>
                                <p class="card-text">
                                    Simplified Employee Pension (SEP) IRAs provide an easy solution to make contributions to your employees, or your own, retirement savings.
                                </p>
                            </div>
                            <ul class="list-group list-group-flush list-group-numbered">
                                <li class="list-group-item">Easily establish SEP IRAs for all employees</li>
                                <li class="list-group-item">No minimum contribution limits</li>
                                <li class="list-group-item">Tax benefits for business owners making contributions</li>
                            </ul>
                            <div class="card-body">
                                <a href="{{ route('personalInfo') }}" class="btn btn-info">Open Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="card" >
                            <img src="{{ asset('img/13.png') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Savings Incentive Match Plan IRA

                                </h5>
                                <p class="card-text">
                                    A Savings Incentive Match Plan (SIMPLE) IRA allows eligible employees to contribute part of their pretax compensation to the plan.
                                </p>
                            </div>
                            <ul class="list-group list-group-flush list-group-numbered">
                                <li class="list-group-item">Easily establish SIMPLE IRAs for all employees</li>
                                <li class="list-group-item">Enable employees to make significantly larger annual contributions than possible with a traditional IRA</li>
                                <li class="list-group-item">Significant tax benefits for business owners</li>
                            </ul>
                            <div class="card-body">
                                <a href="{{ route('personalInfo') }}" class="btn btn-info">Open Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="card" >
                            <img src="{{ asset('img/14.png') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">
                                    Payroll Deduction IRA
                                </h5>
                                <p class="card-text">
                                    Enable your employees to put a portion of their payroll toward their IRA.
                                </p>
                            </div>
                            <ul class="list-group list-group-flush list-group-numbered">
                                <li class="list-group-item">Easily establish SIMPLE IRAs for all employees</li>
                                <li class="list-group-item">Experience similar contribution limits to standard IRAs</li>
                                <li class="list-group-item">Speed up business operations through automation</li>
                            </ul>
                            <div class="card-body">
                                <a href="{{ route('personalInfo') }}" class="btn btn-info">Open Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xxl-8 col-xl-8 col-lg-8">
                        <div class="tp-postbox-wrapper">
                            <article class="tp-postbox-item-wrapper mb-80">

                                <h4>Features Account:</h4>
                                <p>It is an account to manage your salary and help you organize your money, let him have a monthly savings while enjoying many other benefits:</p>

                                <ul class="list-styles">
                                    <li><i class="fa fa-check"></i> <a href="#"> No management fee or handling.</a></li>
                                    <li><i class="fa fa-check"></i> <a href="#"> It allows you to separate your savings silver in the same account, without needing an additional product.</a></li>
                                    <li><i class="fa fa-check"></i> <a href="#"> Unlimited free consultations through our Amiga, Website, Mobile Banking and Mobile Application Line (downloading our app for smartphones).</a></li>
                                    <li><i class="fa fa-check"></i> <a href="#"> Free notifications.</a></li>
                                </ul>
                                <hr>
                                <h4>More Features</h4>
                                <ul class="list-styles mt-3 mb-3">
                                    <li><i class="fa fa-check"></i> <a href="#"> For security, you will receive a text message to the phone and / or email that tells about transactions equal to or greater than $ 50,000 for retirement amounts, deposits and $ 100,000 to 200,000 for purchases.</a></li>
                                    <li><i class="fa fa-check"></i> <a href="#"> Free all transfers between the pocket and the saving account.</a></li>
                                    <li><i class="fa fa-check"></i> <a href="#">Set the savings from $ 5,000 monthly or fortnightly on the "pocket saving" Salary Account My friend; in the time you need will be available.</a></li>
                                    <li><i class="fa fa-check"></i> <a href="#"> Chip debit card has to perform all their transactions safely.</a></li>
                                </ul>


                            </article>


                        </div>
                    </div>

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
