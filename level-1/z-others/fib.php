<?php

function calc_fact($number)
{
    if ($number <= 1) {
        return 1;
    } else {
        return $number * calc_fact($number - 1);
    }
}

if (isset($_POST['num_n']) && isset($_POST['num_k'])) {
    $n = $_POST['num_n'];
    $k = $_POST['num_k'];

    if ($n < $k || $n == 0 || $k == 0 ||
        is_string((int)$n) || is_string((int)$k)) {
        echo "Invalid input.";
        return;
    }

    // n! * k! / (n - k)
    $fin = (calc_fact($n) * calc_fact($k)) / calc_fact($n - $k);

    echo $fin;
    echo ">Go back</a>";
    return;
}
