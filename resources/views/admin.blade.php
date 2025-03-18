<!--
  Developer: Sara Asgari
  University ID: 230344431
  Function: admin page layout and main page.
-->
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

    @include('include.adminheader')

    @include('include.adminbar')


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
