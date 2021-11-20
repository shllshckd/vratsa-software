function solve(n) {
    let arr = [][];
    let start = 1;
    let end = n*n;

    for (let i = 0; i < n; i++) {
        arr[i] = start;
        start++;

        for (let k = 0; k < n; k++) {
            arr[i][k];
        }
    }
    
    console.log(arr);

}

solve(2);
solve(3);
solve(4);
// solve('Hello, how are you.');
// solve();
// solve();
// solve();