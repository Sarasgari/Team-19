Developer: Eyad Al Saher
University ID: 230047989
Function : Signup page enable the new user to register into the website
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Signup Form</title>
    <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
</head>
<body>
<style>body {background-image: url("{{ asset('image/abstract.jpg') }}")}</style>
    <form class="form" action="{{ route('customRegister') }}" method="POST">
        @csrf
        <h2>Signup</h2>
            <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" required>
            @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
        @if ($errors->has('password'))
        <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif

        <button type="submit">Sign Up</button>
        <p>Have an account? <a href="{{ route('signin') }}">Sign in</a></p>
    </form>
</body>
</html>
