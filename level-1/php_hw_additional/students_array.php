<?php

$mark_count = 4;
$student_count = 5;

$five_students = [
    ["first_name" => "pesho", "middle_name" => "antonov", "last_name" => "petrov",
        "mark_1" => 6, "mark_2" => 2, "mark_3" => 2, "mark_4" => 6], // 4

    ["first_name" => "anton", "middle_name" => "peshov", "last_name" => "peshov",
        "mark_1" => 5, "mark_2" => 6, "mark_3" => 6, "mark_4" => 5], // 5.5

    ["first_name" => "dimitar", "middle_name" => "zaikov", "last_name" => "georgiev",
        "mark_1" => 4, "mark_2" => 5, "mark_3" => 5, "mark_4" => 4], // 4.5

    ["first_name" => "donnie", "middle_name" => "darko", "last_name" => "",
        "mark_1" => 4, "mark_2" => 4, "mark_3" => 3, "mark_4" => 3], // 3.5

    ["first_name" => "jester", "middle_name" => "anakiev", "last_name" => "ivanov",
        "mark_1" => 3, "mark_2" => 2, "mark_3" => 3, "mark_4" => 2], // 2.5
]; // (4 + 5.5 + 4.5 + 3.5 + 2.5) / 5 = 4

$mark_average = [];
$student_subject_average = [];

for ($s = 0; $s < count($five_students); $s++) {
    $student_subject_average[$s] = $five_students[$s]["mark_1"] + $five_students[$s]["mark_2"]
                                 + $five_students[$s]["mark_3"] + $five_students[$s]["mark_4"];
}
for ($c = 0; $c < count($five_students); $c++) {
    $five_students[$c]['average_score'] = $student_subject_average[$c] / $mark_count;
    echo 'Average mark for student ' . $five_students[$c]["first_name"] . ' is ' . $five_students[$c]['average_score'] . '<br>';
}

foreach ($student_subject_average as $key => $value) {
    $student_subject_average[$key] = $student_subject_average[$key] / $mark_count;
}

$avg_for_all = array_sum($student_subject_average) / $student_count;

//for ($l = 0; $l < count($five_students); $l++) {
//    for ($b = 0; $b < $mark_count; $b++) {
//        $mark_average[$l] += $five_students[$l]["mark_1"];
//    }
//    //    $mark_average[$l] = $five_students[$l]["mark_1"] + $five_students[$l]["mark_2"]
//    //                      + $five_students[$l]["mark_3"] + $five_students[$l]["mark_4"];
//    $mark_average[$l] /= $mark_count;
//}

var_dump($avg_for_all);
var_dump($student_subject_average);
var_dump($five_students);

//for ($i = 0; $i < count($five_students) -1; $i++) {
//    for ($j = 0; $j < count($five_students[$i]) - 1; $j++) {
//        $count = $j + 1;
////        $mark = 'mark_' . $count;
//        $mark = 'mark_0';
//        $current_subject_average[$j] += $five_students[$j][$mark];
//    }
//}

?>

<table border="1">
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Middle Name</th>
            <th>Mark #1</th>
            <th>Mark #2</th>
            <th>Mark #3</th>
            <th>Mark #4</th>
            <th>Average Mark</th>
        </tr>
    </thead>
    <tbody>
        <?php for ($i = 0; $i < count($five_students); $i++) { ?>
            <tr>
                <td><?php echo $five_students[$i]['first_name']; ?></td>
                <td><?php echo $five_students[$i]['middle_name']; ?></td>
                <td><?php echo $five_students[$i]['last_name']; ?></td>
                <td><?php echo $five_students[$i]['mark_1']; ?></td>
                <td><?php echo $five_students[$i]['mark_2']; ?></td>
                <td><?php echo $five_students[$i]['mark_3']; ?></td>
                <td><?php echo $five_students[$i]['mark_4']; ?></td>
                <td><?php echo $five_students[$i]['average_score']; ?></td>
            </tr>
        <?php } ?>
        <tr>
            <td><?php echo "Average mark for all"; ?></td>
            <td><?php echo $avg_for_all; ?></td>
        </tr>
    </tbody>
</table>
