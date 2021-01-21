<?php

$people = [
    ["name" => "Yano", "JF" => 1, "D" => 21, "C" => 25, "P" => 6,],
    ["name" => "Bogo", "JF" => 2, "D" => 22, "C" => 24, "P" => 4,],
    ["name" => "Peter", "JF" => 3, "D" => 23, "C" => 26, "P" => 8,],
    ["name" => "Nao", "JF" => 4, "D" => 34, "C" => 89, "P" => 5,],
    ["name" => "Yin", "JF" => 9, "D" => 2, "C" => 25, "P" => 3,],
];

$count = count($people);
$average_risk = 0;

for ($p = 0; $p < $count; $p++) {
    $person_risk = (($people[$p]['JF'] + $people[$p]['D']) ** 2 + $people[$p]['C'] * 2) / $people[$p]['P'];
    $people[$p]['R'] = $person_risk;
    $average_risk += $person_risk;
}

$average_risk_all = $average_risk / $count;
$min_risk = $people[0]['R'];
$min_index = 0;

for ($x = 0; $x < $count; $x++) {
    if ($min_risk > $people[$x]['R']) {
        $min_risk = $people[$x]['R'];
        $min_index = $x;
    }
}

?>

<table border="1">
    <thead>
        <tr>
            <th>Name</th>
            <th>JF</th>
            <th>D</th>
            <th>C</th>
            <th>P</th>
            <th>R</th>
        </tr>
    </thead>
    <tbody>
    <?php

    foreach ($people as $key => $person) {
        echo "<tr>";
        foreach ($person as $inner_key => $inner_value) {
            echo "<td>";
            echo $inner_value;
            echo "</td>";
        }

        echo "</tr>";
    }
    echo "<tr><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>";
    for ($k = 0; $k < $count; $k++) {
        echo "<tr>";
            echo "<td>" . $people[$k]['name'] . "</td>";
            echo "<td>" . $people[$k]['JF'] . "</td>";
            echo "<td>" . $people[$k]['D'] . "</td>";
            echo "<td>" . $people[$k]['C'] . "</td>";
            echo "<td>" . $people[$k]['P'] . "</td>";
            echo "<td>" . $people[$k]['R'] . "</td>";
        echo "</tr>";
    }

    ?>
    </tbody>
</table>

<?php

echo $people[$min_index]['name'] . ' has the lowest R = ' . $people[$min_index]['R'];
echo "<br>";
echo 'Average risk for all ' . $average_risk_all;
