<!DOCTYPE html>
<html lang="en">

@extends('layout')
@section('title','Products')
<head>
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
    position: relative;
    overflow: hidden; 
  }

  .game-card img {
    height: 310px; 
    object-fit: cover; 
    object-position: top; 
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
    padding: 10px;
    box-sizing: border-box;
    pointer-events: none; 
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
  }

  .cart-btn {
    background-color: #ff5733;
    color: white;
    border: none;
    z-index: 10; 
    position: relative; 
  }

  .cart-btn:hover {
    background-color: #c13d23;
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
  footer {
    background-color: black;
    color: white;
    padding: 20px;
    text-align: center;
    border: 2px solid white; /* Creates the box effect */
}
  </style>
</head>

@section('body')
  <!-- Main title for the page  -->
  <div class="container">
    <div class="main-title">Games</div>
  </div>

  <!-- Maain content seciton -->
  <div class="container">
    <!-- PS5 section -->
    <div id="ps5" class="category">
        <div class="category-title">PS5 Games</div>
        <div class="row row-cols-5">
          <!-- Game 1 -->
          <div class="col">
            <div class="card game-card">
            <img src="{{ asset('image/b04.jpg') }}" class="card-img-top" alt="PS5 Game">
              <div class="info-box">
                <h5>Call of Duty: Black Ops 6</h5>
                <p>Experience the thrilling action of Black Ops 6 with enhanced graphics and new campaigns.</p>
              </div>
              <div class="card-body">
                <h5 class="card-title">Call of Duty: Black Ops 6</h5>
                <div class="rating">
                  <span class="text-warning">⭐ 4.8</span>
                </div>
                <p class="card-text">£49.99</p>
                <button type="submit" class="btn cart-btn">Add to Cart</button>
              </div>
            </div>
          </div>
      
          <!-- Game 2 -->
          <div class="col">
            <div class="card game-card">
              <img src="{{ asset('image/return.jpg') }}" class="card-img-top" alt="Resident Evil PS5 Game">
              <div class="info-box">
                <h5>Resident Evil 4: Gold Edition</h5>
                <p>Survive the horrors with upgraded visuals and gameplay in this thrilling gold edition.</p>
              </div>
              <div class="card-body">
                <h5 class="card-title">Resident Evil 4: Gold Edition</h5>
                <div class="rating">
                  <span class="text-warning">⭐ 4.7</span>
                </div>
                <p class="card-text">£39.99</p>
                <button class="btn cart-btn">Add to Cart</button>
              </div>
            </div>
          </div>
      
          <!-- Game 3 -->
          <div class="col">
            <div class="card game-card">

              <img src="{{ asset('image/last.jpg') }}" class="card-img-top" alt="Last of Us PS5">
              <div class="info-box">
                <h5>The Last Of Us</h5>
                <p>The Last Of Us, Part 1.</p>
              </div>
              <div class="card-body">
                <h5 class="card-title">The Last of Us</h5>
                <div class="rating">
                  <span class="text-warning">⭐ 4.9</span>
                </div>
                <p class="card-text">£59.99</p>
                <button class="btn cart-btn">Add to Cart</button>
              </div>
            </div>
          </div>
      
          <!-- Game 4 -->
          <div class="col">
            <div class="card game-card">
              <img src="{{ asset('image/gta123.jpg') }}" class="card-img-top" alt="GTA PS5 Game">
              <div class="info-box">
                <h5>Grand Theft Auto V (GTA V)</h5>
                <p>Explore Los Santos in this critically acclaimed action-packed open-world game.</p>
              </div>
              <div class="card-body">
                <h5 class="card-title">Grand Theft Auto V (GTA V)</h5>
                <div class="rating">
                  <span class="text-warning">⭐ 4.6</span>
                </div>
                <p class="card-text">£29.99</p>
                <button class="btn cart-btn">Add to Cart</button>
              </div>
            </div>
          </div>
      
          <!-- Game 5 -->
          <div class="col">
            <div class="card game-card">
              <img src="{{ asset('image/mine.jpg') }}" class="card-img-top" alt="Minecraft PS5 Game">
              <div class="info-box">
                <h5>Minecraft (PS5 Edition)</h5>
                <p>Unleash your creativity and build limitless worlds in Minecraft's PS5 Edition.</p>
              </div>
              <div class="card-body">
                <h5 class="card-title">Minecraft (PS5 Edition)</h5>
                <div class="rating">
                  <span class="text-warning">⭐ 4.5</span>
                </div>
                <p class="card-text">£44.99</p>
                <button class="btn cart-btn">Add to Cart</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      
      
      <!-- xbox section -->

<div id="xbox" class="category">
<div class="category-title">Xbox Games</div>
<div class="row row-cols-5">
<!-- Game 1 -->
<div class="col">
 <div class="card game-card">
  <img src="{{ asset('image/xbox1.jpg') }}" class="card-img-top" alt="Xbox Game">
   <div class="info-box">
    <h5>Skull Island: Rise of Kong</h5>
     <p>Embark on an epic journey to uncover the mysteries of Skull Island as the mighty Kong.</p>
      </div>
        <div class="card-body">
         <h5 class="card-title">Skull Island: Rise of Kong</h5>
          <div class="rating">
           <span class="text-warning">⭐ 4.9</span>
            </div>
             <p class="card-text">£54.99</p>
              <button class="btn cart-btn">Add to Cart</button>
               </div>
                </div>
                  </div>
      
          <!-- Game 2 -->
          <div class="col">
            <div class="card game-card">
              <img src="{{ asset('image/xbox2.jpg') }}" class="card-img-top" alt="Xbox Game">
              <div class="info-box">
                <h5>Hogwarts Legacy</h5>
                <p>Experience life as a student at Hogwarts in this magical open-world adventure.</p>
              </div>
              <div class="card-body">
                <h5 class="card-title">Hogwarts Legacy</h5>
                <div class="rating">
                  <span class="text-warning">⭐ 4.8</span>
                </div>
                <p class="card-text">£49.99</p>
                <button class="btn cart-btn">Add to Cart</button>
              </div>
            </div>
          </div>
      
          <!-- Game 3 -->
          <div class="col">
            <div class="card game-card">
              <img src="{{ asset('image/halo.jpg') }}" class="card-img-top" alt="Halo Game">
              <div class="info-box">
                <h5>Halo Infinite</h5>
                <p>Join Master Chief in the latest chapter of the Halo saga with epic battles.</p>
              </div>
              <div class="card-body">
                <h5 class="card-title">Halo Infinite</h5>
                <div class="rating">
                  <span class="text-warning">⭐ 4.7</span>
                </div>
                <p class="card-text">£59.99</p>
                <button class="btn cart-btn">Add to Cart</button>
              </div>
            </div>
          </div>
      
          <!-- Game 4 -->
          <div class="col">
            <div class="card game-card">
              <img src="{{ asset('image/xbox4.jpg') }}" class="card-img-top" alt="Xbox Game">
              <div class="info-box">
                <h5>Goat Simulator 3</h5>
                <p>Unleash chaos in this hilarious and over-the-top goat simulation game.</p>
              </div>
              <div class="card-body">
                <h5 class="card-title">Goat Simulator 3</h5>
                <div class="rating">
                  <span class="text-warning">⭐ 4.5</span>
                </div>
                <p class="card-text">£39.99</p>
                <button class="btn cart-btn">Add to Cart</button>
              </div>
            </div>
          </div>
      
          <!-- Game 5 -->
          <div class="col">
            <div class="card game-card">
              <img src="{{ asset('image/xbox5.jpg') }}" class="card-img-top" alt="Xbox Game">
              <div class="info-box">
                <h5>Starship Troopers: Extermination</h5>
                <p>Defend humanity from alien threats in this action-packed sci-fi shooter.</p>
              </div>
              <div class="card-body">
                <h5 class="card-title">Starship Troopers</h5>
                <div class="rating">
                  <span class="text-warning">⭐ 4.6</span>
                </div>
                <p class="card-text">£44.99</p>
                <button class="btn cart-btn">Add to Cart</button>
              </div>
            </div>
          </div>
        </div>
      </div>

    <!-- Nintendo section -->
    <div id="nintendo" class="category">
        <div class="category-title">Nintendo Games</div>
        <div class="row row-cols-5">
          <!-- Game 1 -->
          <div class="col">
            <div class="card game-card">
              <img src="{{ asset('image/nintendo1.jpg') }}" class="card-img-top" alt="Nintendo Game">
              <div class="info-box">
                <h5>Super Mario Odyssey</h5>
                <p>Embark on an epic adventure across various worlds with Mario and his new companion, Cappy.</p>
              </div>
              <div class="card-body">
                <h5 class="card-title">Super Mario Odyssey</h5>
                <div class="rating">
                  <span class="text-warning">⭐ 4.9</span>
                </div>
                <p class="card-text">£49.99</p>
                <button class="btn cart-btn">Add to Cart</button>
              </div>
            </div>
          </div>
      
          <!-- Game 2 -->
          <div class="col">
            <div class="card game-card">
              <img src="{{ asset('image/nintendo2.jpg') }}" class="card-img-top" alt="Nintendo Game">
              <div class="info-box">
                <h5>The Legend of Zelda:</h5>
                <p>Explore a vast open world as Link and uncover the mysteries of Hyrule in this breathtaking adventure.</p>
              </div>
              <div class="card-body">
                <h5 class="card-title">The Legend of Zelda</h5>
                <div class="rating">
                  <span class="text-warning">⭐ 4.8</span>
                </div>
                <p class="card-text">£59.99</p>
                <button class="btn cart-btn">Add to Cart</button>
              </div>
            </div>
          </div>
      
          <!-- Game 3 -->
          <div class="col">
            <div class="card game-card">
              <img src="{{ asset('image/nintendo3.jpg') }}" class="card-img-top" alt="Nintendo Game">
              <div class="info-box">
                <h5>Carnival Games</h5>
                <p>Step right up and enjoy a variety of exciting mini-games in this fun-filled carnival adventure.</p>
              </div>
              <div class="card-body">
                <h5 class="card-title">Carnival Games</h5>
                <div class="rating">
                  <span class="text-warning">⭐ 4.3</span>
                </div>
                <p class="card-text">£29.99</p>
                <button class="btn cart-btn">Add to Cart</button>
              </div>
            </div>
          </div>
      
          <!-- Game 4 -->
          <div class="col">
            <div class="card game-card">
              <img src="{{ asset('image/nintendo4.jpg') }}" class="card-img-top" alt="Nintendo Game">
              <div class="info-box">
                <h5>Splatoon 3</h5>
                <p>Jump into the action-packed ink-splatting fun in this competitive multiplayer shooter.</p>
              </div>
              <div class="card-body">
                <h5 class="card-title">Splatoon 3</h5>
                <div class="rating">
                  <span class="text-warning">⭐ 4.6</span>
                </div>
                <p class="card-text">£39.99</p>
                <button class="btn cart-btn">Add to Cart</button>
              </div>
            </div>
          </div>
      
          <!-- Game 5 -->
          <div class="col">
            <div class="card game-card">
              <img src="{{ asset('image/nintendo5.jpg') }}" class="card-img-top" alt="Nintendo Game">
              <div class="info-box">
                <h5>Mario Kart 8 Deluxe</h5>
                <p>Race against your friends and family in the ultimate Mario Kart experience, featuring all-new tracks.</p>
              </div>
              <div class="card-body">
                <h5 class="card-title">Mario Kart 8 Deluxe</h5>
                <div class="rating">
                  <span class="text-warning">⭐ 4.8</span>
                </div>
                <p class="card-text">£44.99</p>
                <button class="btn cart-btn">Add to Cart</button>
              </div>
            </div>
          </div>
        </div>
      </div>

    <!-- ps4 section -->
    <div id="PS4 Games" class="category">
      <div class="category-title">PS4 Games</div>
      <div class="row row-cols-5">
        <div class="col">
          <div class="card game-card">
            <div class="image-wrapper">
              <img src="{{ asset('image/ps4.jpg') }}" class="card-img-top" alt="The Last of Us Part II">
              <div class="info-box">
                <h5>The Last of Us Part II</h5>
                <p>Experience an emotionally charged journey in a post-apocalyptic world filled with danger and moral challenges.</p>
              </div>
            </div>
            <div class="card-body">
              <h5 class="card-title">The Last of Us Part II</h5>
              <p class="card-text">£36.99</p>
              <button class="btn cart-btn">Add to Cart</button>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card game-card">
            <div class="image-wrapper">
              <img src="{{ asset('image/border.jpg') }}" class="card-img-top" alt="Borderlands 3">
              <div class="info-box">
                <h5>Borderlands 3</h5>
                <p>The chaotic looter-shooter returns with explosive action, outrageous humor, and endless loot.</p>
              </div>
            </div>
            <div class="card-body">
              <h5 class="card-title">Borderlands 3</h5>
              <p class="card-text">£42.99</p>
              <button class="btn cart-btn">Add to Cart</button>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card game-card">
            <div class="image-wrapper">
              <img src="{{ asset('image/sniper.jpg') }}" class="card-img-top" alt="Sniper Elite 4">
              <div class="info-box">
                <h5>Sniper Elite 4</h5>
                <p>Engage in tactical combat as an elite sniper during World War II. Master stealth and precision to defeat your enemies.</p>
              </div>
            </div>
            <div class="card-body">
              <h5 class="card-title">Sniper Elite 4</h5>
              <p class="card-text">£51.99</p>
              <button class="btn cart-btn">Add to Cart</button>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card game-card">
            <div class="image-wrapper">
              <img src="{{ asset('image/blackop.jpg') }}" class="card-img-top" alt="Call of Duty: Cold War">
              <div class="info-box">
                <h5>Call of Duty: Cold War</h5>
                <p>Step into the Cold War era with intense multiplayer, Zombies mode, and a gripping campaign full of espionage.</p>
              </div>
            </div>
            <div class="card-body">
              <h5 class="card-title">Call of Duty: Cold War</h5>
              <p class="card-text">£57.99</p>
              <button class="btn cart-btn">Add to Cart</button>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card game-card">
            <div class="image-wrapper">
              <img src="{{ asset('image/jedi.jpg') }}" class="card-img-top" alt="Star Wars Jedi: Fallen Order">
              <div class="info-box">
                <h5>Star Wars Jedi: Fallen Order</h5>
                <p>Embark on an epic journey as a Jedi Padawan on the run from the Empire. Explore, fight, and solve puzzles in a galaxy far, far away.</p>
              </div>
            </div>
            <div class="card-body">
              <h5 class="card-title">Star Wars Jedi: Fallen Order</h5>
              <p class="card-text">£49.99</p>
              <button class="btn cart-btn">Add to Cart</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    

    <!-- pc section -->
    <div id="pc" class="category">
  <div class="category-title">PC Games</div>
  <div class="row row-cols-5">
    <div class="col">
      <div class="card game-card">
        <div class="image-wrapper">
          <img src="{{ asset('image/pc.jpg') }}" class="card-img-top" alt="PC Game">
          <div class="info-box">
            <h5>Cyberpunk 2077</h5>
            <p>Immerse yourself in a dystopian world with futuristic technology, epic quests, and a gripping narrative.</p>
          </div>
        </div>
        <div class="card-body">
          <h5 class="card-title">Cyberpunk 2077</h5>
          <p class="card-text">£19.99</p>
          <button class="btn cart-btn">Add to Cart</button>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card game-card">
        <div class="image-wrapper">
          <img src="{{ asset('image/tomb.jpg') }}" class="card-img-top" alt="Tomb Raider">
          <div class="info-box">
            <h5>Shadow of the Tomb Raider</h5>
            <p>Join Lara Croft on her most challenging adventure yet, uncovering ancient mysteries and fighting to save the world.</p>
          </div>
        </div>
        <div class="card-body">
          <h5 class="card-title">Shadow of the Tomb Raider</h5>
          <p class="card-text">£25.99</p>
          <button class="btn cart-btn">Add to Cart</button>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card game-card">
        <div class="image-wrapper">
          <img src="{{ asset('image/gear.jpg') }}" class="card-img-top" alt="Gears of War">
          <div class="info-box">
            <h5>Gears 5</h5>
            <p>Experience the next chapter in the epic Gears of War saga with intense action, thrilling story, and multiplayer modes.</p>
          </div>
        </div>
        <div class="card-body">
          <h5 class="card-title">Gears 5</h5>
          <p class="card-text">£34.99</p>
          <button class="btn cart-btn">Add to Cart</button>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card game-card">
        <div class="image-wrapper">
          <img src="{{ asset('image/gta.jpg') }}" class="card-img-top" alt="GTA V">
          <div class="info-box">
            <h5>Grand Theft Auto V</h5>
            <p>Explore the vast open world of Los Santos with gripping missions, endless customization, and an immersive storyline.</p>
          </div>
        </div>
        <div class="card-body">
          <h5 class="card-title">Grand Theft Auto V</h5>
          <p class="card-text">£29.99</p>
          <button class="btn cart-btn">Add to Cart</button>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card game-card">
        <div class="image-wrapper">
          <img src="{{ asset('image/war.jpg') }}" class="card-img-top" alt="Call of Duty">
          <div class="info-box">
            <h5>Call of Duty: Modern Warfare</h5>
            <p>Engage in intense battles in this thrilling modern military shooter, featuring a cinematic campaign and multiplayer action.</p>
          </div>
        </div>
        <div class="card-body">
          <h5 class="card-title">Call of Duty: Modern Warfare</h5>
          <p class="card-text">£39.99</p>
          <button class="btn cart-btn">Add to Cart</button>
        </div>
      </div>
    </div>
  </div>
  
</div>

<!-- Footer -->

<footer class="py-4">
    <div class="footer">
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

@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="script.js"></script>
  <script>
(function(){if(!window.chatbase||window.chatbase("getState")!=="initialized"){window.chatbase=(...arguments)=>{if(!window.chatbase.q){window.chatbase.q=[]}window.chatbase.q.push(arguments)};window.chatbase=new Proxy(window.chatbase,{get(target,prop){if(prop==="q"){return target.q}return(...args)=>target(prop,...args)}})}const onLoad=function(){const script=document.createElement("script");script.src="https://www.chatbase.co/embed.min.js";script.id="9PWNMB1p2CzJaFsLkUCRE";script.domain="www.chatbase.co";document.body.appendChild(script)};if(document.readyState==="complete"){onLoad()}else{window.addEventListener("load",onLoad)}})();
</script>

