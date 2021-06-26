solve = (sentence) => sentence.split('').reverse().join('').split(' ').map(el => el.split('').join('')).reverse().join(' ');

console.log(
    solve('Hello, how are you.')
);

console.log(
    solve('Life is pretty good, isn’t it?')
);
