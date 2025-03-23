/* 
* Developer: Abdulrahman Mostafa
* Student Id: 230046694
* Function: Enhanced payment validation with visual feedback
*/

// Card number formatting with spaces after every 4 digits
document.addEventListener('DOMContentLoaded', function() {
    const cardNumberInput = document.getElementById('CardNumber');
    const cvvInput = document.getElementById('cvv');
    
    if (cardNumberInput) {
        cardNumberInput.addEventListener('input', function (e) {
            let CN = e.target.value.replace(/\D/g, '');
            CN = CN.substring(0, 16);
            e.target.value = CN.replace(/(.{4})/g, '$1 ').trim();
            
            // Add visual validation feedback
            if (CN.length === 16) {
                this.classList.add('valid-input');
                this.classList.remove('invalid-input');
            } else if (CN.length > 0) {
                this.classList.add('invalid-input');
                this.classList.remove('valid-input');
            } else {
                this.classList.remove('valid-input', 'invalid-input');
            }
        });
    }

    // CVV formatting and validation
    if (cvvInput) {
        cvvInput.addEventListener('input', function (e) {
            let cvv = e.target.value.replace(/\D/g, '');
            cvv = cvv.substring(0, 3);
            e.target.value = cvv;
            
            // Add visual validation feedback
            if (cvv.length === 3) {
                this.classList.add('valid-input');
                this.classList.remove('invalid-input');
            } else if (cvv.length > 0) {
                this.classList.add('invalid-input');
                this.classList.remove('valid-input');
            } else {
                this.classList.remove('valid-input', 'invalid-input');
            }
        });
    }
});

/* To check that the card number is 16 digits and only numbers */
function validCardNumber() {
    const CN = document.getElementById("CardNumber").value;
    const HashedCardNumber = CN.replace(/\D/g, "");

    if (HashedCardNumber.length !== 16 || isNaN(HashedCardNumber)) {
        showError("Please ensure the credit card number contains 16 digits.");
        document.getElementById("CardNumber").classList.add('invalid-input');
        return false;
    }
    
    document.getElementById("CardNumber").classList.add('valid-input');
    return true;
}

/* To check that it is not a past date */
function validExpDate() {
    const endDate = document.getElementById("ExpDate").value;
    const day = new Date();
    
    if (!endDate) {
        showError("Please select an expiration date.");
        document.getElementById("ExpDate").classList.add('invalid-input');
        return false;
    }
    
    const [year, month] = endDate.split("-");
    const choosenDate = new Date(year, month - 1);

    if (choosenDate <= day) {
        showError("Please provide a valid expiration date that is in the future.");
        document.getElementById("ExpDate").classList.add('invalid-input');
        return false;
    }
    
    document.getElementById("ExpDate").classList.add('valid-input');
    return true;
}

/* To check that the cvv is 3 digits and only numbers */
function validCVV() {
    const cvv = document.getElementById("cvv").value;
    const hashedCVV = cvv.replace(/\D/g, "");

    if (hashedCVV.length !== 3 || isNaN(hashedCVV)) {
        showError("Invalid CVV. It must be 3 digits.");
        document.getElementById("cvv").classList.add('invalid-input');
        return false;
    }
    
    document.getElementById("cvv").classList.add('valid-input');
    return true;
}

/* Show error message in a more user-friendly way */
function showError(message) {
    // Check if an error message container already exists
    let errorContainer = document.getElementById('error-message');
    
    // If not, create one
    if (!errorContainer) {
        errorContainer = document.createElement('div');
        errorContainer.id = 'error-message';
        const form = document.getElementById('CheckoutForm');
        form.insertBefore(errorContainer, form.firstChild);
    }
    
    // Set the error message
    errorContainer.innerHTML = `<i class="fas fa-exclamation-circle"></i> ${message}`;
    errorContainer.classList.add('show-error');
    
    // Automatically hide the error after 4 seconds
    setTimeout(() => {
        errorContainer.classList.remove('show-error');
    }, 4000);
}

/* To check that the form is completed and valid */
function Formcomplete() {
    const form = document.getElementById("CheckoutForm");
    
    // Remove any existing validation classes
    document.querySelectorAll('.invalid-input').forEach(el => {
        el.classList.remove('invalid-input');
    });

    // Add loading effect to the button
    const submitButton = document.querySelector('.box3:first-of-type');
    submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
    submitButton.disabled = true;

    // Also validate name, email, and address
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const address = document.getElementById('Address').value.trim();
    
    let isValid = true;
    
    if (!name) {
        showError("Please enter your full name.");
        document.getElementById('name').classList.add('invalid-input');
        isValid = false;
    }
    
    if (!email || !email.includes('@')) {
        showError("Please enter a valid email address.");
        document.getElementById('email').classList.add('invalid-input');
        isValid = false;
    }
    
    if (!address) {
        showError("Please enter your billing address.");
        document.getElementById('Address').classList.add('invalid-input');
        isValid = false;
    }
    
    if (!isValid) {
        // Reset button if validation fails
        submitButton.innerHTML = '<i class="fas fa-check me-2"></i> Complete Purchase';
        submitButton.disabled = false;
        return;
    }

    if (form.checkValidity()) {
        if (validCVV() && validCardNumber() && validExpDate()) {
            // Small delay to show processing state
            setTimeout(() => {
                form.submit();  // This will submit the form data to the orders.store route
            }, 1000);
        } else {
            // Reset button if validation fails
            submitButton.innerHTML = '<i class="fas fa-check me-2"></i> Complete Purchase';
            submitButton.disabled = false;
        }
    } else {
        form.reportValidity();
        // Reset button
        submitButton.innerHTML = '<i class="fas fa-check me-2"></i> Complete Purchase';
        submitButton.disabled = false;
    }
}

function redirectToHome() {
    window.location.href = homeRoute;
}

// Add CSS styles for validation and error message
document.addEventListener('DOMContentLoaded', function() {
    document.head.insertAdjacentHTML('beforeend', `
    <style>
        .valid-input {
            border-color: #198754 !important;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="%23198754" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>') !important;
            background-repeat: no-repeat !important;
            background-position: right 10px center !important;
            background-size: 20px !important;
            padding-right: 40px !important;
        }
        
        .invalid-input {
            border-color: #dc3545 !important;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="%23dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>') !important;
            background-repeat: no-repeat !important;
            background-position: right 10px center !important;
            background-size: 20px !important;
            padding-right: 40px !important;
        }
        
        #error-message {
            background-color: #f8d7da;
            color: #842029;
            padding: 12px 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            opacity: 0;
            transform: translateY(-20px);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        
        #error-message i {
            margin-right: 8px;
            font-size: 1.2rem;
        }
        
        #error-message.show-error {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
    `);
});