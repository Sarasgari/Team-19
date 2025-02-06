<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Games</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .carousel-item img {
            width: 100%;
            height: auto;
        }
        .game-item {
            margin-bottom: 30px;
        }
        .game-demo {
            margin-top: 20px;
        }
        .like-button {
            cursor: pointer;
            font-size: 1.2em;
            color: #007bff;
        }
        .like-button:hover {
            text-decoration: underline;
        }
        .marquee-section {
            background: #f8f9fa;
            padding: 30px 30px;
        }
        .marquee-container {
            overflow: hidden;
            position:relative;
        }
        .marquee-images {
            display: flex;
            will-change: transform;
        }
        .marquee-image img {
            height: 200px;
            width: 300px;
            margin: 10px 10px;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }
        .marquee-image img:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">GameDen</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Profile</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<header class="bg-primary text-white text-center py-5">
    <div class="container" id="heroText">
        <h1>Try Demos</h1>
        <p>Discover and play your favorite games right here!</p>
        <button class="btn btn-danger btn-lg mt-3" id="playGameBtn" onclick="toggleGameDemo()">Play Now</button>
    </div>
    <div class="game-demo-container" id="gameDemo" style="display: none; margin-top: 20px;">
        <iframe 
            allowfullscreen="true" 
            scrolling="no" 
            webkitallowfullscreen="true" 
            mozallowfullscreen="true" 
            msallowfullscreen="true" 
            id="game_drop" 
            src="https://html-classic.itch.zone/html/4699343-472277/index.html" 
            allow="autoplay; fullscreen *; geolocation; microphone; camera; midi; monetization; xr-spatial-tracking; gamepad; gyroscope; accelerometer; xr; cross-origin-isolated; web-share" 
            allowtransparency="true" 
            frameborder="0" 
            width="800" 
            height="600">
        </iframe>
        <button class="btn btn-danger mt-3" onclick="stopGameDemo()">Stop Game</button>
    </div>
</header>
<!-- Marquee Section -->
<section class="marquee-section">
    <div class="container text-center">
        <h2>Top Game Picks</h2>
        <div id="app">
            <div class="marquee-container" v-for="line in 3" :key="`marquee-${line}`">
                <div class="marquee-images" :style="styles[line - 1]">
                    <div v-for="image in images.concat(images)" :key="`${image.id}-${line}-${Math.random()}`" class="marquee-image">
                        <img :src="image.src" :alt="`Game Image ${image.id}`">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Footer -->
<footer class="bg-dark text-center py-4" style="color: white;">
    <p>&copy; 2024 GameDen. All rights reserved.</p>
</footer>

<!-- VueJS and Custom Script -->
<script src="https://unpkg.com/vue@3"></script>
<script>
  const { ref, computed, onMounted } = Vue;

  const app = Vue.createApp({
      setup() {
          const speeds = ref([1, 2, 1.5]); // Base speeds for each line
          const translateX = ref([0, 0, 0]); // Tracks positions for each line
          const listWidth = ref(0); // Shared width of marquee content

          const images = [
    { src: "{{ asset('image/minecraft.jpg') }}", id: 1, description: 'Action-packed Game 1' },
    { src: "{{ asset('image/fallguy.png') }}", id: 2, description: 'Adventure-filled Game 2' },
    { src: "{{ asset('image/stumble.png') }}", id: 3, description: 'Strategy-focused Game 3' },
    { src: "{{ asset('image/gta.jpg') }}", id: 4, description: 'Puzzle-solving Game 4' },
];


          const styles = computed(() =>
              translateX.value.map((x) => ({
                  transform: `translateX(${x}px)`,
              }))
          );

          const updateScroll = () => {
              translateX.value = translateX.value.map((x, index) => {
                  let newX = x - speeds.value[index];
                  if (Math.abs(newX) >= listWidth.value / 2) {
                      newX = 0; // Reset to starting position
                  }
                  return newX;
              });
          };

          const hoverImage = (lineIndex) => {
              speeds.value[lineIndex - 1] = speeds.value[lineIndex - 1] / 4; // Slow down
          };

          const resetSpeed = (lineIndex) => {
              speeds.value[lineIndex - 1] = [1, 2, 1.5][lineIndex - 1]; // Reset to original speed
          };

          onMounted(() => {
              const marqueeList = document.querySelector('.marquee-images');
              listWidth.value = marqueeList.scrollWidth;

              setInterval(updateScroll, 16);
          });

          return { images, styles, hoverImage, resetSpeed };
      },
  });

  app.mount("#app");
  function toggleGameDemo() {
    const heroText = document.getElementById("heroText");
    const gameDemo = document.getElementById("gameDemo");

    // Hide hero text and show game iframe
    heroText.style.display = "none";
    gameDemo.style.display = "block";
}

function stopGameDemo() {
    const heroText = document.getElementById("heroText");
    const gameDemo = document.getElementById("gameDemo");
    const gameIframe = document.getElementById("game_drop");

    // Show hero text and hide game demo
    heroText.style.display = "block";
    gameDemo.style.display = "none";

    // Optionally stop the game by resetting the iframe's src
    gameIframe.src = gameIframe.src;
}
    
    
</script>

</body>
</html>
</body>
</html>
