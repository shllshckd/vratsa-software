<?php

$arr = [];

$rows = 4;
$cols = 4;

//$arr[0] = [1,1,1,1];
//$arr[1] = [1,1,1,1];
//$arr[2] = [1,1,1,1];
//$arr[3] = [1,1,1,1];

for($i = 0; $i < $rows; $i++) {
//    $arr[$i] = [];
    for($j = 0; $j < $cols; $j++) {
        $arr[$i][$j] = 1;
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
