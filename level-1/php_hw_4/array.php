<?php

$assoc_arr = [
    "name" => "Pesho",
    "age" => 25,
    "address" => "Vratsa",
    "married" => "false",
];

// echo "<table border=1>";
// echo "<tr>";
// echo "<td> name </td>";
// echo "<td>" . $assoc_arr['name'] . "</td>";
// echo "</tr>";

// echo "<tr>";
// echo "<td>" . $assoc_arr['age'] . "</td>";
// echo "</tr>";

// echo "<tr>";
// echo "<td>" . $assoc_arr['address'] . "</td>";
// echo "</tr>";

// echo "<tr>";
// echo "<td>" . $assoc_arr['married'] . "</td>";
// echo "</tr>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php array exercise</title>
</head>
<body>
    <table border=1>
        <tr>
            <td>name</td>
            <td><?php echo $assoc_arr['name'] ?></td>
        </tr>
        <tr>
            <td>age</td>
            <td><?php echo $assoc_arr['age'] ?></td>
        </tr>
        <tr>
            <td>address</td>
            <td><?php echo $assoc_arr['address'] ?></td>
        </tr>
        <tr>
            <td>married</td>
            <td><?php echo $assoc_arr['married'] ?></td>
        </tr>
    </table>
</body>
</html>