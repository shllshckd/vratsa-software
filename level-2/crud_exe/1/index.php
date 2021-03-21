<?php
/**
 * @var object $connection
 */
include('partials/database_connection.php');
include('partials/header.php');
?>

<div class="container fluid padding">
    <h1>All Sales Reports</h1>

    <a href="create.php" class="btn btn-success">Create</a>
    <br><br>
<?php
    $read_query = "SELECT * FROM northwind.sales_reports ORDER BY `group_by` DESC";
    $result = mysqli_query($connection, $read_query);

    if (mysqli_num_rows($result) > 0)
    {
        echo "<table class='table table-bordered'>";
        echo "<thead>";
            echo "<tr>";
                echo "<th>Group By</th>";
                echo "<th>Display</th>";
                echo "<th>Title</th>";
                echo "<th>Filter Row Source</th>";
                echo "<th>Default</th>";
            echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
                echo "<td>{$row['group_by']}</td>";
                echo "<td>{$row['display']}</td>";
                echo "<td>{$row['title']}</td>";
                echo "<td>{$row['filter_row_source']}</td>";
                echo "<td>{$row['default']}</td>";

                echo "<td>
                    <a href='update.php?group_by={$row['group_by']}' class='btn btn-sm btn-primary'>Update</a>
                    <a href='delete.php?group_by={$row['group_by']}' class='btn btn-sm btn-danger'>Delete</a>
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
