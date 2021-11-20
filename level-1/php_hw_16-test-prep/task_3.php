<?php

$arr = [];
$rows = 5;
$cols = 4;
$initial = 7;
$original = $initial;

for ($i = 0; $i < $rows; $i++) {
    for ($j = 0; $j < $cols; $j++) {
        $arr[$i][$j] = $initial;
        $initial += 110;
    }
//    $original = $original + 7;
//    $initial = $original;
// or
    $initial = $original + 7 * ($i + 1);
}

echo "<table border='1'>";

for ($k = 0; $k < $rows; $k++) {
    echo "<tr>";

    for ($l = 0; $l < $cols; $l++) {
        echo "<td>";
            echo $arr[$k][$l];
        echo "</td>";
    }

    echo "</tr>";
}

echo "</table>";
