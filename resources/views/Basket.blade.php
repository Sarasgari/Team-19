<!--
  Developer: Abdulrahman Mostafa, Mohammed Rahman
  University ID: 2300466694, 220083681
  Function: Basket page hold the items and prouced to the payment form 
-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Your Basket</title>
  <link href="https://unpkg.com/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ asset('css/Basket.css') }}" rel="stylesheet"> <!-- Link to the CSS file -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap CSS -->
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="{{ asset('image/logo.png') }}" alt="GameDen Logo" class="d-inline-block align-text-top" style="height: 40px;">
        GameDen
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link active" href="{{ route('home') }}">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('products') }}">Products</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('aboutus') }}">About Us</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('Basket')}}">Cart</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <main>
    <!-- Square Container -->
    <div class="square-container">
      <div class="basket-container">
        <h1>Your Basket</h1>

        @if(session('cart'))
          <form action="{{ route('cart.update') }}" method=POST>
            @csrf
            <table>
              <thead>
                <tr>
                  <th>Game</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach(session('cart') as $id => $details)
                  <tr>
                    <td>{{ $details['name'] }}</td>
                    <td>{{ $details['price'] }}</td>
                    <td>
                      <input type="number" name="quantities[{{ $id }}]" value="{{ $details['quantity'] }}" min="1">
                    </td>
                    <td>{{ $details['quantity'] * $details['price'] }}</td>
                    <td>
                      <form action="{{ route('cart.remove', $id) }}" method="POST">
                        @csrf
                        <button type="submit">Remove</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <button type="submit">Update Cart</button>
          </form> 

          <h3>Total: ${{ array_sum(array_map(function ($details) {
              return $details['quantity'] * $details['price'];
            }, session('cart'))) }}</h3>
        @else
            <p>Your cart is empty!</p>
        @endif

        <a href="{{ route('home') }}" class="btn">Continue Shopping</a>
        <a href="PaymentForm.html" class="btn">Proceed to Payment</a>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer>
    <p>© 2024 GameDen. All Rights Reserved.</p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>