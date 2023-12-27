@extends('dashboard.layouts.app')
@section('content')

    <main id="main-container">
        <!-- Page Content -->
        <div class="row g-0 flex-md-grow-1">
            <div class="col-md-8 col-lg-8 col-xl-10 bg-body-dark">
                <!-- Main Content -->
                <div class="content">
                    <!-- Message -->
                    <div class="block block-rounded">
                        <div class="block-content block-content-sm block-content-full bg-body-light">
                            <div class="d-flex py-3">

                                <div class="flex-grow-1">
                                    <div class="row">
                                        <div class="col-sm-7">
                                           <h4 class="text-center"> {{ $message->title }}</h4>
                                        </div>
                                        <div class="col-sm-5 d-sm-flex align-items-sm-center">
                                            <div class="fs-sm text-muted text-sm-end w-100 mt-2 mt-sm-0">
                                                <p class="mb-0">{{ date('M d, Y', strtotime($message->created_at)) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-content">
                           <p> {{ $message->message }}</p>
                        </div>

                    </div>
                    <!-- END Message -->


                </div>
                <!-- END Main Content -->
            </div>
        </div>
        <!-- END Page Content -->
    </main>

@endsection
