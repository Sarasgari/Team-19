<!--
  Developer: Sara Asgari
  University ID: 23034431
  Function: Home page is the first page a customer visits. Contains links to the producs and a login
-->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="refresh" content="300">
  <title>GameDen - Your Gaming Paradise</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<header>
<body>
  <!-- Navbar -->
  @include('include.header')
  
  <!-- Hero Section -->
  <section class="hero-section position-relative">
  
</script>

    <!-- Background Video -->
    <video class="hero-video" autoplay loop muted playsinline>
      <source src="{{ asset('image/herovideo.mp4') }}" type="video/mp4">
      Your browser does not support the video tag.
    </video>
  
    <!-- Hero Content -->
    <div class="hero-content text-center">
      <h1>Welcome to GameDen</h1>
      <p>Your one-stop shop for gaming greatness!</p>
      <a href="{{ route('game') }}" class="btn btn-primary btn-lg">Explore Games</a>
    </div>
  </section>

  
  <!-- Featured Games -->
  <section class="container my-5">
    <h2 class="text-center mb-4">Featured Games</h2>
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <img src="{{ asset('image/gta.jpg') }}" class="card-img-top" alt="Game 1">
          <div class="card-body">
            <h5 class="card-title">GTA V</h5>
            <p class="card-text">Get ready for an adventure like no other!</p>
            <a href="#" class="btn btn-secondary ">Learn More</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <img src="{{ asset('image/minecraft.jpg') }}" class="card-img-top" alt="Game 2">
          <div class="card-body">
            <h5 class="card-title">Minecraft</h5>
            <p class="card-text">The ultimate challenge awaits you.</p>
            <a href="#" class="btn btn-secondary">Learn More</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <img src="{{ asset('image/callof.jpg') }}" class="card-img-top" alt="Game 3">
          <div class="card-body">
            <h5 class="card-title">Call Of Duty Black ops 6</h5>
            <p class="card-text">Dive into an epic multiplayer experience.</p>
            <a href="#" class="btn btn-secondary">Learn More</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="slogan-section">
    <!--slogan-->
    <div >
      <h1>Your Escape Button from Reality</h1>
      <p>Why face reality when you can face dragons, zombies, or even a really tough quiz? GameDen is your ultimate escape — no life hacks required. Just pure gaming goodness, where your biggest problem is choosing which game to play next.</p>
    </div>
  </section>

  <!--game banners-->
  <section class="game-banners">
    <div id="gameCarousel" class="carousel slide" data-bs-ride="carousel">
      <!-- Carousel Indicators -->
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#gameCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#gameCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#gameCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
  
      <!-- Carousel Inner (Banners) -->
      <div class="carousel-inner">
        <!-- Banner 1 -->
        <div class="carousel-item active" style="background-image: url({{ asset('image/fallguy.png') }});">
          <div class="carousel-caption d-none d-md-block">
            <h2>Fall Guy</h2>
            <a href="#" class="btn">Play Now</a>
          </div>
        </div>
  
        <!-- Banner 2 -->
        <div class="carousel-item" style="background-image: url({{ asset('image/stumble.png') }});">
          <div class="carousel-caption d-none d-md-block">
            <h2>Stumble Guys</h2>
            <a href="#" class="btn">Play Now</a>
          </div>
        </div>
  
        <!-- Banner 3 -->
        <div class="carousel-item" style="background-image: url({{ asset('image/godofwar.jpg') }});">
          <div class="carousel-caption d-none d-md-block">
            <h2>God Of War</h2>
            <a href="#" class="btn">Play Now</a>
          </div>
        </div>
      </div>
  
      <!-- Carousel Controls -->
      <button class="carousel-control-prev" type="button" data-bs-target="#gameCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#gameCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>
<!--devices-->
<section class="available-devices">
  <div class="container">
    <h2 class="text-center">Available on Your Favorite Devices</h2>
    <div class="device-icons">
      <img src="{{ asset('image/ps5.png') }}" alt="Available on Android">
      <img src="{{ asset('image/xbox.png') }}" alt="Available on iPad">
      <img src="{{ asset('image/pc.png') }}" alt="Available on iPhone">
      <img src="{{ asset('image/nintendo.png') }}" alt="Available on Android">
    </div>
  </div>
</section>


<!-- FAQ Section -->
<div class="faq-section">
  <h2>Ask & Answer</h2>

  <!-- FAQ Item 1 -->
  <div class="accordion" id="faqAccordion">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          What is GameDen?
          
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
          GameDen is your online escape from reality. It's like Netflix, but with less drama and more explosions. Welcome to your new addiction.
        </div>
      </div>
    </div>

    <!-- FAQ Item 2 -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          How do I create an account?
          
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
          Click on the "Sign Up" button at the top right corner. Fill in the details. And boom, you’re in! Warning: Procrastination levels may increase.
        </div>
      </div>
    </div>

    
    <!-- FAQ Item 3 -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Can I return a purchased game?
        </button>
      </h2>
      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
          Yes, you can return a purchased game within 14 days if it meets our return policy criteria. But good luck explaining that your “epic defeat” wasn’t your fault.
        </div>
      </div>
    </div>
    <!--4-->
    
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingFour">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseTwo">
          How do I stop playing and get some sleep?
          
        </button>
      </h2>
      <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
          There is no escape. The games will call you back in your dreams. But seriously, set a timer and pretend you're in a game with a "Game Over" screen.
        </div>
      </div>
    </div>
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

  
</body>
</html>
