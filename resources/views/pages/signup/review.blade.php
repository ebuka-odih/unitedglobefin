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
    <nav class="nav nav-pills nav-justified mb-5">
        <a class="nav-link">Your Information</a>
        <a class="nav-link" >Account Setup</a>
        <a class="nav-link" >Terms & Conditions</a>
        <a class="nav-link active">Review & Submit</a>
    </nav>
    <div class="card">
        <div style="background-color: #f2f2f2" class="card-body">
            <h3 style="color: #123771">Account Revision</h3>
            <hr>

            <form class="row g-3" method="GET" action="{{ route('submitDetails', $user->id) }}" enctype="multipart/form-data">
                @csrf

               <div>
                   <div class="table-responsive">
                       <h5 style="color: #123771">Personal Info</h5>
                       <table class="table table-striped">
                           <tr>
                               <th>Title:</th>
                               <td>{{ $user->title }}</td>
                           </tr>
                           <tr>
                               <th>Middle Name:</th>
                               <td>{{ $user->first_name }}</td>
                           </tr>
                           <tr>
                               <th>Last Name:</th>
                               <td>{{ $user->middle_name }}</td>
                           </tr>
                           <tr>
                               <th>Last Name:</th>
                               <td>{{ $user->last_name }}</td>
                           </tr>
                           <tr>
                               <th>Gender:</th>
                               <td>{{ $user->gender }}</td>
                           </tr>
                           <tr>
                               <th>Date of Birth:</th>
                               <td>{{ $user->date_of_birth }}</td>
                           </tr>
                           <tr>
                               <th>Marital Status:</th>
                               <td>{{ $user->marital_status }}</td>
                           </tr>
                           <tr>
                               <th>Marital Status:</th>
                               <td>{{ $user->marital_status }}</td>
                           </tr>
                           <tr>
                               <th>Profile Picture:</th>
                               <td><img height="100" width="100" src="{{ asset('files/'.$user->avatar) }}" alt=""></td>
                           </tr>

                       </table>
                       <h5 style="color: #123771">Contact Info</h5>
                       <table class="table table-striped">
                           <tr>
                               <th>House Address:</th>
                               <td>{{ $user->address }}</td>
                           </tr>
                           <tr>
                               <th>Zipcode:</th>
                               <td>{{ $user->zipcode }}</td>
                           </tr>
                           <tr>
                               <th>City:</th>
                               <td>{{ $user->city }}</td>
                           </tr>
                           <tr>
                               <th>State:</th>
                               <td>{{ $user->state }}</td>
                           </tr>
                           <tr>
                               <th>Phone Number:</th>
                               <td>{{ $user->phone }}</td>
                           </tr>
                           <tr>
                               <th>Email:</th>
                               <td>{{ $user->email }}</td>
                           </tr>

                       </table>
                       <h5 style="color: #123771">Residency</h5>
                       <table class="table table-striped">

                           <tr>
                               <th>Are you a US Citizen:</th>
                               <td>{{ $user->citizenship }}</td>
                           </tr>
                           @if($user->citizenship == "No")
                           <tr>
                               <th>Country:</th>
                               <td>{{ $user->country }}</td>
                           </tr>
                           @else
                               <tr>
                                   <th>Social Security Number:</th>
                                   <td>******</td>
                               </tr>
                           @endif

                       </table>

                       <h5 style="color: #123771">Employment & finances</h5>
                       <table class="table table-striped">
                           <tr>
                               <th>Employment Status:</th>
                               <td>{{ $user->employment }}</td>
                           </tr>
                           <tr>
                               <th>Source Of Income:</th>
                               <td>{{ $user->source_of_income }}</td>
                           </tr>
                       </table>
                       <h5 style="color: #123771">Auth Info</h5>
                       <table class="table table-striped">
                           <tr>
                               <th>Username:</th>
                               <td>{{ $user->username }}</td>
                           </tr>
                       </table>
                       <h5 style="color: #123771">Identification</h5>
                       <table class="table table-striped">
                           <tr>
                               <th>Identification Type:</th>
                               <td>{{ $user->identification_type }}</td>
                           </tr>
                           <tr>
                               <th>ID Number:</th>
                               <td>{{ $user->id_number }}</td>
                           </tr>
                           <tr>
                               <th>ID Expiry Date:</th>
                               <td>{{ $user->id_expiry }}</td>
                           </tr>
                           <tr>
                               <th>ID Image Front:</th>
                               <td><img width="200" height="150" src="{{ asset('files/'.$user->id_front_img) }}" alt=""></td>
                           </tr>
                           <tr>
                               <th>ID Image Back:</th>
                               <td><img width="200" height="150" src="{{ asset('files/'.$user->id_back_img) }}" alt=""></td>
                           </tr>
                       </table>

                       <h5 style="color: #123771">Account Setup</h5>
                       <table class="table table-striped">
                           <tr>
                               <th>Account Type:</th>
                               <td>{{ $user->account->account_type }}</td>
                           </tr>
                           <tr>
                               <th>Currency Type:</th>
                               <td>{{ $user->account->currency() }}</td>
                           </tr>
                       </table>
                   </div>
               </div>

                <div class="col-12 mt-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
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
