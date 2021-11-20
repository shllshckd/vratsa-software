<?php

$array = [];

$array[0] = "Zero";
$array[1] = 1;
$array[2] = '2';
$array[3] = 'Three';
$array[4] = 4;

for ($i=0; $i < count($array); $i++) { 
    echo "$array[$i] <br>";
}
