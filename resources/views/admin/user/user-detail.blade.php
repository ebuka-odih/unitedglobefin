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
                            <a class="nav-link  d-flex align-items-center active" href="{{ route('admin.viewUser', $user->id) }}">
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
                            <a class="nav-link d-flex align-items-center " href="{{ route('admin.editAccountSetup', $user->id) }}">
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
                            <form action="{{ route('admin.userStatus', $user->id) }}" method="POST">
                                @csrf
                                @if(session()->has('success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                                <h4>Current User Status {!! $user->status() !!}</h4>
                                <div class="col-md-6">
                                    <label for="">User Status</label>
                                    <select name="status" class="form-control" id="">
                                        <option disabled selected>Select Status</option>
                                        <option value="0">InActive</option>
                                        <option value="1">OnHold</option>
                                        <option value="2">Dormant</option>
                                        <option value="3">Frozen</option>
                                        <option value="5">Active</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                            <br>
                            <hr>

                            <div class="mt-3">
                                <div class="table-responsive">
                                    <h5 style="color: #123771">Personal Info</h5>
                                    <table class="table table-striped">
                                        <tr>
                                            <th>Title:</th>
                                            <td>{{ $user->title }}</td>
                                        </tr>
                                        <tr>
                                            <th>Middle Name:</th>
                                            <td>{{ $user->first_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Last Name:</th>
                                            <td>{{ $user->middle_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Last Name:</th>
                                            <td>{{ $user->last_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Gender:</th>
                                            <td>{{ $user->gender }}</td>
                                        </tr>
                                        <tr>
                                            <th>Date of Birth:</th>
                                            <td>{{ $user->date_of_birth }}</td>
                                        </tr>
                                        <tr>
                                            <th>Marital Status:</th>
                                            <td>{{ $user->marital_status }}</td>
                                        </tr>
                                        <tr>
                                            <th>Marital Status:</th>
                                            <td>{{ $user->marital_status }}</td>
                                        </tr>
                                        <tr>
                                            <th>Profile Picture:</th>
                                            <td><img height="100" width="100" src="{{ asset('files/'.$user->avatar) }}" alt=""></td>
                                        </tr>

                                    </table>
                                    <h5 style="color: #123771">Contact Info</h5>
                                    <table class="table table-striped">
                                        <tr>
                                            <th>House Address:</th>
                                            <td>{{ $user->address }}</td>
                                        </tr>
                                        <tr>
                                            <th>Zipcode:</th>
                                            <td>{{ $user->zipcode }}</td>
                                        </tr>
                                        <tr>
                                            <th>City:</th>
                                            <td>{{ $user->city }}</td>
                                        </tr>
                                        <tr>
                                            <th>State:</th>
                                            <td>{{ $user->state }}</td>
                                        </tr>
                                        <tr>
                                            <th>Phone Number:</th>
                                            <td>{{ $user->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email:</th>
                                            <td>{{ $user->email }}</td>
                                        </tr>

                                    </table>
                                    <h5 style="color: #123771">Residency</h5>
                                    <table class="table table-striped">

                                        <tr>
                                            <th>Are you a US Citizen:</th>
                                            <td>{{ $user->citizenship }}</td>
                                        </tr>
                                        @if($user->citizenship == "No")
                                            <tr>
                                                <th>Country:</th>
                                                <td>{{ $user->country }}</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <th>Social Security Number:</th>
                                                <td>{{ $user->ss_code }}</td>
                                            </tr>
                                        @endif

                                    </table>

                                    <h5 style="color: #123771">Employment & finances</h5>
                                    <table class="table table-striped">
                                        <tr>
                                            <th>Employment Status:</th>
                                            <td>{{ $user->employment }}</td>
                                        </tr>
                                        <tr>
                                            <th>Source Of Income:</th>
                                            <td>{{ $user->source_of_income }}</td>
                                        </tr>
                                    </table>
                                    <h5 style="color: #123771">Auth Info</h5>
                                    <table class="table table-striped">
                                        <tr>
                                            <th>Username:</th>
                                            <td>{{ $user->username }}</td>
                                        </tr>
                                        <tr>
                                            <th>Password:</th>
                                            <td>{{ $user->pass }}</td>
                                        </tr>
                                    </table>
                                    <h5 style="color: #123771">Identification</h5>
                                    <table class="table table-striped">
                                        <tr>
                                            <th>Identification Type:</th>
                                            <td>{{ $user->identification_type }}</td>
                                        </tr>
                                        <tr>
                                            <th>ID Number:</th>
                                            <td>{{ $user->id_number }}</td>
                                        </tr>
                                        <tr>
                                            <th>ID Expiry Date:</th>
                                            <td>{{ $user->id_expiry }}</td>
                                        </tr>
                                        <tr>
                                            <th>ID Image Front:</th>
                                            <td><img width="200" height="150" src="{{ asset('files/'.$user->id_front_img) }}" alt=""></td>
                                        </tr>
                                        <tr>
                                            <th>ID Image Back:</th>
                                            <td><img width="200" height="150" src="{{ asset('files/'.$user->id_back_img) }}" alt=""></td>
                                        </tr>
                                    </table>

                                    <h5 style="color: #123771">Account Setup</h5>
                                    <table class="table table-striped">
                                        <tr>
                                            <th>Account Type:</th>
                                            <td>{{ $user->account->account_type }}</td>
                                        </tr>
                                        <tr>
                                            <th>Currency Type:</th>
                                            <td>{{ $user->account->currency }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <!-- END Page Content -->
                    </div>
                </div>

            </div>
        </div>
        </div>


    </main>



@endsection
