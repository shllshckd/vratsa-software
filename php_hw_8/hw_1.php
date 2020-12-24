<?php

$cars = [
    [
        'brand' => 'Mercedes',
        'model' => 'E63',
        'year_of_production' => 2010,
        'price' => 5000,
        'cars_sold' => 2000
    ],
    [
        'brand' => 'BMW',
        'model' => 'M5',
        'year_of_production' => 1999,
        'price' => 10000,
        'cars_sold' => 30000
    ],
    [
        'brand' => 'Audi',
        'model' => 'S6',
        'year_of_production' => 1994,
        'price' => 7500,
        'cars_sold' => 13000
    ],
];

echo "<table border='1'>";

echo "<thead>";
foreach ($cars as $key => $value) {

    echo "<tr>";
    foreach ($value as $inner_key => $inner_value) {
        echo "<th>";
            echo "$inner_key";
        echo "</th>";
    }

    echo "</tr>";
    break;
}

echo "</thead>";

$sum_all_cars_sold = 0;
$all_cars_returns = [];

$count = 0;
$curr_price_val = 0;
$curr_sold_val = 0;
$this_car_returns = 0;

echo "<tbody>";
foreach ($cars as $key => $value) {

    echo "<tr>";
    foreach ($value as $inner_key => $inner_value) {
        echo "<td>";
            echo "$inner_value";
        echo "</td>";

        if ($inner_key == 'cars_sold' && is_int($inner_value)) {
            $sum_all_cars_sold += $inner_value;
        }

        if ($inner_key == 'price' && is_int($inner_value)) {
            $curr_price_val = $inner_value;
        }

        if ($inner_key == 'cars_sold' && is_int($inner_value)) {
            $curr_sold_val = $inner_value;
        }

        $this_car_returns = $curr_price_val * $curr_sold_val;

    }
    $all_cars_returns[$count] = $this_car_returns;
    $count++;

    echo "</tr>";
}

echo "</tbody>";
echo "</table>";

echo "<p>Quantity of all cars sold is: $sum_all_cars_sold</p>";

for ($q = 0; $q < count($all_cars_returns); $q++) {
    $idx = $q + 1;
    echo "<p>Monetary returns for car #$idx: $all_cars_returns[$q]</p>";
}

$all_returns = 0;

for ($w = 0; $w < count($all_cars_returns); $w++) {
    $all_returns = $all_returns + $all_cars_returns[$w];
}

echo "<p>Monetary returns for all cars: $all_returns</p>";
