<?php

/**
 * @var object $connection
 */
include '../../includes/db_connect.php';

$delete_query = "DELETE FROM recipes.units WHERE unit_id = ".$_GET['id'] ;
$delete_res = mysqli_query($connection, $delete_query);

if( $delete_res ){
	header('Location: recycle_bin.php');
} else {
	die('Deletion failed. '.mysqli_error($connection));
}
