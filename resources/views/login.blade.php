<!--Developer: Eyad Al Saher
University ID: 230047989
Function : Login page enable the login to the website and enjoy with the features
-->
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
        <form class="form" action="{{route('loginpost')}}" method="POST">
            @csrf
            <h2>Log In</h2>

            <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            
            <div class="row mb-3">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            
            <button class="btn btn-primary" type="submit">Login</button>
            
            <p>Don't have an account ? <a href="{{ route('signup') }}">Signup</a></p>
            <a href="{{ route('home') }}" class="btn btn-secondary mt-3">Back to Home</a>
        </form>
    </div>
    
@endsection
