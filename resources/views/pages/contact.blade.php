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
                            <h3>Contact Us</h3>

                            <p>Our customer support and account management teams provide the best customer service
                                experience. We 're always ready to help find solution to your issues. </p>
                        </div>
                        <div class="col-md-8">
                            <h3>Contact Form</h3>

                            <p>Please fill the form below so we can provide quick and efficient service.
                            </p>
                            <br>
                            <form id="form-contact" method="post" class="form-theme" action="account/sendmail">
                                <input type="text" placeholder="Name" name="Name" required="">
                                <input type="email" placeholder="Email" name="Email" required="">
                                <input type="number" placeholder="Phone" name="Phone" required="">
                                <textarea placeholder="Your Message" name="message" required=""></textarea>
                                <input type="submit" name="Submit" value="Send Message" class="btn btn-primary">
                                <span class="loader"></span>
                            </form>
                            <div id="result"></div>
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
                                                    <a href="mailto:info@ctbcommerce.com"><i class="fa-regular fa-envelope"></i> info@ctbcommerce.com</a>
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
