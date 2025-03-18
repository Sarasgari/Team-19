<!--
  Developer: Sara Asgari
  University ID: 230344431
  Function: Adminpage header for consistant Design
-->
<div class="header">
    <div class="search-bar">
        <input type="text" placeholder="Search users...">
        <i class="fas fa-search"></i>
    </div>
    <div class="icons">
        <div class="icon-container">
            <i class="fas fa-bell fa-lg"></i>
            <span class="notification-badge">3</span>
        </div>
        <!-- Profile Picture with Game Character Image -->
        <img src="{{ asset('image/logo-removebg.png') }}" alt="GameDen Logo" class="d-block mx-auto" style="height: 40px;">
    </div>
</div>

<style>
     .header {
        position: fixed;
        top: 0;
        left: 240px; /* Aligns with sidebar width */
        width: calc(100% - 240px); /* Adjust width to fit screen minus sidebar */
        height: 60px;
        background: #f8f9fa; /* Light background */
        color: #333; /* Dark text color for readability */
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 20px;
        border-bottom: 1px solid #ddd; /* Light border for separation */
        box-shadow: 0px rgba(0, 0, 0, 0.1); /* Bottom shadow for depth */
        z-index: 1000;
    }

    .container-fluid {
        margin-left: 240px; /* Same as sidebar width */
        padding: 25px;
        margin-top: 80px;
        position: relative;
        z-index: 1;
    }

    .search-bar {
        display: flex;
        align-items: center;
        background-color: #f1f1f1; /* Light background for search bar */
        border-radius: 20px;
        padding: 5px 15px;
        width: 300px;
        transition: all 0.3s ease;
    }

    .search-bar input {
        border: none;
        background: transparent;
        outline: none;
        color: #333; /* Dark text color */
        font-size: 14px;
        width: 100%;
        padding: 5px;
        border-radius: 15px;
    }

    .search-bar input::placeholder {
        color: #888; /* Lighter placeholder text */
    }

    .search-bar i {
        color: #1e88e5; /* Blue icon color */
        margin-left: 10px;
    }

    .search-bar:hover {
        background-color: #e3f2fd; /* Light hover background */
    }

    /* Profile and Notification Section */
    .icons {
        display: flex;
        align-items: center;
    }

    .icon-container {
        position: relative;
        margin-right: 15px;
    }

    .notification-badge {
        position: absolute;
        top: -5px;
        right: -5px;
        background-color: #e53935; /* Red badge color */
        color: white;
        font-size: 10px;
        border-radius: 50%;
        padding: 3px 7px;
    }

    .profile-pic {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
    }

    @media (max-width: 768px) {
        .header {
            left: 0;
            width: 100%;
        }

        .search-bar {
            width: 200px; /* Adjust search bar width for smaller screens */
        }
    }
</style>