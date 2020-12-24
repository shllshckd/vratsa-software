<?php

// bubble sort implementation

$arr = [9, 6, 7, 3, 4, 5, 8, 2, 1];

print "Bubble sort <br/><br/>";

print "Unsorted array: <br/>";
foreach ($arr as $key => $value) {
    print "$value ";
}


$n = sizeof($arr);

for ($i = 0; $i < $n; $i++) {
    for ($j = 0; $j < $n - $i - 1; $j++) {
        if ($arr[$j] > $arr[$j + 1]) {
            $tmp = $arr[$j];
            $arr[$j] = $arr[$j + 1];
            $arr[$j + 1] = $tmp;
        }
    }
}

print "<br/><br/>";
print "Sorted array: <br/>";
foreach ($arr as $key => $value) {
    print "$value ";
}
