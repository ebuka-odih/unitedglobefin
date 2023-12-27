@extends('dashboard.layouts.app')
@section('content')

    <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Change Password</h1>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
            <!-- Layouts -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Change Password</h3>
                </div>
                <div class="block-content">

                    <!-- Label on top Layout -->
                    <div class="row">
                        <div style="visibility: hidden" class="col-lg-4">
                            <p class="text-muted">
                                An often used layout which is very easy to create with minimal markup
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <!-- Form Labels on top - Default Style -->
                            <form class="mb-5" action="{{ route('admin.storePassword') }}" method="POST" onsubmit="return false;">
                                @csrf
                                @if(session()->has('success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                                <div class="mb-4">
                                    <label class="form-label" for="example-ltf-email">Old Password</label>
                                    <input type="password" class="form-control" id="example-ltf-email" name="current_password" >
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="example-ltf-password">New Password</label>
                                    <input type="password" class="form-control" id="example-ltf-password" name="new_password">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="example-ltf-password">Confirm New Password</label>
                                    <input type="password" class="form-control" id="example-ltf-password" name="new_confirm_password" >
                                </div>
                                <div class="mb-4">
                                    <button type="submit" class="btn btn-primary">Update Password</button>
                                </div>
                            </form>
                            <!-- END Form Labels on top - Default Style -->


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
