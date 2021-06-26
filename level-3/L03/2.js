
function solve(str) {
    let words = str.split(/[ ,.]+/);
    let list = [];

    words.forEach(word => {
        if (isPalindrome(word)) {
            list.push(word);
        }
    });

    list.forEach(e => {
        console.log(e);
    });

}

function isPalindrome (word) {
    return word.toLowerCase() === word.toLowerCase().split('').reverse().join('');
}

solve('There is a man, his name was bob. His favorite group is ABBA');
console.log();
solve('ana, pop, exe, asen, mladen');
console.log();
solve('ivan, lol, wow');