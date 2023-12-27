@extends('admin.layout.app')

@section('content')
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">{{ $user_details->name }} Messages</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-xl-3 col-md-4">
                                    <div class="text-center card-box shadow-none border border-secoundary">
                                        <div class="member-card">
                                            <a href="{{ route('admin.user_details', $user_details->id) }}">
                                                <div class="avatar-xl member-thumb mb-3 mx-auto d-block">
                                                    <img src="{{ $user_details->profile_pic }}" class="rounded-circle img-thumbnail" alt="profile-image">
                                                    {!! $user_details->admin_status() !!}
                                                </div>
                                            </a>

                                            <div class="">
                                                <h5 class="font-18 mb-1">{{ $user_details->name }}</h5>
                                                <p class="text-muted mb-2">{{ $user_details->email }}</p>
                                            </div>
                                            <a href="{{ route('admin.user_message', $user_details->id) }}" class="btn btn-success btn-sm width-sm waves-effect mt-2 waves-light">Messages</a>
                                            <a href="{{ route('admin.personal_details', $user_details->id) }}" class="btn btn-primary btn-sm width-sm waves-effect mt-2 waves-light">User Details</a>
                                            @if( $user_details->status == 0)
                                                <a href="{{ route('admin.verify_user', $user_details->id) }}" title="Verify this user" class="btn btn-secondary btn-sm width-sm waves-effect mt-2 waves-light">Verify User</a>
                                            @else
                                            @endif

                                            <hr/>
                                            <div class="text-left">
                                                <table style="width:100%">
                                                    <tr>
                                                        <th>First Name:</th>
                                                        <td>{{$user_details->first_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Last Name:</th>
                                                        <td>{{ $user_details->last_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Email:</th>
                                                        <td>{{ $user_details->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Created At :</th>
                                                        <td>{{ date('d/m/Y', strtotime($user_details->created_at)) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"><hr></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Account No :</th>
                                                        <td>{{ optional($user_details->account)->account_number }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Account Type:</th>
                                                        <td>{{ $user_details->account_type }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Account Limit:</th>
                                                        <td>${{ optional($user_details->account)->account_limit_per_day }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Active:</th>
                                                        <td>{!! optional($user_details->account)->active() !!}</td>
                                                    </tr>
                                                </table>

                                            </div>

                                        </div>

                                    </div>
                                    <!-- end card-box -->

                                </div>
                                <!-- end col -->

                                <div class="col-xl-9 col-md-8">

                                    <h4 class="text text-center">Create Message</h4>
                                    <form class="form-horizontal" action="{{ route('admin.mesg_store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $user_details->id }}" name="user_id">
                                        <div class="form-group row">
                                            <label class="col-md-2 control-label">Title</label>
                                            <div class="col-md-10">
                                                <input type="text" name="title" class="form-control" placeholder="The title of your message">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-2 control-label">Message Body</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" name="message" rows="5"></textarea>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary">Submit</button>

                                    </form>
                                </div>
                                <!-- end col -->

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End row -->

            </div>
            <!-- end container-fluid -->

        </div>
        <!-- end content -->



        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        {{ Date('Y') }} &copy; <a href="{{ env('APP_URL') }}">{{ env('APP_NAME') }}</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
@endsection
