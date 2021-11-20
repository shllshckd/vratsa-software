<?php

$arr = [];

$rows = 4;
$cols = 4;

$number = 1;

for($i = 0; $i < $rows; $i++) {
    for($j = 0; $j < $cols; $j++) {
        $arr[$i][$j] = $number;
        $number += 4;
    }

    $number = $i + 2;
}

print "<table border='1'>";

for($m = 0; $m < $rows; $m++) {
    print "<tr>";

    for($k = 0; $k < $cols; $k++) {
        print "<td>";
        print $arr[$m][$k];
        print "</td>";
    }

    print "</tr>";
}

print "<table>";
