
function add(a, b) {
    return a + b;
}


const num1 = parseFloat(prompt("First number:"));
const num2 = parseFloat(prompt("Second number:"));

if (!isNaN(num1) && !isNaN(num2)) {
    const result = add(num1, num2);
    alert(`result: ${result}`);
} else {
    alert("Write zvalid number.");
}
