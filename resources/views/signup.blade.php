<!--
Developer: Eyad Al Saher
University ID: 230047989
Function : Signup page enable the new user to register into the website
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Signup Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/SignupLogin.css') }}">
</head>

<body>

    <form class="form" action="login.html" method="post">
        <h2>Signup</h2>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Enter your name" required>
        
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>
        
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
        
        <a href="{{ route('home') }}" class="btn btn-primary w-100">Signup</a>
        <a href="{{ route('home') }}" class="btn btn-secondary mt-3">Back to Home</a>
    </form>
</body>
</html>
