<?php

$info_arr_one = [
    'first_name' => 'Peter',
    'sur_name' => 'Asenov',
    'last_name' => 'Petrov',
    'age' => 18,
    'profession' => "Software Engineer",
];

$info_arr_two = [
    'first_name' => 'Peter',
    'sur_name' => 'Asenov',
    'last_name' => 'Petrov',
    'phone_number' => '0895527617',
];

$info_arr_three = [
    'Vratsa' => '092',
    'Sofia' => '02',
    'Pleven' => '064',
    'Varna' => '052',
    'Plovdiv' => '032',
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php exercise</title>
</head>
<body>
    <div>
        <h1>First Associative Array</h1>
        <ul>
            <li><?php echo $info_arr_one['first_name']; ?></li>
            <li><?php echo $info_arr_one['sur_name']; ?></li>
            <li><?php echo $info_arr_one['last_name']; ?></li>
            <li><?php echo $info_arr_one['age']; ?></li>
            <li><?php echo $info_arr_one['profession']; ?></li>
        </ul>
    </div>
    <div>
        <h1>Second Associative Array</h1>
        <ol>
            <li><?php echo $info_arr_two['first_name']; ?></li>
            <li><?php echo $info_arr_two['sur_name']; ?></li>
            <li><?php echo $info_arr_two['last_name']; ?></li>
            <li><?php echo $info_arr_two['phone_number']; ?></li>
        </ol>
    </div>
    <div>
        <h1>Third Associative Array</h1>
        <table border=1>
            <tr>
                <td>Vratsa</td>
                <td><?php echo $info_arr_three['Vratsa']; ?></td>
            </tr>
            <tr>
                <td>Pleven</td>
                <td><?php echo $info_arr_three['Pleven']; ?></td>
            </tr>
            <tr>
                <td>Plovdiv</td>
                <td><?php echo $info_arr_three['Plovdiv']; ?></td>
            </tr>
            <tr>
                <td>Varna</td>
                <td><?php echo $info_arr_three['Varna']; ?></td>
            </tr>
            <tr>
                <td>Sofia</td>
                <td><?php echo $info_arr_three['Sofia']; ?></td>
            </tr>
        </table>
    </div>
</body>
</html>