<?php
/**
 * @var object $connection
 */
include('partials/header.php');
include('partials/database_connection.php');

// test with 93, 81, 56, 0, 0, 0, 0, null, null, null
// important! - use OrderId, ProductId, StatusId that already exist in the db

$id_original= $_POST['id_original'];

$id = $_POST['id'];
$order_id = $_POST['order_id'];
$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];
$unit_price = $_POST['unit_price'];
$discount = $_POST['discount'];
$status_id  = $_POST['status_id'];
$date_allocated = $_POST['date_allocated'];
$purchase_order_id = $_POST['purchase_order_id'];
$inventory_id = $_POST['inventory_id'];

$update_query = "
 	UPDATE northwind.order_details
 	SET
        `id` = '$id',
        `order_id` = '$order_id',
        `product_id` = '$product_id',
        `quantity` = '$quantity',
        `unit_price` = '$unit_price',
        `discount` = '$discount',
        `status_id` = '$status_id',
        `date_allocated` = '$date_allocated',
        `purchase_order_id` = '$purchase_order_id',
        `inventory_id` = '$inventory_id'
 	WHERE `id` = '$id_original'";

$update_result = mysqli_query($connection, $update_query);

if ($update_result) {
	header('Location: index.php');
} else {
	exit("Update has failed. Error: " . mysqli_error($connection));
}

include('partials/footer.php');
