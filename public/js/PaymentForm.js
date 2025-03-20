/* 
 * Developer: Abdulrahman Mostafa 
 * Student Id: 230046694 
 * Function: This page ensures that the payment requirements are correct 
 */

document.addEventListener('DOMContentLoaded', function() {
    // Card number formatting
    document.getElementById('CardNumber').addEventListener('input', function (e) {
        let CN = e.target.value.replace(/\D/g, '');
        CN = CN.substring(0, 16);
        e.target.value = CN.replace(/(.{4})/g, '$1 ').trim();
    });

    // Add event listener to form submission
    const form = document.getElementById("CheckoutForm");
    if (form) {
        form.addEventListener("submit", function(event) {
            // Prevent default form submission
            event.preventDefault();
            
            // Run validation and submit if valid
            if (validCVV() && validCardNumber() && validExpDate()) {
                this.submit();
            }
        });
    }
});

/* to check that the card number is 16 digits and only numbers*/
function validCardNumber() {
    const CN = document.getElementById("CardNumber").value;
    const HashedCardNumber = CN.replace(/\D/g, "");
    
    if (HashedCardNumber.length !== 16 || isNaN(HashedCardNumber)) {
        alert("Please ensure the credit card number contains 16 digits.");
        return false;
    }
    return true;
}

/* to check that it is not a past date*/
function validExpDate() {
    const endDate = document.getElementById("ExpDate").value;
    const day = new Date();
    
    const [year, month] = endDate.split("-");
    const choosenDate = new Date(year, month - 1);
    
    if (choosenDate <= day) {
        alert("Please provide a valid expiration date.");
        return false;
    }
    return true;
}

/* to check that the cvv 3 digits and only numbers*/
function validCVV() {
    const cvv = document.getElementById("cvv").value;
    const hashedCVV = cvv.replace(/\D/g, "");
    
    if (hashedCVV.length !== 3 || isNaN(hashedCVV)) {
        alert("Invalid CVV. It must be 3 digits.");
        return false;
    }
    return true;
}

/* to check that the form is completed and valid*/
function Formcomplete() {
    const form = document.getElementById("CheckoutForm");
    
    if (form.checkValidity()) {
        if (validCVV() && validCardNumber() && validExpDate()) {
            form.submit(); 
        }
    } else {
        form.reportValidity();
    }
}

function redirectToHome() {
    window.location.href = homeRoute;
}