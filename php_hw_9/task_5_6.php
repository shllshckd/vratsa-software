<?php

$arr = [];

$rows = 4;
$cols = 4;

$count = 1;
$f = 4;
$val = '';

for($i = 0; $i < $rows; $i++) {
    for($j = 0; $j < $cols; $j++) {
        $arr[$i][$j] = $val . $count;
        $val = $f;
        $f = $f . 4;
    }

    $count++;
    $val = '';
    $f = 4;
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

//for($i = 0; $i < $rows; $i++) {
//    $count = $i + 1;
//
//    for($j = 0; $j < $cols; $j++) {
//
//        if ($j == 1) {
//            $count += 40;
//        }
//        elseif ($j == 2) {
//            $count += 400;
//        }
//        elseif ($j == 3 ) {
//            $count += 4000;
//        }
//
//        $arr[$i][$j] = $count;
//    }
//}
