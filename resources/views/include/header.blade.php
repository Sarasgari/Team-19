<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('home')}}">
      <img src="{{ asset('image/logo-removebg.png') }}" alt="GameDen Logo" class="d-inline-block align-text-top" style="height: 40px;">
      GameDen
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <!--pages-->
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('products')}}">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('aboutus')}}">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact Us</a>
        </li>
        @guest
          <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Login</a></li>
          <li class="nav-item"><a class="nav-link btn btn-primary text-white" href="{{ url('/signup') }}">Sign Up</a></li>
        @else
          <li class="nav-item">
            <a class="nav-link" href="#">
              Welcome, {{ auth()->user()->name }}!
            </a>
          </li>
          <li class="nav-item"><a class="nav-link btn btn-danger text-white" href="{{ url('/logout') }}">Logout</a></li>
        @endguest
        <!--shopping bag-->
        <li class="nav-item"><a class="nav-link" href="{{ route('Basket') }}">
          <i class="fas fa-shopping-bag"></i>
        </a>
        </li>
      </ul>
    </div>
  </div>
</nav>