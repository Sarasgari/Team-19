/* 
  Developer: Abdulrahman Mostafa
  University ID: 2300466694
  Function: Payment Form page let the user prouced with payment 
*/

document.getElementById('CardNumber').addEventListener('input', function (e) {
    let cardNumber = e.target.value.replace(/\D/g, '');
    cardNumber = cardNumber.substring(0, 16);
    e.target.value = cardNumber.replace(/(.{4})/g, '$1 ').trim();
});

function validExpDate() {
    const expDate = document.getElementById("ExpDate").value; // Ensure the ID matches exactly
    const today = new Date();
    
    // Set selected date to the first day of the selected month and year
    const [year, month] = expDate.split("-");
    const selectedDate = new Date(year, month - 1); // Month is zero-indexed in Date objects

    // Check if the selected date is in the future
    if (selectedDate <= today) {

        alert("Please provide a valid expiration date..");

        return false;
    }
    return true;
}

function validCVV() {
    const cvv = document.getElementById("cvv").value;
    const strippedCVV = cvv.replace(/\D/g, "");

    if (strippedCVV.length !== 3 || isNaN(strippedCVV)) {
        alert("Invalid CVV. It must be 3 digits.");
        return false;
    }
    return true;
}

function validCardNumber() {
    const cardNumber = document.getElementById("CardNumber").value;
    const strippedCardNumber = cardNumber.replace(/\D/g, "");

    if (strippedCardNumber.length !== 16 || isNaN(strippedCardNumber)) {
        alert("Please ensure the credit card number contains 16 digits.");
        return false;
    }
    return true;
}

function Formcomplete() {
    const form = document.getElementById("CheckoutForm");

    if (form.checkValidity()) {
        if (validCVV() && validCardNumber() && validExpDate()) {
            window.location.href = "payment.html";
        }
    } else {
        form.reportValidity();
    }
}

function redirectToHome() {
    window.location.href = "home.html";
}
