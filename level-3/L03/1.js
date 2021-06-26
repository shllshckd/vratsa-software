// Напишете JavaScript програма, която по зададен масив от числа – десетични дроби, подадени като стрингове, 
// отпечатва минималната, максималната стойност, сумата и средната стойност на числата в масива. /с точност два знака след десетичната запетая/.

function solve(arr) {
    let newArr = [];
    let convertArr = (arr) => {
        for (let i = 0; i < arr.length; i++) {
            newArr[i] = Number(arr[i]);
        }
    }

    convertArr(arr);

    console.log(Math.min(...newArr), 'minimum value');
    console.log(Math.max(...newArr), 'maximum value');
    console.log(average(newArr), 'average value');
}

function average(arr) {
    let output = 0;
    arr.forEach(e => output += e);
    return output / arr.length;
}

solve(['3.00', '6.00']);

solve(['1.00', '7.00']);
solve(['2.00', '5.00']);
solve(['4.00', '1.00']);
