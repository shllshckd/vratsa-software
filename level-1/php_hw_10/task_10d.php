<?php

$arr = [];

$rows = 4;
$cols = 4;

$increment = 1;

for($i = 0; $i < $rows; $i++) {
    if ($i == 0) {
        for($j = 0; $j < $cols; $j++) {
            $arr[$i][0] = $increment + $i;
            $arr[$i][1] = $increment + $cols + $rows + $i + 3;
            $arr[$i][2] = $increment + $cols + $rows + $i + 2;
            $arr[$i][$j + 3] = $increment + $cols + $rows + 1;
        }
    }
    elseif ($i == 1) {
        for($j = 0; $j < $cols; $j++) {
            $arr[$i][0] = $increment + $i;
            $arr[$i][1] = $increment + $cols + $rows + $i * 4;
            $arr[$i][2] = $increment + $cols + $rows + $i * 7;
            $arr[$i][$j + 3] = $increment + $cols + $rows;

        }
    }
    elseif ($i == 2) {
        for($j = 0; $j < $cols; $j++) {
            $arr[$i][0] = $increment + $i;
            $arr[$i][1] = $increment + $cols + $rows + ($i * 4 - 3);
            $arr[$i][2] = $increment + $cols + $rows + $i * 3;
            $arr[$i][$j + 3] = $increment + $cols + $rows - 1;
        }
    }
    if ($i == 3) {
        for($j = 0; $j < $cols; $j++) {
            $arr[$i][0] = $increment + $i ;
            $arr[$i][$j + 3] = 1;
            $element = $arr[$rows-1][$cols-1];
            $arr[$i][$j] = $element + $j + 3;
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
