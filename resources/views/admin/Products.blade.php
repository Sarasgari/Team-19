@extends('layouts.admin')

@section('page-css')
    <link href="{{ asset('css/product-management.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- Add New Game Form -->
    <div class="container">
        <h2 class="my-4">Add New Game</h2>
        <form action="{{ route('games.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="release_date" class="form-label">Release Date</label>
                <input type="date" class="form-control" id="release_date" name="release_date" required>
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" required>
            </div>
            <div class="mb-3">
                <label for="platforms" class="form-label">Platforms</label>
                <select multiple class="form-control" id="platforms" name="platforms[]" required>
                    <option value="pc">PC</option>
                    <option value="ps4">PS4</option>
                    <option value="nintendo">Nintendo</option>
                    <option value="ps5">PS5</option>
                    <option value="xbox">Xbox</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Game Image</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Game</button>
        </form>
    </div>

    <!-- Existing Games Table -->
    <h2 class="my-4">All Games</h2>
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
                    <td>{{ $game->description }}</td>
                    <td>${{ $game->price }}</td>
                    <td>{{ $game->release_date }}</td>
                    <td>{{ $game->stock }}</td>
                    <td>
    @php
        $platforms = json_decode($game->platforms, true); // Decode as an associative array
        if (is_array($platforms)) {
            echo implode(', ', $platforms);  // Implode if it's an array
        } else {
            echo $game->platforms;  // Display as a string if it's not a valid JSON array
        }
    @endphp
</td>
                    <td><img src="{{ asset('storage/'.$game->image) }}" alt="{{ $game->title }}" width="50"></td>
                    <td>
                        <a href="{{ route('games.edit', $game->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('games.destroy', $game->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('page-js')
    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Image preview for the add product form
        const imageInput = document.getElementById('image');
        const previewImg = document.getElementById('previewImg');
        
        imageInput.addEventListener('change', function() {
            const file = imageInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    previewImg.style.display = 'block'; // Show the image preview
                }
                reader.readAsDataURL(file);
            }
        });

        // Form validation
        document.getElementById('addProductForm').addEventListener('submit', function(event) {
            const title = document.getElementById('title').value;
            const price = document.getElementById('price').value;
            const description = document.getElementById('description').value;

            // Check if any required field is empty
            if (!title || !price || !description) {
                event.preventDefault();
                alert('Please fill in all required fields');
            }
        });
    </script>
@endsection
