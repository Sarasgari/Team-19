<!--
  Developer: Abdulrahman Mostafa, Mohammed Rahman
  University ID: 2300466694, 220083681
  Function: Basket page holds the items and proceeds to the payment form 
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
      <a class="navbar-brand" href="#">
        <img src="{{ asset('image/logo.png') }}" alt="GameDen Logo" class="d-inline-block align-text-top" style="height: 40px;">
        GameDen
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="{{route('home')}}">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('products') }}">Products</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('aboutus') }}">About Us</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('contactus') }}">Contact</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Register</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <main>
    <div class="background">
     <!-- Basket Container -->
<div class="basket-container">
    <h1>Your Basket</h1>

    @if(collect($cart)->count() > 0)
        <form action="{{ route('cart.update') }}" method="POST"> <!-- Fix route -->
            @csrf
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Game</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Stock</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $item)
                        <tr>
                            <td>{{ $item->game->title ?? $item['title'] }}</td>
                            <td>£{{ number_format($item->game->price ?? $item['price'], 2) }}</td>
                            <td>
                                <input type="number" name="quantities[{{ $item->id ?? $loop->index }}]" 
                                       value="{{ $item->quantity ?? $item['quantity'] }}" 
                                       min="1" 
                                       max="{{ $item->game->stock ?? 99 }}" 
                                       class="form-control" style="width: 70px;">
                            </td>
                            <td>{{ $item->game->stock ?? 'N/A' }}</td>
                            <td>£{{ number_format(($item->game->price ?? $item['price']) * ($item->quantity ?? $item['quantity']), 2) }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $item->id ?? $loop->index) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Update Cart</button>
        </form>

        <h3 class="mt-3">Total: £{{ number_format(collect($cart)->sum(fn($item) => ($item->game->price ?? $item['price']) * ($item->quantity ?? $item['quantity'])), 2) }}</h3>

    @else
        <p class="text-danger">Your cart is empty!</p>
    @endif

    <a href="{{ route('products') }}" class="btn btn-secondary">Continue Shopping</a>
    <a href="{{ route('cart.checkout') }}" class="btn btn-success">Proceed to Payment</a>
</div>

  </main>

  <!-- Footer -->
  <footer class="text-center p-3 mt-4 bg-dark text-white">
    <p>© 2024 GameDen. All Rights Reserved.</p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
