<?php

/**
 * @var object $connection
 */
include 'db_connect.php';
include 'config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="<?= ROOT_DIR ?>">Recipes Project</a>
	 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
	<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav">
			<li class="nav-item active">
				<a class="nav-link" href="<?= ROOT_DIR ?>">Home <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?= ROOT_DIR . 'cruds/units'?>">Units</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?= ROOT_DIR . 'cruds/products'?>">Products</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?= ROOT_DIR . 'cruds/recipes'?>">Recipes</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?= ROOT_DIR . 'cruds/visualizer'?>">Visualizer</a>
			</li>
		</ul>
	</div>
</nav>
<div class="container">
