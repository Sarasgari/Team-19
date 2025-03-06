@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Setting</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('settings.update') }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="username" class="form-label">New Username</label>
            <input type="text" class="form-control" name="username" value="{{ Auth::user()->username }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">New Password</label>
            <input type="password" class="form-control" name="password">
        </div>

        <button type="submit" class="btn btn-primary">Change</button>
    </form>
</div>
@endsection
