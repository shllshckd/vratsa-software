function printRandomNumber(n) {
    return Math.floor(Math.random() * n);
}

function printRandomName(n) {
    let names = ["i", 't', 'k', 'd', 'g', 'r', 'a'];
    let index = Math.floor(Math.random() * (names.length - 1));
    return names[index];
}

console.log(
    printRandomName(7)
);

console.log('gets');

console.log(
    printRandomNumber(7)
);
