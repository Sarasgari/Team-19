<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameDen Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Add page-specific CSS -->
    @yield('page-css')
</head>
<body>

    <!-- Include the Admin Header -->
    @include('include.adminheader')

    <!-- Include the Admin Sidebar -->
    @include('include.adminbar')

    <!-- Main Content -->
    <div class="container-fluid">
        @yield('content')
    </div>

    <!-- Add page-specific JS -->
    @yield('page-js')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
