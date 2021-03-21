<?php

$arr = [];

$rows = 5;
$cols = 4;

$count = 1;
$increment = 1;

$starter = 10;
$second = $starter + 1;

for($i = 0; $i < $rows; $i++) {
    for($j = 0; $j < $cols; $j++) {
        if ($j == 0) {
            $arr[$i][0] = $increment;
        }
        if ($j == 1) {
            $arr[$i][1] = $starter;
        }
        if ($j == 2) {
            $arr[$i][2] = $second;
            $second++;
        }
        if ($j == 3) {
            $zero = $arr[$i][0];
            $one = $arr[$i][1];
            $two = $arr[$i][2];

            $res = $two + $one - $zero;
            $arr[$i][3] = $res;
        }
    }

    $starter -= 1;
    $increment += 1;
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
