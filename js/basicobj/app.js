const defaultResult = 0;
let currentResult = defaultResult;
let logEntries = [];

// Gets input from input field
function getUserNumberInput() {
  return parseInt(usrInput.value);
}

// Generates and writes calculation log
function createAndWriteOutput(operator, resultBeforeCalc, calcNumber) {
  const calcDescription = `${resultBeforeCalc} ${operator} ${calcNumber}`;
  outputResult(currentResult, calcDescription); // from vendor file
}

function writeToLog(
  operation,
  prevNumber,
  newNumber,
  fresult
){
  const logEntry={calOperation:operation,
  prevNo:prevNumber,
  newNo:newNumber,
  finalres:fresult
};
  logEntries.push(logEntry);

  // let i=0;
  // for(const element of logEntries){        //for-of-loop we use it for array
  // console.log(element);
  // console.log(i);
  // i++;

  // for(const key in element){               //for-in-loop here we use it for object
  //   // console.log(key);
  //   // console.log(element[key]);
  //   console.log(`${key}=>${element[key]}`);


  // }
  // }

  console.log(logEntries);
}

function add() {
  const enteredNumber = getUserNumberInput();
  const initialResult = currentResult;
  currentResult += enteredNumber;
  createAndWriteOutput('+', initialResult, enteredNumber);
  writeToLog('ADD',initialResult,enteredNumber,currentResult);
  // const logEntry = {
  //   operation: 'ADD',
  //   prevResult: initialResult,
  //   number: enteredNumber,
  //   result: currentResult
  // };
  // logEntries.push(logEntry);
  // console.log(logEntries);
  // console.log(logEntry.number);

}

function subtract() {
  const enteredNumber = getUserNumberInput();
  const initialResult = currentResult;
  currentResult -= enteredNumber;
  createAndWriteOutput('-', initialResult, enteredNumber);
  writeToLog('Substract',initialResult,enteredNumber,currentResult);
}

function multiply() {
  const enteredNumber = getUserNumberInput();
  const initialResult = currentResult;
  currentResult *= enteredNumber;
  createAndWriteOutput('*', initialResult, enteredNumber);
  writeToLog('MULTIPLY',initialResult,enteredNumber,currentResult);
}

function divide() {
  const enteredNumber = getUserNumberInput();
  const initialResult = currentResult;
  currentResult /= enteredNumber;
  createAndWriteOutput('/', initialResult, enteredNumber);
  writeToLog('DIVIDE',initialResult,enteredNumber,currentResult);
}

addBtn.addEventListener('click', add);
subtractBtn.addEventListener('click', subtract);
multiplyBtn.addEventListener('click', multiply);
divideBtn.addEventListener('click', divide);


// for(let i=0; ;i++)                 //it will start from 0 and it will be going on going on for infinty
// {
//   console.log(i);
// }


// let j=0;
// while(true)                    //this is infinite while-loop browser will be crash
// {
//   console.log(j);
//   j++;
// }


// let j=0;
// while(j<10)                         //this is while loop. 
// {
//   console.log(j);
//   j++;
// }

// let j=0;
// do{                                     //this is Do-While loop.
//   console.log(j);
//   j++;
// }while(j<10);

