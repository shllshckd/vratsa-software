<?php

function longest($arr)
{
    $max_len = $arr[0];
    $min_len = $arr[0];

    for ($i = 1; $i < count($arr); $i++) {
        if (strlen($max_len) < strlen($arr[$i])) {
            $max_len = $arr[$i];
        }
    }

    for ($i = 1; $i < count($arr); $i++) {
        if (strlen($min_len) > strlen($arr[$i])) {
            $min_len = $arr[$i];
        }
    }

    echo "Max str length is " . $max_len ;
    echo "<br>" ;
    echo "Min str length is " . $min_len;
}

$arr = ['a', 'abc', 'abcd'];
longest($arr);
