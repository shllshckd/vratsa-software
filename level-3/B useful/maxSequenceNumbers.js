// Напишете JavaScript програма, която намира максималната последователност от еднакви числа в масив и я отпечатва в конзолата.
// /числата са подадени като стрингове/
// Input ['10', '2', '1', '1', '2', '3', '3', '2', '2', '2', '1']
// Output 3

//let arr =  ['10', '2', '1', '1', '2', '3', '3', '2', '2', '2', '1'];
var arr = ['10', '2', '1', '1', '1', '1', '1', '2', '3', '3', '2', '2', '2', '2', '1'];
var maxSeq = 0;

for (var i = 0; i < arr.length; i++) {
    var counter = 1;
    for (var z = i + 1; z < arr.length; z++) {
        if (arr[i] === arr[z]) {
            counter += 1;
        }
        else {
            break;
        }
        if (counter > maxSeq) {
            maxSeq = counter;
        }
    }
}

console.log(maxSeq);