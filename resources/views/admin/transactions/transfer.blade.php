@extends('admin.layout.app')
@section('content')

    <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Transfer</h1>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
            <!-- Full Table -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Internal Transfer</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option">
                            <i class="si si-settings"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-vcenter">
                            <thead>
                            <tr>
                                <th class="text-center">Date</th>
                                <th class="text-center" >Sender</th>
                                <th>Receiver</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th class="text-center" >Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transfer as $item)
                            <tr>
                                <td class="text-center">
                                    {{ date('d M, Y (h:i A)', strtotime($item->created_at)) }}
                                </td>
                                <td class="fw-semibold">
                                    {{ $item->from }}
                                </td>

                                <td class="fw-semibold">
                                    {{ $item->ben_name }}
                                </td>
                                <td class="fw-semibold">
                                    $@money($item->amount)
                                </td>
                                <td>
                                    {!! $item->status() !!}
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.viewTransfer', $item->id) }}" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" >
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <form method="POST" action="{!! route('admin.deleteTransfer', $item->id) !!}" accept-charset="UTF-8">
                                            <input name="_method" value="DELETE" type="hidden">
                                            {{ csrf_field() }}

                                            <div class="btn-group btn-group-xs pull-right" role="group">

                                                <button type="submit" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" title="Delete User" data-bs-original-title="Delete" onclick="return confirm(&quot;Delete User?&quot;)">
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
            <!-- END Full Table -->


        </div>
        <!-- END Page Content -->
    </main>

@endsection
