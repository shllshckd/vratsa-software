<?php

function print_triangle($input) {
    for ($i = 0; $i <= $input; $i++) {
        for ($j = 0; $j < $i; $j++) {
            echo '* ';
        }
        echo "<br>";
    }
}

$n = 7;
print_triangle($n);
