<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('home') }}">
      <img src="{{ asset('image/logo-removebg.png') }}" alt="GameDen Logo" class="d-inline-block align-text-top" style="height: 40px;">
      GameDen
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('products') ? 'active' : '' }}" href="{{ route('products') }}">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('aboutus') ? 'active' : '' }}" href="{{ route('aboutus') }}">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('contactus') ? 'active' : '' }}" href="{{ route('contactus') }}">Contact Us</a>
        </li>
      </ul>

      <ul class="navbar-nav">
        @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-primary text-white ms-2" href="{{ route('signup') }}">Sign Up</a>
          </li>
        @else
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome, {{ auth()->user()->name }}!
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
              <li><a class="dropdown-item" >Profile</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-danger" href="{{ route('logout') }}">Logout</a></li>
            </ul>
          </li>
        @endguest

        <li class="nav-item ms-3">
          <a class="nav-link" href="{{ route('Basket') }}">
            <i class="fas fa-shopping-bag"></i>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
