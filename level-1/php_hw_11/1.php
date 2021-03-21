<?php

$a = 110;
$b = 42;

//$a = 7;
//$b = 100;

//$tag = 'h1';

/**
 * @param $a
 * @param $b
 * @param $tag
 */
function num($a, $b, $tag = 'p') {
    if ($a > $b) {
        for ($i = $a; $i >= $b; $i--) {
            echo "<$tag>" . $i . "</$tag>";
        }
    } elseif ($a < $b) {
        for ($i = $a; $i <= $b; $i++) {
            echo "<$tag>" . $i . "</$tag>";
        }
    } else {
        echo "<$tag>" . $a . "</$tag>";
        echo "<$tag>" . $b . "</$tag>";
    }
}

//num($a, $b, $tag);
num($a, $b);
