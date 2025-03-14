<!--
  Developer: Abdulrahman Mostafa, Mohammed Rahman
  University ID: 2300466694, 220083681
  Function: Basket page hold the items and prouced to the payment form 
-->
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
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <div>
      <a class="navbar-brand" href="#">
        <img src="{{ asset('image/logo.png') }}" alt="GameDen Logo" class="d-inline-block align-text-top" style="height: 40px;">
        GameDen
      </a>
    </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="{{route('home')}}">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('products') }}">products</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('aboutus') }}">About Us</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('contactus') }}">Contact</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Register</a></li>

        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <main>
    <div class= "background">
    <!-- Square Container -->
    <div class="square-container">
      <div class="basket-container">
        <h1>Your Basket</h1>
        @if(session('cart'))
          <form action="{{ route('cart.update') }}" method=POST>
            @csrf
            <table>
              <thead>
                <tr>
                  <th>Game</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach(session('cart') as $id => $details)
                  <tr>
                    <td>{{ $details['name'] }}</td>
                    <td>{{ $details['price'] }}</td>
                    <td>
                      <input type="number" name="quantities[{{ $id }}]" value="{{ $details['quantity'] }}" min="1">
                    </td>
                    <td>{{ $details['quantity'] * $details['price'] }}</td>
                    <td>
                      <form action="{{ route('cart.remove', $id) }}" method="POST">
                        @csrf
                        <button type="submit">Remove</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <button type="submit">Update Cart</button>
          </form> 

          <h3>Total: ${{ array_sum(array_map(function ($details) {
              return $details['quantity'] * $details['price'];
            }, session('cart'))) }}</h3>
        @else
            <p>Your cart is empty!</p>
        @endif
        <a href="{{ route('home') }}" class="btn">Continue Shopping</a>
        <a href="PaymentForm.html" class="btn">Proceed to Payment</a>
      </div>
    </div>
  </main>
</div>
  <!-- Footer -->
  <footer>
    <p>© 2024 GameDen. All Rights Reserved.</p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="script.js"></script>
  <script>
(function(){if(!window.chatbase||window.chatbase("getState")!=="initialized"){window.chatbase=(...arguments)=>{if(!window.chatbase.q){window.chatbase.q=[]}window.chatbase.q.push(arguments)};window.chatbase=new Proxy(window.chatbase,{get(target,prop){if(prop==="q"){return target.q}return(...args)=>target(prop,...args)}})}const onLoad=function(){const script=document.createElement("script");script.src="https://www.chatbase.co/embed.min.js";script.id="9PWNMB1p2CzJaFsLkUCRE";script.domain="www.chatbase.co";document.body.appendChild(script)};if(document.readyState==="complete"){onLoad()}else{window.addEventListener("load",onLoad)}})();
</script>