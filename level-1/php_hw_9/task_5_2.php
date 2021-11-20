<?php

$arr = [];

$rows = 4;
$cols = 5;

$count = $rows * $cols;

for($i = 0; $i < $rows; $i++) {
//    $arr[$i] = [];
    for($j = 0; $j < $cols; $j++) {
        $arr[$i][$j] = $count;
        $count -= 1;
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

print "<pre>";
var_dump($arr);
print "</pre>";
