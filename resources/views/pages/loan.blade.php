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
                            <h3 class="breadcrumb__title">
                                LOANS AND LINES OF CREDIT THAT FIT YOUR NEEDS.
                            </h3>
                            <p class="text-white">
                                THAT'S {{ env('APP_NAME') }} DIFFERENCE.

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

                <div class="row">
                    <div class="col-xxl-8 col-xl-8 col-lg-8">
                        <div class="">

                            <p>
                                You have a specific purpose in mind when looking to borrow money. That's why a one-size-fits-all loan just doesn't make sense. You need options
                                that align with what you want to finance, the amount you need to borrow and when you need your funds. At <span class="Bankfullname">{{ env('APP_NAME') }}</span>, options are what we do best.
                                From auto loans and home equity lines to our simple online LightStream loan products, we've got a loan with competitive rates that will work for you.
                                Plus, we offer tools, resources
                                and guidance from our expert team of loan specialists. We're committed to helping you choose a loan that puts you one step closer to financial confidence.
                            </p> <p>
                            </p><h4>
                                Our flexible loan options allows youu to::
                            </h4>
                            <p></p> <p>
                            </p><ul class="list-styles">
                                <li><i class="fa fa-check"></i> <a href="#">Use the equity in your home for large purchases and more</a></li>
                                <li><i class="fa fa-check"></i> <a href="#">Choose an auto loan backed by a rate beat program</a></li>
                                <li><i class="fa fa-check"></i> <a href="#">Get a home improvement loan, no equity required</a></li>
                                <li><i class="fa fa-check"></i> <a href="#">Cover the cost of private school or college expenses</a></li>
                                <li><i class="fa fa-check"></i> <a href="#">Refinance and consolidate debt and credit</a></li>
                            </ul>
                            <p></p>

                            <h4><a class="text-primary" href="{{ route('contact') }}"><b>Contact</b></a> us today to learn more and apply for loan</h4>




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
