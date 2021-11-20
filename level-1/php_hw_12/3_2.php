<?php

function is_palindrome($word) {
    $arr = str_split($word);
    $count = count($arr);
    $flag = true;

    for ($i = 0; $i < $count /2; $i++) {

        $index = $count - 1 - $i;
        if ($arr[$i] != $arr[$index]) {
            $flag = false;
            break;
        }
    }

    if ($flag) {
        echo "yes, palindrome";
    } else {
        echo "no, not a palindrome";
    }
}

$input = 'abba';
//$input = 'abcba';
// $input = 'test test';

is_palindrome($input);