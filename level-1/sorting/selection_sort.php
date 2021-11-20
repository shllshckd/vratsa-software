<?php

// worst from the two, Ω time complexity is worse, space complexity is the same

// Best    Average    Worst    (time)
// Ω(n^2)  Θ(n^2)     O(n^2)

// selection sort, geeks for geeks implementation
function selection_sort(&$arr, $n) {
    for($i = 0; $i < $n ; $i++) {
        $low = $i;

        for($j = $i + 1; $j < $n ; $j++) {
            if ($arr[$j] < $arr[$low]) {
                $low = $j;
            }
        }

        if ($arr[$i] > $arr[$low]) {
            $tmp = $arr[$i];
            $arr[$i] = $arr[$low];
            $arr[$low] = $tmp;
        }
    }
}

$arr = [64, 25, 12, 22, 11];
$len = count($arr);
selection_sort($arr, $len);
echo "Sorted array : \n";

for ($i = 0; $i < $len; $i++)
    echo $arr[$i] . " ";

// by Deepika Gupta
