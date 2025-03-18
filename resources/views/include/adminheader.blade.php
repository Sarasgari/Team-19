<!--
  Developer: Sara Asgari
  University ID: 230344431
  Function: Adminpage sidebar for consistant Design
-->
<nav class="navbar navbar-dark p-3 shadow-lg">
    <div class="d-flex flex-column align-items-center w-100">
        <a class="navbar-brand text-light mb-4" href="#">
            <img src="{{ asset('image/logo-removebg.png') }}" alt="GameDen Logo" class="d-block mx-auto" style="height: 40px;">
            <span class="small text-white-50 d-block text-center">Admin Panel</span>
        </a>
    </div>

    <ul class="nav flex-column w-100">
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('admin') }}">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('admin.products') }}">
                <i class="fas fa-box me-2"></i> Products
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('admin.orders') }}">
                <i class="fas fa-shopping-cart me-2"></i> Orders
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('admin.users') }}">
                <i class="fas fa-users me-2"></i> Users
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('admin.settings') }}">
                <i class="fas fa-cog me-2"></i> Settings
            </a>
        </li>
    </ul>

    <div class="mt-auto text-center w-100">
        <a class="nav-link text-danger" href="{{ route('logout') }}" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt me-2"></i> Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</nav>

<style>
    .navbar {
        position: fixed;
        top: 0;
        left: 0;
        height: 100vh;
        width: 240px;
        background: rgba(20, 20, 20, 0.9);
        backdrop-filter: blur(10px);
        border-right: 1px solid rgba(255, 255, 255, 0.1);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        z-index: 1000;
        padding-bottom: 20px;
    }

    .navbar a {
        color: white;
        text-decoration: none;
        padding: 12px 15px;
        display: flex;
        align-items: center;
        transition: background 0.3s ease, padding-left 0.3s ease;
    }

    .navbar a:hover {
        background: rgba(255, 255, 255, 0.1);
        padding-left: 20px;
    }

    .navbar-brand {
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
</style>