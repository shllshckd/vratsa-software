<?php

$n = 10;
$sum = 0;

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>task 2</title>
</head>
<body>

<table border="1">
    <?php

    for ($i = 1; $i <= $n; $i++) {
        $num = rand(0, 100);

        if ($num % 2 == 0) {
            $num_sqrt = sqrt($num);
            $num_sqrt_rounded = round($num_sqrt, 2);

            echo "<tr>";
                echo "<td>Number</td>";
                echo "<td>Squared number</td>";
                echo "<td>Squared number rounded</td>";
            echo "</tr>";

            echo "<tr>";
                echo "<td>" . $num . "</td>";
                echo "<td>" . $num_sqrt . "</td>";
                echo "<td>" . $num_sqrt_rounded . "</td>";
            echo "</tr>";

            $sum += $num_sqrt_rounded;
        }
    }

    ?>
    <tr>
        <td>Sum of rounded square roots</td>
        <td><?php echo $sum; ?></td>
    </tr>
</table>

</body>
</html>
