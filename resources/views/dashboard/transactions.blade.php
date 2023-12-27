@extends('dashboard.layouts.app')
@section('content')

    <main id="main-container">
        <!-- Page Content -->
        <div class="content">

            <!-- Latest Transactions -->
            <h2 class="content-heading">
                <i class="fa fa-angle-right text-muted me-1"></i> All Transactions
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
                            @foreach($transactions as $item)
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
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- END Page Content -->
    </main>

@endsection
