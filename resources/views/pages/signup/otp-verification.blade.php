<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }} | Open Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
        h5, h3{
            color: #123771
        }
        ul{
            margin-left: 10px;
        }
    </style>

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

    <div class="card">
        <div class="card-body">
            <div class="col-lg-8 offset-2">
                <h1>OTP Verification</h1>
                <p>Please enter the OTP code you received.</p>

                <form method="POST" action="{{ route('otp-verify') }}">
                    @csrf
                   <div class="row">
                       <div class="col-lg-8">
                           <input class="form-control mb-2" type="text" name="otp" placeholder="Enter OTP" required>

                       </div>
                      <div class="col-4">
                          <button type="submit" class="btn btn-dark">Verify OTP</button>
                      </div>
                   </div>
                    <p>Didn't get the code? <a href="{{ route('send-otp') }}">Resend OTP</a> </p>
                </form>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
            </div>
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
