<?php

$array = [];
$rows = 4;
$cols = 5;
$initial = 3;

for ($i = 0; $i < $rows; $i++) {
    for ($j = 0; $j < $cols; $j++) {
        $array[$i][$j] = $initial;
        $initial += 2;
    }

    $initial = $initial * 2 - 2;
}

echo "<table border='1'>";
    for ($q = 0; $q < $rows; $q++) {
        echo "<tr>";

        for ($o = 0; $o < $cols; $o++) {
            echo "<td>";
            echo $array[$q][$o];
            echo "</td>";
        }

        echo "<tr>";
    }
echo "</table>";
