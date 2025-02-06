Developer: Eyad Al Saher
University ID: 230047989
Function : Signup page enable the new user to register into the website

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Signup Form</title>
    
    {{-- Stylesheet from main --}}
    <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
    
    <style>
        /* Background styling from main */
        body {
            background-image: url("{{ asset('image/abstract.jpg') }}");
        }
    </style>
</head>
<body>

    <form class="form" action="{{ route('signup') }}" method="post">
        @csrf {{-- CSRF security token --}}

        <h2>Signup</h2>

        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Enter your name" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>

        <button type="submit">Sign Up</button>

        {{-- Error message display from MNoh --}}
        @if ($errors->any())
            <div>
                @foreach ($errors->all() as $error)
                    <p style="color: red;">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <p>Already have an account? <a href="{{ route('signin') }}">Sign in</a></p>
    </form>

</body>
</html>
