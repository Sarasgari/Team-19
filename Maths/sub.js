/* Developer: Abdulrahman S E Mostafa 
University ID: 230046694
Function: This function takes two inputs as integers
 and return the difference
*/

function Sub(a,b){
    return a - b;
}

const num1 = parseFloat(prompt("First number:"));
const num2 = parseFloat(prompt("Second number:"));

if (!isNaN(num1) && !isNaN(num2)) {
    const result = Sub(num1, num2);
    alert(`result: ${result}`);
} else {
    alert("Write valid number.");
    
}