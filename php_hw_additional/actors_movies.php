<?php

$movies = [
    ["name" => "Citizen Kane", "year" => 1941, "budget" => 1000, "genre" => "Comedy", "main_actor" => "Tom Hanks"],
    ["name" => "The Godfather", "year" => 1972, "budget" => 100000, "genre" => "Criminal", "main_actor" => "Robert DeNiro"],
    ["name" => "Rear Window", "year" => 1954, "budget" => 66000, "genre" => "Fun", "main_actor" => "Johnny Depp"],
    ["name" => "Casablanca", "year" => 1943, "budget" => 5500, "genre" => "Criminal", "main_actor" => "Al Pacino"],
    ["name" => "Boyhood", "year" => 2014, "budget" => 33333, "genre" => "Slice of life", "main_actor" => "Leonardo Di Caprio"],
];

$actors = [
    ["name" => "Tom Hanks", "age" => 60, "nationality" => "American", "oscars_count" => 45,],
    ["name" => "Robert DeNiro", "age" => 120, "nationality" => "Jamaican", "oscars_count" => 1,],
    ["name" => "Johnny Depp", "age" => 90, "nationality" => "British", "oscars_count" => 5,],
    ["name" => "Al Pacino", "age" => 80, "nationality" => "Macedonian", "oscars_count" => 6,],
    ["name" => "Leonardo Di Caprio", "age" => 30, "nationality" => "Greek", "oscars_count" => 77,],
];

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Movies</h1>
<table border="1">
    <thead>
    <tr>
        <th>Name</th>
        <th>Year</th>
        <th>Budget</th>
        <th>Genre</th>
        <th>Main Actor</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($movies as $entry => $movie_info) {
        echo "<tr>";
        foreach ($movie_info as $movie_entry => $cell_info) {
            echo "<td>$cell_info</td>";
        }
        echo "</tr>";
    } ?>
    </tbody>
</table>
<h1>Actors</h1>
<table border="1">
    <thead>
    <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Nationality</th>
        <th>Oscars won</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($actors as $entry => $actor_info) {
        echo "<tr>";
        foreach ($actor_info as $actor_entry => $cell_info) {
            echo "<td>$cell_info</td>";
        }
        echo "</tr>";
    } ?>
    </tbody>
</table>

<h1>Choose an main actor</h1>
<form action="" method="post">
    <label for="main_actor">Main Actor: </label>
    <select name="main_actor" id="main_actor">
        <option value="Tom Hanks">Tom Hanks</option>
        <option value="Robert DeNiro">Robert DeNiro</option>
        <option value="Johnny Depp">Johnny Depp</option>
        <option value="Al Pacino">Al Pacino</option>
        <option value="Leonardo Di Caprio">Leonardo Di Caprio</option>
    </select>
    <input type="submit" name="submit" value="Submit">

    <?php if (isset($_POST['submit'])) { ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Year</th>
                    <th>Budget</th>
                    <th>Genre</th>
                    <th>Main Actor</th>
                </tr>
            </thead>
            <tbody>
                <br><br>
                <?php

                $actor_name = $_POST['main_actor'];

                // search by the value actor_name in the main_actor column of the movies array
                $key = array_search($actor_name, array_column($movies, 'main_actor'));

                // traverse the 2 dimensional array and return needed information
                foreach ($movies as $another_key => $value) {
                    echo "<tr>";
                    foreach ($value as $inner_key => $inner_value) {
                        if ($key == $another_key) {
                            echo "<td>$inner_value</td>";
                        }
                    }
                    echo "</tr>";
                } ?>
            </tbody>
        </table>
    <?php } ?>
</form>
</body>
</html>
