<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameDen Admin - Orders</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <style>
        body {
            background-color: #f8f9fc;
            padding-top: 30px;
            max-width: 80%;
        }

        /* Cards */
        .stats-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        .stats-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 15px;
        }

        /* Status badges */
        .status-badge {
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .status-completed { background: #e6fff2; color: #00b248; }
        .status-pending { background: #fff8e6; color: #ffa000; }
        .status-cancelled { background: #ffe6e6; color: #d32f2f; }

        /* Table */
        .table-container {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        /* Modal */
        .modal-content {
            border-radius: 15px;
        }

        .order-item {
            background: #f8f9fc;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

@include('include.adminheader')

@include('include.adminbar')

   

    <!-- Main Content -->
    <div class="container-fluid">
        <!-- Stats Row -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-icon" style="background: #e3f2fd; color: #2196f3;">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h4>Total Orders</h4>
                    <h2>1,257</h2>
                    <small class="text-success"><i class="fas fa-arrow-up"></i> 12% increase</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-icon" style="background: #e8f5e9; color: #4caf50;">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h4>Completed</h4>
                    <h2>987</h2>
                    <small class="text-success"><i class="fas fa-arrow-up"></i> 8% increase</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-icon" style="background: #fff3e0; color: #ff9800;">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h4>Pending</h4>
                    <h2>247</h2>
                    <small class="text-warning">No change</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-icon" style="background: #ffebee; color: #f44336;">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <h4>Cancelled</h4>
                    <h2>23</h2>
                    <small class="text-danger"><i class="fas fa-arrow-down"></i> 3% decrease</small>
                </div>
            </div>
        </div>

        <!-- Orders Table -->
        <div class="table-container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4>Recent Orders</h4>
                <div>
                    <button class="btn btn-outline-primary me-2">
                        <i class="fas fa-filter"></i> Filter
                    </button>
                    <button class="btn btn-outline-secondary">
                        <i class="fas fa-download"></i> Export
                    </button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Products</th>
                            <th>Total</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#ORD-2024-001</td>
                            <td>John Smith</td>
                            <td>Call of Duty: Black Ops 6</td>
                            <td>£49.99</td>
                            <td>2024-01-15</td>
                            <td><span class="status-badge status-completed">Completed</span></td>
                            <td>
                                <button class="btn btn-sm btn-primary" onclick="viewOrder('ORD-2024-001')">View</button>
                            </td>
                        </tr>
                        <!-- Add more order rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Order Details Modal -->
    <div class="modal fade" id="orderModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Order Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="orderDetails">
                    <!-- Order details will be populated here -->
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function viewOrder(orderId) {
            const modal = new bootstrap.Modal(document.getElementById('orderModal'));
            
            // Sample order data
            const orderDetails = {
                'ORD-2024-001': {
                    customer: 'John Smith',
                    email: 'john.smith@email.com',
                    phone: '+44 123 456 7890',
                    address: '123 Gaming Street, London, UK',
                    items: [
                        {
                            name: 'Call of Duty: Black Ops 6',
                            price: '£49.99',
                            quantity: 1
                        }
                    ],
                    total: '£49.99',
                    status: 'Completed'
                }
            };

            const order = orderDetails[orderId];
            if (order) {
                document.getElementById('orderDetails').innerHTML = `
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6>Customer Information</h6>
                            <p>
                                <strong>Name:</strong> ${order.customer}<br>
                                <strong>Email:</strong> ${order.email}<br>
                                <strong>Phone:</strong> ${order.phone}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6>Shipping Address</h6>
                            <p>${order.address}</p>
                        </div>
                    </div>
                    <h6>Order Items</h6>
                    ${order.items.map(item => `
                        <div class="order-item">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6>${item.name}</h6>
                                    <small>Quantity: ${item.quantity}</small>
                                </div>
                                <div>${item.price}</div>
                            </div>
                        </div>
                    `).join('')}
                    <div class="text-end mt-3">
                        <h5>Total: ${order.total}</h5>
                    </div>
                `;
                modal.show();
            }
        }
    </script>
</body>
</html>
