function min(num1, num2) {
    return (num1 < num2) ? num1 : num2;
}

const input1 = prompt("Enter first number:");
const input2 = prompt("Enter second number:");

const num1 = parseInt(input1);
const num2 = parseInt(input2);

if (Number.isInteger(num1 && Number.isInteger(num2))) {
    const result = min(num1, num2);
    alert(`The minimum number is: ${result}`)
} else {
    alert("Please enter valid integers.");
}