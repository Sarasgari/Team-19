<!--Developer: Eyad Al Saher, Minwoo Noh, Mohammed Rahman, Sara Asgari
University ID: 230047989, 230409589, 220083681, 230344431
Function : Login page enable the login to the website and enjoy with the features
-->
<head>
    <link rel="stylesheet" href="{{asset('SignupLogin.css')}}"/>
    <link rel="stylesheet" href="{{asset('stylesheet.css')}}"/>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('image/background.jpg') no-repeat center center fixed; /* Add background image */
            background-size: cover; /* Ensure the background covers the entire area */
            color: #333; /* Dark text for better readability */
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form {
            background: #fff; /* White background for the form */
            padding: 40px; /* Increased padding for better spacing */
            border-radius: 8px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* Enhanced shadow for depth */
        }

        h2 {
            font-size: 2rem;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        .form p {
            text-align: center;
            margin-top: 20px;
        }

        .form p a {
            color: #007bff; /* Primary link color */
            text-decoration: none;
        }

        .form p a:hover {
            text-decoration: underline;
        }

        .alert {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f44336;
            color: white;
            border-radius: 5px;
        }

        @media (max-width: 600px) {
            h2 {
                font-size: 1.5rem;
            }
            .form {
                padding: 20px;
            }
        }
    </style>
</head>

@extends('layout')
@section('title','Log in')

@section('body')
    <div class="container">
        <div class="form">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                </div>
            @endif

            @if(session()->has('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
            @endif

            @if(session()->has('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif

            <form action="{{route('loginpost')}}" method="POST">
                @csrf
                <h2 style="color: #007bff;">Log In</h2> <!-- Change header color to primary -->

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                </div>

                

                <p>Don't have an account? <a href="{{ route('signup') }}" style="color: #007bff;">Sign up</a></p> <!-- Change link color to primary -->
                <p><a href="{{ route('password.request') }}" style="color: #007bff;">Forgot your password?</a></p>
                <button type="submit" class="btn btn-primary btn-block">Log In</button> <!-- Added login button -->
                <a href="{{ route('home') }}" class="btn btn-secondary btn-block">Back to Home</a>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS (optional for form validation and interactivity) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
