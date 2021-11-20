<?php

/**
 * @var object $connection
 */
include('../../partials/header.php');

if (!$connection) {
	exit('Connection failed.' . mysqli_connect_error() . ' Error Number: ' . mysqli_connect_errno());
}

$query = "SELECT `product_id`, `product_name`, `product_price`, `product_calories`
FROM `recipes`.`products` WHERE `date_deleted` is null";

$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) { ?>
    <h1>Products List | <a href="create.php" class="btn btn-info">Add New Product</a>
                        <a href="recycle_bin.php" class="btn btn-outline-dark">Soft Deleted Products</a></h1>
    <table style="margin-left: 50px" class="table table-stripped">
        <tr>
            <td>#</td>
            <td>Name</td>
            <td>Price</td>
            <td>Calories</td>
            <td>Update</td>
            <td>Soft Delete</td>
        </tr>
    <?php
    $num = 1;
    while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $num++; ?></td>
            <td><?= $row['product_name'] ?></td>
            <td><?= $row['product_price'] ?></td>
            <td><?= $row['product_calories'] ?></td>
            <td>
                <a href="update.php?id=<?= $row['product_id'] ?>" class="btn btn-info">Update</a>
            </td>
            <td>
                <a href="soft_delete.php?id=<?= $row['product_id'] ?>" class="btn btn-warning">Delete</a>
            </td>
        </tr>
    <?php } ?>
    </table>
<?php } else {
	exit('Query has failed. ' . mysqli_error($connection));
}
