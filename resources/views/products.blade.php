<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GameDen - Your Gaming Paradise</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    
    body { 
    background-image: url("{{ asset('image/background.gif') }}"); 
    background-size: cover; 
    background-repeat: no-repeat; 
    background-attachment: fixed; 
    background-position: center; 
    color: white; 
}

.game-card {
    width: 280px; 
    height: auto;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    position: relative;
    overflow: hidden;
    border-radius: 8px;
    box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.4);
    transition: transform 0.3s ease;
    padding: 10px; 
}

.game-card:hover {
    transform: scale(1.05);
}

.game-card img {
    height: 280px; 
    object-fit: cover;
    transition: transform 0.3s ease;
}

.game-card:hover img {
    transform: scale(1.1); 
}

.info-box {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8); 
    color: white; 
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    opacity: 0; 
    transition: opacity 0.3s ease; 
    text-align: center;
    padding: 5px;
    box-sizing: border-box;
    pointer-events: none; 
    font-size: 0.8rem;
}

.game-card:hover .info-box {
    opacity: 1; 
    pointer-events: auto; 
}

.info-box h5 {
    margin: 10px 0;
    font-size: 1rem;
}

.info-box p {
    font-size: 0.9rem;
    line-height: 1.4;
}

.category-title {
    margin-top: 2rem;
    margin-bottom: 1rem;
    font-weight: bold;
    font-size: 1.5rem;
    text-transform: uppercase;
    text-align: center;
    letter-spacing: 1px;
}

.cart-btn {
    background-color: #ff5733;
    color: white;
    border: none;
    z-index: 10; 
    position: relative; 
    padding: 6px 12px;
    font-size: 0.85rem;
    font-weight: bold;
    border-radius: 5px;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.cart-btn:hover {
    background-color: #c13d23;
    transform: scale(1.05);
}

.main-title {
    text-align: center;
    margin-top: 2rem;
    margin-bottom: 2rem;
    font-size: 4rem; 
    font-weight: bold;
    color: white; 
    text-shadow: 3px 3px 5px black, -3px -3px 5px black; 
}

.game-card .card-title {
    font-size: 0.9rem; 
    font-weight: bold; 
    text-align: center; 
}

.card-body {
    flex-grow: 1;
    text-align: center; 
    position: relative; 
    z-index: 10; 
}




  </style>
</head>

<body>
   <!-- Navbar -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <div>
      <a class="navbar-brand" href="#">
        <img src="{{ asset('image/logo-removebg.png') }}" alt="GameDen" class="d-inline-block align-text-top" style="height: 40px;">
        GameDen
      </a>
    </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link active" href="{{ route('home') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('products') }}">Products</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('aboutus') }}">About Us</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('Basket') }}">Cart</a></li>

        </ul>
      </div>
    </div>
  </nav>

  <!-- Main title for the page  -->
  <div class="container">
    <div class="main-title">Games</div>
  </div>

  <!-- Main content seciton -->

  <!--PS5 section--> 

  <div id="ps5" class="category">
    <div class="category-title">PS5 Games</div>

    <div class="row row-cols-5">
        @foreach ($games->where('platform', 'PS5') as $game)
        <div class="col">
            <div class="card game-card">
                
                <img src="{{ asset('image/' . ($game->image ?? 'placeholder.jpg')) }}" class="card-img-top" alt="{{ $game->title }}">
                
                <div class="info-box">
                    <h5>{{ $game->title }}</h5>
                    <p>{{ $game->description }}</p>
                </div>

                <div class="card-body">
                    <h5 class="card-title">{{ $game->title }}</h5>
                    <p class="card-text">£{{ number_format($game->price, 2) }}</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $game->id }}">
                        <input type="hidden" name="name" value="{{ $game->title }}">
                        <input type="hidden" name="price" value="{{ $game->price }}">
                        <a href="{{ route('game.show', ['id' => $game->id]) }}" class="btn cart-btn">View Game</a>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

     
      
      <!-- xbox section -->

      <div id="xbox" class="category">
    <div class="category-title">Xbox Games</div>
    
    <div class="row row-cols-5">
        @foreach ($games->where('platform', 'Xbox') as $game)
        <div class="col">
            <div class="card game-card">
            
                <img src="{{ asset('image/' . ($game->image ?? 'placeholder.jpg')) }}" class="card-img-top" alt="{{ $game->title }}">
                
                <div class="info-box">
                    <h5>{{ $game->title }}</h5>
                    <p>{{ $game->description }}</p>
                </div>
                
                <div class="card-body">
                    <h5 class="card-title">{{ $game->title }}</h5>
                    <div class="rating">
                        <span class="text-warning">⭐ 4.6</span> <!-- Static rating for now -->
                    </div>
                    <p class="card-text">£{{ number_format($game->price, 2) }}</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $game->id }}">
                        <input type="hidden" name="name" value="{{ $game->title }}">
                        <input type="hidden" name="price" value="{{ $game->price }}">
                        <a href="{{ route('game.show', ['id' => $game->id]) }}" class="btn cart-btn">View Game</a>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>



    <!-- Nintendo section -->
    <div id="nintendo" class="category">
    <div class="category-title">Nintendo Games</div>

    <div class="row row-cols-5">
        @foreach ($games->where('platform', 'Nintendo Switch') as $game)
        <div class="col">
            <div class="card game-card">
              
                <img src="{{ asset('image/' . ($game->image ?? 'placeholder.jpg')) }}" class="card-img-top" alt="{{ $game->title }}">
                
                <div class="info-box">
                    <h5>{{ $game->title }}</h5>
                    <p>{{ $game->description }}</p>
                </div>
                
                <div class="card-body">
                    <h5 class="card-title">{{ $game->title }}</h5>
                    <div class="rating">
                        <span class="text-warning">⭐ 4.7</span> <!-- Static rating for now -->
                    </div>
                    <p class="card-text">£{{ number_format($game->price, 2) }}</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $game->id }}">
                        <input type="hidden" name="name" value="{{ $game->title }}">
                        <input type="hidden" name="price" value="{{ $game->price }}">
                        <a href="{{ route('game.show', ['id' => $game->id]) }}" class="btn cart-btn">View Game</a>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>



    <!-- ps4 section -->
    <div id="ps4" class="category">
    <div class="category-title">PS4 Games</div>

    <div class="row row-cols-5 g-3">
        @foreach ($games->where('platform', 'PS4') as $game)
        <div class="col">
            <div class="card game-card">
                <div class="image-wrapper">
        
                    <img src="{{ asset('image/' . ($game->image ?? 'placeholder.jpg')) }}" class="card-img-top" alt="{{ $game->title }}">
                    
                    <div class="info-box">
                        <h5>{{ $game->title }}</h5>
                        <p>{{ $game->description }}</p>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $game->title }}</h5>
                    <p class="card-text">£{{ number_format($game->price, 2) }}</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $game->id }}">
                        <input type="hidden" name="name" value="{{ $game->title }}">
                        <input type="hidden" name="price" value="{{ $game->price }}">
                        <a href="{{ route('game.show', ['id' => $game->id]) }}" class="btn cart-btn">View Game</a>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
      
        @for ($i = $games->where('platform', 'PS4')->count(); $i < 5; $i++)
        <div class="col"></div>
        @endfor
    </div>
