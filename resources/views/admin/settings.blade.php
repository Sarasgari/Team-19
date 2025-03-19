<!-- Eyad Alsaher 230047989 -->
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
    
@include('include.adminheader')

@include('include.adminbar')


    <!-- Main Content -->
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Settings Management</h2>
        </div>

        
        <div class="row">
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="site_name">Site Name</label>
            <input type="text" name="site_name" id="site_name" class="form-control" value="{{ $settings->site_name ?? '' }}" required>
        </div>

        <div class="form-group">
            <label for="site_email">Admin Email</label>
            <input type="email" name="site_email" id="site_email" class="form-control" value="{{ $settings->site_email ?? '' }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Save Settings</button>
        </form>
        </div>
    </div>

   

    <script>
    $(document).ready(function() {
        $('form').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('admin.settings.update') }}",
                type: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    alert("Settings updated successfully!");
                }
            });
        });
    });
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
