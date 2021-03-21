<?php

function increasing_numbers($arr)
{
    $count = count($arr);
    $token = 1;
    $max_length = 1;

    for ($i = 1; $i < $count; $i++) {
        if ($arr[$i] > $arr[$i - 1]) {
            $token += 1;
        } else {
            if ($token > $max_length) {
                $max_length = $token;
            }
            $token = 1;
        }
    }

    if ($token > $max_length) {
        $max_length = $token;
    }

    return 'max-length - ' . $max_length;
}

//$arr = [1, 2, 8, 9, 10, 12, 13, 58, 3, 6, 8];
//$arr = [100, 2, 8, 9, 10, 12, 13, 3, 6, 8, 14, 25, 89];
//$arr = [100, 2, 8, 9, 11, 14, 16, 19, 3, 6, 8, 14, 25, 89, 2];
$arr = [100, 2, 8, 9, 3, 6, 8, 14, 25, 89, 2];
echo increasing_numbers($arr);