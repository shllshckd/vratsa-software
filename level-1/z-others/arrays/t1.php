<?php

$arr = [];

$rows = 4;
$cols = 6;

for ($i = 0; $i < $rows; $i++) {
    for ($j = 0; $j < $cols; $j++) {
        $arr[$i][$j] = 1;
    }
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
