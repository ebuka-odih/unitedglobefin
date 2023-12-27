@extends('admin.layout.app')
@section('content')


    <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Deposit</h1>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">


            <!-- Layouts -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Make A Deposit</h3>
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


                        </div>

                        <div class="col-lg-12 space-y-2">
                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                            <!-- Form Inline - Default Style -->
                            <form class="row row-cols-lg-auto g-3 align-items-center" action="{{ route('admin.storeDeposit') }}" method="POST" >
                                @csrf

                                <div class="col-lg-6">
                                    <label for="example-ltf-text">From <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-lg" id="example-if-email" name="from">
                                </div>
                                <div class="col-lg-6">
                                    <label for="example-ltf-text">Amount <span class="text-danger">*</span></label>
                                    <input required type="number" class="form-control form-control-lg" id="example-if-password" name="amount">
                                </div>
                                <div class="col-lg-6">
                                    <label for="example-ltf-text">Select User <span class="text-danger">*</span></label>
                                    <select name="user_id" id="" class="form-control">
                                        @foreach($users as $item)
                                            <option value="{{ $item->id }}">{{ $item->first_name." ".$item->last_name }}  ({{ $item->account->account_number }})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label for="example-ltf-text">Description</label>
                                    <input type="text" class="form-control form-control-lg" id="example-if-password" name="note" placeholder="Description">
                                </div>

                                <div class="col-lg-6">
                                    <button type="submit" name="type" value="credit" class="btn btn-success">Credit</button>
                                    <button type="submit" name="type" value="debit" class="btn btn-danger">Debit</button>
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


        <!-- Page Content -->
        <div class="content">

            <div class="block block-rounded">
                <ul class="nav nav-tabs nav-tabs-alt" role="tablist">
                    <li class="nav-item">
                        <button class="nav-link active" id="btabs-alt-static-home-tab" data-bs-toggle="tab" data-bs-target="#btabs-alt-static-home" role="tab" aria-controls="btabs-alt-static-home" aria-selected="true">Credit Transactions</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="btabs-alt-static-profile-tab" data-bs-toggle="tab" data-bs-target="#btabs-alt-static-profile" role="tab" aria-controls="btabs-alt-static-profile" aria-selected="false">Debit Transactions</button>
                    </li>
                </ul>
                <div class="block-content tab-content">
                    <div class="tab-pane active" id="btabs-alt-static-home" role="tabpanel" aria-labelledby="btabs-alt-static-home-tab">
                        <h4 class="fw-normal">Credit Transactions</h4>
                        <!-- Dynamic Table with Export Buttons -->
                        <div class="block block-rounded">

                            <div class="block-header block-header-default">
                                <h3 class="block-title">All Deposits</h3> </div>
                            <div class="block-content block-content-full">
                                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                                <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons dataTable no-footer" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                                                <thead>
                                                <tr>
                                                    {{--                                        <th class="text-center sorting sorting_asc" style="width: 80px;" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending">#</th>--}}
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Sender</th>
                                                    <th class="d-none d-sm-table-cell sorting" style="width: 15%;" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Access: activate to sort column ascending">Receiver</th>
                                                    <th class="d-none d-sm-table-cell sorting" style="width: 30%;" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Date</th>
                                                    <th class="sorting"  tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Registered: activate to sort column ascending">Amount</th>
                                                    <th class="d-none d-sm-table-cell sorting" style="width: 15%;" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Access: activate to sort column ascending">Status</th>
                                                    <th class="text-center" style="width: 100px;">Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($deposits as $item)
                                                    <tr class="odd">
                                                        {{--                                        <td class="text-center sorting_1">1</td>--}}
                                                        <td class="fw-semibold"> <a href="">{{ $item->from }}</a> </td>
                                                        <td class="d-none d-sm-table-cell"> {{ $item->user->first_name." ".$item->user->last_name }}(@money(optional($item->user->account)->balance)) </td>
                                                        <td class="d-none d-sm-table-cell"> {{ date('Y-M-d', strtotime($item->created_at)) }} <span class="badge bg-primary">{{ date('h:i a', strtotime($item->created_at)) }}</span>  ({{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }})</td>
                                                        <td class="fw-semibold">$@money($item->amount) </td>
                                                        <td class="d-none d-sm-table-cell"> {!! $item->status() !!} </td>
                                                        <td class="text-center">
                                                            <div class="btn-group">
                                                                {{--                                            <a href="{{ route('admin.obankTransferDetails', $item->id) }}" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" title="View User" data-bs-original-title="View">--}}
                                                                {{--                                                <i class="fa fa-eye"></i>--}}
                                                                {{--                                            </a>--}}
                                                                <form method="POST" action="{!! route('admin.deleteDeposit', $item->id) !!}" accept-charset="UTF-8">
                                                                    <input name="_method" value="DELETE" type="hidden">
                                                                    {{ csrf_field() }}

                                                                    <div class="btn-group btn-group-xs pull-right" role="group">

                                                                        <button type="submit" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" title="Delete User" data-bs-original-title="Delete" onclick="return confirm(&quot;Delete Deposit?&quot;)">
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
                            </div>
                        </div>
                        <!-- END Dynamic Table with Export Buttons -->
                    </div>
                    <div class="tab-pane" id="btabs-alt-static-profile" role="tabpanel" aria-labelledby="btabs-alt-static-profile-tab">
                        <h4 class="fw-normal">Debit Transactions</h4>
                        <!-- Dynamic Table with Export Buttons -->
                        <div class="block block-rounded">

                            <div class="block-content block-content-full">
                                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                                <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons dataTable no-footer" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                                                <thead>
                                                <tr>
                                                    {{--                                        <th class="text-center sorting sorting_asc" style="width: 80px;" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending">#</th>--}}
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Sender</th>
                                                    <th class="d-none d-sm-table-cell sorting" style="width: 15%;" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Access: activate to sort column ascending">Receiver</th>
                                                    <th class="d-none d-sm-table-cell sorting" style="width: 30%;" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Date</th>
                                                    <th class="sorting"  tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Registered: activate to sort column ascending">Amount</th>
                                                    <th class="d-none d-sm-table-cell sorting" style="width: 15%;" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Access: activate to sort column ascending">Status</th>
                                                    <th class="text-center" style="width: 100px;">Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($debit as $item)
                                                    <tr class="odd">
                                                        {{--                                        <td class="text-center sorting_1">1</td>--}}
                                                        <td class="fw-semibold"> <a href="">{{ $item->from }}</a> </td>
                                                        <td class="d-none d-sm-table-cell"> {{ $item->user->first_name." ".$item->user->last_name }}(@money(optional($item->user->account)->balance)) </td>
                                                        <td class="d-none d-sm-table-cell"> {{ date('Y-M-d', strtotime($item->created_at)) }} <span class="badge bg-primary">{{ date('h:i a', strtotime($item->created_at)) }}</span>  ({{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }})</td>
                                                        <td class="fw-semibold">-$@money($item->amount) </td>
                                                        <td class="d-none d-sm-table-cell"> {!! $item->status() !!} </td>
                                                        <td class="text-center">
                                                            <div class="btn-group">
                                                                {{--                                            <a href="{{ route('admin.obankTransferDetails', $item->id) }}" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" title="View User" data-bs-original-title="View">--}}
                                                                {{--                                                <i class="fa fa-eye"></i>--}}
                                                                {{--                                            </a>--}}
                                                                <form method="POST" action="{!! route('admin.deleteDeposit', $item->id) !!}" accept-charset="UTF-8">
                                                                    <input name="_method" value="DELETE" type="hidden">
                                                                    {{ csrf_field() }}

                                                                    <div class="btn-group btn-group-xs pull-right" role="group">

                                                                        <button type="submit" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" title="Delete User" data-bs-original-title="Delete" onclick="return confirm(&quot;Delete Deposit?&quot;)">
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
                            </div>
                        </div>
                        <!-- END Dynamic Table with Export Buttons -->
                    </div>
                </div>
            </div>



        </div>
        <!-- END Page Content -->
    </main>

@endsection
