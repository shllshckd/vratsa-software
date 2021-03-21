<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>php hw 7</title>
</head>
<body>

<form action="" method="post">
    <h3>Give us some information about yourself: </h3>

    <label for="firstname">First Name: </label>
    <input type="text" name="firstname" id="firstname"><br>

    <label for="surname">Surname: </label>
    <input type="text" name="surname" id="surname"><br>

    <label for="lastname">Last Name: </label>
    <input type="text" name="lastname" id="lastname"><br>

    <label for="egn">EGN: </label>
    <input type="text" name="egn" id="egn"><br>

    <label for="address">Address: </label>
    <input type="text" name="address" id="address"><br>

    <label for="education">Education: </label>
    <input type="text" name="education" id="education"><br>

    <label for="profession">Profession: </label>
    <input type="text" name="profession" id="profession"><br>

    <br/>
    <input type="submit" name="submit" value="Submit">
    <br/><br/>

</form>

<?php

if (isset($_POST['firstname']) &&
    isset($_POST['surname']) &&
    isset($_POST['lastname']) &&
    isset($_POST['egn']) &&
    isset($_POST['address']) &&
    isset($_POST['education']) &&
    isset($_POST['profession'])
) {

echo "<table border='1'>";
    echo "<tr>";
        echo "<td>First Name</td>";
        echo "<td>" . $_POST['firstname'] . "</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<td>Surname</td>";
        echo "<td>" . $_POST['surname'] . "</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<td>Last Name</td>";
        echo "<td>" .  $_POST['lastname'] . "</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<td>EGN</td>";
        echo "<td>" . $_POST['egn'] . "</td>";
    echo "</tr>";
        echo "<tr>";
        echo "<td>Address</td>";
        echo "<td>" . $_POST['address'] . "</td>";
    echo "</tr>";
        echo "<tr>";
        echo "<td>Education</td>";
        echo "<td>" . $_POST['education'] . "</td>";
    echo "</tr>";
        echo "<tr>";
        echo "<td>Profession</td>";
        echo "<td>" . $_POST['profession'] . "</td>";
    echo "</tr>";
echo "</table>";

}

?>

</body>
</html>