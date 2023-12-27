@extends('admin.layout.app')
@section('content')


    <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Transfer Details</h1>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">

            <!-- Layouts -->
            <div class="block block-rounded">

                <div class="block-content">
                    <div class="block-header block-header-default mb-3">
                        <h3 class="block-title text-center">Transaction Details</h3>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 space-y-2">

                            <table class="table table-striped" style="width:100%">
                                <tr>
                                    <th>Amount:</th>
                                    <td>$@money($transfer->amount)</td>
                                </tr>
                                <tr>
                                    <th>Transfer Type:</th>
                                    <td>{{ $transfer->type() }}</td>
                                </tr>
                                <tr>
                                    <th>Status:</th>
                                    <td>{!! $transfer->status() !!}</td>
                                </tr>
                                <tr>
                                    <th>FUNDS CLEARANCE CODE:</th>
                                    <td>{{ $transfer->first_code ? : "N/A" }}</td>
                                </tr>
                                <tr>
                                    <th>INTER-BANK TRANSFER CODE:</th>
                                    <td>{{ $transfer->second_code ? : "N/A" }}</td>
                                </tr>
                                <tr>
                                    <th>TAX CLEARANCE CODE:</th>
                                    <td>{{ $transfer->third_code ? : "N/A" }}</td>
                                </tr>
                            </table>

                        </div>
                    </div>
                    <br>

                    <div class="block-header block-header-default mb-3">
                        <h3 class="block-title text-center">Sender Details</h3>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 space-y-2">

                            <table class="table table-striped" style="width:100%">
                                <tr>
                                    <th>Name:</th>
                                    <td>{{ optional($transfer->user)->fullname() }}</td>
                                </tr>
                                <tr>
                                    <th>Account Number:</th>
                                    <td>{{ $transfer->from }}</td>
                                </tr>
                            </table>

                        </div>
                    </div>
                    <br>

                    <div class="block-header block-header-default mb-3">
                        <h3 class="block-title text-center">Receiver Details</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 space-y-2">
                            <table class="table table-striped" style="width:100%">
                                <tr>
                                    <th>Name:</th>
                                    <td>{{ $transfer->ben_name }}</td>
                                </tr>
                                <tr>
                                    <th>Account Number:</th>
                                    <td>{{ $transfer->acct_number }}</td>
                                </tr>
                                <tr>
                                    <th>Bank Name:</th>
                                    <td>{{ $transfer->ben_bank }}</td>
                                </tr>
                                <tr>
                                    <th>Country:</th>
                                    <td>{{ $transfer->ben_country }}</td>
                                </tr>
                                <tr>
                                    <th>Address:</th>
                                    <td>{{ $transfer->ben_address }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <br>

                </div>
            </div>
            <!-- END Layouts -->
        </div>
        <!-- END Page Content -->
    </main>

    <script>
        function myFunction() {
            var x = Math.floor((Math.random() * 1000000) + 1);
            document.getElementById("demo").innerHTML = x;
        }
    </script>
@endsection
