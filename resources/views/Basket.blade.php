<!--
  Developer: Abdulrahman Mostafa
  University ID: 2300466694
  Function: Basket page hold the items and prouced to the payment form 
-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Your Basket</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> 
  <link rel="stylesheet" href="{{ asset('css/Basket.css') }}">
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <div>
      <a class="navbar-brand" href="#">
        <img src="{{ asset('image/logo.png') }}" alt="GameDen Logo" class="d-inline-block align-text-top" style="height: 40px;">
        GameDen
      </a>
    </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="{{route('home')}}">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('products') }}">products</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('aboutus') }}">About Us</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('contactus') }}">Contact</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Register</a></li>

        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <main>
    <div class= "background">
    <!-- Square Container -->
    <div class="square-container">
      <div class="basket-container">
        <h1>Your Basket</h1>
        <p>Your basket is currently empty. Add some items to see them here!</p>
        <a href="{{ route('paymentform') }}" class="btn">Proceed to Payment</a>
        <a href="{{ route('home') }}" class="btn">Continue Shopping</a>
        <a href="PaymentForm.html" class="btn">Proceed to Payment</a>
      </div>
    </div>
  </main>
</div>
  <!-- Footer -->
  <footer>
    <p>© 2024 GameDen. All Rights Reserved.</p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


