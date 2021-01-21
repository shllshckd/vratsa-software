<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <td>Name: </td>
            <td><?= $_POST['first_name'] ?></td>
        </tr>
        <tr>
            <td>Address: </td>
            <td><?= $_POST['address'] ?></td>
        </tr>
        <tr>
            <td>Education: </td>
            <td><?= $_POST['education'] ?></td>
        </tr>
        <tr>
            <td>Occupation: </td>
            <td><?= $_POST['occupation'] ?></td>
        </tr>
    </table>
</body>
</html>