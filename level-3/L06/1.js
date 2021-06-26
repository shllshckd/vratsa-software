function sum(arr) {
    let result = 0;
    arr.forEach(e => result += Number(e));
    return result;
}

function solve(str) {
    // parse input
    let stringlist = str.split(' ');
    let length = stringlist.shift();

    // initialize needed variables
    let arr = [];
    let counter = 0;

    // read the values and store in 2 dimensional array
    for (let i = 0; i < length; i++) {
        for (let k = 0; k < length; k++) {
            if (arr[i]== undefined) {
                arr[i] = [];
            }
            arr[i][k] = stringlist[counter];
            counter++;
        }
    }

    // calculate horizontaly
    let firstSumHorizontaly = sum(arr[0]);
    let secondSumHorizontaly = sum(arr[1]);
    let thirdSumHorizontaly = sum(arr[2]);
    let isHorizontalyEqual = (firstSumHorizontaly === secondSumHorizontaly) && (secondSumHorizontaly === thirdSumHorizontaly);

    // calculate vertically
    let firstSumVertically = Number(arr[0][0]) + Number(arr[1][0]) + Number(arr[2][0]);
    let secondSumVertically = Number(arr[0][1]) + Number(arr[1][1]) + Number(arr[2][1]);
    let thirdSumVertically = Number(arr[0][2]) + Number(arr[1][2]) + Number(arr[2][2]);
    let isVerticallyEqual = (firstSumVertically === secondSumVertically) && (secondSumVertically === thirdSumVertically);

    // calculate diagonaly
    let firstSumDiagonaly = Number(arr[0][0]) + Number(arr[1][1]) + Number(arr[2][2]);
    let secondSumDiagonaly = Number(arr[0][2]) + Number(arr[1][1]) + Number(arr[2][0]);
    let isDiagonalyEqual = firstSumDiagonaly === secondSumDiagonaly;

    if (isHorizontalyEqual && isVerticallyEqual && isDiagonalyEqual) {
        console.log('True');
    } else {
        console.log('False');
    }
}

solve('3 4 9 2 3 5 7 8 1 6');
