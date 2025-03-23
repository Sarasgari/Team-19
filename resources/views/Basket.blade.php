<!--
  Developer: Abdulrahman Mostafa, Mohammed Rahman
  University ID: 2300466694, 220083681
  Function: Enhanced basket page holds the items and proceeds to the payment form 
-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Your Basket | GameDen</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/Basket.css') }}">
</head>
<body>
  
@include('include.header')

  <!-- Main Content -->
  <main>
    <div class="background">
      <!-- Basket Container -->
      <div class="basket-container">
        <h1><i class="fas fa-shopping-cart me-3"></i>Your Basket</h1>

        @if(count($cart) > 0)
  <form action="{{ route('cart.update') }}" method="POST">
    @csrf
    <table class="table">
      <thead class="table-dark">
        <tr>
          <th>Game</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Total</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($cart as $key => $item)
          <tr>
            <td class="fw-bold">{{ $item->game->title ?? $item['title'] }}</td>
            <td>£{{ number_format($item->game->price ?? $item['price'], 2) }}</td>
            <td>
              <div class="quantity-control">
                <input type="number" 
                      name="quantities[{{ Auth::check() ? $item->id : $key }}]" 
                      value="{{ $item->quantity ?? $item['quantity'] }}" 
                      min="1" 
                      max="{{ $item->game->stock ?? 99 }}" 
                      class="form-control" style="width: 70px;">
              </div>
            </td>
            <td class="fw-bold">£{{ number_format(($item->game->price ?? $item['price']) * ($item->quantity ?? $item['quantity']), 2) }}</td>
            <td>
              <button type="button" class="btn btn-danger btn-sm" 
                      onclick="removeItem('{{ Auth::check() ? $item->id : $key }}')">
                <i class="fas fa-trash-alt me-1"></i> Remove
              </button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    
    <div class="d-flex justify-content-between align-items-center">
      <button type="submit" class="btn btn-primary">
        <i class="fas fa-sync-alt me-2"></i>Update Cart
      </button>
      <h3 class="mb-0">Total: <span class="text-success">£{{ number_format(collect($cart)->sum(fn($item) => ($item->game->price ?? $item['price']) * ($item->quantity ?? $item['quantity'])), 2) }}</span></h3>
    </div>
  </form>

  <!-- Separate form for item removal -->
  <form id="remove-form" action="" method="POST" style="display: none;">
    @csrf
  </form>

  <script>
    <!-- In your Blade template -->

  </script>
@else
  <p class="text-danger"><i class="fas fa-exclamation-circle me-2"></i>Your cart is empty!</p>
@endif

        <div class="action-buttons mt-4">
          <a href="{{ route('products') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Continue Shopping
          </a>
          <a href="{{ route('cart.checkout') }}" class="btn btn-success @if(count($cart) == 0) disabled @endif">
            <i class="fas fa-credit-card me-2"></i>Proceed to Payment
          </a>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer>
  <div class="container">
    <p><i class="fas fa-gamepad me-2"></i>© 2024 GameDen. All Rights Reserved.</p>
    <div class="social-links mt-3">
      <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
      <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
      <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
      <a href="#" aria-label="Discord"><i class="fab fa-discord"></i></a>
    </div>
  </div>
</footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>