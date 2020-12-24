<?php

$arr = [25, 4, 105];
//$arr = [25, 'ashs', 105];
//$arr = [25, '', 105];

$num_to_be_searched = 25;

foreach ($arr as $key => $value) {
    if ($num_to_be_searched === $value) {
        print("Индексът на числото $value е $key.");
        return;
    }
}

print("Няма елемент със стойност $num_to_be_searched в масива!");
