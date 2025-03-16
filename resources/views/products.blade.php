<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GameDen - Your Gaming Paradise</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <style>
    
    body { 
    background-image: url("{{ asset('image/background.gif') }}"); 
    background-size: cover; 
    background-repeat: no-repeat; 
    background-attachment: fixed; 
    background-position: center; 
    color: white; 
    overflow-x: hidden;
}

.game-card {
    width: 200px; 
    height: 450px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    position: relative;
    overflow: hidden;
    border-radius: 15px;
    margin:20px;
    box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.4);
    transition: transform 0.3s ease;
    padding: 15px; 
    background-color: rgba(255, 255, 255, 0.8);
}

.game-card:hover {
    transform: scale(1.05);
}

.game-card img {
    height: 250px; 
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
    margin-top: 50px;
    margin-bottom: 10px;
    font-weight: bold;
    font-size: 2rem;
    text-transform: uppercase;
    text-align: center;
    letter-spacing: 1px;
}

.cart-btn {
    background-color:rgb(236, 89, 56);
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
    background-color:rgb(248, 45, 4);
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
    font-size: 15px; 
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
  @include('include.header')

  <!-- Main title for the page  -->
<div class="container">
    <div class="main-title">Games</div>
    
    <!-- Filter Form -->
<div class="row">
    <div class="col-md-3">
        <!-- Toggle Filters Button -->
        <button id="filterToggle" class="btn btn-outline-primary w-100 mb-3">
            <i class="fas fa-filter"></i> Filters
        </button>

        <div class="filter-form p-3 rounded shadow-sm d-none" id="filterOptions" style="background-color: white;">
            <form id="filterForm">
                <div class="mb-3">
                    <label for="platform" class="form-label fw-bold">Platform</label>
                    <select id="platform" class="form-select">
                        <option value="">Select Platform</option>
                        <option value="PS5">PS5</option>
                        <option value="Xbox">Xbox</option>
                        <option value="Nintendo Switch">Nintendo Switch</option>
                        <option value="PS4">PS4</option>
                        <option value="PC">PC</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="releaseDate" class="form-label fw-bold">Release Date</label>
                    <select id="releaseDate" class="form-select">
                        <option value="">Select Release Date</option>
                        <option value="oldest">Oldest</option>
                        <option value="newest">Newest</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="priceRange" class="form-label fw-bold">Price Range</label>
                    <input type="range" id="priceRange" class="form-range" min="0" max="100" step="1" value="50">
                    <div class="text-muted">Price: £<span id="priceValue">50</span></div>
                </div>

                <button type="submit" class="btn btn-primary w-100">Apply Filters</button>
            </form>
        </div>
    </div>
</div>
            
</div>

<!-- Main content section for games -->
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
                    <div class="rating">
                        <span class="text-warning">⭐ 4.5</span> <!-- Static rating for now -->
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
                        <span class="text-warning">⭐ 4.8</span> <!-- Static rating for now -->
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



 <!-- Footer -->
 <footer class="py-4">
    <div class="container text-center">
      <p>© 2024 GameDen. All Rights Reserved.</p>
      <p>
        <a href="#" class="text-white me-2">Privacy Policy</a> | 
        <a href="#" class="text-white ms-2">Terms of Service</a>
        

      </p>
      <div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  </footer>

  <!-- chatot -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="script.js"></script>
  <script>
(function(){if(!window.chatbase||window.chatbase("getState")!=="initialized"){window.chatbase=(...arguments)=>{if(!window.chatbase.q){window.chatbase.q=[]}window.chatbase.q.push(arguments)};window.chatbase=new Proxy(window.chatbase,{get(target,prop){if(prop==="q"){return target.q}return(...args)=>target(prop,...args)}})}const onLoad=function(){const script=document.createElement("script");script.src="https://www.chatbase.co/embed.min.js";script.id="9PWNMB1p2CzJaFsLkUCRE";script.domain="www.chatbase.co";document.body.appendChild(script)};if(document.readyState==="complete"){onLoad()}else{window.addEventListener("load",onLoad)}})();
</script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
        const filterToggle = document.getElementById("filterToggle");
        const filterOptions = document.getElementById("filterOptions");
        const priceRange = document.getElementById("priceRange");
        const priceValue = document.getElementById("priceValue");

        // Toggle filter options using Bootstrap classes
        filterToggle.addEventListener("click", function () {
            filterOptions.classList.toggle("d-none");
            filterOptions.classList.toggle("fade-in");
        });

        // Update price range display
        priceRange.addEventListener("input", function () {
            priceValue.textContent = priceRange.value;
        });
    });

    // Add CSS animations dynamically
    const style = document.createElement('style');
    style.innerHTML = `
        .fade-in {
            animation: fadeIn 0.3s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-5px); }
            to { opacity: 1; transform: translateY(0); }
        }
    `;
    document.head.appendChild(style);
</script>
</body>
</html>
