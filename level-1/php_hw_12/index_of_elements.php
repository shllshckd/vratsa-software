<?php

function indexOfElement($array)
{
    $flag = false;
    $idx = 0;

    $count = count($array);

    if ($count < 3) {
        return 'Invalid array size.';
    }

    if ($array[0] > $array[1] && $array[0] > $array[$count - 1]) {
        $flag = true;
        $idx = $array[0];

        // return the index of the wanted number
        return array_search($idx, $array);
    }

    for ($i = 1; $i < $count - 1; $i++) {
        if ($array[$i] > $array[$i - 1] && $array[$i] > $array[$i + 1]) {
            $flag = true;
            $idx = $i;
            return $idx;
        }
    }

    if ($array[$count - 1] > $array[0] && $array[$count - 1] > $array[$count - 2]) {
        $flag = true;
        $idx = $array[$count - 1];

        // return the index of the wanted number
        return array_search($idx, $array);
    }

    if ($flag) {
        return $idx;
    } else {
        return 'no such element';
    }
}

$arr = [2, 11, 2, 3, 0, 2]; // 1
//$arr = [0, 4, 7, 0, 0, 0]; // 2
//$arr = [4, 15, 27, 33, 1]; // 3
//$arr = [1, 1, 1, 1]; // no such element

//$arr = [27, 22, 11, 4]; // 0
//$arr = [25, 3, 2, 22, 28]; // 4

$result = indexOfElement($arr);
echo $result;
