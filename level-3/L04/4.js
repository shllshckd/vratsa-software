// Напишете JavaScript програма, която по зададен масив от числа и число, 
// отпечатва bigger или not bigger, в зависимост от това дали елементът с индекс, 
// подаденото число е по-голям от съседните си два елемента. 
// Ако елементът е в началото/края на масива – програмата ви отпечатва – only one neighbour’
// и invalid index в случай, че няма елемент с такъв индекс.

// 2, [1, 2,3, 3, 5]   not bigger
// 2, [1, 2,5, 3, 4]   bigger
// 5, [1, 2, 5, 3, 4]  invalid index
// 0, [1, 2, 5, 3, 4]  only one neighbor

function solve(num, arr) {
    let numberToCheck = arr[num];

    if (num > arr.length - 1 || num < 0) {
        console.log('invalid index');
    } 
    else {
        if (arr[num + 1] === undefined || arr[num - 1] === undefined) {
            console.log('only one neighbor');
        }
        else if (arr[num] > arr[num + 1] && arr[num] > arr[num - 1]) {
            console.log('bigger');
        } 
        else {
            console.log('not bigger');
        }
    }
}

// solve(-2, [1, 2, 3, 3, 5]);

solve(2, [1, 2, 3, 3, 5]);
solve(2, [1, 2, 5, 3, 4]);
solve(5, [1, 2, 5, 3, 4]);
solve(0, [1, 2, 5, 3, 4]);
