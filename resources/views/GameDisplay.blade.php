<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $game->title }} - GameDen</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="{{ asset('css/game-display.css') }}" rel="stylesheet">
</head>

<body>
  <!-- Navbar -->
  @include('include.header')

  <!-- Main Content -->
  <main class="container">
    <div class="row game-container">
      <div class="col-md-5">
        <img src="{{ asset('image/' . ($game->image ?? 'placeholder.jpg')) }}" class="game-image" alt="{{ $game->title }}">
      </div>
      <div class="col-md-7">
        <h1 class="game-title">{{ $game->title }}</h1>
        <p class="game-price">£{{ number_format($game->price, 2) }}</p>
        
        <div class="game-details">
          <p><span class="detail-label">Platform:</span> {{ $game->platform }}</p>
          <p><span class="detail-label">Release Date:</span> {{ date('F j, Y', strtotime($game->releasedate)) }}</p>
          <!-- Removed stock display -->
        </div>
        
        <div class="game-description">
          <h5 class="detail-label">Description:</h5>
          <p>{{ $game->description }}</p>
        </div>
        
        <form action="{{ route('cart.add') }}" method="POST">
          @csrf
          <input type="hidden" name="id" value="{{ $game->id }}">
          <input type="hidden" name="name" value="{{ $game->title }}">
          <input type="hidden" name="price" value="{{ $game->price }}">
          <button type="submit" class="btn cart-btn" {{ $game->stock <= 0 ? 'disabled' : '' }}>
            {{ $game->stock > 0 ? 'Add to Cart' : 'Out of Stock' }}
          </button>
        </form>
        
        <a href="{{ route('products') }}" class="btn btn-secondary mt-3">Back to Games</a>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer>
    <div class="container">
      <p>© 2024 GameDen. All Rights Reserved.</p>
      <div class="social-links">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-discord"></i></a>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>