<!--
  Developer: Fatima Mansur
  University ID: 230274345
  Function: Contact us allows the user to communicate with the website developers
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
    
    <style>
        /* Background Image */
        body::before {
            content: '';
            background-image: url("{{ asset('image/background.png') }}");  /* Update with the correct image path */
            background-attachment: fixed; /* Keep the background fixed */
            background-size: cover;
            background-position: center;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: -1;
        }

        .contact-container {
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent background */
            padding: 20px;
            border-radius: 10px;
            margin: 50px auto; /* Center the form */
            max-width: 600px; /* Limit the width */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Add shadow for depth */
        }

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
@include('include.header')

    <div class="contact-container">
        <h1>Contact Us</h1>
        <form action="{{ route('contact.store') }}" method="POST">
    @csrf
    <label for="name">Your Name</label>
    <input type="text" id="name" name="name" placeholder="Enter your name" required>

    <label for="email">Your Email</label>
    <input type="email" id="email" name="email" placeholder="Enter your email" required>

    <label for="message">Your Message</label>
    <textarea id="message" name="message" rows="5" placeholder="What's on your mind?" required></textarea>

    <div class="d-flex justify-content-start gap-3 mt-4">
        <button type="submit" class="btn btn-dark px-4 py-2 fw-bold" style="min-width: 150px;">
        Send Message
        </button>
    
        <a href="{{ route('home') }}" class="btn btn-outline-dark px-4 py-2 fw-bold" style="min-width: 150px;">
        Home
        </a>
    </div>
        </form>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

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
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="script.js"></script>
  <script>
(function(){if(!window.chatbase||window.chatbase("getState")!=="initialized"){window.chatbase=(...arguments)=>{if(!window.chatbase.q){window.chatbase.q=[]}window.chatbase.q.push(arguments)};window.chatbase=new Proxy(window.chatbase,{get(target,prop){if(prop==="q"){return target.q}return(...args)=>target(prop,...args)}})}const onLoad=function(){const script=document.createElement("script");script.src="https://www.chatbase.co/embed.min.js";script.id="9PWNMB1p2CzJaFsLkUCRE";script.domain="www.chatbase.co";document.body.appendChild(script)};if(document.readyState==="complete"){onLoad()}else{window.addEventListener("load",onLoad)}})();
