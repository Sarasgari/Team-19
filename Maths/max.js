/*
    Developer: Sara Asgari
    University ID: 230344431
    Function: This function takes two integer as input and returns the maximum one.
*/
function max(num1, num2) {
    if (Number.isInteger(num1) && Number.isInteger(num2)){
    return (num1 > num2) ? num1 : num2;
    } else {
        throw new Error("both inputs must be Integers.");
    }
}