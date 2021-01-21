<?php

$arr = [];
$rows = 4;
$cols = 5;
$number = 3;

for ($r = 0; $r < $rows; $r++) {
//    $arr[$c] = [];

    for ($c = 0; $c < $cols; $c++) {
        $arr[$r][$c] = $number;
        $number += 2;
    }

    $number = $number * 2 -2;
}

echo "<table border='1'>";
    for ($q = 0; $q < $rows; $q++) {
        echo "<tr>";
            for ($o = 0; $o < $cols; $o++) {
                echo "<td>";
                    echo $arr[$q][$o];
                echo "</td>";
            }
        echo "<tr>";
    }
echo "</table>";
