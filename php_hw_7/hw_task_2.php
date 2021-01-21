<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>hw task 2 - lowest element in an array</title>
</head>
<body>

<table border="1">

<?php

    $array = [];

    for ($i = 0; $i < 100; $i++){
        $array[$i] = rand(0, 4444);
    }

    // set initially to high value, won't work otherwise
    $lowest = 9999;
    foreach ($array as $key => $value) {
//        if (0 == $value) {
//            continue;
//        }

        if ($lowest > $value) {
            $lowest = $value;
        }
    }

    echo "Lowest number in an array: $lowest <br/>";

    echo "Array: <br/>";
    foreach ($array as $key => $value) {
        echo "$key => $value <br/>";
    }

?>

</table>

</body>
</html>
