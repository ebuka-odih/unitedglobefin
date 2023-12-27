@extends('dashboard.layouts.app')
@section('content')

    <main id="main-container">
        <!-- Page Content -->
        <div class="content">


            <!-- Latest Transactions -->
            <h2 class="content-heading">
                <i class="fa fa-angle-right text-muted me-1"></i> Transactions History
            </h2>

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
            <div class="text-center">
                <div class="d-flex justify-content-center">
                    {!! $transactions->links() !!}
                </div>
            </div>
            <!-- END View More -->
        </div>
        <!-- END Page Content -->
    </main>

@endsection
