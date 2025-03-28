@extends('layouts.admin')

@section('page-css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/product-management.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- Existing Games Table -->
    <div class="content-wrapper">
        <h2 class="mb-4">Manage Products</h2>
        
        <!-- Button to navigate to create game page -->
        <a href="{{ route('games.create') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus"></i> Add New Game
        </a>
        
        <!-- Messages -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        <!-- Games Table -->
        <div class="table-container">
            @if($games->count() > 0)
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Release Date</th>
                            <th>Stock</th>
                            <th>Platform</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($games as $game)
                            <tr>
                                <td>{{ $game->title }}</td>
                                <td>{{ Str::limit($game->description, 100) }}</td>
                                <td>£{{ number_format($game->price, 2) }}</td>
                                <td>{{ \Carbon\Carbon::parse($game->releasedate)->format('M d, Y') }}</td>
                                <td>{{ $game->stock }}</td>
                                <td>{{ $game->platform }}</td>
                                <td>
                                    <img src="{{ asset('image/' . ($game->image ?? 'placeholder.jpg')) }}" alt="{{ $game->title }}" width="80" height="80" class="img-thumbnail">
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('games.edit', $game->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-edit"></i> EDIT
                                        </a>
                                        <form action="{{ route('games.destroy', $game->id) }}" method="POST" class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                                <i class="fas fa-trash"></i> DEL
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i> No games found. Click "Add New Game" to add your first game.
                </div>
            @endif
        </div>
    </div>
@endsection

@section('page-js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Auto-dismiss alerts after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            // Handle alert auto-dismissal
            setTimeout(function() {
                const alerts = document.querySelectorAll('.alert');
                alerts.forEach(function(alert) {
                    const closeButton = alert.querySelector('.btn-close');
                    if (closeButton) {
                        closeButton.click();
                    }
                });
            }, 5000);
            
            // Handle delete confirmation
            const deleteForms = document.querySelectorAll('.delete-form');
            deleteForms.forEach(function(form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    if (confirm('Are you sure you want to delete this game? This action cannot be undone.')) {
                        this.submit();
                    }
                });
            });
        });
    </script>
@endsection