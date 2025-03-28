
<!--
  Developer: Abdulrahman Mostafa
  University ID: 2300466694
  Function: Payment page shows that the payment went successful and smoothly
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful | GameDen</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/Payment.css') }}">
</head>
<body>
    <div class="success-container">
        <div class="tick-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <h1>Payment Successful!</h1>
        <p>Thank you for your purchase. Your order has been processed successfully.</p>
        <div class="order-info">
            <p>An email confirmation has been sent to your email address.</p>
        </div>
        <a href="{{ route('home') }}" class="home-button">
            <i class="fas fa-home"></i> Return to Home
        </a>
    </div>
</body>
</html>