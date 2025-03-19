<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm border-bottom">
  <div class="container-fluid">
  <a class="navbar-brand d-flex align-items-center text-primary" href="{{ route('home') }}" style="font-size: 1.5rem; margin-left: 25px;">
  <img src="{{ asset('image/logo1.png') }}" alt="GameDen Logo" class="me-2" style="height: 50px;">
</a>

    
    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      <ul class="navbar-nav text-center">
        <li class="nav-item">
          <a class="nav-link text-dark px-3" href="{{ route('products') }}">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark px-3" href="{{ route('aboutus') }}">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark px-3" href="{{ route('contactus') }}">Contact</a>
        </li>
      </ul>
    </div>
    
    <ul class="navbar-nav align-items-center">
      <li class="nav-item me-3">
        <a class="nav-link text-muted" href="">
          <i class="fas fa-heart"></i>
        </a>
      </li>
      <li class="nav-item me-3">
        <a class="nav-link text-muted" href="{{ route('Basket') }}">
          <i class="fas fa-shopping-bag"></i>
        </a>
      </li>
      
      @guest
        <li class="nav-item">
          <a class="nav-link text-muted" href="{{ route('login') }}">
            <i class="fas fa-user"></i>
          </a>
        </li>
      @else
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-muted" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user-circle"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm" aria-labelledby="userDropdown">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" href="{{ route('logout') }}">Logout</a></li>
          </ul>
        </li>
      @endguest
    </ul>
  </div>
</nav>

<style>
  .nav-link {
    transition: color 0.3s ease;
  }
  .nav-link:hover {
    color: #0d6efd !important;
  }
  .navbar-nav .nav-item i {
    font-size: 1.2rem;
  }
  .dropdown-menu {
    border-radius: 8px;
  }
</style>
