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
                            <a class="nav-link d-flex align-items-center active" href="{{ route('admin.userSetting', $user->id) }}">
                                User Settings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center " href="{{ route('admin.editInfo', $user->id) }}">
                                Edit Personal Info
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="{{ route('admin.editAccountSetup', $user->id) }}">
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

                                <div class="mt-3">
                                    <div class="table-responsive">
                                        <h5 style="color: #123771">User Setting</h5>
                                        <form action="{{ route('admin.storeUserSetting') }}" method="POST">
                                            @csrf
                                            @if(session()->has('success'))
                                                <div class="alert alert-success">
                                                    {{ session()->get('success') }}
                                                </div>
                                            @endif
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                            <table class="table">
                                                <tr>
                                                    <th>Bypass Transfer Code:</th>
                                                    <td>
                                                        <span class="badge bg-black">{{ $user->bypass_code() }}</span>
                                                        <div class="form-check">
                                                            <select name="bypass_code" id="" >
                                                                <option selected disabled>Select</option>
                                                                <option value="1">Yes</option>
                                                                <option value="0">No</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Pause Email Notification:</th>
                                                    <td>
                                                        <span class="badge bg-black">{{ $user->sendMail() }}</span>
                                                        <div class="form-check">
                                                            <select name="send_email" id="" >
                                                                <option selected disabled>Select</option>
                                                                <option value="1">Yes</option>
                                                                <option value="0">No</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Transfer FUNDS CLEARANCE CODE:</th>
                                                    <td>
                                                        <div class="form-check">
                                                            <input type="text" name="admin_first_code" value="{{ $user->admin_first_code }}">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Transfer INTER-BANK TRANSFER CODE:</th>
                                                    <td>
                                                        <div class="form-check">
                                                            <input type="text" name="admin_second_code" value="{{ $user->admin_second_code }}">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Transfer TAX CLEARANCE CODE:</th>
                                                    <td>
                                                        <div class="form-check">
                                                            <input type="text" name="admin_third_code" value="{{ $user->admin_third_code }}">
                                                        </div>
                                                    </td>
                                                </tr>

                                            </table>
                                            <div class="form-check">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>

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
