
<!-- 2, 3, 4, 10, 15, 16, 99, 22
-->

<?php

function print_table($post_input) {
    $arr = explode(' ', $post_input);

    echo "<table border='1'>";
        for ($i = 0; $i < count($arr); $i++) {
            echo "<tr>";
                echo "<td>$arr[$i]</td>";

                $len = strlen($arr[$i]);
                $sum = 0;

                if (!is_numeric($arr[$i])) {
                    echo '<td>cannot sum</td>';
                    return;
                }

                for ($j = 0; $j < $len; $j++){
                    $sum += $arr[$i][$j];
                }

                echo "<td>$sum</td>";
            echo "</tr>";
        }
    echo "<table>";
}


//$post_input = "1 25 56 9656 258 7854 21";
$post_input = "1 25 56 aaa 9656 258 7854 21";

print_table($post_input);
