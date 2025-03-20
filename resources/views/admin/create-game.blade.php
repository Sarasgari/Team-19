@extends('layouts.admin')

@section('page-css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/product-management.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="content-wrapper">
    <h2 class="mb-4">Add New Game</h2>
    
    <div class="card">
        <div class="card-body">
            <form action="{{ route('games.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="5" required>{{ old('description') }}</textarea>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{ old('price') }}" required>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="releasedate" class="form-label">Release Date</label>
                                    <input type="date" class="form-control" id="releasedate" name="releasedate" value="{{ old('releasedate') }}" required>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="stock" class="form-label">Stock</label>
                                    <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock') }}" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="platform" class="form-label">Platform</label>
                            <select class="form-control" id="platform" name="platform" required>
                                <option value="">Select Platform</option>
                                <option value="PC" {{ old('platform') == 'PC' ? 'selected' : '' }}>PC</option>
                                <option value="PS4" {{ old('platform') == 'PS4' ? 'selected' : '' }}>PS4</option>
                                <option value="Nintendo Switch" {{ old('platform') == 'Nintendo Switch' ? 'selected' : '' }}>Nintendo Switch</option>
                                <option value="PS5" {{ old('platform') == 'PS5' ? 'selected' : '' }}>PS5</option>
                                <option value="Xbox" {{ old('platform') == 'Xbox' ? 'selected' : '' }}>Xbox</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="image" class="form-label">Game Image</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                            
                            <div id="imagePreview" class="mt-3" style="display: none;">
                                <p class="text-muted">Image Preview:</p>
                                <img id="previewImg" src="#" alt="Preview" class="img-thumbnail" style="max-width: 100%; max-height: 200px;"/>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Add Game</button>
                    <a href="{{ route('admin.products') }}" class="btn btn-secondary ms-2">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('page-js')
<script>
    // Show image preview when uploading a new image
    document.addEventListener('DOMContentLoaded', function() {
        const imageInput = document.getElementById('image');
        const previewImg = document.getElementById('previewImg');
        const imagePreview = document.getElementById('imagePreview');
        
        imageInput.addEventListener('change', function(e) {
            if (this.files && this.files[0]) {
                previewImg.src = URL.createObjectURL(this.files[0]);
                imagePreview.style.display = 'block';
            }
        });
    });
</script>
@endsection