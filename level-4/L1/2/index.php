<?php

require './Product.php';
require './Shop.php';

$product = new Product('mop',12, 3, 'blue');
echo $product->get_info();

echo "<br/>";

$shop = new Shop('Kaufland', 500, 300000, $product);
echo $shop->get_info();

