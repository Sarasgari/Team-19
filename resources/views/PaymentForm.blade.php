<!--
  Developer: Abdulrahman Mostafa
  University ID: 2300466694
  Function: Enhanced Payment Form page let the user proceed with payment 
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameDen - Complete Your Purchase</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/PaymentForm.css') }}">
</head>
<body>
    <!-- Form now submits to orders.store to create the order first -->
    <form id="CheckoutForm" action="{{ route('orders.store') }}" method="POST" onsubmit="return validateForm()">
        @csrf
        <h1><i class="fas fa-credit-card me-2"></i> Payment Details</h1>

        <!-- Display total amount -->
        <div class="total-section">
            <h2><i class="fas fa-shopping-cart me-2"></i> Total: £{{ number_format($totalAmount ?? 0, 2) }}</h2>
        </div>
        
        <label for="name"><i class="fas fa-user me-2"></i> Full Name</label>
        <input class="box1" type="text" name="name" id="name" placeholder="Enter your full name" required>

        <label for="email"><i class="fas fa-envelope me-2"></i> Email Address</label>
        <input class="box1" type="email" name="email" id="email" placeholder="your@email.com" required>

        <label for="Address"><i class="fas fa-map-marker-alt me-2"></i> Billing Address</label>
        <input class="box1" type="text" name="address" id="Address" placeholder="Your complete address" required>

        <label for="cardholder-name"><i class="fas fa-id-card me-2"></i> Card Holder Name</label>
        <input class="box1" type="text" name="cardholder-name" id="cardholder-name" placeholder="Name as shown on card" required>

        <label for="CardNumber"><i class="far fa-credit-card me-2"></i> Card Number</label>
        <input class="box1" type="text" name="number" id="CardNumber" placeholder="1234 1234 1234 1234" maxlength="19" required>

        <div class="Block1">
            <label for="ExpDate"><i class="far fa-calendar-alt me-2"></i> Expiration Date</label>
            <input class="box2" type="month" id="ExpDate" name="exp_date" required>
        </div>

        <div class="Block1">
            <label for="cvv"><i class="fas fa-lock me-2"></i> Security Code (CVV)</label>
            <input class="box2" type="text" id="cvv" name="cvv" placeholder="123" maxlength="3" required>
        </div>

        <!-- Payment Method Selection - Added for order system -->
        <div class="payment-method">
            <label><i class="fas fa-money-bill-wave me-2"></i> Payment Method</label>
            <select name="payment_method" class="box1" required>
                <option value="credit_card">Credit Card</option>
                <option value="paypal">PayPal</option>
                <option value="bank_transfer">Bank Transfer</option>
            </select>
        </div>

        <!-- Hidden input to store total amount -->
        <input type="hidden" name="total_amount" value="{{ $totalAmount ?? 0 }}">

        <!-- Using submit button with onsubmit validation -->
        <button class="box3" type="submit"><i class="fas fa-check me-2"></i> Complete Purchase</button>
        <button class="box3" type="button" onclick="redirectToHome()"><i class="fas fa-times me-2"></i> Cancel</button>
        
        <script>
            var paymentRoute = "{{ route('payment') }}";
            var homeRoute = "{{ route('home') }}";
        </script>

        <!-- Include your JavaScript validation -->
        <script src="{{ asset('js/PaymentForm.js') }}"></script>
        
        <!-- Add form validation integration -->
        <script>
            // Integrate your existing validation into the form submission
            function validateForm() {
                // Add loading effect to the button
                const submitButton = document.querySelector('.box3:first-of-type');
                submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
                submitButton.disabled = true;
                
                // Validate fields
                const isNameValid = document.getElementById('name').value.trim() !== '';
                const isEmailValid = document.getElementById('email').value.trim() !== '' && 
                                    document.getElementById('email').value.includes('@');
                const isAddressValid = document.getElementById('Address').value.trim() !== '';
                
                // Reset any existing validation messages
                document.querySelectorAll('.invalid-input').forEach(el => {
                    el.classList.remove('invalid-input');
                });
                
                // Basic validation checks
                if (!isNameValid || !isEmailValid || !isAddressValid) {
                    // Show appropriate error and reset button
                    if (!isNameValid) {
                        showError("Please enter your full name.");
                        document.getElementById('name').classList.add('invalid-input');
                    }
                    if (!isEmailValid) {
                        showError("Please enter a valid email address.");
                        document.getElementById('email').classList.add('invalid-input');
                    }
                    if (!isAddressValid) {
                        showError("Please enter your billing address.");
                        document.getElementById('Address').classList.add('invalid-input');
                    }
                    
                    submitButton.innerHTML = '<i class="fas fa-check me-2"></i> Complete Purchase';
                    submitButton.disabled = false;
                    return false;
                }
                
                // Card validation
                if (!validCardNumber() || !validExpDate() || !validCVV()) {
                    submitButton.innerHTML = '<i class="fas fa-check me-2"></i> Complete Purchase';
                    submitButton.disabled = false;
                    return false;
                }
                
                // If everything is valid, allow the form to submit
                return true;
            }
        </script>
    </form>
</body>
</html>