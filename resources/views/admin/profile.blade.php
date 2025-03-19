<!-- Eyad Alsaher 230047989 &>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameDen Admin - Products</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background-color: #f4f4f7;
            color: #333;
            margin-top: 60px;
        }

        /* Sidebar */
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
        }

        /* Header */
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

        /* Product specific styles */
        .product-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            padding: 15px;
            transition: transform 0.2s;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .product-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 4px;
        }

        /* Search Bar */
        .search-bar {
            display: flex;
            align-items: center;
            background-color: rgb(231, 235, 254);
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
        }

        .search-bar i {
            color: #1e88e5;
            margin-left: 10px;
        }

        /* Profile section */
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

        /* Modal styles */
        .modal-body input, 
        .modal-body textarea, 
        .modal-body select {
            margin-bottom: 15px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .header {
                left: 0;
                width: 100%;
            }

            .container-fluid {
                margin-left: 0;
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <nav class="navbar navbar-dark bg-dark p-3 shadow-lg">
        <div class="text-center">
            <a class="navbar-brand text-light d-block mx-auto mb-4" href="#">
                <alt="GameDen" class="d-block mx-auto" style="height: 40px;">
                <span class="small text-white-50"></span>
            </a>
        </div>
        <ul class="nav flex-column w-100">
            <li class="nav-item"><a class="nav-link text-white" href="admin.html"><i class="fas fa-home me-2"></i> Home</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="admin.html"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a></li>
            <li class="nav-item"><a class="nav-link text-white active" href="products.html"><i class="fas fa-box me-2"></i> Products</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="#"><i class="fas fa-shopping-cart me-2"></i> Orders</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="{{route('admin.users')}}"><i class="fas fa-users me-2"></i> Users</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="{{route('admin.settings')}}"><i class="fas fa-cog me-2"></i> Settings</a></li>
        </ul>
        <div class="mt-auto text-center">
            <a class="nav-link text-danger" href="#"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
        </div>
    </nav>

    <!-- Header -->
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

    <!-- Main Content -->
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>User Profile</h2>
        </div>
        <div class="card">
        <h5 class="p-3"> User Informatin </h5>
        <div class="form-group p-3">
            <label for="name">Full Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" disabled>
        </div>

        <div class="form-group p-3">
            <label for="email">Email Address</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" disabled>
        </div>
    </div>
    <div class="card mt-3">
        <h5 class="p-3"> User Orders </h5>
        <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Total</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                            <td>#ORD-2024-001</td>
                            <td>£49.99</td>
                            <td>2024-01-15</td>
                            <td><span class="status-badge status-completed">Completed</span></td>
                        </tr>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->total}}</td>
                            <td>{{$order->created_at->format(YY-MM-DD)}}</td>
                            <td><span class="status-badge status-completed">{{$order->status}}</span></td>
                        </tr>
                        @endforeach
                        <!-- Add more order rows as needed -->
                    </tbody>
                </table>
            </div>
    </div>
    <div class="card mt-3">
        <h5 class="p-3"> User Cart </h5>
        <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Cart ID</th>
                            <th>Product</th>
                            <th>quantity</th>
                            <th>total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#CRT-2024-001</td>
                            <td>Call of Duty: Black Ops 6</td>
                            <td>3</td>
                            <td>£49.99</td>
                        </tr>
                        @foreach($cartItems as $cartItem)
                        <tr>
                        <td>{{$cartItem->id}}</td>
                            <td>{{$cartItem->product}}</td>
                            <td>{{$cartItem->quantity}}</td>
                            <td>{{$cartItem->total}}</td>
                        </tr>
                        @endforeach
                        <!-- Add more order rows as needed -->
                    </tbody>
                </table>
            </div>
    </div>
    </div>
        <button type="submit" class="btn btn-primary mt-2" onclick="window.location.href='{{ route('admin.users')}}'">Back</button>
       
    </div>
    </div>

   

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
