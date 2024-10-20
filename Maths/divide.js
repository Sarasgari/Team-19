function divide(a, b) {
    if (b === 0) {
        throw new Error("Cannot divide by zero");
    }
    return a / b;
}


const num1 = parseFloat(prompt("First number:"));
const num2 = parseFloat(prompt("Second number:"));

if (!isNaN(num1) && !isNaN(num2)) {
    const result = divide(num1, num2);
    alert(`result: ${result}`);
} else {
    alert("Write valid number.");
}