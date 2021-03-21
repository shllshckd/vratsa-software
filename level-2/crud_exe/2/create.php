<?php
/**
 * @var object $connection
 */
include('partials/database_connection.php');
include('partials/header.php');
?>

<div class="container fluid padding">
    <h1>Add Order Detail</h1>
    <form action="" method="post" accept-charset="utf-8">
        <div>
            <label for="id">Id: </label>
            <input id="id" type="text" name="id" value="" class="form-control">
        </div>
        <div>
            <label for="order_id">Order Id: </label>
            <input id="order_id" type="text" name="order_id" value="" class="form-control">
        </div>
        <div>
            <label for="product_id">Product Id: </label>
            <input id="product_id" type="text" name="product_id" value="" class="form-control">
        </div>
        <div>
            <label for="quantity">Quantity: </label>
            <input id="quantity" type="text" name="quantity" value="" class="form-control">
        </div>
        <div>
            <label for="unit_price">Unit Price: </label>
            <input id="unit_price" type="text" name="unit_price" value="" class="form-control">
        </div>
        <div>
            <label for="discount">Discount: </label>
            <input id="discount" type="text" name="discount" value="" class="form-control">
        </div>
        <div>
            <label for="status_id">Status Id: </label>
            <input id="status_id" type="text" name="status_id" value="" class="form-control">
        </div>
        <div>
            <label for="date_allocated">Date Allocated: </label>
            <input id="date_allocated" type="text" name="date_allocated" value="" class="form-control">
        </div>
        <div>
            <label for="purchase_order_id">Purchase Order Id: </label>
            <input id="purchase_order_id" type="text" name="purchase_order_id" value="" class="form-control">
        </div>
        <div>
            <label for="inventory_id">Inventory Id: </label>
            <input id="inventory_id" type="text" name="inventory_id" value="" class="form-control">
        </div>

        <br>
        <input type="submit" name="submit" value="Save" class="btn btn-success">
        <a href="index.php" class="btn btn-outline-dark">Go to home page</a>
        <br><br>
    </form>

<?php
if (isset($_POST['id'])) {
	$id = $_POST['id'];
}
if (isset($_POST['order_id'])) {
	$order_id = $_POST['order_id'];
}
if (isset($_POST['product_id'])) {
	$product_id = $_POST['product_id'];
}
if (isset($_POST['quantity'])) {
	$quantity = $_POST['quantity'];
}
if (isset($_POST['unit_price'])) {
	$unit_price = $_POST['unit_price'];
}
if (isset($_POST['discount'])) {
	$discount = $_POST['discount'];
}
if (isset($_POST['status_id'])) {
	$status_id = $_POST['status_id'];
}
if (isset($_POST['date_allocated'])) {
	$date_allocated = $_POST['date_allocated'];
}
if (isset($_POST['purchase_order_id'])) {
	$purchase_order_id = $_POST['purchase_order_id'];
}
if (isset($_POST['inventory_id'])) {
	$inventory_id = $_POST['inventory_id'];
}

$date = date('Y-m-d H:i:s');

if (isset($_POST['id']) && isset($_POST['order_id']) && isset($_POST['product_id']) && isset($_POST['quantity']) && isset($_POST['unit_price']) &&
    isset($_POST['discount']) && isset($_POST['status_id']) && isset($_POST['date_allocated']) && isset($_POST['purchase_order_id']) && isset($_POST['inventory_id'])
) {
    // test with 93, 81, 56, 0, 0, 0, 0, null, null, null
	$query = "INSERT INTO northwind.order_details 
           (`id`, `order_id`, `product_id`, `quantity`, `unit_price` ,
            `discount`, `status_id`, `date_allocated`, `purchase_order_id`, `inventory_id`) 
    VALUES ('$id', '$order_id', '$product_id', '$quantity', '$unit_price', 
            '$discount', '$status_id', '$date_allocated', '$purchase_order_id', '$inventory_id')";

	$result = mysqli_query($connection, $query);

	if ($result) {
		echo "Successfully created record.";
	} else {
		exit('Operation failed. Error: ' . mysqli_error($connection));
	}
}

echo "</div>";

include('partials/footer.php');
