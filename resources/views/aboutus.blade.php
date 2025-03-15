<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* General Body Styles */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            position: relative;
            overflow: auto; /* Allow scrolling */
        }

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

        /* About Container */
        .about-container {
            max-width: 960px;
            margin: 0 auto;
            padding: 20px;
            position: relative; /* Ensure content is above the background */
        }

        /* Intro Box */
        .intro-box {
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent background */
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .intro-box h1 {
            font-size: 1.8rem;
            color: #333;
            margin-bottom: 10px;
        }

        .intro-box p {
            font-size: 1rem;
            color: #666;
        }

        /* Content Boxes */
        .content-box {
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent background */
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .content-box:hover {
            background-color: #f0f0f0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .content-box h2 {
            font-size: 1.4rem;
            color: #333;
            margin-bottom: 15px;
        }

        .content-box p {
            font-size: 1rem;
            color: #666;
        }

        .content-box ul {
            list-style-type: disc;
            margin-left: 20px;
            color: #666;
        }

        /* Call to Action Box */
        .cta-box {
            text-align: center;
            padding: 30px;
            background-color: rgba(51, 51, 51, 0.8); /* Semi-transparent background */
            color: white;
            border-radius: 8px;
            margin-bottom: 20px;
            transition: background-color 0.3s;
        }

        .cta-box:hover {
            background-color: rgba(68, 68, 68, 0.9);
        }

        .cta-box .cta-text {
            font-size: 1.2rem;
        }

        .cta-box .cta-text a {
            color: #FFD700;
            text-decoration: none;
            font-weight: bold;
        }

        .cta-box .cta-text a:hover {
            text-decoration: underline;
        }

        /* Footer Styles */
        .footer {
            background-color: black;
            color: white;
            padding: 20px;
            text-align: center;
            border-top: 2px solid white;
        }

        .footer a {
            color: white;
            margin: 0 10px;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .about-container {
                padding: 15px;
            }

            .intro-box h1 {
                font-size: 1.5rem;
            }

            .content-box h2 {
                font-size: 1.2rem;
            }

            .cta-box .cta-text {
                font-size: 1rem;
            }
        }

        @media (max-width: 480px) {
            .intro-box h1 {
                font-size: 1.2rem;
            }

            .content-box h2 {
                font-size: 1rem;
            }

            .cta-box .cta-text {
                font-size: 0.9rem;
            }
        }
    </style>

</head>
<body>
    @extends('layout')

    @section('title', 'About us')

    @section('body')
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
                </p>
                <ul>
                    <li>Track your gaming progress across multiple platforms</li>
                    <li>Connect with fellow gamers who share your interests</li>
                    <li>Join or create gaming communities</li>
                    <li>Participate in exclusive tournaments and events</li>
                    <li>Share your epic gaming moments with the world</li>
                </ul>
            </div>

            <div class="content-box">
                <h2>Our Mission</h2>
                <p>
                    Our mission is to break down the barriers between different gaming platforms and communities. Whether you're a PC enthusiast, console warrior, or mobile gaming champion, GameDen provides a unified space where all gamers can come together.
                </p>
            </div>

            <div class="content-box">
                <h2>Features That Set Us Apart</h2>
                <ul>
                    <li><strong>Cross-Platform Integration:</strong> Seamlessly connect your gaming accounts from Steam, PlayStation, Xbox, and more</li>
                    <li><strong>Smart Match-Making:</strong> Find gaming partners based on your skill level and gaming preferences</li>
                    <li><strong>Community Challenges:</strong> Participate in daily and weekly challenges to earn rewards</li>
                    <li><strong>Achievement Tracking:</strong> Keep track of your gaming milestones across all platforms in one place</li>
                    <li><strong>Live Streaming Integration:</strong> Share your gameplay directly through our platform</li>
                </ul>
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
                </p>
                <ul>
                    <li>Enhanced tournament organization tools</li>
                    <li>Advanced statistics and analytics</li>
                    <li>Integrated voice chat system</li>
                    <li>Custom community creation tools</li>
                    <li>And much more!</li>
                </ul>
            </div>

            <div class="cta-box">
                <p class="cta-text">
                    Ready to level up your gaming experience? <a href="#">Join GameDen today</a> and become part of the fastest-growing gaming community!
                </p>
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
    @endsection

    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
        }
    </script>

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
    <script>
        (function(){
            if (!window.chatbase || window.chatbase("getState") !== "initialized") {
                window.chatbase = (...arguments) => {
                    if (!window.chatbase.q) {
                        window.chatbase.q = [];
                    }
                    window.chatbase.q.push(arguments);
                };
                window.chatbase = new Proxy(window.chatbase, {
                    get(target, prop) {
                        if (prop === "q") {
                            return target.q;
                        }
                        return (...args) => target(prop, ...args);
                    }
                });
            }
            
            const onLoad = function() {
                const script = document.createElement("script");
                script.src = "https://www.chatbase.co/embed.min.js";
                script.id = "9PWNMB1p2CzJaFsLkUCRE";
                script.domain = "www.chatbase.co";
                document.body.appendChild(script);
            };

            if (document.readyState === "complete") {
                onLoad();
            } else {
                window.addEventListener("load", onLoad);
            }
        })();
    </script>
</body>
</html>
