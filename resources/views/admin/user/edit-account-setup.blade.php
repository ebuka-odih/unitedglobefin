@extends('admin.layout.app')
@section('content')

    <main id="main-container">
        <!-- Hero -->
        <div class="bg-image" style="background-image: url('/assets/media/photos/photo17@2x.jpg');">
            <div class="bg-black-25">
                <div class="content content-full">
                    <div class="py-5 text-center">
                        <a class="img-link" > <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{ asset('files/'.$user->avatar) }}" alt=""> </a>
                        <h1 class="fw-bold my-2 text-white">{{ $user->first_name." ".$user->last_name }}</h1>
                        <h2 class="h4 fw-bold text-white-75">
                            {{ $user->email }}
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <div class="content">

            <div class="block block-rounded h-100 mb-0">

                <div class="block-content">
                    <ul class="nav nav-pills push">
                        <li class="nav-item me-1">
                            <a class="nav-link  d-flex align-items-center" href="{{ route('admin.viewUser', $user->id) }}">
                                User Details
                            </a>
                        </li>
                        <li class="nav-item me-1">
                            <a class="nav-link d-flex align-items-center" href="{{ route('admin.userSetting', $user->id) }}">
                                User Settings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center " href="{{ route('admin.editInfo', $user->id) }}">
                                Edit Personal Info
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center active" href="{{ route('admin.editAccountSetup', $user->id) }}">
                                Edit Account Info
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center " href="{{ route('admin.userChangePassword', $user->id) }}">
                                Change Password
                            </a>
                        </li>
                    </ul>

                </div>
            </div>

            <div class="block block-rounded">

                <div class="block-content tab-content overflow-hidden">
                    <div class="tab-pane fade fade-left active show" id="btabs-animated-slideleft-home" role="tabpanel" aria-labelledby="btabs-animated-slideleft-home-tab">
                        <div class="card">
                            <!-- Page Content -->
                            <br>
                            <div class="content content-full content-boxed">
                                <form class="row g-3" method="POST" action="{{ route('admin.updateAccountSetup', $user->id) }}" enctype="multipart/form-data">
                                    @method('PATCH')
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
                                    @if(session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ session()->get('success') }}
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
                                            <input type="text" class="form-control" id="inputPassword4" name="id_number" value="{{ old('id_number', optional($user)->id_number) }}" >
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="inputPassword4" class="form-label">ID Expiry Date<span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="inputPassword4" name="id_expiry" value="{{ old('id_expiry', optional($user)->id_expiry) }}" >
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="inputPassword4" class="form-label">ID Image Front<span class="text-danger">*</span></label>
                                            <input type="file" class="form-control" id="inputPassword4" name="id_front_img"  >
                                            <img class="mt-2" src="{{ asset('files/'.$user->id_front_img) }}" height="100" width="100" alt="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="inputPassword4" class="form-label">ID Image Back<span class="text-danger">*</span></label>
                                            <input type="file" class="form-control" id="inputPassword4" name="id_back_img"  >
                                            <img class="mt-2" src="{{ asset('files/'.$user->id_back_img) }}" height="100" width="100" alt="">

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
                                            <input type="file" name="avatar" class="form-control" id="inputAddress"  >
                                            <img class="mt-2" src="{{ asset('files/'.$user->avatar) }}" height="100" width="100" alt="">
                                        </div>

                                    </div>


                                    <div class="col-12 mt-2 mb-4">
                                        <button type="submit" class="btn btn-primary">Update Account Info</button>
                                    </div>
                                </form>


                            </div>
                            <!-- END Page Content -->
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </main>

@endsection
