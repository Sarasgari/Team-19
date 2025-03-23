<!--
  Developer: Abdulrahman Mostafa, Mohammed Rahman
  University ID: 2300466694, 220083681
  Function: Basket page holds the items and proceeds to the payment form 
-->
@include('include.header')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Your Basket</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> 
  <link rel="stylesheet" href="{{ asset('css/Basket.css') }}">
</head>
<body>

  <!-- Main Content -->
  <main>
    <div class="background">
     <!-- Basket Container -->
<div class="basket-container">
    <h1>Your Basket</h1>

    @if(collect($cart)->count() > 0)
        <form action="{{ route('cart.update') }}" method="POST">
            @csrf
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Game</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $item)
                        <tr>
                            <td>{{ $item->game->title ?? $item['title'] }}</td>
                            <td>£{{ number_format($item->game->price ?? $item['price'], 2) }}</td>
                            <td>
                                <input type="number" name="quantities[{{ $item->id ?? $loop->index }}]" 
                                       value="{{ $item->quantity ?? $item['quantity'] }}" 
                                       min="1" 
                                       max="{{ $item->game->stock ?? 99 }}" 
                                       class="form-control" style="width: 70px;">
                            </td>
                            <td>£{{ number_format(($item->game->price ?? $item['price']) * ($item->quantity ?? $item['quantity']), 2) }}</td>
                            <td>
                                <a href="{{ route('cart.remove', ['id' => $item->id ?? $loop->index]) }}" 
                                   class="btn btn-danger btn-sm"
                                   onclick="event.preventDefault(); document.getElementById('remove-form-{{ $item->id ?? $loop->index }}').submit();">
                                    Remove
                                </a>
                                
                                <form id="remove-form-{{ $item->id ?? $loop->index }}" 
                                      action="{{ route('cart.remove', ['id' => $item->id ?? $loop->index]) }}" 
                                      method="POST" 
                                      style="display: none;">
                                    @csrf
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Update Cart</button>
        </form>

        <h3 class="mt-3">Total: £{{ number_format(collect($cart)->sum(fn($item) => ($item->game->price ?? $item['price']) * ($item->quantity ?? $item['quantity'])), 2) }}</h3>

    @else
        <p class="text-danger">Your cart is empty!</p>
    @endif

    <a href="{{ route('products') }}" class="btn btn-secondary">Continue Shopping</a>
    <a href="{{ route('cart.checkout') }}" class="btn btn-success">Proceed to Payment</a>
</div>

  </main>

  <!-- Footer -->
  <footer class="text-center p-3 mt-4 bg-dark text-white">
    <p>© 2024 GameDen. All Rights Reserved.</p>
  </footer>

</body>
</html>
