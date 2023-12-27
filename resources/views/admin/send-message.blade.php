@extends('admin.layout.app')
@section('content')

    <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Send Messages</h1>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">

            <div class="block block-rounded">


                <div class="block-content">
                    <button type="button" class="btn btn-primary push" data-bs-toggle="modal" data-bs-target="#modal-block-normal">Send Message</button>
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Messages</h3>
                    </div>
                    <table class="table table-vcenter">
                        <thead>
                        <tr>
                            <th >Date</th>
                            <th>Message Title</th>
                            <th class="d-none d-sm-table-cell" >Status</th>
                            <th class="text-center" >Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($messages as $item)
                        <tr>
                            <th>{{ date('d M, Y', strtotime($item->created_at)) }}</th>
                            <td class="fw-semibold">
                                {{ $item->title }}
                            </td>
                            <td class="fw-semibold">
                                {!! $item->status(); !!}
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" title="" data-bs-original-title="Edit">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <form method="POST" action="{!! route('admin.deleteMessage', $item->id) !!}" accept-charset="UTF-8">
                                        <input name="_method" value="DELETE" type="hidden">
                                        {{ csrf_field() }}

                                        <div class="btn-group btn-group-xs pull-right" role="group">

                                            <button type="submit" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" title="Delete User" data-bs-original-title="Delete" onclick="return confirm(&quot;Confirm Delete?&quot;)">
                                                <i class="fa fa-times"></i>
                                            </button>

                                        </div>

                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- END Page Content -->
    </main>

    <!-- Normal Block Modal -->
    <div class="modal" id="modal-block-normal" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="block block-rounded block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Send Message</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">

                        <form class="form-horizontal" action="{{ route('admin.storeMessage') }}" method="POST">
                            @csrf


                            <div class="form-group mb-2">
                                <label class="col-md-12 control-label">Select User</label>
                                <div class="col-md-12">
                                    <select name="user_id" id="" class="form-control">
                                        @foreach($users as $item)
                                            <option value="{{ $item->id }}">{{ $item->fullname() }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <label class="col-md-12 control-label">Message Title</label>
                                <div class="col-md-12">
                                    <input type="text" name="title" class="form-control" placeholder="The title of your message">
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-md-12 control-label">Message Body</label>
                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" rows="5"></textarea>
                                </div>
                            </div>
                            <button class="btn btn-primary mt-3">Send</button>

                        </form>

                    </div>
                    <div class="block-content block-content-full text-end bg-body">
                        <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Normal Block Modal -->


@endsection
