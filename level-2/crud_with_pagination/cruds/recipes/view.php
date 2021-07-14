<?php

/**
 * @var object $connection
 */
include '../../includes/header.php';

if (!empty($_GET['id'])) {
    $get_param = $_GET['id'];

	$read_query = "SELECT recipes.recipes.recipe_name, recipes.products.product_name, recipes.recipes_products.product_quantity 
                   FROM recipes.recipes LEFT JOIN recipes.recipes_products ON recipes.recipe_id = recipes_products.recipe_id 
                   LEFT JOIN recipes.products ON recipes_products.product_id = products.product_id 
                   WHERE recipes.recipe_id = '$get_param'";

	$result = mysqli_query($connection, $read_query);

	// var_dump( mysqli_fetch_all($result, MYSQLI_ASSOC));
	// die();

	if (mysqli_num_rows($result) > 0) { ?>
        <h1>Products for recipe: <u><?= $_GET['name'] ?></u> | <a href="recycle_bin.php" class="btn btn-outline-dark">Recycle Bin</a></h1>
        <table style="margin-left: 50px" class="table table-striped">
            <tr>
                <td>#</td>
                <td>Product</td>
                <td>Quantity</td>
            </tr>
			<?php
			$num = 1;
			while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $num++ ?></td>
                    <td><?= $row['product_name'] ?></td>
                    <td><?= $row['product_quantity'] ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php } else {
		die('Query failed. ' . mysqli_error($connection));
	}
}
