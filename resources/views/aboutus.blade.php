<!--
  Developer: Fatima Mansur
  University ID: 230274345
  Function: About us page provides information about the company
-->

<style>

.footer {
    background-color: black;
    color: white;
    padding: 20px;
    text-align: center;
    border: 2px solid white; /* Creates the box effect */
}
</style>

@extends('layout')
@section('title','About us')

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

