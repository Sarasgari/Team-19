@extends('layouts.app')

@section('content')

@include('include.header')
<style>
    .profile-container {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        height: 100vh;
        padding-top: 35vh;
    }

    .profile-box {
        background-color: rgba(255, 255, 255, 0.85);
        padding: 50px;
        border-radius: 15px;
        box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.3);
        width: 450px;
        text-align: center;
    }

    .form-label {
        text-align: left;
        display: block;
        margin-bottom: 12px;
        font-weight: bold;
        color: #333;
        font-size: 1.1rem;
    }

    .form-control {
        width: 100%;
        padding: 12px;
        border: 1px solid #bbb;
        border-radius: 8px;
        font-size: 1rem;
    }

    .mb-4 {
        margin-bottom: 20px;
    }
    .btn-container {
        display: flex;
        justify-content: space-between;
        gap: 10px;
    }

    .btn {
        flex: 1;
        padding: 12px;
        font-size: 16px;
        font-weight: bold;
        border-radius: 8px;
    }
</style>

<div class="profile-container">
    <div class="profile-box">
        <h2 class="mb-4">Profile Settings</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="username" class="form-label">New Username</label>
                <input type="text" class="form-control" name="username" value="{{ Auth::user()->name }}" required>
            </div>

            <div class="mb-4">
                <label for="password" class="form-label">New Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="btn-container">
                <button type="submit" class="btn btn-primary">Update Profile</button>
                <a href="{{ route('home') }}" class="btn btn-secondary">Home</a>
            </div>
        </form>
    </div>
</div>

@endsection
