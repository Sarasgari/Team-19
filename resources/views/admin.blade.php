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
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
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
            <li class="nav-item"><a class="nav-link text-white" href="{{ route('admin') }}"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="{{ route('admin.products') }}"><i class="fas fa-box me-2"></i> Products</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="{{ route('admin.orders') }}"><i class="fas fa-shopping-cart me-2"></i> Orders</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="{{ route('admin.users') }}"><i class="fas fa-users me-2"></i> Users</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="{{ route('admin.settings') }}"><i class="fas fa-cog me-2"></i> Settings</a></li>
        </ul>
        <div class="mt-auto text-center">
            <a class="nav-link text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
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
            <!-- Profile Picture -->
            <img src="image/profile-pic.jpg" alt="Profile" class="profile-pic">
            
        </div>
    </div>

    <!-- Stats Section -->
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
                    backgroundColor: '#42a5f5',
                    borderColor: '#1e88e5',
                    borderWidth: 2,
                    barThickness: 30, 
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
                    backgroundColor: '#66bb6a', 
                    borderColor: '#43a047',
                    borderWidth: 2,
                    barThickness: 30, 
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
                    backgroundColor: '#ff7043', 
                    borderColor: '#f4511e',
                    borderWidth: 2,
                    barThickness: 30, 
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
