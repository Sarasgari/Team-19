@extends('layouts.ForgotPassword')

@section('content')
<div class="container">
    <h2>Reset Password</h2>

    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Enter your email</label>
            <input type="email" class="form-control" name="email" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Send Password Reset Link</button>
    </form>
</div>
@endsection
