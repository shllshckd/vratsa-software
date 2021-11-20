<?php
/**
 * @var object $connection
 */
include('partials/database_connection.php');
include('partials/header.php');
?>

<div class="container fluid padding">
    <h1>All Order Details</h1>

    <a href="create.php" class="btn btn-success">Create</a>
    <br><br>
<?php
    $read_query = "SELECT * FROM northwind.order_details ORDER BY `id` DESC";
    $result = mysqli_query($connection, $read_query);

    if (mysqli_num_rows($result) > 0)
    {
        echo "<table class='table table-bordered'>";
        echo "<thead>";
            echo "<tr>";
                echo "<td>Id</td>";
                echo "<td>Order Id</td>";
                echo "<td>Product Id</td>";
                echo "<td>Quantity</td>";
                echo "<td>Unit Price</td>";
                echo "<td>Discount</td>";
                echo "<td>Status Id</td>";
                echo "<td>Date Allocated</td>";
                echo "<td>Purchase Order Id</td>";
                echo "<td>Inventory Id</td>";
            echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['order_id']}</td>";
                echo "<td>{$row['product_id']}</td>";
			    echo "<td>{$row['quantity']}</td>";
			    echo "<td>{$row['unit_price']}</td>";
			    echo "<td>{$row['discount']}</td>";
			    echo "<td>{$row['status_id']}</td>";
			    echo "<td>{$row['date_allocated']}</td>";
			    echo "<td>{$row['purchase_order_id']}</td>";
			    echo "<td>{$row['inventory_id']}</td>";

                echo "<td>
                    <a href='update.php?id={$row['id']}' class='btn btn-sm btn-primary'>Update</a>
                    <a href='delete.php?id={$row['id']}' class='btn btn-sm btn-danger'>Delete</a>
                </td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else{
        echo "Няма намерени резултати.";
    }

echo "</div>";

include ('partials/footer.php');
