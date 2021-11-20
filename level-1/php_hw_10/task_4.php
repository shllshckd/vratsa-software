<?php

$arr = [];

$rows = 4;
$cols = 3;

$f = 8;

$count = 1;
$initial = $count;

$x = '8889';
$x_init = $x;

for ($i = 0; $i < $rows; $i++) {
    for ($j = 0; $j < $cols; $j++) {
        $arr[$i][$j] = $count;

        $count = ($x);
        $x = '8888' . $x;
    }

    $x = '8' . $x_init;
    $x_init = '8' . $x_init;

    $count = ($f + 1);
    $f = '8' . $f;
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