<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>php hw 6</title>
</head>
<body>

<form action="" method="post">
    <label for="number">Guess the number (0-10): </label>
    <input type="text" name="number" id="number"><br><br>

    <input type="submit" name="submit" value="Submit">
</form>

<?php

$number = 3;

if (isset($_POST['number']) && ($_POST['number'] == $number)){
    echo "<p>Correct guess.</p>";
} else {
    echo "<p>Incorrect guess.</p>";
}

?>

</body>
</html>