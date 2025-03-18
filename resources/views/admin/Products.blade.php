@extends('layouts.admin')

@section('page-css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/product-management.css') }}" rel="stylesheet">
@endsection

@section('content')

    <!-- Add New Game Modal -->
<div class="modal fade" id="addGameModal" tabindex="-1" aria-labelledby="addGameModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addGameModalLabel">Add New Game</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="gameForm" action="{{ route('games.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                        <div id="titleError" class="invalid-feedback">Please provide a title.</div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        <div id="descriptionError" class="invalid-feedback">Please provide a description.</div>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                        <div id="priceError" class="invalid-feedback">Please provide a valid price.</div>
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
                        <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                        <div id="imagePreview" class="mt-3">
                            <img id="previewImg" src="{{ asset('image/' . ($game->image ?? 'placeholder.jpg')) }}" alt="Image Preview" style="display:none; max-width: 100%; height: auto;"/>
                            
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Game</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <!-- Existing Games Table -->
    <div class="content-wrapper">
        <h2 class="mb-4">Manage Products</h2>
        <!-- Button to trigger modal -->
        <button id="toggleFormBtn" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addGameModal">
            <i class="fas fa-plus"></i> Add New Game
        </button>
        <div class="table-container">
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
                                    $platforms = json_decode($game->platforms, true);
                                    if (is_array($platforms)) {
                                        echo implode(', ', $platforms);
                                    } else {
                                        echo $game->platforms;
                                    }
                                @endphp
                            </td>
                            <td><img src="{{ asset('storage/'.$game->image) }}" alt="{{ $game->title }}" width="50"></td>
                            <td>
                                <a href="{{ route('games.edit', $game->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                <form action="{{ route('games.destroy', $game->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('page-js')
    <!-- Add Bootstrap JavaScript Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
@endsection
