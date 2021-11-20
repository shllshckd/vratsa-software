<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>php hw get/post 1</title>
</head>
<body>
    <?php

    //    var_dump($_GET);
    //    echo "<br>";
    //
    //    var_dump($_POST);
    //    echo "<br>";
    //
    //    var_dump($_FILES);
    //    echo "<br>";
    //
    //    echo "<br>";
    //    echo "hi, " . $_POST['username'];
    //    echo "<br>";

    if (!isset($_POST['username'])) { ?>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="username">Username</label><br/>
        <input type="text" name="username" id="username"><br/>

        <label for="password">Password</label><br/>
        <input type="password" name="password" id="password"><br/>

        <input type="file" name="file"><br/>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
        } else {
            $username = $_POST['username'];
            echo "Hi, " . $username;
        }
    ?>
</body>
</html>