</div>

    

    <!-- pc section -->
    <div id="pc" class="category">
    <div class="category-title">PC Games</div>

    <div class="row row-cols-5 g-3">
        @foreach ($games->where('platform', 'PC') as $game)
        <div class="col">
            <div class="card game-card">
                <div class="image-wrapper">
                    
                    <img src="{{ asset('image/' . ($game->image ?? strtolower(str_replace(' ', '_', $game->title)) . '.jpg')) }}" class="card-img-top" alt="{{ $game->title }}">

                    <div class="info-box">
                        <h5>{{ $game->title }}</h5>
                        <p>{{ $game->description }}</p>
                    </div>
                </div>

                <div class="card-body">
                    <h5 class="card-title">{{ $game->title }}</h5>
                    <p class="card-text">£{{ number_format($game->price, 2) }}</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $game->id }}">
                        <input type="hidden" name="name" value="{{ $game->title }}">
                        <input type="hidden" name="price" value="{{ $game->price }}">
                        <a href="{{ route('game.show', ['id' => $game->id]) }}" class="btn cart-btn">View Game</a>
                    </form>
                </div>
            </div>
        </div>
        @endforeach

        <!-- Fill empty spaces to balance the row -->
        @for ($i = $games->where('platform', 'PC')->count(); $i < 5; $i++)
        <div class="col"></div>
        @endfor
    </div>
</div>



<footer class="text-center p-3 mt-4 bg-dark text-white">
    <p>© 2024 GameDen. All Rights Reserved.</p>
  </footer>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

