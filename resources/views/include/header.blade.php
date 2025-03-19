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
          <a class="nav-link {{ Request::is('aboutus') ? 'active' : '' }}" href="{{ route('aboutus') }}">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('contactus') ? 'active' : '' }}" href="{{ route('contactus') }}">Contact Us</a>
        </li>
      </ul>

      <ul class="navbar-nav">
        <!-- Dark Mode Toggle Button -->
        <button id="theme-switch" class="btn btn-outline-light me-3">
          <svg id="dark-icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3">
            <path d="M450-120q-133 0-226.5-93.5T130-440q0-112 66-197t166-117q-1 5-1 10.5v10.5q0 125 88 213t213 88h10.5q5 0 10.5-1-28 100-113 166t-197 66Zm30-160q83 0 141.5-58.5T680-480q0-83-58.5-141.5T480-680q-83 0-141.5 58.5T280-480q0 83 58.5 141.5T480-280Zm0-200Z"/>
          </svg>

          <svg id="light-icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3" style="display: none;">
            <path d="M480-280q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480q0 83-58.5 141.5T480-280ZM200-440H40v-80h160v80Zm720 0H760v-80h160v80ZM440-760v-160h80v160h-80Zm0 720v-160h80v160h-80ZM256-650l-101-97 57-59 96 100-52 56Zm492 496-97-101 53-55 101 97-57 59Zm-98-550 97-101 59 57-100 96-56-52ZM154-212l101-97 55 53-97 101-59-57Z"/>
          </svg>
        </button>

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
              <li><a class="dropdown-item">Profile</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-danger" href="{{ route('logout') }}">Logout</a></li>
            </ul>
          </li>
        @endguest

        <li class="nav-item ms-3">
          <a class="nav-link" href="{{ route('Basket') }}">
            <i class="fas fa-shopping-bag"></i>
          </a>
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
<!-- Include JavaScript for Dark Mode -->
<script src="{{ asset('js/dark-mode.js') }}" defer></script>
<style>
  .navbar {
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1000; /* Ensures it stays above all other elements */
}
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
