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
                            <a class="nav-link d-flex align-items-center" href="{{ route('admin.editAccountSetup', $user->id) }}">
                                Edit Account Info
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center active" href="{{ route('admin.userChangePassword', $user->id) }}">
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

                                <!-- Form Labels on top - Default Style -->
                                <form class="mb-5" action="{{ route('admin.userStorePassword') }}" method="POST" >
                                    @csrf
                                    @if(session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ session()->get('success') }}
                                        </div>
                                    @endif
                                    <input type="hidden" value="{{ $user->id }}" name="user_id">
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
                            <!-- END Page Content -->
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </main>

@endsection
