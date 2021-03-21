<?php

// by pavlin

$people = [
    ['name' => 'person 1', 'height' => 1.75, 'weight' => 90 ,],
    ['name' => 'person 2', 'height' => 1.80, 'weight' => 60 ,],
    ['name' => 'person 3', 'height' => 1.99, 'weight' => 180 ,],
    ['name' => 'person 4', 'height' => 1.50, 'weight' => 99 ,],
    ['name' => 'person 5', 'height' => 1.40, 'weight' => 140 ,],
];

$count = count($people);

$bmi = 0;

$average_weight = 0;
$average_height = 0;
$average_bmi = 0;

for ($i = 0; $i < count($people); $i++) {
    $bmi = $people[$i]['weight'] / ($people[$i]['height'] ** 2);
    $people[$i]['bmi'] = round($bmi, 2);

    $average_weight += $people[$i]['weight'];
    $average_height += $people[$i]['height'];
    $average_bmi += $people[$i]['bmi'];
}

?>

<table border="1">
    <thead>
        <tr>
            <th>name</th>
            <th>height</th>
            <th>weight</th>
            <th>bmi</th>
        </tr>
    </thead>
    <tbody>
    <?php for ($i = 0; $i < $count; $i++) { ?>
        <tr>
            <td><?php echo $people[$i]['name']; ?></td>
            <td><?php echo $people[$i]['height']; ?></td>
            <td><?php echo $people[$i]['weight']; ?></td>
            <td><?php echo $people[$i]['bmi']; ?></td>
        </tr>
    <?php } ?>
    <tr>
        <td></td>
        <td>Average height: <?= $average_height / $count ?></td>
        <td>Average weight: <?= $average_weight / $count ?></td>
        <td>Average BMI: <?= $average_bmi / $count ?></td>
    </tr>
    </tbody>
</table>