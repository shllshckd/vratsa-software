<?php

$students = [
    [
        'firstname' => 'Peter 1',
        'surname' => 'Petrov 1',
        'lastname' => 'Aleksandrov 1',
        'mark_1' => 6,
        'mark_2' => 4,
        'mark_3' => 5,
        'mark_4' => 3,
    ],
    [
        'firstname' => 'Peter 2',
        'surname' => 'Petrov 2',
        'lastname' => 'Aleksandrov 2',
        'mark_1' => 4,
        'mark_2' => 4,
        'mark_3' => 4,
        'mark_4' => 4,
    ],
    [
        'firstname' => 'Peter 3',
        'surname' => 'Petrov 3',
        'lastname' => 'Aleksandrov 3',
        'mark_1' => 3,
        'mark_2' => 3,
        'mark_3' => 3,
        'mark_4' => 3,
    ],
    [
        'firstname' => 'Peter 4',
        'surname' => 'Petrov 4',
        'lastname' => 'Aleksandrov 4',
        'mark_1' => 5,
        'mark_2' => 5,
        'mark_3' => 5,
        'mark_4' => 5,
    ],
    [
        'firstname' => 'Peter 5',
        'surname' => 'Petrov 5',
        'lastname' => 'Aleksandrov 5',
        'mark_1' => 6,
        'mark_2' => 6,
        'mark_3' => 6,
        'mark_4' => 6,
    ],
];

echo "<table border='1'>";

echo "<thead>";
foreach ($students as $key => $value) {

    echo "<tr>";
    foreach ($value as $inner_key => $inner_value) {
        echo "<th>";
            echo "$inner_key"; // labels
        echo "</th>";
    }

    echo "</tr>";
    break;
}

echo "</thead>";


echo "<tbody>";

$idx = 1;
$sub_total = 0;

$var_for_one = 0;
$var_for_two = 0;
$var_for_three = 0;
$var_for_four = 0;

foreach ($students as $key => $value) {

    echo "<tr>";
    foreach ($value as $inner_key => $inner_value) {
        echo "<td>";
            echo "$inner_value"; // table contents
        echo "</td>";

        if ($inner_key == 'mark_1' && is_int($inner_value)) {
            $sub_total += $inner_value;
        }
        if ($inner_key == 'mark_2' && is_int($inner_value)) {
            $sub_total += $inner_value;
        }
        if ($inner_key == 'mark_3' && is_int($inner_value)) {
            $sub_total += $inner_value;
        }
        if ($inner_key == 'mark_4' && is_int($inner_value)) {
            $sub_total += $inner_value;
        }

        if ($inner_key == 'mark_1') {
            $var_for_one += $inner_value;
        }
        if ($inner_key == 'mark_2') {
            $var_for_two += $inner_value;
        }
        if ($inner_key == 'mark_3') {
            $var_for_three += $inner_value;
        }
        if ($inner_key == 'mark_4') {
            $var_for_four += $inner_value;
        }
    }

    $avg_marks_student = $sub_total / 4;
    print "Средният успех на ученик #$idx по всички предмети е: $avg_marks_student<br>";
    $idx += 1;

    $sub_total = 0;


    echo "</tr>";
}

//print "ok? : $var_for_one<br>";
//print "ok? : $var_for_two<br>";
//print "ok? : $var_for_three<br>";
//print "ok? : $var_for_four<br>";

echo "<br>";

echo "</tbody>";

echo "</table>";


