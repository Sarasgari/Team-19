<!--Developer: Eyad Al Saher
University ID: 230047989
Function : Login page enable the login to the website and enjoy with the features
-->
@extends('layout')
@section('title','Sign Up')

@section('body')

    <div class="container mx-auto text-center">
        <form class="form" action="{{route('registerPost')}}" method="POST">
            @csrf
            <h2>Sign Up</h2>

            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <input id="email" name="name" placeholder="Enter your email" required>
            </div>

            <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            
            <div class="row mb-3">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            
            <button class="btn btn-primary" type="submit">Sign Up</button>
            
            <p>Have an account ? <a href="{{ route('login') }}">Log In</a></p>
            <a href="{{ route('home') }}" class="btn btn-secondary mt-3">Back to Home</a>
        </form>
    </div>
    
@endsection
