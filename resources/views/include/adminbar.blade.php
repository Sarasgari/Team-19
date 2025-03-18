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
            <img src="{{asset('image/profile-pic.jpg')}}" alt="Profile" class="profile-pic">
        </div>
    </div>
    <style>
        .header {
            position: fixed;
            top: 0;
            left: 240px;
            width: calc(100% - 240px);
            height: 60px;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            border-bottom: 1px solid #ddd;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .container-fluid {
            margin-left: 240px;
            padding: 25px;
            margin-top: 80px;
            position: relative;
            z-index: 1;
        }

        .btn-light {
            background-color: #fff;
            color: #333;
            border: 1px solid #ddd;
            box-shadow: none;
        }

        .btn-light:hover {
            background-color: #f8f9fa;
            border-color: #ccc;
        }

        
        .search-bar {
            display: flex;
            align-items: center;
            background-color:rgb(231, 235, 254);
            border-radius: 20px;
            padding: 5px 15px;
            width: 300px;
            transition: all 0.3s ease;
        }

        .search-bar input {
            border: none;
            background: transparent;
            outline: none;
            color: #333;
            font-size: 14px;
            width: 100%;
            padding: 5px;
            border-radius: 15px;
        }

        .search-bar input::placeholder {
            color: #6c757d;
        }

        .search-bar i {
            color: #1e88e5; 
            margin-left: 10px;
        }

        .search-bar:hover {
            background-color: #bbdefb;
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
            background-color: #e53935;
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
        }
    </style>