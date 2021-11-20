<?php

// нарастват с 1, 11, 21, 31 или 41 между редовете
// и със 4, 14, 24, 34, 44 между клетките

// at 20:00 solved, test ended in 18:00

$arr = [];

$rows = 5;
$cols = 5;

$up = 0;
$increment = 1;

for ($i = 0; $i < $rows; $i++) {
    for ($j = 0; $j < $cols; $j++) {
        $arr[$i][$j] = $increment + $up + (10 * $i * $j);
        $up += 4;
    }

    $up = 0;
    $increment += 1;
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