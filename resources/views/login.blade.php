<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/SignupLogin.css') }}">
</head>
<body>
    <form class="form" action="" method="post">
        <h2>Login</h2>
        
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>
        
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
        
        <a href="{{ route('home') }}" class="btn btn-primary w-100">Login</a>


        <p>Don't have account ? <a href="{{ route('signup') }}">Signup</a></p>
        
        <a href="{{ route('home') }}" class="btn btn-secondary mt-3">Back to Home</a>
        
    </form>
</body>
</html>