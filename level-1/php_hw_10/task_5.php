<?php

$arr = [];

$rows = 4;
$cols = 4;

$count = 1;

// 2nd row only
for ($i = 0; $i < $rows; $i++) {
    for ($j = 0; $j < $cols; $j++) {
        $arr[$i][$j] = $count;

        $dec = ($i * ($i * 2));

        $count = ($count + 1) - $dec;
    }
    $count = $count * 2 - (($i + 1) * 2);


//    if ($i == 0) {
//        for($j = 0; $j < $cols; $j++) {
//            $arr[$i][$j] = $count;
//            $count += 1;
//            $biggest = $arr[$i][$j];
//        }
//    }
//    elseif ($i == 1) {
//        for($j = 0; $j < $cols; $j++) {
//            $arr[$i][$j] = $biggest * 2 - $j;
//        }
//    }
//    elseif ($i == 2) {
//        for($j = 0; $j < $cols; $j++) {
//            $arr[$i][$j] = $biggest * 2 + 1 + $j;
//        }
//    }
//    elseif ($i == 3) {
//        for($j = 0; $j < $cols; $j++) {
//            $arr[$i][$j] = $biggest * 3 + 4 - $j;
//        }
//    }
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
