<?php

// input

//$m = 2;
//$n = 3;
//$arr = [[5, 14, 2], [20, 9, 4]];

// output
// a[0][0] = 5    a[0][1] = 14    a[0][2] = 2
// a[1][0] = 20    a[1][1] = 9    a[01[2] = 4

$m = 3;
$n = 4;

$arr = [
    [4, 5, 6, 7],
    [4, 5, 8, 10],
    [1, 5, 25, 1],
];

function exercise_6($arr) {
    for ($i = 0; $i < count($arr); $i++) {
        for ($j = 0; $j < count($arr[$i]); $j++) {
            echo "[$i][$j] = " . $arr[$i][$j] . ' / ';
        }
        echo "<br>";
    }
}

exercise_6($arr);
