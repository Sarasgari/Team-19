@extends('layouts.ForgotPassword')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="reset-card">
        <h2>Password Reset</h2>
        <p>Provide the email address associated with your account to recover your password.</p>

        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-3 text-start">
                <label for="email" class="form-label fw-bold">Email <span style="color: red;">*</span></label>
                <input type="email" class="form-control" name="email" placeholder="name@example.com" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Reset Password</button>
            <a href="{{ route('home') }}" class="btn btn-secondary w-100 mt-2">Home</a>
        </form>

        <div class="reset-footer d-flex justify-content-between">
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('signup') }}">Signup</a>
        </div>
    </div>
</div>

<style>
    .btn {
    font-size: 1.1rem;
    padding: 12px;
    border-radius: 5px;
    }

    .reset-card {
        background: #fff;
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 500px;
        text-align: center;
        margin-top: 50px;
    }

    .reset-card h2 {
        font-size: 1.8rem;
        margin-bottom: 15px;
        color: #333;
    }

    .reset-card p {
        font-size: 1rem;
        color: #6c757d;
        margin-bottom: 25px;
    }

    .form-control {
        height: 50px;
        border-radius: 5px;
        font-size: 1rem;
        padding: 12px;
        margin-bottom: 15px;
    }

    .btn-primary {
        width: 100%;
        font-size: 1.1rem;
        padding: 12px;
        border-radius: 5px;
        margin-top: 15px;
    }

    .reset-footer {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
        font-size: 1rem;
    }

    .reset-footer a {
        color: #007bff;
        text-decoration: none;
    }

    .reset-footer a:hover {
        text-decoration: underline;
    }

</style>
@endsection
