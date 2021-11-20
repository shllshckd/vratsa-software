<?php

//$arr = [25, 4, 105];
//$arr = [25, 4, '125'];
$arr = [25, '125', 105];

$num_n = 25;
$sum = 0;

foreach ($arr as $key => $value) {
    if ($value > $num_n) {
        $sum = $key * $value;

        print("Произведението от индекса и стойността на елемент от масива, 
               по-голям от $num_n, е $sum за елемента с индекс $key. <br/>"
        );
    }
}

