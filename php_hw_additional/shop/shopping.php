<?php
    session_start();

$items = [
    ["picture" => "https://images-na.ssl-images-amazon.com/images/I/61-rIQlyDML._AC_SY879_.jpg",
        "name" => "Baseball Bat", "price" => "5", "description" => "bat", "availability"=> 1000],

    ["picture" => "https://images-na.ssl-images-amazon.com/images/I/61UyaocateL._AC_SX569_.jpg",
        "name" => "Baseball Ball", "price" => "15", "description" => "ball", "availability"=> 9900],

    ["picture" => "https://cb2.scene7.com/is/image/CB2/DlxTnLthBsblGlvIfd11p5PrHLSHF19",
        "name" => "Baseball Glove", "price" => "301", "description" => "glove", "availability"=> 3300],

    ["picture" => "https://img.hatshopping.com/Liberty-Baseball-Cap-white.32874_1rf5.jpg",
        "name" => "Baseball Hat", "price" => "5", "description" => "hat", "availability"=> 6500],

    ["picture" => "https://sc04.alicdn.com/kf/H5f1ed51953b741dc90ceb41830f14b56c.jpg",
        "name" => "Baseball Suit", "price" => "30", "description" => "suit", "availability"=> 300],
];

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Shop</title>
</head>
<body>
    <h1>Welcome to our Online Shop<?php echo (isset($_POST['username']) && isset($_POST['password'])) ?
            ', ' . $_POST["username"] :
            '';
        ?>

        <?php echo (isset($_POST['username']) && isset($_POST['password'])) ? '| <a href="session_destroy.php">Exit</a>' : ''; ?>
    </h1>
    <hr>
    <h3>Those are out products</h3>
    <table border="1">
        <thead>
            <tr>
                <th>Picture</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Availability</th>
            </tr>
        </thead>
        <tbody>
           <?php foreach ($items as $item_index => $value) { ?>
               <tr>
                   <?php foreach ($value as $inner_index => $cell) { ?>
                       <td>
                           <?php echo $inner_index == 'picture'
                               ? "<img style='max-width: 100px' src=\"$cell\" alt=\"\">"
                               : $cell
                           ?>
                       </td>
                   <?php } ?>
               </tr>
           <?php } ?>
        </tbody>
    </table>

    <br>

    <form action="" method="post">
        <label for="username">Username</label>
        <input type="text" id="username" name="username">
        
        <label for="password">Password</label>
        <input type="password" id="password" name="password">

        <input type="submit" value="Submit">
    </form>
</body>
</html>
