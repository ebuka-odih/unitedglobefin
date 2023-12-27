@extends('dashboard.layouts.app')
@section('content')

    <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Support</h1>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
            <!-- Layouts -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Send Message to Our Support</h3>
                </div>
                <div class="block-content">

                    <!-- Label on top Layout -->
                    <div class="row">
                        <div style="visibility: hidden" class="col-lg-4">

                        </div>
                        <div class="col-lg-8 col-xl-5 mb-5">

                            <strong>
                                Support Email <a href="mailto:support@ctbcommerce.com">support@ctbcommerce.com</a>
                            </strong>
                        </div>
                    </div>
                    <!-- END Label on top Layout -->

                </div>
            </div>
            <!-- END Layouts -->
        </div>
        <!-- END Page Content -->
    </main>

@endsection
