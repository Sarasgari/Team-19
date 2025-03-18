<!--
  Developer: Sara Asgari
  University ID: 230344431
  Function: Adminpage sidebar for consistant Design
-->
<nav class="navbar navbar-light p-3 shadow-lg">
    <div class="d-flex flex-column align-items-center w-100">
        <a class="navbar-brand text-dark mb-4" href="#">
            <img src="{{asset('image/profile-pic.jpg')}}" alt="Profile" class="profile-pic" style="height: 60px; width: 60px; border-radius: 50%;">
            <span class="small text-muted d-block text-center">Admin</span>
        </a>
    </div>

    <ul class="nav flex-column w-100">
        <li class="nav-item">
            <a class="nav-link text-dark" href="{{ route('admin') }}">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark" href="{{ route('admin.products') }}">
                <i class="fas fa-box me-2"></i> Products
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark" href="{{ route('admin.orders') }}">
                <i class="fas fa-shopping-cart me-2"></i> Orders
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark" href="{{ route('admin.users') }}">
                <i class="fas fa-users me-2"></i> Users
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark" href="{{ route('admin.settings') }}">
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
        background: #f8f9fa; /* Light background color */
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        z-index: 1000;
        padding-bottom: 20px;
        transition: all 0.3s ease-in-out;
    }

    .navbar a {
        color: #495057; /* Dark gray text color */
        text-decoration: none;
        padding: 12px 15px;
        display: flex;
        align-items: center;
        border-radius: 5px;
        transition: background 0.3s ease, padding-left 0.3s ease;
    }

    .navbar a:hover {
        background: rgba(0, 123, 255, 0.1); /* Blue hover effect */
        padding-left: 20px;
    }

    .navbar-brand {
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .profile-pic {
        border-radius: 50%; /* Circular profile picture */
        border: 2px solid #007bff; /* Blue border around profile pic */
    }

    .nav-link {
        font-size: 16px; /* Adjusted font size */
        font-weight: 500;
    }

    .nav-item i {
        font-size: 18px; /* Slightly bigger icons */
        color: #007bff; /* Blue icon color */
    }

    .nav-item i:hover {
        color: #0056b3; /* Darker blue on hover */
    }

    /* Mobile responsiveness */
    @media (max-width: 768px) {
        .navbar {
            width: 100%;
            height: auto;
            position: relative;
            box-shadow: none;
        }

        .navbar a {
            text-align: center;
        }
    }
</style>