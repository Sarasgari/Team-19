<!--
  Developer: Fatima Mansur
  University ID: 230274345
  Function: About us page provides information about the company
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - GameDen</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/countactaboutus.css') }}">
    <video autoplay muted loop id="background-video">
        <source src="movie2.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</head>


<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <div>
      <a class="navbar-brand" href="#">
        <img src="{{ asset('image/logo.png') }}" alt="GameDen Logo" class="d-inline-block align-text-top" style="height: 40px;">
        GameDen
      </a>
    </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="{{ route('home') }}">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('products') }}">products</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('contactus') }}">Contact</a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('Basket')}}">Cart</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Register</a></li>
        </ul>
      </div>
    </div>
  </nav>


    <div class="about-container">
        <div class="intro-box">
            <h1>About GameDen</h1>
            <p>
                Welcome to GameDen, your ultimate gaming companion app that revolutionizes how gamers connect, compete, and celebrate their gaming achievements. Founded in 2024, we're passionate about creating a space where gaming enthusiasts can truly express themselves.
            </p>
        </div>
        
        <div class="content-box">
            <h2>What We Offer</h2>
            <p>
                GameDen isn't just another gaming app – it's your personal gaming headquarters. Our platform allows you to:
                <ul>
                    <li>Track your gaming progress across multiple platforms</li>
                    <li>Connect with fellow gamers who share your interests</li>
                    <li>Join or create gaming communities</li>
                    <li>Participate in exclusive tournaments and events</li>
                    <li>Share your epic gaming moments with the world</li>
                </ul>
            </p>
        </div>

        <div class="content-box">
            <h2>Our Mission</h2>
            <p>
                Our mission is to break down the barriers between different gaming platforms and communities. Whether you're a PC enthusiast, console warrior, or mobile gaming champion, GameDen provides a unified space where all gamers can come together.
            </p>
        </div>

        <div class="content-box">
            <h2>Features That Set Us Apart</h2>
            <p>
                <ul>
                    <li><strong>Cross-Platform Integration:</strong> Seamlessly connect your gaming accounts from Steam, PlayStation, Xbox, and more</li>
                    <li><strong>Smart Match-Making:</strong> Find gaming partners based on your skill level and gaming preferences</li>
                    <li><strong>Community Challenges:</strong> Participate in daily and weekly challenges to earn rewards</li>
                    <li><strong>Achievement Tracking:</strong> Keep track of your gaming milestones across all platforms in one place</li>
                    <li><strong>Live Streaming Integration:</strong> Share your gameplay directly through our platform</li>
                </ul>
            </p>
        </div>

        <div class="content-box">
            <h2>Join Our Community</h2>
            <p>
                With over 10,000 active users and growing, GameDen is becoming the go-to platform for gamers worldwide. Whether you're a casual player or an aspiring esports professional, our community welcomes you with open arms.
            </p>
        </div>

        <div class="content-box">
            <h2>Looking Forward</h2>
            <p>
                We're constantly evolving and adding new features based on our community's feedback. Our roadmap includes exciting updates like:
                <ul>
                    <li>Enhanced tournament organization tools</li>
                    <li>Advanced statistics and analytics</li>
                    <li>Integrated voice chat system</li>
                    <li>Custom community creation tools</li>
                    <li>And much more!</li>
                </ul>
            </p>
        </div>

        <div class="cta-box">
            <p class="cta-text">
                Ready to level up your gaming experience? Join GameDen today and become part of the fastest-growing gaming community!
            </p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
