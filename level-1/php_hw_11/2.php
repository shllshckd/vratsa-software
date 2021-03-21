<?php

$times_found = 0;

//$to_be_found = 2;
//$arr = [2, 11, 2, 3, 0, 2]; // output 3

//$to_be_found = 0;
//$arr = [0, 4, 7, 0, 0, 0]; // output 4

$to_be_found = 8;
$arr = [4, 15, 27, 33, 1]; // output not in array

function exercise_5($to_be_found, $arr, $times_found) {
    for ($i = 0; $i < count($arr); $i++) {
        if ($to_be_found == $arr[$i]) {
            $times_found += 1;
        }
    }

    if ($times_found == 0) {
        $times_found = 'not in array';
    }

    return $times_found;
}

print(exercise_5($to_be_found, $arr, $times_found));
