<?php

$arr = [];

$rows = 4;
$cols = 4;

$num = 2;

for ($i = 0; $i < $rows; $i++) {
    $arr[$i] = [];
    for ($j = 0; $j < $cols; $j++) {
        $arr[$i][$j] = $num;
        $num += 2;
    }

    $num += 18;
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
