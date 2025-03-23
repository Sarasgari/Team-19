@extends('layouts.app')

@section('content')

@include('include.header')

<style>
    .profile-container {
        display: flex;
        margin-top: 80px;
        min-height: 80vh;
        font-size: 1.5rem;
    }

    .sidebar {
        width: 250px;
        background-color: #f8f9fa;
        padding: 20px;
        border-right: 1px solid #ddd;
        height: 100%;
    }

    .sidebar a {
        display: block;
        padding: 10px 15px;
        margin-bottom: 10px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 6px;
        text-decoration: none;
        color: #333;
        font-weight: 500;
        font-size: 1.1rem;
        white-space: nowrap;
    }

    .sidebar a:hover,
    .sidebar a.active {
        background-color: #007bff;
        color: white;
    }

    .content-area {
        flex: 1;
        padding: 30px;
        background-color: #f4f6f8;
        font-size: 1.5rem;
        max-width: 800px
    }
    .profile-title {
        text-align: center;
        font-size: 2rem;
        margin: 30px;
        font-weight: bold;
        margin-bottom: 100px
    }
    .btn {
    font-size: 1.3rem;
    padding: 12px 20px;
    font-weight: 600;
    }.form-control {
    font-size: 1.3rem;
    padding: 12px;
}
</style>

<div class="container profile-container">
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="tab-btn active" data-tab="info" onclick="showTab('info')">👤 Profile Information</a>
        <a href="#" class="tab-btn" data-tab="edit" onclick="showTab('edit')">✏️ Update Profile</a>
        <a href="#" class="tab-btn" data-tab="orders" onclick="showTab('orders')">🧾 Your Orders</a>
        <a href="{{ route('home') }}" class="tab-btn">🏠 Home</a>
    </div>
    

    <!-- Content -->
    <div class="content-area">
        <!-- Profile Info -->
        <div id="info-tab" class="tab-content">
            <h4 class="profile-title">👤 Profile Information</h4>
            <p><strong>Username:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
        </div>

        <!-- Edit Profile -->
        <div id="edit-tab" class="tab-content" style="display: none;">
            <h4 class="profile-title">✏️ Update Profile</h4>
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="username" class="form-label">New Username</label>
                    <input type="text" class="form-control" name="username" value="{{ $user->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">New Password</label>
                    <input type="password" class="form-control" name="password">
                </div>

                <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>
        </div>
        <!-- Orders Section -->
        <div id="orders-tab" class="tab-content" style="display: none;">
            <h4 class="profile-title">🧾 Your Orders</h4>
            @if($reviews->count())
                @foreach($reviews as $review)
                    <div class="card mb-3 p-3">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('image/' . $review->game->image) }}" alt="Game" style="width: 80px; height: 80px; object-fit: cover;" class="me-3">
                            <div>
                                <h5>{{ $review->game->title }}</h5>
                                <p class="mb-0">{{ $review->review_text }}</p>
                                <small class="text-muted">⭐ {{ $review->rating }} | {{ $review->created_at->format('Y-m-d') }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No orders found.</p>
            @endif
        </div>
    </div>
</div>

<script>
    function showTab(tab) {
        const allTabs = ['info', 'edit', 'orders'];

        allTabs.forEach(t => {
            const section = document.getElementById(t + '-tab');
            if (section) section.style.display = 'none';
        });

        const selected = document.getElementById(tab + '-tab');
        if (selected) selected.style.display = 'block';

        const links = document.querySelectorAll('.sidebar a');
        links.forEach(link => link.classList.remove('active'));

        const clicked = document.querySelector(`.sidebar a[data-tab="${tab}"]`);
        if (clicked) clicked.classList.add('active');
    }
</script>

@endsection
