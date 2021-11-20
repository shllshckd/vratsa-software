<?php

$arr = [25, 2, 105];
//$arr = [25, 'ashs'
//, 105];
//$arr = [25, '', 105];

$max = $arr[0];

foreach ($arr as $value) {
    if (is_string($value) || !isset($arr)) {
        print("Invalid input.");
        return;
    }

    if ($max < $value) {
        $max = $value;
    }
}

echo $max;
