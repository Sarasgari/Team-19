<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameDen Admin Panel</title>
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

        .stats-card {
            background-color: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
            height: 100%;
        }

        .chart-container {
            position: relative;
            height: 250px;
        }

        /* Fixed stats section */
        .fixed-stats {
            position: fixed;
            top: 80px; /* Below the header */
            left: 240px;
            width: calc(100% - 240px);
            height: calc(100vh - 80px);
            overflow-y: auto;
            padding: 20px;
            z-index: 1;
        }

        .stats-card {
            margin: 20px;
        }

        /* Minimal Blue Search Bar Design */
        .search-bar {
            display: flex;
            align-items: center;
            background-color:rgb(231, 235, 254); /* Light blue background */
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
            color: #1e88e5; /* Blue color for the icon */
            margin-left: 10px;
        }

        .search-bar:hover {
            background-color: #bbdefb; /* Slightly darker blue on hover */
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

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar {
                width: 100%;
                height: auto;
                position: relative;
                border-right: none;
            }

            .header {
                left: 0;
                width: 100%;
            }

            .container-fluid {
                margin-left: 0;
                padding: 15px;
            }

            .stats-card {
                padding: 20px;
            }

            .fixed-stats {
                position: relative;
                top: 0;
                width: 100%;
                height: auto;
            }
            
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <nav class="navbar navbar-dark bg-dark p-3 shadow-lg">
        <div class="text-center">
            <a class="navbar-brand text-light d-block mx-auto mb-4" href="#">
                <img src="image/logo-removebg.png" alt="GameDen Logo" class="d-block mx-auto" style="height: 40px;">
                <span class="small text-white-50">Admin Panel</span>
            </a>
        </div>
        <ul class="nav flex-column w-100">
            <li class="nav-item"><a class="nav-link text-white" href="#"><i class="fas fa-home me-2"></i> Home</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="#"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="#"><i class="fas fa-box me-2"></i> Products</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="#"><i class="fas fa-shopping-cart me-2"></i> Orders</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="#"><i class="fas fa-users me-2"></i> Users</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="#"><i class="fas fa-cog me-2"></i> Settings</a></li>
        </ul>
        <div class="mt-auto text-center">
            <a class="nav-link text-danger" href="#"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
        </div>
    </nav>

    <!-- Header -->
    <div class="header">
        <div class="search-bar">
            <input type="text" placeholder="Search...">
            <i class="fas fa-search"></i>
        </div>
        <div class="icons">
            <div class="icon-container">
                <i class="fas fa-bell fa-lg"></i>
                <span class="notification-badge">3</span>
            </div>
            <!-- Profile Picture with Game Character Image -->
            <img src="image/profile-pic.jpg" alt="Profile" class="profile-pic">
            
        </div>
    </div>

    <!-- Fixed Stats Section -->
    <div class="fixed-stats">
        <div class="row">
            <div class="col-12 col-md-4 mb-3">
                <div class="stats-card">
                    <h5>Total Products</h5>
                    <div class="chart-container">
                        <canvas id="totalProductsChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <div class="stats-card">
                    <h5>Total Orders</h5>
                    <div class="chart-container">
                        <canvas id="totalOrdersChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <div class="stats-card">
                    <h5>Total Users</h5>
                    <div class="chart-container">
                        <canvas id="totalUsersChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

   

    

    <script>
        // Chart.js Configurations for Minimal and Detailed Graphs
        const totalProductsChart = new Chart(document.getElementById('totalProductsChart'), {
            type: 'bar',
            data: {
                labels: ['Total Products'],
                datasets: [{
                    label: 'Products',
                    data: [200],
                    backgroundColor: '#42a5f5', // Light Blue color
                    borderColor: '#1e88e5',
                    borderWidth: 2,
                    barThickness: 30, // Minimal bar thickness
                    hoverBackgroundColor: '#64b5f6',
                    hoverBorderColor: '#0d47a1',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return `Products: ${tooltipItem.raw}`;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#e0e0e0',
                            borderColor: '#e0e0e0',
                            borderWidth: 1,
                            lineWidth: 0.5
                        },
                        ticks: {
                            display: true,
                            color: '#555'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            display: true,
                            color: '#555'
                        }
                    }
                }
            }
        });

        const totalOrdersChart = new Chart(document.getElementById('totalOrdersChart'), {
            type: 'bar',
            data: {
                labels: ['Total Orders'],
                datasets: [{
                    label: 'Orders',
                    data: [150],
                    backgroundColor: '#66bb6a', // Green color
                    borderColor: '#43a047',
                    borderWidth: 2,
                    barThickness: 30, // Minimal bar thickness
                    hoverBackgroundColor: '#81c784',
                    hoverBorderColor: '#388e3c',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return `Orders: ${tooltipItem.raw}`;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#e0e0e0',
                            borderColor: '#e0e0e0',
                            borderWidth: 1,
                            lineWidth: 0.5
                        },
                        ticks: {
                            display: true,
                            color: '#555'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            display: true,
                            color: '#555'
                        }
                    }
                }
            }
        });

        const totalUsersChart = new Chart(document.getElementById('totalUsersChart'), {
            type: 'bar',
            data: {
                labels: ['Total Users'],
                datasets: [{
                    label: 'Users',
                    data: [1200],
                    backgroundColor: '#ff7043', // Orange color
                    borderColor: '#f4511e',
                    borderWidth: 2,
                    barThickness: 30, // Minimal bar thickness
                    hoverBackgroundColor: '#ff8a65',
                    hoverBorderColor: '#d32f2f',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return `Users: ${tooltipItem.raw}`;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#e0e0e0',
                            borderColor: '#e0e0e0',
                            borderWidth: 1,
                            lineWidth: 0.5
                        },
                        ticks: {
                            display: true,
                            color: '#555'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            display: true,
                            color: '#555'
                        }
                    }
                }
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
