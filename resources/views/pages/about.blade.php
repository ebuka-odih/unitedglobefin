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
                                ABOUT US
                            </h3>
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
                        <div >
                            <div class="title-subtitle text-justify">
                                <h5>Company Value</h5>
                                <h3>Who We Are</h3>
                                <p class="lead">

                                    Our Swiss heritage, global presence	and financial stability makes us the leading corporate and financial service provider globally for international businesses.
                                    <br><br>
                                </p><p class="lead">{{ env('APP_NAME') }} was founded in Cayman Islands in 2006 as a Corporate, Wealth and Trust service provider, offering incorporation financial services across 25+ different jurisdictions. Over the years, we have expanded and opened office in the Luxembourg, Belize and Switzerland. Our mission is to help entrepreneurs, business owners, investors across the world prosper by facilitating the creation of robust corporate structures. This has not changed since we started in 2006. We continue to utilize technology to provide an efficient and outstanding service to all our clients.
                                    <br><br>
                                </p><p class="lead">While the core of our service remains company formation, we offer a multitude of ancillary services such as affordable home loan, personal &amp; Business IRA, Savings, Money Market &amp; CDs, Estate Planning &amp; Settlement, Investment Management, Financial Planning, and the provision of professional remote banking. Backed by our regulated licenses and extensive experience in financial services, {{ env('APP_NAME') }} experts have successfully assisted thousands of foreign clients to incorporate companies to expand their existing businesses or start new ventures.
                                    <br><br>
                                </p><p class="lead">{{ env('APP_NAME') }} has received numerous awards by different authorities (both governmental and private), which strengthens our position as the world’s leading online company formation provider.
                                </p>

                            </div>


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
