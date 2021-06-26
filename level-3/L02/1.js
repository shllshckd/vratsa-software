function solve(x,y,z) {
    x = Number(x);
    y = Number(y);
    z = Number(z);

    if (x < y) {
        let tmp = y;
        y = x;
        x = tmp;
    }

    if (y < z) {
        let tmp = z;
        z = y;
        y = tmp;
    }
    
    if (x < y) {
        let tmp = y;
        y = x;
        x = tmp;
    }

    console.log(x, y, z);
}
   
solve('5', '1', '2');
solve('-2', '-2', '1');
solve('-2', '4', '3');
solve('0', '-2.5', '5');
solve('-1.1', '-0.5', '-0.1');
solve('10', '20', '30');
solve('1', '1', '1');

