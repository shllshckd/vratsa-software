<?php

/**
 * @param $word
 * @return string
 */
function isPalindrome($word): string {
    $reversed = strrev($word);

    if ($word === $reversed) {
        return "yes";
    } else {
        return "no";
    }
}

$result = isPalindrome("abcba");
echo $result;
