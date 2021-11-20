<?php

/**
 * @var object $connection
 */
include '../../includes/header.php';

$filter_query = '';

// OR p.product_categories LIKE "%' . $_GET['filter'] . '%"
if (isset($_GET['filter'])) {
	$filter_query = " AND p.product_name LIKE '%" . $_GET['filter'] .
                    "%' OR p.product_calories LIKE '%" . $_GET['filter'] . "%'";
}

$read_query = "SELECT p.product_id, p.product_name, p.product_price, pc.product_category_name, p.product_calories, p.date_deleted
               FROM recipes.`products` AS p 
               JOIN recipes.product_categories AS pc on p.product_category_id = pc.product_category_id 
               WHERE p.date_deleted IS NULL $filter_query";

$result = mysqli_query($connection, $read_query);

if (mysqli_num_rows($result) > 0) {?>
    <h1>Product List | <span><a href="create.php" class="btn btn-info">Add New Product</a></span> |
        <a href="recycle_bin.php" class="btn btn-outline-dark">Recycle Bin</a></h1>
    <form action="index.php" method="get" accept-charset="utf-8">
        <input type="text" name="filter" value="" placeholder="Enter Keyword">
        <input type="submit" name="submit" value="Apply">
    </form>
    <table style="margin-left: 50px" class="table table-striped">
        <tr>
            <td>#</td>
            <td>Name</td>
            <td>Price</td>
            <td>Calories</td>
            <td>Product Category Name</td>
            <td>Update</td>
            <td>Soft Delete</td>
        </tr>
		<?php
		$num = 1;
		while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $num++ ?></td>
                <td><?= $row['product_name'] ?></td>
                <td><?= $row['product_price'] ?></td>
                <td><?= $row['product_calories'] ?></td>
                <td><?= $row['product_category_name'] ?></td>
                <td><a href="update.php?id=<?= $row['product_id'] ?>" class="btn btn-warning">Update</a></td>
                <td><a href="soft_delete.php?id=<?= $row['product_id'] ?>" class="btn btn-danger">Soft&nbsp;Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
<?php } else {
	die('Query failed!' . mysqli_error($connection));
}
