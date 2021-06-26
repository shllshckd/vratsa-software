function solve(id, arr) {
    if (typeof id !== 'string') {
        alert('Id is not a string.');
    } 

    if (!Array.isArray(arr)) {
        alert('The second argument is not an array.');
    } 

    if (arr.length === 0 ) {
        alert('The second argument is an empty array.');
    } 

    if (!arr) {
        alert('The second argument is falsy.');
    } 

    arr.forEach(el => {
        if (!el) {
            alert('The second argument contains an falsy element in itself.');
        }
    });

    let root = document.getElementById(id);
    if (root === undefined || root === null) {
        alert('No such element found.');
    }

    arr.forEach(el => {
        let newDiv = document.createElement('div');

        newDiv.innerHTML = '';
        newDiv.innerHTML = el;

        root.appendChild(newDiv);
    });
}

solve('test', ['1', '2', '3', '4']);
solve('inner', ['what', 'is', 'up', '?']);
solve('root', ['cat', 'dog', 'hi', 'test']);
