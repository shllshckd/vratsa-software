<?php

function print_input($type, $name, $placeholder = ''){
    return "<input type=$type name=$name placeholder=$placeholder />";
}

function print_list($array) {
    echo "<ul>";

    foreach ($array as $a) {
        echo "<li>";
        echo $a;
        echo "</li>";
    }

    echo "</ul>";
}

function calculate_average_value($arr) {
    $sum = 0;

    foreach ($arr as $value) {
        $sum += $value;
    }

    return $sum / count($arr);
}

function print_table($data_header, $data_arr) {
    $group_average_score = 0;
    $group_count = count($data_arr);

    ?>
    <table border="1">
        <thead>
            <tr>
                <?php foreach ($data_header as $dh) {
                    echo "<th> $dh </th>";
                } ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data_arr as $da) {
                echo "<tr>";
                    echo "<td>" . $da['name'] . ".</td>";
                    echo "<td>" . print_list( $da['subject']) . ".</td>";
                    echo "<td>" . print_list( $da['grade']) . ".</td>";
                        $average_score = calculate_average_value($da['grade']);
                        $group_average_score += $average_score;
                    echo "<td>" . $average_score . ".</td>";
                echo "</tr>";
            }
            ?>
            <tr>
                <td colspan="3">Group Average Score:</td>
                <td><?php echo $group_average_score / $group_count; ?></td>
            </tr>
        </tbody>
    </table>
    <?php
}
