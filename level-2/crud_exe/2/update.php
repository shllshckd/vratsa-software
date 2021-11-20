<?php

/**
 * @var object $connection
 */
include('partials/database_connection.php');
include('partials/header.php');

// original value, we will need it later
$id_original = $_GET['id'];

$query = "SELECT * FROM northwind.order_details WHERE `id` = '$id_original'";

$result = mysqli_query($connection, $query);
$message = mysqli_fetch_assoc($result);

// test with 92, 81, 56, 0, 0, 0, 0, null, null, null
// important! - use OrderId, ProductId, StatusId that already exist in the db
?>

<div class="container fluid padding">
<h1>Update Order Detail with ID - <?= $id_original ?></h1>
    <form action="update_two.php" method="post" accept-charset="utf-8">
        <div>
            <label for="id">Id: </label>
            <input id="id" type="text" name="id" value="<?= $message['id'] ?>" class="form-control">
        </div>
        <div>
            <label for="order_id">Order Id: </label>
            <input id="order_id" type="text" name="order_id" value="<?= $message['order_id'] ?>" class="form-control">
        </div>
        <div>
            <label for="product_id">Product Id: </label>
            <input id="product_id" type="text" name="product_id" value="<?= $message['product_id'] ?>" class="form-control">
        </div>
        <div>
            <label for="quantity">Quantity: </label>
            <input id="quantity" type="text" name="quantity" value="<?= $message['quantity'] ?>" class="form-control">
        </div>
        <div>
            <label for="unit_price">Unit Price: </label>
            <input id="unit_price" type="text" name="unit_price" value="<?= $message['unit_price'] ?>" class="form-control">
        </div>
        <div>
            <label for="discount">Discount: </label>
            <input id="discount" type="text" name="discount" value="<?= $message['discount'] ?>" class="form-control">
        </div>
        <div>
            <label for="status_id">Status Id: </label>
            <input id="status_id" type="text" name="status_id" value="<?= $message['status_id'] ?>" class="form-control">
        </div>
        <div>
            <label for="date_allocated">Date Allocated: </label>
            <input id="date_allocated" type="text" name="date_allocated" value="<?= $message['date_allocated'] ?>" class="form-control">
        </div>
        <div>
            <label for="purchase_order_id">Purchase Order Id: </label>
            <input id="purchase_order_id" type="text" name="purchase_order_id" value="<?= $message['purchase_order_id'] ?>" class="form-control">
        </div>
        <div>
            <label for="inventory_id">Inventory Id: </label>
            <input id="inventory_id" type="text" name="inventory_id" value="<?= $message['inventory_id'] ?>" class="form-control">
        </div>

        <br>
        <input type="hidden" name="id_original" value="<?= $id_original ?>">
        <input type="submit" name="submit" value="Update" class="btn btn-success">
    </form>
</div>