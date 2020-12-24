<?php

$arr = [];

$rows = 4;
$cols = 3;

$count = 1;
$f = 8;
$val = '';

for($i = 0; $i < $rows; $i++) {
    for($j = 0; $j < $cols; $j++) {
        if ($i == 0 && $j == 0) {
            $arr[$i][$j] = 1;
        }
        elseif ($i == 0 && $j == 1) {
            $arr[$i][$j] = 8889;
        }
        elseif ($i == 0 && $j == 2) {
            $arr[$i][$j] = 88888889;
        }
        elseif ($i == 1 && $j == 0) {
            $arr[$i][$j] = 9;
        }
        elseif ($i == 1 && $j == 1) {
            $arr[$i][$j] = 88889;
        }
        elseif ($i == 1 && $j == 2) {
            $arr[$i][$j] = 888888889;
        }
        elseif ($i == 2 && $j == 0) {
            $arr[$i][$j] = 89;
        }
        elseif ($i == 2 && $j == 1) {
            $arr[$i][$j] = 888889;
        }
        elseif ($i == 2 && $j == 2) {
            $arr[$i][$j] = 8888888889;
        }
        elseif ($i == 3 && $j == 0) {
            $arr[$i][$j] = 889;
        }
        elseif ($i == 3 && $j == 1) {
            $arr[$i][$j] = 8888889;
        }
        elseif ($i == 3 && $j == 2) {
            $arr[$i][$j] = 88888888889;
        }
        else
        {
            $arr[$i][$j] = 1;
        }
    }

    $count += 8;
    $val = '';
    $f = '9';
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
