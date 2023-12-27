@extends('admin.layout.app')
@section('content')

    <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3"> Account Setup</h1>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
            <!-- Full Table -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Users</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option">
                            <i class="si si-settings"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">


                    <form class="row g-3" method="POST" action="{{ route('storeAccountSetup') }}" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <input type="hidden" name="user_id" value="{{ $user->id }}">

                        <h4 style="color: #123771">Identification</h4>
                        <span class="text-danger">* required</span>
                        <div class="row mt-3 mb-4">
                            <div class="col-md-4 mb-3">
                                <label for="cus_identification" class="form-label">Identification Type<span class="text-danger">*</span></label>
                                <select name="identification_type" class="form-control" id="cus_identification">
                                    <option selected disabled>Identification...</option>
                                    <option value="passport">Passport</option>
                                    <option value="driver_license">Driver's License</option>
                                    <option value="national_id">National ID</option>
                                    <option value="voter_id">Voter ID</option>
                                    <option value="social_security">Social Security Number</option>
                                    <option value="student_id">Student ID</option>
                                    <option value="employee_id">Employee ID</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="inputPassword4" class="form-label">ID Number<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="inputPassword4" name="id_number" value="{{ old('id_number') }}" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="inputPassword4" class="form-label">ID Expiry Date<span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="inputPassword4" name="id_expiry" value="{{ old('id_expiry') }}" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="inputPassword4" class="form-label">ID Image Front<span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="inputPassword4" name="id_front_img"  required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="inputPassword4" class="form-label">ID Image Back<span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="inputPassword4" name="id_back_img"  required>
                            </div>

                        </div>
                        <hr>
                        <h4 style="color: #123771">Account Info</h4>
                        <div class="row mb-4 mt-3">
                            <div class="col-md-12 col-lg-4 mb-3">
                                <label for="inputAddress" class="form-label">Account Type<span class="text-danger">*</span></label>
                                <select id="inputAddress" name="account_type" class="form-control">
                                    <option selected disabled>Choose Account Type...</option>
                                    <option value="Savings Account">Savings Account</option>
                                    <option value="Checking Account">Checking Account</option>
                                    <option value="Business Account">Business Account</option>
                                    <option value="Private Client Account ">Private Client Account</option>
                                    <option value="Joint Account">Joint Account</option>
                                    <option value="Fixed Deposit Account">Fixed Deposit Account</option>
                                    <option value="Current Account">Current Account</option>
                                    <option value="Individual Retirement Account (IRA)">Individual Retirement Account (IRA) </option>
                                    <option value="Trust Fund Account">Trust Fund Account</option>
                                </select>
                            </div>
                            <div class="col-md-12 col-lg-4 mb-3">
                                <label for="inputAddress" class="form-label">Preferred Currency<span class="text-danger">*</span></label>
                                <select id="inputAddress" name="currency" class="form-control">
                                    <option selected disabled>Choose Currency...</option>
                                    <option value="$">USD</option>
                                    <option value="€">EURO</option>
                                    <option value="£">GBP</option>
                                </select>
                            </div>
                            <div class="col-md-12 col-lg-4 mb-3">
                                <label for="inputAddress" class="form-label">Profit Picture<span class="text-danger">*</span></label>
                                <input type="file" name="avatar" class="form-control" id="inputAddress"  required>
                            </div>

                        </div>


                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-primary">Continue</button>
                        </div>
                    </form>


                </div>
            </div>
            <!-- END Full Table -->


        </div>
        <!-- END Page Content -->
    </main>

@endsection
