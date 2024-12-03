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
        alert("Please enter a valid expiry date.");
        return false;
    }
    return true;
}

function validCVV() {
    const cvv = document.getElementById("cvv").value;
    const strippedCVV = cvv.replace(/\D/g, "");

    if (strippedCVV.length !== 3 || isNaN(strippedCVV)) {
        alert("The CVV must be exactly 3 digits.");
        return false;
    }
    return true;
}

function validCardNumber() {
    const cardNumber = document.getElementById("CardNumber").value;
    const strippedCardNumber = cardNumber.replace(/\D/g, "");

    if (strippedCardNumber.length !== 16 || isNaN(strippedCardNumber)) {
        alert("The credit card number should contain exactly 16 digits.");
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
