function add(a, b) { return a + b; }

const num1 = parseFloat(prompt("First number:")),
      num2 = parseFloat(prompt("Second number:"));

if (isNaN(num1) || isNaN(num2)) {
    alert("Please enter a valid number.");
} else {
    const result = add(num1, num2);
    alert(`The result is: ${result}`);
}
