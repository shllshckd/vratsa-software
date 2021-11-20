<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>php hw 4</title>
</head>
<body>
<br>

<?php

$user = 'az';
$pass = 'az';

if (!isset($_POST['username']) ||
    !isset($_POST['password']) ||
    $user !== $_POST['username'] ||
    $pass !== $_POST['password']
) {
    echo "Грешно или празно потребителско име/парола.";
    echo "<br>";
    echo "<br>";
    ?>

    <form action="" method="post">
        <label for="username">Name: </label>
        <input type="text" name="username" id="username"><br>

        <label for="password">Password: </label>
        <input type="password" name="password" id="password"><br><br>

        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
} else {
    echo "Добре дошъл, " . $user . "!";
}
?>

</body>
</html>
