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

  <!-- Main title for the page  -->
<div class="container" style="margin-top: 150px;">
    <div class="main-title">Games</div>
   
<!-- Main content section for games -->
  <!--PS5 section--> 

  <div id="ps5" class="category" style="margin-top: 20px;">
    <div class="category-title">PS5 Games</div>

    <div class="row row-cols-5">
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
    
    <div class="row row-cols-5">
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

    <div class="row row-cols-5">
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

    <div class="row row-cols-5 g-3">
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

    <div class="row row-cols-5 g-3">
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
</body>
</html>
