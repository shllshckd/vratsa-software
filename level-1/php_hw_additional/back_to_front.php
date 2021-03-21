<?php

function back_to_front($string) {
    $counter = 0;
    $reversed = '';

    while (!empty($string[$counter])) {
        $reversed = $string[$counter] . $reversed;
        $counter += 1;
    }

    echo $reversed;
}

$string = 'Hello, php.';
back_to_front($string);
