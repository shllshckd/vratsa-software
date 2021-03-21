<?php

$arr = [];

$rows = 4;
$cols = 4;

$num = 1;
$four = 4;
$empty_str = '';

for ($i = 0; $i < $rows; $i++) {
    for ($j = 0; $j < $cols; $j++) {
        $arr[$i][$j] = $empty_str . $num;
        $empty_str = $four;
        $four = $four . 4;
    }

    $num++;
    $empty_str = '';
    $four = 4;
}

echo "<table border='1'>";
for ($m = 0; $m < $rows; $m++) {
    echo "<tr>";
    for ($k = 0; $k < $cols; $k++) {
        echo "<td>";
        echo $arr[$m][$k];
        echo "</td>";
    }
    echo "</tr>";
}
echo "</table>";
