<?php



function get_triangle_type($a, $b, $c) {
    if (($a + $c < $b) || ($a + $b < $c) || ($b + $c < $a)) {
        echo "Няма такъв.";
    } else {
        if (($a == $b) && ($b == $c)) {
            echo "Равностранен.";
        } elseif (($a == $b) || ($b == $c) || ($a == $c)) {
            echo 'Равнобедрен';
        } elseif ($a != $b && $a != $c && $b != $c) {
            echo 'Разностранен';
        }
    }
}

$a = 10;
$b = 63;
$c = 15;

get_triangle_type($a, $b, $c);
