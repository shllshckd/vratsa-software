<?php

// iterate multidimensional array and print it out
$people = [
    ["name" => "Nao", "JF" => 4, "D" => 34, "C" => 89, "P" => 5,],
    ["name" => "Yin", "JF" => 9, "D" => 2, "C" => 25, "P" => 3,],
];

echo "<table border='1'>";
    echo "<thead>";
        echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>JF</th>";
        echo "<th>D</th>";
        echo "<th>C</th>";
        echo "<th>P</th>";
        echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
        foreach ($people as $key => $person) {
            echo "<tr>";
            foreach ($person as $inner_key => $inner_value) {
                echo "<td>";
                echo $inner_value;
                echo "</td>";
            }
            echo "</tr>";
        }
        echo "<tr><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>";
//        alternatively
        for ($t = 0; $t < count($people); $t++) {
            echo "<tr>";
                echo "<td>" . $people[$t]['name'] . "</td>";
                echo "<td>" . $people[$t]['JF'] . "</td>";
                echo "<td>" . $people[$t]['D'] . "</td>";
                echo "<td>" . $people[$t]['C'] . "</td>";
                echo "<td>" . $people[$t]['P'] . "</td>";
            echo "<tr>";
        }
    echo "</tbody>";
echo "</table>";


