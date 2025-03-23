<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameDen - My Orders</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <style>
        /* Add your styles here */
        .order-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }
        
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
    </style>
</head>
<body>

@include('include.header')

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>My Orders</h2>
                <a href="{{ url('/products') }}" class="btn btn-primary">
                    <i class="fas fa-shopping-bag me-2"></i>Continue Shopping
                </a>
            </div>
            
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            @if(count($orders) > 0)
                @foreach($orders as $order)
                    <div class="order-card">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="d-flex justify-content-between">
                                    <h5>Order #{{ $order->id }}</h5>
                                    <span class="status-badge status-{{ $order->status }}">{{ ucfirst($order->status) }}</span>
                                </div>
                                <p class="text-muted mb-2">Ordered on {{ $order->created_at->format('F d, Y') }}</p>
                                
                                <!-- Order Items Summary -->
                                <div class="mt-3">
                                    @foreach($order->items as $item)
                                        <div class="d-flex align-items-center mb-2">
                                            <div>
                                                <h6 class="mb-0">{{ $item->game->title }}</h6>
                                                <small class="text-muted">{{ $item->game->platform ?? 'Unknown' }} • Qty: {{ $item->quantity }}</small>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            
                            <div class="col-md-4 text-md-end">
                                <div class="mb-3">
                                    <h5 class="mb-0">Total: ${{ number_format($order->total_amount, 2) }}</h5>
                                    <small class="text-muted">{{ $order->items->count() }} item(s)</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-info">
                    <p>You haven't placed any orders yet.</p>
                    <a href="{{ url('/products') }}" class="btn btn-primary mt-3">Browse Games</a>
                </div>
            @endif
        </div>
    </div>
</div>

@include('include.footer')

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>