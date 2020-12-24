<?php

if (!isset($_POST['angle_a']) ||
    !isset($_POST['angle_b']) ||
    !isset($_POST['angle_c']) ) {
    return;

} else {
    $result = $_POST['angle_a'] + $_POST['angle_b'] + $_POST['angle_c'];

    // cant be above 180 degrees or below 3 degrees in total
    if ($result > 180 || $result < 3) {
        echo "Triangle with total sum of angles $result is not possible.";
    } else {
        echo "Triangle with total sum of angles $result is possible.";
    }
}
