<?php

//include ('partials/connection.php');

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'northwind';

$connection = mysqli_connect($server, $username, $password, $database);

if (!$connection) {
	exit('Connection failed.' . mysqli_connect_error() . ' Error Number: '. mysqli_connect_errno());
}
//else {
//    echo "Connected successfully to the database.";
//}
//---------------

$query = "SELECT * FROM recipes.products WHERE `products`.`date_deleted` is null";
$result= mysqli_query($connection, $query);
?>

<table>

<?php
if (mysqli_num_rows($result) > 0) {
	$num = 1;
	while ($row = mysqli_fetch_assoc($result)) {

	?>
	<table>
		<tr>
			<td><?= $num++; ?></td>
			<td><?= $row['product_name'] ?></td>
			<td><?= $row['product_price'] ?></td>
			<td><?= $row['product_calories'] ?></td>
			<td>
				<a href="app/products/update.php?id=<?= $row['product_id'] ?>" class="btn btn-warning">Update</a>
				<a href="app/products/soft_delete.php?id=<?= $row['product_id'] ?>" class="btn btn-warning">Delete</a>
			</td>
		</tr>
	</table>
<?php
}

} else {
	exit('Query has failed. ' . mysqli_error($connection));
}