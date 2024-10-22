/********************************
Developer: fatimamansur
University ID: 230274345
Function: This function takes two inputs as integers and returns the multiplication
********************************/
int multiplication(int x, int y)
{
 return x*y;
}

/********************************
Tester: fatimamansur
University ID: 230274345
Function: This function test the multiplication function implementation.
**********************************/
void mulitiplicationTest()
{
Math mObj = new Math();
int result = mObj.multiplication(2,4);
if(result==8)
System.out.print(’Correct Implementation’)
else
System.out.print(’Error in Implementation’)
}