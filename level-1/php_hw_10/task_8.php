<?php

$arr = [];

$rows = 4;
$cols = 4;

$count = 7;
$init = $count;
$decrement = $rows - 1;

for ($i = 0; $i < $rows; $i++) {
    for ($j = 0; $j < $cols; $j++) {
        $arr[$i][$j] = $count;
        $count = $count + (4 - $j);

//        $count += (4 - $j);

//        $arr[0][0] = 7;
//        $arr[0][1] = 11;
//        $arr[0][2] = 14;
//        $arr[0][3] = 16;
//
//        $arr[1][0] = 4;
//        $arr[1][1] = 8;
//        $arr[1][2] = 12;
//        $arr[1][3] = 15;
//
//        $arr[2][0] = 2;
//        $arr[2][1] = 5;
//        $arr[2][2] = 9;
//        $arr[2][3] = 13;
//
//        $arr[3][0] = 1;
//        $arr[3][1] = 3;
//        $arr[3][2] = 6;
//        $arr[3][3] = 10;
    }

    $count = $init - $decrement;
    $decrement = $decrement + (2 - $i);
}

print "<table border='1'>";

for ($m = 0; $m < $rows; $m++) {
    print "<tr>";

    for ($k = 0; $k < $cols; $k++) {
        print "<td>";
        print $arr[$m][$k];
        print "</td>";
    }

    print "</tr>";
}

print "<table>";
