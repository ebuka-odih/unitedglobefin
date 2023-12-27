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

                    <table class="table">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Type</th>
                            <!-- Add other relevant column headers -->
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($history as $entry)
                            <tr>
                                <td>{{ $entry->created_at }}</td>
                                <td>{{ get_class($entry) === 'App\Models\Transfer' ? 'Debit' : 'Credit' }}</td>
                                <!-- Add other relevant columns based on the attributes of your models -->
                            </tr>
                        @endforeach
                        </tbody>
                    </table>


                </div>
            </div>

            <!-- View More -->
            <!-- END View More -->
        </div>
        <!-- END Page Content -->
    </main>

@endsection
