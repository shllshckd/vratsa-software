<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>hw task 4 - get the number that repeats itself the most in an array</title>
</head>
<body>

<table border="1">

<?php

    $array = [];
    $size = 20;

    for ($i = 0; $i < $size; $i++){
        $array[$i] = rand(0, 30);
    }

    // counts all the values of an array
    $values = array_count_values($array);

    // sort associative arrays in descending order, according to the value
    arsort($values);

    foreach ($values as $key => $value) {
        echo "<p>Най-повтарящото се число ($key) се среща $value пъти в масива.</p>";
        break;
    }

    print "<p>-------------------------------------------------</p>";
    print "<p>Всички числа в масива и броят на повторенията им:</p>";
    foreach ($values as $key => $value) {
        echo "$key => $value <br>";
    }

?>

</table>

</body>
</html>
