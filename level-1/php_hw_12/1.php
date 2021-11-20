<?php

function generateArray($rows, $cols, $array): array {
    $number = 1;

    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $cols; $j++) {
            $array[$i][$j] = $number;
            $number += 2;
        }
    }

    return $array;
}

function printArrayAsTable($array): void {
    echo "<table border='1'>";

    for ($i = 0; $i < count($array); $i++) {
        echo "<tr>";

        for ($j = 0; $j < count($array[$i]); $j++) {
            echo "<td>";
                echo $array[$i][$j];
            echo "</td>";
        }

        echo "</tr>";
    }

    echo "<table>";
}

$result = generateArray(5, 5, []);
printArrayAsTable($result);
