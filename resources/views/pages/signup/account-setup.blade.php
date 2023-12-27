<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }} | Open Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        /* Style for the loading container */
        .loading-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999; /* Ensure it's above other elements */
        }

        /* Style for the loading spinner */
        .loading-spinner {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>



</head>
<body>

<div class="loading-container">
    <div class="loading-spinner">
        <strong>Loading...</strong>
        <div class="spinner-border" role="status" aria-hidden="true"></div>
    </div>
</div>

<nav class="navbar bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset('img/logo.png') }}" alt="Bootstrap" width="300" height="80">
        </a>

    </div>
</nav>
<div class="container mt-5">
    <nav class="nav nav-pills nav-justified mb-5">
        <a class="nav-link">Your Information</a>
        <a class="nav-link active" >Account Setup</a>
        <a class="nav-link" >Terms & Conditions</a>
        <a class="nav-link">Review & Submit</a>
    </nav>
    <div class="card">
        <div style="background-color: #f2f2f2" class="card-body">
            <h3 style="color: #123771">Account Setup</h3>
            <hr>
            <form class="row g-3" method="POST" action="{{ route('storeAccountSetup') }}" enctype="multipart/form-data">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <input type="hidden" name="user_id" value="{{ $user->id }}">

                <h4 style="color: #123771">Identification</h4>
                <span class="text-danger">* required</span>
                <div class="row mt-3 mb-4">
                    <div class="col-md-4 mb-3">
                        <label for="cus_identification" class="form-label">Identification Type<span class="text-danger">*</span></label>
                        <select name="identification_type" class="form-control" id="cus_identification">
                            <option selected disabled>Identification...</option>
                            <option value="passport">Passport</option>
                            <option value="driver_license">Driver's License</option>
                            <option value="national_id">National ID</option>
                            <option value="voter_id">Voter ID</option>
                            <option value="social_security">Social Security Number</option>
                            <option value="student_id">Student ID</option>
                            <option value="employee_id">Employee ID</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label for="inputPassword4" class="form-label">ID Number<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="inputPassword4" name="id_number" value="{{ old('id_number') }}" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="inputPassword4" class="form-label">ID Expiry Date<span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="inputPassword4" name="id_expiry" value="{{ old('id_expiry') }}" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="inputPassword4" class="form-label">ID Image Front<span class="text-danger">*</span></label>
                        <input type="file" class="form-control" id="inputPassword4" name="id_front_img"  required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="inputPassword4" class="form-label">ID Image Back<span class="text-danger">*</span></label>
                        <input type="file" class="form-control" id="inputPassword4" name="id_back_img"  required>
                    </div>

                </div>
                <hr>
                <h4 style="color: #123771">Account Info</h4>
                <div class="row mb-4 mt-3">
                    <div class="col-md-12 col-lg-4 mb-3">
                        <label for="inputAddress" class="form-label">Account Type<span class="text-danger">*</span></label>
                        <select id="inputAddress" name="account_type" class="form-control">
                            <option selected disabled>Choose Account Type...</option>
                            <option value="Savings Account">Savings Account</option>
                            <option value="Checking Account">Checking Account</option>
                            <option value="Business Account">Business Account</option>
                            <option value="Private Client Account ">Private Client Account</option>
                            <option value="Joint Account">Joint Account</option>
                            <option value="Fixed Deposit Account">Fixed Deposit Account</option>
                            <option value="Current Account">Current Account</option>
                            <option value="Individual Retirement Account (IRA)">Individual Retirement Account (IRA) </option>
                            <option value="Trust Fund Account">Trust Fund Account</option>
                        </select>
                    </div>
                    <div class="col-md-12 col-lg-4 mb-3">
                        <label for="inputAddress" class="form-label">Preferred Currency<span class="text-danger">*</span></label>
                        <select id="inputAddress" name="currency" class="form-control">
                            <option selected disabled>Choose Currency...</option>
                            <option value="$">USD</option>
                            <option value="€">EURO</option>
                            <option value="£">GBP</option>
                        </select>
                    </div>
                    <div class="col-md-12 col-lg-4 mb-3">
                        <label for="inputAddress" class="form-label">Profit Picture<span class="text-danger">*</span></label>
                        <input type="file" name="avatar" class="form-control" id="inputAddress"  required>
                    </div>

                </div>


                <div class="col-12 mt-4">
                    <button type="submit" class="btn btn-primary">Continue</button>
                </div>
            </form>

        </div>
    </div>

</div>

<script>
    // Simulate a delay (e.g., 3 seconds) for demonstration purposes
    setTimeout(function() {
        // Remove the loading container when the page is loaded
        document.querySelector('.loading-container').style.display = 'none';
    }, 3000); // Adjust the delay time as needed
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
