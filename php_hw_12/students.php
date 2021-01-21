<?php

// not working as expected

function printInputWithParameters($type, $name, $value = '', $placeholder = '', $class = '', $id = ''): string
{
    return "<input type=\"$type\" name=\"$name\" 
                        value=\"$value\" class=\"$class\" 
                        id=\"$id\" placeholder=\"$placeholder\"/>";
}

function printForm($students_count, $subjects_count)
{
    echo "<form action=\"\" method=\"post\">";
    for ($i = 0; $i < $students_count; $i++) {
        $counter = $i + 1;

        echo "First Name for Student #$counter<br/>";
        echo printInputWithParameters('text', "first_name_$counter");
        echo "<br/>";

        echo "Middle Name for Student #$counter<br/>";
        echo printInputWithParameters('text', "middle_name_$counter");
        echo "<br/>";

        echo "Last Name for Student #$counter<br/>";
        echo printInputWithParameters('text', "last_name_$counter");
        echo "<br/>";

        for ($j = 0; $j < $subjects_count; $j++) {
            $inner_counter = $j + 1;

            echo "Name for subject #$inner_counter<br/>";
            echo printInputWithParameters('text', "subject_name_$counter" . "_$inner_counter");
            echo "<br/>";

            echo "Term mark for subject #$inner_counter<br/>";
            echo printInputWithParameters('text', "subject_mark_$counter" . "_$inner_counter");
            echo "<br/>";
        }

        echo "<br/><br/>";
    }

    echo printInputWithParameters('submit', "submit", "Submit");

    echo "</form>";
}

function printResult($students_count, $subjects_count)
{
    if (isset($_POST['submit'])) {
        echo "<table border='1'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Student First Name</th>";
        echo "<th>Student Middle Name</th>";
        echo "<th>Student Last Name</th>";

        for ($k = 0; $k < $subjects_count; $k++) {
            $cnt = $k + 1;
            echo "<th>Name for subject $cnt</th>";
            echo "<th>Term mark for subject $cnt</th>";
        }
        echo "</tr>";
        echo "</thead>";


        for ($i = 0; $i < $students_count; $i++) {
            $counter = $i + 1;

            echo "<tr>";
            echo "<td>";
            echo $_POST["first_name_$counter"];
            echo "</td>";

            echo "<td>";
            echo $_POST["middle_name_$counter"];
            echo "</td>";

            echo "<td>";
            echo $_POST["last_name_$counter"];
            echo "</td>";

            for ($j = 0; $j < $subjects_count; $j++) {
                $inner_counter = $j + 1;

                echo "<td>";
                echo $_POST["subject_name_$counter" . "_$inner_counter"];
                echo "</td>";

                echo "<td>";
                echo $_POST["subject_mark_$counter" . "_$inner_counter"];
                echo "</td>";
            }

            echo "<tr>";
        }

        echo "</tbody>";
        echo "</table>";
        echo "<br/>";
    }
}

$students_count = 2;
$subjects_count = 3;

if (isset($_POST['submit'])) {
    printResult($students_count, $subjects_count);
} else{
    printForm($students_count, $subjects_count);
}



