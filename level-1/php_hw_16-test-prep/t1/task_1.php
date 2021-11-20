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

<form action="solve.php" method="post">
    <label for="cost">Разход</label>
    <input type="number" name="cost" id="cost">
    <br>
    
    <label for="environment">Обстановка</label>
    <select name="environment" id="environment">
        <option value="snow">снежна покривка +5% разход</option>
        <option value="traffic">задръстване +50% разход</option>
        <option value="turns">завои, изкачвания, спуксания +20% разход</option>
        <option value="highway">магистрала -10%</option>
    </select>
    <br>

    <input type="submit" value="submit" name="submit">
</form>

</body>
</html>
