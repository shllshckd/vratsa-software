<?php

function calc_fact($number) {
    if ($number <= 1) {
        return 1;
    }
    else {
        return $number * calc_fact($number - 1);
    }
}

if (isset($_POST['num_n']) && isset($_POST['num_k'])) {
    $n = $_POST['num_n'];
    $k = $_POST['num_k'];

    if ($n < $k || $n == 0 || $k == 0 ||
        is_string((int)$n) || is_string((int)$k))
    {
        echo "Invalid input.";
        return;
    }

    // n! * k! / (n - k)
    $fin = (calc_fact($n) * calc_fact($k)) / calc_fact($n - $k);

    echo $fin;
    echo ">Go back</a>";
    return;
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>task 4</title>
</head>
<body>
    <form action="" method="post">
        <label for="num_n"></label>
        <input type="number" name="num_n" id="num_n"><br/>

        <label for="num_k"></label>
        <input type="number" name="num_k" id="num_k"><br/><br/>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
