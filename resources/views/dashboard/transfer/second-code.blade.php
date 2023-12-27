
@extends('dashboard.layouts.app')
@section('content')
    <style>
        /* Style for the loading container */
        .loading-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999; /* Ensure it's above other elements */
        }

        /* Style for the loading spinner */
        .loading-spinner {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>

    <div class="loading-container">
        <div class="loading-spinner">
            <strong>Loading...</strong>
            <div class="spinner-border" role="status" aria-hidden="true"></div>
        </div>
    </div>




    <main id="main-container">

        <!-- Hero -->
        <div style="visibility: hidden" class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Confirm Transfer</h1>

                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">

            <!-- Layouts -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title text-center">INTER-BANK TRANSFER CODE</h3>
                </div>
                <div class="block-content">


                    <div class="row">

                        <div class="col-lg-12 space-y-2">
                            <!-- Form Inline - Default Style -->
                            <form class="row row-cols-lg-auto g-3 align-items-center" action="{{ route('user.storeSecondCode') }}" method="POST" >
                                @csrf

                                <input type="hidden" name="transfer_id" value="{{ $transfer->id }}" >

                                <div class="col-lg-12">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @if(session()->has('error'))
                                        <div class="alert alert-danger">
                                            {{ session()->get('error') }}
                                        </div>
                                    @endif
                                    <input type="hidden" name="transfer_id" value="{{ $transfer->id }}" >
                                    <div class="col-lg-6 offset-lg-2 mb-3">
                                        <label for="example-ltf-text">IBT Code</label>
                                        <input type="text" class="form-control form-control-lg" id="example-if-password" name="second_code" required>
                                    </div>
                                    <div class="col-lg-6 offset-lg-2 mb-3">
                                        <p></p>
                                        <p>Please contact customer care if you don't have your IBT Code
                                            <a href="mailto:{{ env('MAIL_FROM_ADDRESS') }}">{{ env('MAIL_FROM_ADDRESS') }}</a></p>
                                    </div>
                                    <div class="col-lg-4 offset-lg-2">
                                        <button class="btn btn-dark" type="submit">Send</button>
                                    </div>
                                </div>



                            </form>
                            <!-- END Form Inline - Default Style -->

                        </div>
                    </div>
                    <br>

                </div>
            </div>
            <!-- END Layouts -->
        </div>
        <!-- END Page Content -->
    </main>

    <script>
        // Simulate a delay (e.g., 3 seconds) for demonstration purposes
        setTimeout(function() {
            // Remove the loading container when the page is loaded
            document.querySelector('.loading-container').style.display = 'none';
        }, 3000); // Adjust the delay time as needed
    </script>
@endsection
