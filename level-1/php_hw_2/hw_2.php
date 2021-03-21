<?php

$input = 150;
// $input = 155;
// $input = 201;
// $input = 302;

switch ($input) {
    case $input <= 50:
        $final_price = $input * 0.1;
        break;
    
    case $input <= 150:
        $first_50 = 50 * 0.1;
        $others = ($input - 50) * 0.15;
        $final_price = ($first_50 + $others) * 1.2;
        break;

    case $input <= 250:
        $first_50 = 50 * 0.1;
        $first_100 = 100 * 0.15;
        $others = ($input - 50 - 100) * 0.25;
        $final_price = ($first_50 + $first_100 + $others) * 1.2;
        break;

    case $input > 250:
        $first_50 = 50 * 0.1;
        $first_100 = 100 * 0.15;
        $second_100 = 100 * 0.25;
        $others = ($input - 50 - 100 - 100) * 0.35;
        $final_price = ($first_50 + $first_100 + $second_100 + $others) * 1.2;
        break;
        
    default:
        $final_price = "Bad input.";
        echo $final_price;
        break;
}

echo "$final_price";
