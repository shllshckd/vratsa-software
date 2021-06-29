function solve(arr) {
    let known = {};
    let met = [];

    arr.forEach(element => {
        if (!met.includes(element)) {
            known[element] = 1;
        }

        if (met.includes(element)) {
            known[element] += 1;
        }

        met.push(element);
    });

    console.log(known);
}

solve([2, 12, 2, 2, 25, 12]);
solve(['Welcome', 'to', 'Welcome', 'to', 'Javascript', 'Welcome', 'everyone']);
solve([1, 2, 3, 1, 4, 5, 6, 7, 6, 3, 1, 1, 4]);