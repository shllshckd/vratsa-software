let emptyArrayError = 'Enter non empty array!';
let onlyNumbersError = 'Array must include only numbers!';

function solve(arr) {
    if (arr.length == 0) {
        return emptyArrayError;
    }

    let errorsCount = 0;
    arr.forEach(element => {
        let numberElement = Number(element);
        if (isNaN(numberElement) || typeof element == "boolean") {
            errorsCount++;
        }
    });

    // if any errors, we do not care about the valid cases, return
    if (errorsCount > 0) {
        return onlyNumbersError;
    }

    // let currentScore = 0;
    let increasingCounts = 0;

    arr.forEach((value, index) => {
        if (value >= arr[index - 1]) {
            //currentScore++;
        }
        else {
            // currentScore = 0;
            increasingCounts++;
        }
    })

    return increasingCounts;
}

console.log(solve([]));
console.log(solve([0]));
console.log(solve([-1, 0, 1, 2, 1, 4, 10, 9, 15, 1]));
console.log(solve(['3', 0, '0', 1, 3, 4, '0']));
console.log(solve([3, true]));
console.log(solve([3, 'pokughbv', '1']));