<?php

// нарастват с 1, 11, 21, 31 или 41 между редовете
// и със 4, 14, 24, 34, 44 между клетките

// worse

$arr = [];

$rows = 5;
$cols = 5;

$up1 = 0;
$selfincr = 1;

for ($i = 0; $i < $rows; $i++) {
    for ($j = 0; $j < $cols; $j++) {
        $arr[$i][$j] = $selfincr + $up1;

        if ($i == 0) {
            $up1 += 4;
        } elseif ($i == 1) {
            $up1 += 14;
        } elseif ($i == 2) {
            $up1 += 24;
        } elseif ($i == 3) {
            $up1 += 34;
        } elseif ($i == 4) {
            $up1 += 44;
        }
    }

    $up1 = 0;
    $selfincr += 1;
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
