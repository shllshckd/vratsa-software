<?php

$cars = [
    ["manufacturer name" => "Honda", "model" => "x1", "price" => 1, "sold"=> 100], // 100
    ["manufacturer name" => "Opel", "model" => "x2", "price" => 2, "sold"=> 200], // 400
    ["manufacturer name" => "Mitsubishi", "model" => "x3", "price" => 3, "sold"=> 300], // 900
    ["manufacturer name" => "Romeo", "model" => "x4", "price" => 4, "sold"=> 400], // 1600
]; // sum of income is (100 + 400) + (900 + 1600) = 500 + 2500 = 3000 || 1000 sold

for ($i = 0; $i < count($cars); $i++) {
    echo $cars[$i]["manufacturer name"] . " - " . $cars[$i]["model"] . " - " . $cars[$i]["price"] . '<br>';
}

//echo $cars[1]["manufacturer name"] . " - " . $cars[1]["model"] . " - " . $cars[1]["price"] . '<br>';
//echo $cars[2]["manufacturer name"] . " - " . $cars[2]["model"] . " - " . $cars[2]["price"] . '<br>';

$total_sold = 0;
for ($i = 0; $i < count($cars); $i++) {
    $total_sold += $cars[$i]["sold"];
}

echo '<br>';

$all_cars_income = 0;
for ($k = 0; $k < count($cars); $k++) {
    $cars[$k]["income"] = $cars[$k]["sold"] * $cars[$k]["price"];
    $all_cars_income += $cars[$k]["income"];
    echo 'income for car ' . $cars[$k]["manufacturer name"] . " - " . $cars[$k]["income"] . "<br>";
}

//for ($c = 0; $c < count($cars); $c++) {
//    echo  $cars[$c]["income"];
//}

echo '<br>'. $total_sold . ' - sold';
echo '<br>'. $all_cars_income . ' - all income for all the cars';
