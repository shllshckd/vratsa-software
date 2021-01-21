<?php

// best from the two, Ω time complexity is better, space complexity is the same

// Best    Average    Worst    (time)
// Ω(n)    Θ(n^2) 	  O(n^2)

// implementation

$arr = [9, 6, 7, 3, 4, 5, 8, 2, 1];

// unsorted array
foreach ($arr as $key => $value) {
    print "$value ";
}

$n = sizeof($arr);

for ($i = 0; $i < $n; $i++) {
    for ($j = 0; $j < $n - $i - 1; $j++) {
        if ($arr[$j] > $arr[$j + 1]) {
            $tmp = $arr[$j];
            $arr[$j] = $arr[$j + 1];
            $arr[$j + 1] = $tmp;
        }
    }
}

// sorted array
foreach ($arr as $key => $value) {
    print "$value ";
}

// v2 of bubble sort, geeks for geeks implementation
function bubbleSort(&$arr) {
    $n = count($arr);
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                $t = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $t;
            }
        }
    }
}

$arr = [64, 34, 25, 12, 22, 11, 90];
$len = count($arr);
bubbleSort($arr);
echo "Sorted array : \n";

for ($i = 0; $i < $len; $i++) {
    echo $arr[$i] . " ";
}

// by ChitraNayal
