@extends('layouts.admin')

@section('content')
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
                @if(isset($totalOrders) && $totalOrders > 0)
                <small class="text-success"><i class="fas fa-arrow-up"></i> Active orders</small>
                @else
                <small class="text-muted">No orders yet</small>
                @endif
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-icon" style="background: #e8f5e9; color: #4caf50;">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h4>Completed</h4>
                <h2>{{ $completedOrders }}</h2>
                @if(isset($completedOrders) && $completedOrders > 0)
                <small class="text-success"><i class="fas fa-arrow-up"></i> Successfully delivered</small>
                @else
                <small class="text-muted">No completed orders</small>
                @endif
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-icon" style="background: #fff3e0; color: #ff9800;">
                    <i class="fas fa-clock"></i>
                </div>
                <h4>Pending</h4>
                <h2>{{ $pendingOrders }}</h2>
                @if(isset($pendingOrders) && $pendingOrders > 0)
                <small class="text-warning">Awaiting processing</small>
                @else
                <small class="text-muted">No pending orders</small>
                @endif
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-icon" style="background: #ffebee; color: #f44336;">
                    <i class="fas fa-times-circle"></i>
                </div>
                <h4>Cancelled</h4>
                <h2>{{ $cancelledOrders }}</h2>
                @if(isset($cancelledOrders) && $cancelledOrders > 0)
                <small class="text-danger"><i class="fas fa-arrow-down"></i> Orders cancelled</small>
                @else
                <small class="text-muted">No cancelled orders</small>
                @endif
            </div>
        </div>
    </div>

    <!-- Orders Table -->
    <div class="table-container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4>Recent Orders</h4>
            <div>
                <button class="btn btn-outline-primary me-2" id="filterBtn">
                    <i class="fas fa-filter"></i> Filter
                </button>
                <button class="btn btn-outline-secondary" id="exportBtn">
                    <i class="fas fa-download"></i> Export
                </button>
            </div>
        </div>
        
        <!-- Filter options (hidden by default) -->
        <div class="filter-options bg-light p-3 mb-3 rounded" style="display: none;">
            <div class="row">
                <div class="col-md-3">
                    <label for="statusFilter">Status</label>
                    <select class="form-select" id="statusFilter">
                        <option value="">All Statuses</option>
                        <option value="pending">Pending</option>
                        <option value="processing">Processing</option>
                        <option value="completed">Completed</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="dateFilter">Date Range</label>
                    <select class="form-select" id="dateFilter">
                        <option value="">All Time</option>
                        <option value="today">Today</option>
                        <option value="week">This Week</option>
                        <option value="month">This Month</option>
                    </select>
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button class="btn btn-primary" id="applyFilterBtn">Apply</button>
                    <button class="btn btn-secondary ms-2" id="resetFilterBtn">Reset</button>
                </div>
            </div>
        </div>
        
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
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
                        <td>{{ $order->user->name ?? 'Guest' }}</td>
                        <td>£{{ number_format($order->total, 2) }}</td>
                        <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <span class="status-badge status-{{ $order->status }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-primary view-order-btn" data-id="{{ $order->id }}">
                                View
                            </button>
                            <div class="btn-group">
                                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    Update
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item update-status" data-id="{{ $order->id }}" data-status="pending">Pending</a></li>
                                    <li><a class="dropdown-item update-status" data-id="{{ $order->id }}" data-status="processing">Processing</a></li>
                                    <li><a class="dropdown-item update-status" data-id="{{ $order->id }}" data-status="completed">Completed</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item update-status" data-id="{{ $order->id }}" data-status="cancelled">Cancelled</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">No orders found</td>
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
                <div class="text-center py-4">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="printOrderBtn">Print</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Filter toggle
        const filterBtn = document.getElementById('filterBtn');
        const filterOptions = document.querySelector('.filter-options');
        
        filterBtn.addEventListener('click', function() {
            filterOptions.style.display = filterOptions.style.display === 'none' ? 'block' : 'none';
        });
        
        // View order details
        const viewOrderBtns = document.querySelectorAll('.view-order-btn');
        viewOrderBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const orderId = this.getAttribute('data-id');
                viewOrder(orderId);
            });
        });
        
        // Update order status
        const updateStatusBtns = document.querySelectorAll('.update-status');
        updateStatusBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const orderId = this.getAttribute('data-id');
                const status = this.getAttribute('data-status');
                updateOrderStatus(orderId, status);
            });
        });
        
        // Export to CSV functionality
        document.getElementById('exportBtn').addEventListener('click', function() {
            exportOrdersToCSV();
        });
    });
    
    function viewOrder(orderId) {
    const modal = new bootstrap.Modal(document.getElementById('orderModal'));
    
    // Show loading in modal
    document.getElementById('orderDetails').innerHTML = `
        <div class="text-center py-4">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    `;
    
    // Show modal while loading
    modal.show();
    
    // Fetch order details
    fetch(`/admin/orders/${orderId}`)
        .then(response => response.json())
        .then(order => {
            // Format the order details
            let orderHtml = `
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6>Order Information</h6>
                        <p>
                            <strong>Order ID:</strong> #${order.id}<br>
                            <strong>Date:</strong> ${new Date(order.created_at).toLocaleString()}<br>
                            <strong>Status:</strong> <span class="badge bg-${getStatusColor(order.status)}">${order.status}</span>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h6>Customer Information</h6>
                        <p>
                            <strong>Name:</strong> ${order.user ? order.user.name : 'Guest'}<br>
                            <strong>Email:</strong> ${order.user ? order.user.email : 'N/A'}<br>
                        </p>
                    </div>
                </div>
                
                <h6>Order Items</h6>
            `;
            
            // Add order items
            if (order.items && order.items.length > 0) {
                orderHtml += `
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Game</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                `;
                
                order.items.forEach(item => {
                    orderHtml += `
                        <tr>
                            <td>${item.game_title}</td>
                            <td>£${parseFloat(item.price).toFixed(2)}</td>
                            <td>${item.quantity}</td>
                            <td>£${parseFloat(item.total).toFixed(2)}</td>
                        </tr>
                    `;
                });
                
                orderHtml += `
                        </tbody>
                    </table>
                `;
            } else {
                orderHtml += `<p class="text-muted">No items found for this order.</p>`;
            }
            
            // Add order summary
            orderHtml += `
                <div class="order-summary p-3 mb-3 bg-light rounded d-flex justify-content-end">
                    <h5>Total: <span class="text-success">£${parseFloat(order.total).toFixed(2)}</span></h5>
                </div>
            `;
            
            document.getElementById('orderDetails').innerHTML = orderHtml;
        })
        .catch(error => {
            document.getElementById('orderDetails').innerHTML = `
                <div class="alert alert-danger">
                    Error loading order details: ${error.message}
                </div>
            `;
        });
}
    
    function updateOrderStatus(orderId, status) {
        if (!confirm(`Are you sure you want to update this order to ${status}?`)) {
            return;
        }
        
        // Send AJAX request to update status
        fetch(`/admin/orders/${orderId}/status`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ status: status })
        })
        .then(response => response.json())
        .then(data => {
            alert(data.success);
            location.reload(); // Reload to see changes
        })
        .catch(error => {
            alert('Error updating order status');
            console.error('Error:', error);
        });
    }
    
    function exportOrdersToCSV() {
        // Get table data
        const table = document.querySelector('table');
        let csv = [];
        
        // Get headers
        const headers = [];
        const headerCells = table.querySelectorAll('thead th');
        headerCells.forEach(cell => {
            headers.push(cell.textContent.trim());
        });
        csv.push(headers.join(','));
        
        // Get rows
        const rows = table.querySelectorAll('tbody tr');
        rows.forEach(row => {
            const rowData = [];
            const cells = row.querySelectorAll('td');
            cells.forEach((cell, index) => {
                // Skip the actions column
                if (index !== cells.length - 1) {
                    rowData.push('"' + cell.textContent.trim().replace(/"/g, '""') + '"');
                }
            });
            csv.push(rowData.join(','));
        });
        
        // Create CSV file
        const csvContent = csv.join('\n');
        const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
        const url = URL.createObjectURL(blob);
        
        // Create download link
        const link = document.createElement('a');
        const date = new Date().toISOString().split('T')[0];
        link.setAttribute('href', url);
        link.setAttribute('download', `orders_export_${date}.csv`);
        link.style.visibility = 'hidden';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
    
    function getStatusColor(status) {
        switch(status) {
            case 'completed': return 'success';
            case 'pending': return 'warning';
            case 'processing': return 'info';
            case 'cancelled': return 'danger';
            default: return 'secondary';
        }
    }
</script>
@endsection

<style>
    /* General Body Styles */
    body {
        background-color: #f8f9fc;
    }

    /* Cards */
    .stats-card {
        background: white;
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        margin-bottom: 20px;
        transition: transform 0.3s;
    }

    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
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
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: bold;
        text-transform: capitalize;
    }

    .status-completed { 
        background: #e6fff2; 
        color: #00b248; 
    }
    
    .status-pending { 
        background: #fff8e6; 
        color: #ffa000; 
    }
    
    .status-processing { 
        background: #e6f4ff; 
        color: #0d6efd; 
    }
    
    .status-cancelled { 
        background: #ffe6e6; 
        color: #d32f2f; 
    }

    /* Table */
    .table-container {
        background: white;
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .table th, .table td {
        vertical-align: middle;
    }

    /* Order details */
    .order-item {
        background: #f8f9fc;
        border-radius: 10px;
        margin-bottom: 10px;
    }

    /* Filter options */
    .filter-options {
        border: 1px solid #dee2e6;
        transition: all 0.3s;
    }

    /* Animation */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .filter-options {
        animation: fadeIn 0.3s ease-in-out;
    }
</style>