// Напишете скрипт, която сумира цифрите на число n(n>9) и
// проверява дали сумата е число, което се дели на 3, като
// отпечатва резултата в конзолата. Извикайте скрипта за няколко
// числа
function solve(x) 
{
    let result = 0;
    for (let i = 0; i <= x; i++) {
        result += i;
    }
    if (result % 3 === 0) {
        console.log(result + " - " + x);
    }
}

solve(2)
solve(3)
solve(10)
solve(11)
solve(20)
solve(35)
solve(49)
solve(150)
