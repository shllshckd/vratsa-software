<?php

if (isset($_POST['num'])) {
    $number = $_POST['num'];

    for ($i = 0; $i < $number; $i++) {
        for ($j = 0; $j <= $i; $j++) {
            echo "a ";
        }
        echo "<br/>";
    }

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
    <title>task 5</title>
</head>
<body>
    <form action="" method="post">
        <label for="num"></label>
        <input type="number" name="num" id="num"><br/><br/>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
