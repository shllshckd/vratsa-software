<?php

if (isset($_POST['first']) == true &&
    isset($_POST['second']) == true &&
    isset($_POST['third']) == true) {

    $arr = [$_POST['first'], $_POST['second'], $_POST['third']];
    sort($arr);

    echo "$arr[0], $arr[1], $arr[2]";

//} elseif (
//    (isset($_POST['first']) == false) ||
//    (isset($_POST['second']) == false) ||
//    (isset($_POST['third']) == false)) {
//    echo "<p>Incorrect input.</p>";

} else {
        echo "<p>Incorrect input.</p>";
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>hw 8</title>
</head>
<body>
    <form action="" method="post">
        <label for="first">First number: </label>
        <input type="text" name="first" id="first"><br>

        <label for="second">Second number: </label>
        <input type="text" name="second" id="second"><br>

        <label for="third">Third number: </label>
        <input type="text" name="third" id="third"><br><br>

        <input type="submit" name="submit" value="Submit">
        <br><br>
    </form>
</body>
</html>