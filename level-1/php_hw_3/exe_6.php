<?php

$a = 25;
$b = 20;
$c = 40;

if (($a <= 0) || ($b <= 0) || ($c <= 0)) {
    echo "<h1>No</h1>";
    return;
}
elseif (($a + $b > $c) && ($a + $c > $b) && ($b + $c > $a)) {
    echo "<h1>$a, $b, $c</h1>";
    echo "<h1>Yes</h1>";
}
else {
    echo "<h1>No</h1>";
}
