<?php

function solve($size) {
    $count = 0;

    for ($i = 0; $i < $size; $i++) {
        echo "$i ";
        $count += 1;

        if ($count == 10) {
            $i .= '<br>';
        }
    }
}

$size = 300;
solve($size);