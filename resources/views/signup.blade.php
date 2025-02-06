<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Signup Form</title>
    <link rel="stylesheet" href="assets/stylesheet.css">
</head>
<body>
    <form class="form" action="{{ url('/signup') }}" method="post">
        @csrf  {{-- CSRF security token --}}
        <h2>Signup</h2>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Enter your name" required>
        
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>
        
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
        
        <button type="submit">Sign Up</button>
        {{-- error message --}}
        @if ($errors->any())
            <div>
                @foreach ($errors->all() as $error)
                    <p style="color: red;">{{ $error }}</p>
                @endforeach
            </div>
        @endif
    </form>
</body>
</html>
