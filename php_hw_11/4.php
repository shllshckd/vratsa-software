<?php

function exercise_8($arr1 = [], $arr2 = [])
{
    $result = [];

    if (count($arr1) > count($arr2)) {
        for ($i = 0; $i < count($arr2); $i++) {
            $arr1[$i] = $arr1[$i] + $arr2[$i];
        }
        $result = $arr1;
    } else {
        for ($i = 0; $i < count($arr1); $i++) {
            $arr2[$i] = $arr1[$i] + $arr2[$i];
        }
        $result = $arr2;
    }

    echo '[';
    $count = count($result);
    for ($j = 0; $j < $count; $j++) {
        echo $result[$j] . ', ';
    }
    echo ']';
}

// input
$arr1 = [2, 11, 2, 3, 0, 2];
$arr2 = [0, 4, 7, 0, 1];

// output
// [2, 15, 9, 3, 1, 2]

//$result = exercise_8($arr1, $arr2);
exercise_8($arr1, $arr2);

//echo "<pre>";
//var_dump($arr1);
//echo "</pre>";
//
//echo "<pre>";
//var_dump($arr2);
//echo "</pre>";
//
//echo "<pre>";
//var_dump($result);
//echo "</pre>";
