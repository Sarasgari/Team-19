<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GameDen - Your Gaming Paradise</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="{{ asset('css/products.css') }}" rel="stylesheet">
  
</head>

<body>

    <style> 
    body { 
    background-image: url("{{ asset('image/background.png') }}");
    background-size: cover; 
    background-repeat: no-repeat; 
    background-attachment: fixed; 
    background-position: center; 
    color: white; 
    overflow-x: hidden;
    }
</style>
   <!-- Navbar -->
  @include('include.header')

  <!-- Sidebar -->
<div class="sidebar">
    <!-- Search Bar -->
    <input type="text" class="form-control" id="searchBar" placeholder="Search Games..." onkeyup="searchGames()">

    <!-- Sort by -->
    <div>
        <label for="sortBy">Sort by:</label>
        <div class="btn-group" role="group" aria-label="Sort by">
            <button type="button" class="btn btn-light" id="sortNewest" onclick="sortBy('newest')">Newest</button>
            <button type="button" class="btn btn-light" id="sortOldest" onclick="sortBy('oldest')">Oldest</button>
        </div>
    </div>

    <!-- Filter by Category -->
    <div class="filter-section">
        <label for="categoryFilter">Category:</label>
        <select class="form-control" id="categoryFilter">
            <option value="PS5">PS5</option>
            <option value="Xbox">Xbox</option>
            <option value="Nintendo Switch">Nintendo Switch</option>
            <option value="PC">PC</option>
            <option value="PS4">PS4</option>
        </select>
    </div>

    <!-- Price Filter -->
    <div class="filter-section">
        <label for="priceRange">Price Range:</label>
        <input type="range" class="form-range" id="priceRange" min="0" max="100" step="1" value="50">
        <span id="priceValue">£50</span>
    </div>

    <!-- Apply Filters Button -->
    <button class="btn apply-btn" onclick="applyFilters()">Apply Filters</button>
</div>

  <!-- Main title for the page  -->
<div class="main-content" style="margin-top: 50px;">
    
   
<!-- Main content section for games -->
  <!--PS5 section--> 

  <div id="ps5" class="category" style="margin-top: 20px;">
    <div class="category-title">PS5 Games</div>

    <div class="row row-cols-4">
        @foreach ($games->where('platform', 'PS5') as $game)
        <div class="col">
            <div class="card game-card">
                
                <img src="{{ asset('image/' . ($game->image ?? 'placeholder.jpg')) }}" class="card-img-top" alt="Image of {{ $game->title }}" loading="lazy">
                
                <div class="info-box">
                    <h3>{{ $game->title }}</h3>
                    <p>{{ $game->description }}</p>
                </div>

                <div class="card-body">
                    <h3 class="card-title">{{ $game->title }}</h3>
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
    
    <div class="row row-cols-4">
     @foreach ($games->where('platform', 'Xbox') as $game)
        <div class="col">
            <div class="card game-card">
            
                <img src="{{ asset('image/' . ($game->image ?? 'placeholder.jpg')) }}" class="card-img-top" alt="Image of {{ $game->title }}" loading="lazy">
                
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

    <div class="row row-cols-4">
        @foreach ($games->where('platform', 'Nintendo Switch') as $game)
        <div class="col">
            <div class="card game-card">
              
                <img src="{{ asset('image/' . ($game->image ?? 'placeholder.jpg')) }}" class="card-img-top" alt="Image of {{ $game->title }}">
                
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

    <div class="row row-cols-4 g-3">
        @foreach ($games->where('platform', 'PS4') as $game)
        <div class="col">
            <div class="card game-card">
                <div class="image-wrapper">
        
                    <img src="{{ asset('image/' . ($game->image ?? 'placeholder.jpg')) }}" class="card-img-top" alt="Image of {{ $game->title }}">
                    
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

    <div class="row row-cols-4 g-3">
        @foreach ($games->where('platform', 'PC') as $game)
        <div class="col">
            <div class="card game-card">
                <div class="image-wrapper">
                    
                    <img src="{{ asset('image/' . ($game->image ?? strtolower(str_replace(' ', '_', $game->title)) . '.jpg')) }}" class="card-img-top" alt="Image of {{ $game->title }}" loading="lazy">

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

<!-- Review Section -->
<div class="container mt-5">
    <div class="p-4 rounded" style="background-color: rgba(0, 0, 0, 0.65); color: white;">
        <h3 class="mb-4">Leave a Review</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @auth
            <form action="{{ route('reviews.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="rating" class="form-label">Rating:</label>
                    <select class="form-select" name="rating" required>
                        <option value="5">⭐⭐⭐⭐⭐ - Excellent</option>
                        <option value="4">⭐⭐⭐⭐ - Very Good</option>
                        <option value="3">⭐⭐⭐ - Good</option>
                        <option value="2">⭐⭐ - Poor</option>
                        <option value="1">⭐ - Very Bad</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="review_text" class="form-label">Your Review:</label>
                    <textarea class="form-control" name="review_text" rows="3" required></textarea>
                </div>

                <button type="submit" class="btn btn-warning fw-bold">Submit Review</button>
            </form>
        @else
            <p><a href="{{ route('login') }}" class="text-warning fw-bold">Login</a> to leave a review.</p>
        @endauth

        <hr class="border-light">

        <h4 class="mt-4">Customer Reviews</h4>
        @forelse($reviews as $review)
            <div class="card mb-3 text-dark">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $review->user->name ?? 'Anonymous' }} 
                        - {{ str_repeat('⭐', $review->rating) }}
                    </h5>
                    <p class="card-text">{{ $review->review_text }}</p>
                    <p class="text-muted">Posted on {{ $review->created_at->format('F d, Y') }}</p>
                </div>
            </div>
        @empty
            <p>No reviews yet. Be the first to leave one!</p>
        @endforelse

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{ $reviews->links() }}
        </div>
    </div>
</div>


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
    <div id="google_translate_element"></div>
  </div>


<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
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
    style.innerHTML = 
        .fade-in {
            animation: fadeIn 0.3s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-5px); }
            to { opacity: 1; transform: translateY(0); }
        }
    ;
    document.head.appendChild(style);
</script>
<script>
        // JavaScript functions for handling search and filter
        function searchGames() {
            const searchQuery = document.getElementById('searchBar').value.toLowerCase();
            const games = document.querySelectorAll('.game-card');
            games.forEach(function (game) {
                const title = game.querySelector('.card-title').textContent.toLowerCase();
                if (title.includes(searchQuery)) {
                    game.style.display = '';
                } else {
                    game.style.display = 'none';
                }
            });
        }

        function applyFilters() {
            const category = document.getElementById('categoryFilter').value;
            const price = document.getElementById('priceRange').value;
            const sortBy = document.getElementById('sortBy').value;

            // Logic to apply category, price, and sorting filters
            console.log(`Category: ${category}, Price: £${price}, Sort: ${sortBy}`);
        }

        document.getElementById('priceRange').addEventListener('input', function() {
            document.getElementById('priceValue').textContent = '£' + this.value;
        });
    </script>
</body>
</html>
