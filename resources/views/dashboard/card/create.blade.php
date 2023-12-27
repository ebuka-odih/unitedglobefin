@extends('dashboard.layouts.app')
@section('content')


    <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Request Card</h1>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">


            <!-- Layouts -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Request a debit card</h3>
                </div>
                <div class="block-content">

                    <div class="row">

                        <div class="col-lg-10 offset-lg-1">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if(session()->has('declined'))
                                <div class="alert alert-danger">
                                    {{ session()->get('declined') }}
                                </div>
                            @endif
                            @if(session()->has('illicit'))
                                <div class="alert alert-danger">
                                    {{ session()->get('illicit') }}
                                </div>
                            @endif
                            @if(session()->has('not_found'))
                                <div class="alert alert-danger">
                                    {{ session()->get('not_found') }}
                                </div>
                            @endif
                        </div>

                        <div class="col-lg-12 space-y-2">
                            <!-- Form Inline - Default Style -->
                            <form class="row row-cols-lg-auto g-3 align-items-center" action="{{ route('user.card.store') }}" method="POST" >
                                @csrf

                                <div class="col-lg-6">
                                    <label for="example-ltf-text">Card Type <span class="text-danger">*</span></label>
                                    <select name="card_type" id="" class="form-control">
                                        <option selected disabled>Choose Loan Type</option>
                                        <option value="Debit Visa Card">Debit Visa Card</option>
                                        <option value="Debit Master Card">Debit Master Card</option>
                                        <option value="Credit Card">Credit Card</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label for="example-ltf-text">Name on Card<span class="text-danger">*</span></label>
                                    <input required type="text" class="form-control form-control-lg" id="example-if-password" name="nickname">
                                </div>

                                <div class="col-lg-6">
                                    <label for="example-ltf-text">Description</label>
                                    <input type="text" class="form-control form-control-lg" id="example-if-password" name="note" placeholder="Description">
                                </div>

                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-secondary">Send</button>
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

@endsection
