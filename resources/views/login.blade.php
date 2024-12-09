<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Login Form</title>
    <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
</head>
<body>
    <style>body {background-image: url("{{ asset('image/abstract.jpg') }}")}</style>
    <form class="form" action="" method="POST">
        <h2>Login</h2>
        
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>
        
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
        
        <button type="submit">Login</button>
        <p>Don't have account ? <a href="{{ route('signup') }}">Signup</a></p>
    </form>
</body>
</html>
