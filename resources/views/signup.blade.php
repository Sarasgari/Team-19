<!--Developer: Eyad Al Saher, Minwoo Noh, Mohammed Rahman
University ID: 230047989, 230409589, 220083681
Function : Login page enable the login to the website and enjoy with the features
-->
<head>
    <link rel="stylesheet" href="{{asset('SignupLogin.css')}}"/>
    <link rel="stylesheet" href="{{asset('stylesheet.css')}}"/>
    <style>
        body{
            background-image: url("{{asset('image/abstract.jpg')}}");
        }
    </style>
</head>
@extends('layout')
@section('title','Sign Up')

@section('body')

    <div class="container mx-auto text-center">
        <form class="form" action="{{route('registerPost')}}" method="POST">
            @csrf
            <h2 style="color:rgb(255, 255, 255);" >Sign Up</h2>

            <div class="row mb-3">
                <label style="color:rgb(255, 255, 255);" for="name" class="col-sm-2 col-form-label">Name</label>
                <input id="email" name="name" placeholder="Enter your email" required>
            </div>

            <div class="row mb-3">
                <label style="color:rgb(255, 255, 255);" for="email" class="col-sm-2 col-form-label">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            
            <div class="row mb-3">
                <label style="color:rgb(255, 255, 255);" for="password" class="col-sm-2 col-form-label">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            
            <button class="btn btn-primary" type="submit">Sign Up</button>
            
            <p style="color:rgb(255, 255, 255);" >Have an account ? <a href="{{ route('login') }}">Log In</a></p>
            <a href="{{ route('home') }}" class="btn btn-secondary mt-3">Back to Home</a>
        </form>
    </div>
    
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="script.js"></script>
  <script>
(function(){if(!window.chatbase||window.chatbase("getState")!=="initialized"){window.chatbase=(...arguments)=>{if(!window.chatbase.q){window.chatbase.q=[]}window.chatbase.q.push(arguments)};window.chatbase=new Proxy(window.chatbase,{get(target,prop){if(prop==="q"){return target.q}return(...args)=>target(prop,...args)}})}const onLoad=function(){const script=document.createElement("script");script.src="https://www.chatbase.co/embed.min.js";script.id="9PWNMB1p2CzJaFsLkUCRE";script.domain="www.chatbase.co";document.body.appendChild(script)};if(document.readyState==="complete"){onLoad()}else{window.addEventListener("load",onLoad)}})();
</script>