<?php

if (!empty($_POST['cost'])) {
    $cost = $_POST['cost'];
    $environment = $_POST['environment'];

    switch ($environment) {
        case "snow":
            $cost *= 1.05;
            break;

        case "traffic":
            $cost *= 1.50;
            break;

        case "turns":
            $cost *= 1.20;
            break;

        case "highway":
            $cost *= 0.90;
            break;
    }

    echo 'Разход - ' . $cost;
}

