<?php

function is_valid_date($date_string) {
    $arr_30 = ['April', 'June', 'September', 'November'];
    $arr = explode(' ', $date_string);

    if ($arr[0] < 1 || $arr[0] > 31) {
        return 'Not a valid date.';
    } else {
        if (in_array($arr[1], $arr_30)) {
            if ($arr[0] > 30) {
                return 'Not a valid date.';
            }
        } elseif ($arr[1] == 'February') {
            if ($arr[0] > 29) {
                return 'Not a valid date.';
            }
        }
    }

    return 'Valid date.';
}

$date = '30 February';
//$date = '10 February';
//$date = '30 April';
echo is_valid_date($date);
