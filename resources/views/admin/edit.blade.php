@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <h2 class="mb-4">Edit Game</h2>
    
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <div class="card">
        <div class="card-body">
            <form action="{{ route('games.update', $game->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $game->title }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4" required>{{ $game->description }}</textarea>
                </div>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{ $game->price }}" required>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="releasedate" class="form-label">Release Date</label>
                            <input type="date" class="form-control" id="releasedate" name="releasedate" value="{{ $game->releasedate }}" required>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock" value="{{ $game->stock }}" required>
                        </div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="platform" class="form-label">Platform</label>
                    <select class="form-control" id="platform" name="platform" required>
                        <option value="PC" {{ $game->platform == 'PC' ? 'selected' : '' }}>PC</option>
                        <option value="PS4" {{ $game->platform == 'PS4' ? 'selected' : '' }}>PS4</option>
                        <option value="Nintendo Switch" {{ $game->platform == 'Nintendo Switch' ? 'selected' : '' }}>Nintendo Switch</option>
                        <option value="PS5" {{ $game->platform == 'PS5' ? 'selected' : '' }}>PS5</option>
                        <option value="Xbox" {{ $game->platform == 'Xbox' ? 'selected' : '' }}>Xbox</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="image" class="form-label">Game Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    <small class="text-muted">Leave empty to keep the current image</small>
                    
                    <div class="mt-3">
                        <p>Current image:</p>
                        <img src="{{ asset('image/' . $game->image) }}" alt="{{ $game->title }}" width="200" id="currentImage">
                    </div>
                    
                    <div class="mt-3" id="previewContainer" style="display: none;">
                        <p>New image preview:</p>
                        <img id="preview" src="#" alt="Preview" width="200">
                    </div>
                </div>
                
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Update Game</button>
                    <a href="{{ route('admin.products') }}" class="btn btn-secondary ms-2">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('page-js')
<script>
    // Show image preview when a new file is selected
    document.getElementById('image').addEventListener('change', function(event) {
        const preview = document.getElementById('preview');
        const previewContainer = document.getElementById('previewContainer');
        
        if (event.target.files.length > 0) {
            preview.src = URL.createObjectURL(event.target.files[0]);
            previewContainer.style.display = 'block';
        } else {
            previewContainer.style.display = 'none';
        }
    });
</script>
@endsection