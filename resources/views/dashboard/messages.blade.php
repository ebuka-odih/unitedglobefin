@extends('dashboard.layouts.app')
@section('content')

    <main id="main-container">
        <div class="content">
        <!-- Page Content -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Topics</h3>

            </div>
            <div class="block-content">
                <!-- Topics -->
                <table class="table table-striped table-borderless table-vcenter">
                    <thead>
                    <tr class="bg-body-dark">
                        <th colspan="2">Title</th>
                        <th class="d-none d-md-table-cell text-center" >Status</th>
                        <th class="d-none d-md-table-cell text-center" >Date</th>
                        <th class="d-none d-md-table-cell" style="width: 100px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($messages as $item)
                        <tr>
                        <td colspan="2">
                            <a class="fw-semibold" href="{{ route('user.viewMessage', $item->id) }}">{{ $item->title }}</a>
                        </td>
                        <td class="d-none d-md-table-cell text-center">
                            {!! $item->status() !!}
                        </td>
                            <td class="d-none d-md-table-cell">
                               <span>{{ date('M d, Y', strtotime($item->created_at)) }}</span>
                            </td>
                        <td class="d-none d-md-table-cell text-center">
                           <i class="fa fa-eye"></i>
                        </td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <!-- END Topics -->



{{--                {{ $messages->links() }}--}}
            </div>
        </div>
        <!-- END Page Content -->
        </div>
    </main>

@endsection
