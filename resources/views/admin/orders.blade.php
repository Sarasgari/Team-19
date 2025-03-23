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
        .status-processing { background: #e6f4ff; color: #0277bd; }
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
                    <h2>{{ $totalOrders }}</h2>
                    <small class="text-success"><i class="fas fa-arrow-up"></i> Recent activity</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-icon" style="background: #e8f5e9; color: #4caf50;">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h4>Completed</h4>
                    <h2>{{ $completedOrders }}</h2>
                    <small class="text-success"><i class="fas fa-arrow-up"></i> Recent activity</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-icon" style="background: #fff3e0; color: #ff9800;">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h4>Pending</h4>
                    <h2>{{ $pendingOrders }}</h2>
                    <small class="text-warning">Needs attention</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-icon" style="background: #ffebee; color: #f44336;">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <h4>Cancelled</h4>
                    <h2>{{ $cancelledOrders }}</h2>
                    <small class="text-danger">Requires review</small>
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
                        @forelse($orders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>
                                @if($order->items->count() > 0)
                                    {{ $order->items->first()->game->title }}
                                    @if($order->items->count() > 1) 
                                        <span class="text-muted">+{{ $order->items->count() - 1 }} more</span>
                                    @endif
                                @else
                                    <span class="text-muted">No items</span>
                                @endif
                            </td>
                            <td>${{ number_format($order->total_amount, 2) }}</td>
                            <td>{{ $order->created_at->format('Y-m-d') }}</td>
                            <td><span class="status-badge status-{{ $order->status }}">{{ ucfirst($order->status) }}</span></td>
                            <td>
                                <button class="btn btn-sm btn-primary" onclick="viewOrder('{{ $order->id }}')">View</button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">No orders found</td>
                        </tr>
                        @endforelse
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
                <div class="modal-footer">
                    <form id="updateStatusForm" method="POST" action="">
                        @csrf
                        @method('PUT')
                        <div class="d-flex">
                            <select name="status" class="form-select me-2">
                                <option value="pending">Pending</option>
                                <option value="processing">Processing</option>
                                <option value="completed">Completed</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                            <button type="submit" class="btn btn-primary">Update Status</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function viewOrder(orderId) {
            const modal = new bootstrap.Modal(document.getElementById('orderModal'));
            
            // Set the form action for updating status
            document.getElementById('updateStatusForm').action = `/admin/orders/${orderId}/update-status`;
            
            // Fetch order details from server
            fetch(`/admin/orders/${orderId}/details`)
                .then(response => response.json())
                .then(order => {
                    // Format the order details
                    let itemsHtml = '';
                    
                    if (order.items && order.items.length > 0) {
                        order.items.forEach(item => {
                            itemsHtml += `
                                <div class="order-item">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h6>${item.game.title}</h6>
                                            <small>Platform: ${item.game.platform} | Quantity: ${item.quantity}</small>
                                        </div>
                                        <div>$${item.price}</div>
                                    </div>
                                </div>
                            `;
                        });
                    } else {
                        itemsHtml = '<p class="text-muted">No items in this order</p>';
                    }
                    
                    // Update the modal content
                    document.getElementById('orderDetails').innerHTML = `
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h6>Customer Information</h6>
                                <p>
                                    <strong>Name:</strong> ${order.user.name}<br>
                                    <strong>Email:</strong> ${order.user.email}<br>
                                    <strong>Order Date:</strong> ${new Date(order.created_at).toLocaleString()}<br>
                                    <strong>Payment Method:</strong> ${order.payment_method}
                                </p>
                            </div>
                            <div class="col-md-6">
                                <h6>Order Status</h6>
                                <p><span class="status-badge status-${order.status}">${order.status.charAt(0).toUpperCase() + order.status.slice(1)}</span></p>
                                <p>Last Updated: ${new Date(order.updated_at).toLocaleString()}</p>
                            </div>
                        </div>
                        <h6>Order Items</h6>
                        ${itemsHtml}
                        <div class="text-end mt-3">
                            <h5>Total: $${parseFloat(order.total_amount).toFixed(2)}</h5>
                        </div>
                    `;
                    
                    // Set the current status in the dropdown
                    const statusSelect = document.querySelector('#updateStatusForm select[name="status"]');
                    if (statusSelect) {
                        statusSelect.value = order.status;
                    }
                    
                    modal.show();
                })
                .catch(error => {
                    console.error('Error fetching order details:', error);
                    alert('There was an error fetching the order details. Please try again.');
                });
        }
    </script>
</body>
</html>