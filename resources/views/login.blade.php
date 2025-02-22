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
@section('title','Log in')




@section('body')

    <div class="container mx-auto text-center">
        <div class="mt-5">
            @if($errors->any())
                <div class="mt-5">
                    @if($errors->any())
                        <div class="col-12">
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger">{{$error}}</div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif

            @if(session()->has('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
            @endif

            @if(session()->has('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
        </div>
        <div>
            <form class="form" action="{{route('loginpost')}}" method="POST">
                @csrf
                <h2 style="color:rgb(255, 255, 255);">Log In</h2>

                <div class="row mb-3">
                    <label style="color:rgb(255, 255, 255);" for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>

                <div class="row mb-3">
                    <label style="color:rgb(255, 255, 255);" for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>

                <button type="submit">Login</button>
            
                <p style="color:rgb(255, 255, 255);" >Don't have an account ? <a href="{{ route('signup') }}">Signup</a></p>
                <a href="{{ route('home') }}" class="btn btn-primary w-100">Back to Home</a>
            </form>
        </div>
    </div>
    
@endsection
