/*
    Developer: Sara Asgari
    University ID: 230344431
    Function: This function takes two integer as input and returns the maximum one.
*/
function max(num1, num2) {
    return (num1 > num2) ? num1 : num2;
}

const input1 = prompt("Enter the first number:");
const input2 = prompt("Enter the second number:");

const num1 = parseInt(input1);
const num2 = parseInt(input2);

if (Number.isInteger(num1) && Number.isInteger(num2)) {
    const result = max(num1, num2);
    alert(`The maximum number is: ${result}`);
} else {
    alert("Please enter valid integers.");
}