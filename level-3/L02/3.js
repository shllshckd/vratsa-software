function biggest(a,b,c,d,e) {
    let biggest = -999999999;
    if (a > biggest) {
        biggest = a;
    }
    if (b > biggest) {
        biggest = b;
    }
    if (c > biggest) {
        biggest = c;
    }
    if (d > biggest) {
        biggest = d;
    }
    if (e > biggest) {
        biggest = e;
    }

    return biggest;
}

console.log(biggest(0,1,2,3,4));  
console.log(biggest(4,3,2,1,0));  
console.log(biggest(2,3,4,1,0));  
console.log(biggest(2,3,4,1,11111));  
