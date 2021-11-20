<?php

function print_num($n, $m) {
    for ($i = $n; $i <= $m; $i++){
        $flag = true;

        for ($j = $n; $j <= $i / 2; $j++) {
            if ($i % $j == 0) {
                $flag = false;
                break;
            }
        }

        if ($flag) {
            echo "<span style='color:red'>$i</span><br>";
        } else {
            echo "<span>$i</span><br>";
        }
    }
}

$n = 2;
$m = 100;
print_num($n, $m);
