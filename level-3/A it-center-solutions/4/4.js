function solve(num, arr) {
    let toCheck = arr[num];

    if (num < 0) {
        console.log('invalid index');
    } 
    else if (num > arr.length-1) {
        console.log('invalid index');
    } 
    else {
        if (arr[num-1] == undefined || arr[num-1] == undefined) {
            console.log('only one neighbor');
        }
        else if(toCheck > arr[num-1] && toCheck > arr[num+1]) {
            console.log('bigger');
        } 
        else {
            console.log('not bigger');
        }
    }
}

solve(3, [1, 2, 3, 4, 2]);
solve(2, [1, 2, 3, 3, 5]);
solve(2, [1, 2, 5, 3, 4]);
solve(5, [1, 2, 5, 3, 4]);
solve(0, [1, 2, 5, 3, 4]);