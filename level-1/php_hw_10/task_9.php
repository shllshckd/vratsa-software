<?php

$arr = [];

$rows = 4;
$cols = 4;

$increment = 1;

for($i = 0; $i < $rows; $i++) {
    if ($i == 0) {
        for($j = 0; $j < $cols; $j++) {
            $arr[$i][$j] = $j + 1;
        }
    }
    elseif ($i == 1) {
        for($j = 0; $j < $cols; $j++) {
            $arr[$i][0] = $increment + $cols + $rows + $i * 3;
            $arr[$i][1] = $increment + $cols + $rows + $i * 4;
            $arr[$i][2] = $increment + $cols + $rows + $i * 5;
            $arr[$i][$j + 3] = $increment + $cols;
        }
    }
    elseif ($i == 2) {
        for($j = 0; $j < $cols; $j++) {
            $arr[$i][0] = $increment + $cols + $rows + $i;
            $arr[$i][1] = $increment + $cols + $rows + ($i * 4 - 1);
            $arr[$i][2] = $increment + $cols + $rows + $i * 3;
            $arr[$i][$j + 3] = $increment + $cols + 1;
        }
    }
    if ($i == 3) {
        for($j = 0; $j < $cols; $j++) {
            $arr[$i][$j + 3] = $increment + $cols + 2;
            $element = $arr[$rows-1][$cols-1];
            $arr[$i][$j] = $element - $j + 3;
        }
    }
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
