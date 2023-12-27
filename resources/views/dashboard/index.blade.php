@extends('dashboard.layouts.app')
@section('content')

<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <!-- Quick Overview -->
        <h2 class="content-heading">
            <i class="fa fa-angle-right text-muted me-1"></i> Quick Overview
        </h2>
        <div class="block block-rounded">
            <div class="block-content block-content-full">
                <div class="row text-center">
{{--                    <div class="col-md-3 py-3">--}}
{{--                        <div class="fs-1 fw-light text-dark mb-1">--}}
{{--                            {{ optional($user->account)->currency }}@money(optional(auth()->user()->account)->ledger_balance)--}}
{{--                        </div>--}}
{{--                        <a class="link-fx fs-sm fw-bold text-uppercase text-muted" href="javascript:void(0)">Ledger Balance</a>--}}
{{--                    </div>--}}
                    <div class="col-md-4 py-3">
                        <div class="fs-1 fw-light text-info mb-1">
                            {{ optional($user->account)->currency }}@money(optional(auth()->user()->account)->balance)
                        </div>
                        <a class="link-fx fs-sm fw-bold text-uppercase text-muted" href="javascript:void(0)">Available balance
                        </a>
                    </div>
                    <div class="col-md-4 py-3">
                        <div class="fs-1 fw-light text-success mb-1">
                            +{{ optional($user->account)->currency }}@money($income)
                        </div>
                        <a class="link-fx fs-sm fw-bold text-uppercase text-muted" href="javascript:void(0)">Today Income
                        </a>
                    </div>
                    <div class="col-md-4 py-3">
                        <div class="fs-1 fw-light text-danger mb-1">
                            -{{ optional($user->account)->currency }}@money($expenses)
                        </div>
                        <a class="link-fx fs-sm fw-bold text-uppercase text-muted" href="javascript:void(0)">Today Expenses</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-teal-600">
            <div class="card-header bg-transparent1 border-teal-600">Account Summary</div>
            <div class="card-body">
                <div id="tnxtbl_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12 col-md-6"></div>
                        <div class="col-sm-12 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="ui celled table table-responsive1 dataTable no-footer" cellspacing="0" width="100%" id="tnxtbl" role="grid" style="width: 100%;">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 131px;">Account Number</th>
                                        <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 136px;">Account Type</th>
                                        <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 136px;">Account Currency</th>
                                        <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 175px;">Available Balance</th>
                                        <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 152px;">Account Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr role="row" class="odd">
                                        <td>
                                            <a href="account_activities?HKjkjepsjl3208flsjkjiowurwoupweuiuvlnzewipPIE29IJMD=1">{{ optional($user->account)->account_number }}</a>
                                        </td>
                                        <td>{{ optional($user->account)->account_type }}</td>
                                        <td>{{ optional($user->account)->currency() }}</td>
                                        <td>{{ optional($user->account)->currency }}@money(optional($user->account)->balance)</td>
                                        <td>
                                            <span >{!! $user->status() !!}</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                            <div id="tnxtbl_processing" class="dataTables_processing card" style="display: none;">Processing...</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5"></div>
                        <div class="col-sm-12 col-md-7"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Quick Overview -->


        <!-- Latest Transactions -->
        <h2 class="content-heading">
            <i class="fa fa-angle-right text-muted me-1"></i> Latest Transactions
        </h2>
        <div class="block block-rounded">
            <div class="block-content">

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter">
                        <thead>
                        <tr>
                            <th class="text-center" >
                                <i class="far fa-clock"></i>
                            </th>
                            <th>Amount</th>
                            <th >Description</th>
                            <th >Status</th>
                            <th class="text-center" style="width: 100px;">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($funding as $item)
                            @if($item->type > 1)
                        <tr>
                            <td class="text-center">
                                {{ date('d-M-Y', strtotime($item->created_at)) }}
                            </td>
                            <td class="fw-semibold">
                                @money($item->amount) {{ auth()->user()->account->currency() }}
                            </td>
                            <td>{{ $item->note }}</td>
                            <td>
                                {!! $item->status() !!}
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="button" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" title="" data-bs-original-title="Edit">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                            @else
                                <tr class="text-danger">
                                    <td class="text-center">
                                        {{ date('d-M-Y', strtotime($item->created_at)) }}
                                    </td>
                                    <td class="fw-semibold">
                                        -@money($item->amount) {{ auth()->user()->account->currency() }}
                                    </td>
                                    <td>{{ $item->note }}</td>
                                    <td>
                                        {!! $item->status() !!}
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="button" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" title="" data-bs-original-title="Edit">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No Transaction</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <h4>Transfers</h4>

        @forelse($transactions as $item)

            <a class="block block-rounded block-link-shadow border-start border-dark border-3" href="{{ route('user.transferSuccess', $item->id) }}">
                <div class="block-content block-content-full d-flex align-items-center justify-content-between">

                    <div>
                        <p class="fs-lg fw-semibold mb-0">
                            -$@money($item->amount)
                        </p>
                        <p class="text-muted mb-0">
                            {{ substr($item->acct_number, 0, 5) }}-xxx Account
                        </p>
                    </div>
                    <div class="ms-3">
                        <i class="fa fa-arrow-right text-dark"></i>
                    </div>
                </div>
                <div class="block-content block-content-full block-content-sm bg-body-light">
                    <span class="fs-sm text-muted">From <strong>{{ $item->rep_name }}</strong> at <strong> {{ date('M d, Y - h:i A', strtotime($item->created_at)) }}</strong></span>
                </div>
                <div class="block-content block-content-full block-content-sm bg-body-light">
                    <span class="font-size-sm text-muted">Status {!! $item->status() !!}</span>
                </div>
            </a>

            <!-- END Latest Transactions -->
        @empty
            <h3>No Transaction</h3>
        @endforelse
        <!-- END Latest Transactions -->

        <!-- View More -->
{{--        <div class="text-center">--}}
{{--            <a class="btn btn-sm btn-alt-secondary fw-semibold" href="javascript:void(0)">--}}
{{--                <i class="fa fa-arrow-down opacity-50 me-1"></i> View More..--}}
{{--            </a>--}}
{{--        </div>--}}
        <!-- END View More -->
    </div>
    <!-- END Page Content -->
</main>

@endsection
