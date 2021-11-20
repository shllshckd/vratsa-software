<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>hw task 3 - get largest sequence of increasing numbers</title>
</head>
<body>

<table border="1">

<?php

//    $array = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20];
    $array = [];
    $result = [];
    $size = 50;

    // 1. generate array

    for ($i = 0; $i < $size; $i++){
        $array[$i] = rand(0, 9999);
    }

    // 2. if previous is less than current and later is greater than current store them into an array

    for($j = 0; $j < $size - 2; $j++) {
        if ($array[$j] < $array[$j + 1] && $array[$j + 1] < $array[$j + 2] &&
//            ($array[$j + 1] == ($array[$j] + 1)) &&
//            ($array[$j + 2] == ($array[$j + 1] + 1)) &&
            !in_array($array[$j], $result) &&
            !in_array($array[$j + 1], $result) &&
            !in_array($array[$j + 2], $result)
        ) {
            array_push($result, $array[$j], $array[$j + 1], $array[$j + 2]);
        }
    }

    sort($result);

    // 3. print

    echo "Последователност от нарастващи числа. <br> <br>";
    foreach ($result as $key => $value) {
        echo "$key => $value <br>";
    }

?>

</table>

</body>
</html>
