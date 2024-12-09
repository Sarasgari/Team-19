<!--
  Developer: Fatima Mansur
  University ID: 230274345
  Function: Contact us allowes the user to communicate with the website developers
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - GameDen</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/countactaboutus.css') }}">
    <video autoplay muted loop id="background-video">
        <source src="movie2.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <style>
        .social-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        .social-button {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: transform 0.3s;
        }

        .social-button:hover {
            transform: translateY(-3px);
        }

        .instagram { background: #E4405F; }
        .twitter { background: #1DA1F2; }
        .linkedin { background: #0077B5; }
        .facebook { background: #3B5998; }
    </style>
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
          <li class="nav-item"><a class="nav-link" href="{{ route('aboutus') }}">About Us</a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('Basket')}}">Cart</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Register</a></li>
        </ul>
      </div>
    </div>
  </nav>

    <div class="contact-container">
        <h1>Contact Us</h1>
        <form action="contact.php" method="POST">
            <label for="name">Your Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" required>
            
            <label for="email">Your Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            
            <label for="message">Your Message</label>
            <textarea id="message" name="message" rows="5" placeholder="What's on your mind?" required></textarea>
            
            <input type="submit" value="Send Message">
        </form>

        <!-- Added Social Media Buttons -->
        <div class="social-buttons">
            <a href="https://www.instagram.com/yourprofile" class="social-button instagram" target="_blank">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="https://twitter.com/yourprofile" class="social-button twitter" target="_blank">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="https://www.linkedin.com/in/yourprofile" class="social-button linkedin" target="_blank">
                <i class="fab fa-linkedin-in"></i>
            </a>
            <a href="https://www.facebook.com/yourprofile" class="social-button facebook" target="_blank">
                <i class="fab fa-facebook-f"></i>
            </a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
