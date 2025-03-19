@extends('layouts.ForgotPassword')

@section('content')

@include('include.header')
<style>
    .reset-card {
        background: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 450px;
        text-align: center;
        margin-top: 50px;
    }

    .reset-card h2 {
        font-size: 1.5rem;
        margin-bottom: 20px;
        color: #333;
    }

    .reset-card .form-group {
        margin-bottom: 15px;
        text-align: left;
    }

    .form-control {
        height: 45px;
        border-radius: 5px;
    }

    .btn-primary {
        width: 100%;
        font-size: 1rem;
        padding: 10px;
        border-radius: 5px;
    }

    .btn-secondary {
        width: 100%;
        margin-top: 10px;
        font-size: 1rem;
        padding: 10px;
        border-radius: 5px;
    }
</style>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="reset-card">
        <h2>Reset Password</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">New Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn btn-primary">Reset Password</button>
            <a href="{{ route('home') }}" class="btn btn-secondary">Home</a>
        </form>
    </div>
</div>

@endsection
