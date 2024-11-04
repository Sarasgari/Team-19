/********************************
Developer: Mayaz Karim
University ID: 230712279
Function: This function takes two inputs as integers and returns the minimum
********************************/

function min(num1, num2) {
    return (num1 < num2) ? num1 : num2;
}

const inputNum1 = prompt("Enter first number:");
const inputNum2 = prompt("Enter second number:");
const num1 = parseInt(inputNum1);
const num2 = parseInt(inputNum2);

if (Number.isInteger(num1 && Number.isInteger(num2))) {
    const result = min(num1, num2);
    alert(`The minimum number is: ${result}`)
} else {
    alert("Please enter valid integers.");
}