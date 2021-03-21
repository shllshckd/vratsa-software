<?php

$arr = [];

$rows = 5;
$cols = 5;

$starter = 25;
$first_value_starter = $starter;

for($i = 0; $i < $rows; $i++) {
    for($j = 0; $j < $cols; $j++) {
        $arr[$i][$j] = $starter;
        $starter -= 5;
    }

    $starter = $first_value_starter - $i - 1;
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
