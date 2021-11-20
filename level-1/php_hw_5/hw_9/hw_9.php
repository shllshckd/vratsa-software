<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>hw 9</title>
</head>
<body>

<form action="" method="post">
    <label for="number">Input a month number (1-12): </label>
    <input type="text" name="number" id="number"><br><br>

    <input type="submit" name="submit" value="Submit">
    <br><br>

</form>

<?php

if (isset($_POST['number']) === true) {

    switch ($_POST['number']):
        case $_POST['number'] == 1:
            echo "January";
            break;

        case $_POST['number'] == 2:
            echo "February";
            break;

        case $_POST['number'] == 3:
            echo "March";
            break;

        case $_POST['number'] == 4:
            echo "April";
            break;

        case $_POST['number'] == 5:
            echo "May";
            break;

        case $_POST['number'] == 6:
            echo "June";
            break;

        case $_POST['number'] == 7:
            echo "July";
            break;

        case $_POST['number'] == 8:
            echo "August";
            break;

        case $_POST['number'] == 9:
            echo "September";
            break;

        case $_POST['number'] == 10:
            echo "October";
            break;

        case $_POST['number'] == 11:
            echo "November";
            break;

        case $_POST['number'] == 12:
            echo "December";
            break;

        default:
            echo "Invalid input. ";
            break;

    endswitch;

} elseif ((isset($_POST['number']) == false)) {
    echo "Incorrect or empty guess.";
}

?>
</body>
</html>