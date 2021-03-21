<?php

$a = 5;
$b = 10;

echo "A: " . $a;
echo "<br>";
echo "B: " . $b;

echo "<br>";

$temp = $a;
$a = $b;
$b = $temp;

echo "A: " . $a;
echo "<br>";
echo "B: " . $b;
