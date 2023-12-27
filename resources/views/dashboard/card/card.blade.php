@extends('dashboard.layouts.app')
@section('content')

    <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Cards</h1>
                    <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Debit Cards</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">


            <!-- Latest Orders + Stats -->
            <div class="row">
                <div class="col-md-12">
                    <!--  Latest Orders -->
                    <div class="block block-rounded block-mode-loading-refresh">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">
                               All Cards
                            </h3>

                        </div>
                        <div class="block-content">
                            <table class="table table-striped table-hover table-borderless table-vcenter fs-sm">
                                <thead>
                                <tr class="text-uppercase">
                                    <th>Date</th>
                                    <th>Card Type</th>
                                    <th class="d-none d-xl-table-cell">Nickname</th>
                                    <th class="d-none d-sm-table-cell text-end">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cards as $item)
                                    <tr>
                                        <td >
                                            <span class="fw-semibold">{{ date('Y-m-d', strtotime($item->created_at)) }}</span>
                                        </td>
                                        <td >
                                            <span class="fw-semibold">{{ $item->card_type }}</span>
                                        </td>
                                        <td class="d-none d-xl-table-cell">
                                            <span class="fs-sm text-muted" >{{ $item->nickname }}</span>
                                        </td>

                                        <td class="d-none d-sm-table-cell text-end fw-medium">
                                            <span class="fw-semibold text-warning">{!! $item->status() !!}</span>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {!! $cards->links() !!}
                            </div>
                        </div>

                    </div>
                    <!-- END Latest Orders -->
                </div>
            </div>
            <!-- END Latest Orders + Stats -->
        </div>
        <!-- END Page Content -->
    </main>

@endsection
