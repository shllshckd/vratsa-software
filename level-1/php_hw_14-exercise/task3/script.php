<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <td>Name </td>
            <td><?php echo $_POST['name'] ?></td>
        </tr>
        <tr>
            <td>Address </td>
            <td><?php echo $_POST['address'] ?> </td>
        </tr>
        <tr>
            <td>Education </td>
            <td><?php echo $_POST['education'] ?></td>
        </tr>
        <tr>
            <td>Occupation </td>
            <td><?php echo $_POST['occupation'] ?></td>
        </tr>
    </table>
</body>
</html>