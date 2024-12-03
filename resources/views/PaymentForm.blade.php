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
    <link rel="stylesheet" href="PaymentForm.css">
</head>
<body>

<form id="CheckoutForm">
    <h1>Payment</h1>
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
        <input class="box2" type="month" id="ExpDate" required><br>
    </div>

    <div class="Block1">
        <label for="cvv">Card CVV</label><br>
        <input class="box2" type="text" id="cvv" placeholder="CVV" maxlength="3" required><br>
    </div>

    <button class="box3" type="button" onclick="Formcomplete()">Pay Now</button>
    <button class="box3" type="button" onclick="redirectToHome()">Cancel</button>


    <script src="PaymentForm.js"></script>
</form>

</body>
</html>
