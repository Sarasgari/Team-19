z<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $game->title }} - GameDen</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { 
      background-image: url("{{ asset('image/background.gif') }}"); 
      background-size: cover; 
      background-repeat: no-repeat; 
      background-attachment: fixed; 
      background-position: center; 
      color: white;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }
    
    main {
      flex: 1;
    }
    
    .game-container {
      background-color: rgba(0, 0, 0, 0.7);
      border-radius: 10px;
      padding: 30px;
      margin-top: 50px;
      margin-bottom: 50px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
    }
    
    .game-image {
      max-width: 100%;
      height: auto;
      border-radius: 5px;
      margin-bottom: 20px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }
    
    .game-title {
      font-size: 2.5rem;
      margin-bottom: 10px;
      color: #ff5733;
    }
    
    .game-price {
      font-size: 1.8rem;
      font-weight: bold;
      margin-bottom: 20px;
      color: #fff;
    }
    
    .game-description {
      font-size: 1.1rem;
      line-height: 1.6;
      margin-bottom: 30px;
    }
    
    .game-details {
      margin-bottom: 30px;
    }
    
    .detail-label {
      font-weight: bold;
      color: #ff5733;
    }
    
    .cart-btn {
      background-color: #ff5733;
      color: white;
      border: none;
      padding: 10px 25px;
      font-size: 1.1rem;
      font-weight: bold;
      border-radius: 5px;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }
    
    .cart-btn:hover {
      background-color: #c13d23;
      transform: scale(1.05);
    }

    footer {
      margin-top: auto;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="{{ asset('image/logo-removebg.png') }}" alt="GameDen" class="d-inline-block align-text-top" style="height: 40px;">
        GameDen
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('products') }}">Products</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('aboutus') }}">About Us</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('contactus') }}">Contact</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('Basket') }}">Cart</a></li>
        </ul>
      </div>
    </div>
  </nav>

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
  <footer class="text-center p-3 bg-dark text-white">
    <p>© 2024 GameDen. All Rights Reserved.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>