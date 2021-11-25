//Variable, Data types, More on string
// const defaultResult = 0;
// let currentResult = defaultResult;

// currentResult = (currentResult + 10) * 3 / 2 - 1;

// var calculationDescription = '(' + defaultResult + ' + 10) * 3 / 2 - 1';

// //var calculationDescription = `(${defaultResult} + 10) * 3 / 2 - 1`;


// outputResult(currentResult, calculationDescription);





//Local and Global Scope
const defaultResult = 0;
let currentResult = defaultResult;

var x=10;

function add(n1,n2){
    const result=n1+n2;   //local var becoz it defines inside the function and its not accessible from outside of the fuction
    return result;
}


document.write(x); //it can be accessible anywhere in code becoz its global variable
//document.write(result); //its not accessible here becoz its declared inside the function and its local var

currentResult=add(1,2);   //it can be access
document.write(currentResult);

//currentResult = (currentResult + 10) * 3 / 2 - 1;

//var calculationDescription = '(' + defaultResult + ' + 10) * 3 / 2 - 1';

//var calculationDescription = `(${defaultResult} + 10) * 3 / 2 - 1`;


//outputResult(currentResult, calculationDescription);