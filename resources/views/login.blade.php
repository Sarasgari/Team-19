Developer: Eyad Al Saher
University ID: 230047989
Function : Login page enable the login to the website and enjoy with the features

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Login Form</title>
    
    {{-- Stylesheets --}}
    <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
    <link rel="stylesheet" href="{{ asset('css/SignupLogin.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* Background styling */
        body {
            background-image: url("{{ asset('image/abstract.jpg') }}");
        }
    </style>
</head>
<body>

    <form class="form" action="{{ route('login') }}" method="POST">
        @csrf {{-- CSRF security token --}}
        
        <h2>Login</h2>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>

        <button type="submit">Login</button>
        
        <p>Don't have an account? <a href="{{ route('signup') }}">Signup</a></p>
        <a href="{{ route('home') }}" class="btn btn-primary w-100">Login</a>
        <a href="{{ route('home') }}" class="btn btn-secondary mt-3">Back to Home</a>
    </form>

</body>
</html>
