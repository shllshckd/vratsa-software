function solve(arr) {
    let index = arr[0];
    let shifted = arr.shift();
    let strArr = arr.toString().split('.').join('');
    let lastElement = strArr[strArr.length - index];

    if (lastElement === undefined) {
        console.log(`The number doesn’t have ${index} digits`);
    } 
    else {
        console.log(lastElement);
    }
}

solve([1, 6]);
solve([2, -55]);
solve([6, 923456]);
solve([3, 1451.78]);
solve([6, 888.88]);
console.log('------------------');
solve([2, 6789]);
solve([3, 123455]);
solve([8, 9]);
solve([0, ]);
solve([6, 838.8889]);
