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


    <script src="{{ asset('js/PaymentForm.js') }}"></script>
</form>

</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="script.js"></script>
  <script>
(function(){if(!window.chatbase||window.chatbase("getState")!=="initialized"){window.chatbase=(...arguments)=>{if(!window.chatbase.q){window.chatbase.q=[]}window.chatbase.q.push(arguments)};window.chatbase=new Proxy(window.chatbase,{get(target,prop){if(prop==="q"){return target.q}return(...args)=>target(prop,...args)}})}const onLoad=function(){const script=document.createElement("script");script.src="https://www.chatbase.co/embed.min.js";script.id="9PWNMB1p2CzJaFsLkUCRE";script.domain="www.chatbase.co";document.body.appendChild(script)};if(document.readyState==="complete"){onLoad()}else{window.addEventListener("load",onLoad)}})();
</script>