<!--
  Developer: Abdulrahman Mostafa
  University ID: 2300466694
  Function: Payment Form page let the user prouced with payment 
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link rel="stylesheet" href="{{ asset('css/PaymentForm.css') }}">
   
</head>
<body>
<!--paymentform-->
<form id="CheckoutForm" action="{{ route('orders.store') }}" method="POST">
    @csrf
    <h1>Payment</h1>
    
    <!-- Order Summary Section -->
    @if(isset($cart) && count($cart) > 0)
    <div class="order-summary">
        <h3>Order Summary</h3>
        @foreach($cart as $item)
            <div class="order-item">
                <span>{{ $item['name'] }} x {{ $item['quantity'] }}</span>
                <span>£{{ number_format($item['price'] * $item['quantity'], 2) }}</span>
            </div>
        @endforeach
        <div class="order-total">
            Total: £{{ number_format($totalAmount ?? 0, 2) }}
        </div>
    </div>
    @endif

    <label for="name">Full Name</label><br>
    <input class="box1" type="text" name="name" id="name" placeholder="Enter Name" required><br>

    <label for="email">Email</label><br>
    <input class="box1" type="email" name="email" id="email" placeholder="Email" required><br>

    <label for="Address">Billing Address</label><br>
    <input class="box1" type="text" name="address" id="Address" placeholder="Address" required><br>

    <label for="cardholder-name">Card Holder Name</label><br>
    <input class="box1" type="text" name="cardholder-name" id="cardholder-name" placeholder="Card Holder Name" required><br>

    <label for="CardNumber">Card Number</label><br>
    <input class="box1" type="text" name="number" id="CardNumber" placeholder="1234 1234 1234 1234" maxlength="19" required><br>

    <div class="Block1">
        <label for="ExpDate">Exp. Date</label><br>
        <input class="box2" type="month" id="ExpDate" name="exp_date" required><br>
    </div>

    <div class="Block1">
        <label for="cvv">Card CVV</label><br>
        <input class="box2" type="text" id="cvv" name="cvv" placeholder="CVV" maxlength="3" required><br>
    </div>

    <button class="box3" type="button" onclick="Formcomplete()">Pay Now</button>
    <button class="box3" type="button" onclick="redirectToHome()">Cancel</button>
    
    
    <script>
        var homeRoute = "{{ route('home') }}";
        var paymentRoute = "{{ route('payment') }}";
    </script>
    
    
    <script src="{{ asset('js/PaymentForm.js') }}"></script>
</form>

</body>
</html>