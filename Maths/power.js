/*
    Developer: Mohammed Rahman
    University ID: 220083681
    Function: Takes in a base number and another number to be multiplied by it's power, outputs result
*/

function power(number,power){
    var total = 0;
    for(i = 0; i <= power; i++){
        total = number*number;
    }
}

const num = parseFloat(prompt("Enter base number:"));
const power = parseFloat(prompt("Enter number to increment by"));

if(!isNaN(num) && !isNaN(power)){
    const result = power(num,power);
} else{
    alert("Invalid number!");
}