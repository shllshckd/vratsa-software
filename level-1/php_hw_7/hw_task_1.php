<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>hw task 1 - 90 days average temperature calculator</title>
</head>
<body>

<table border="1">

<?php

    $days = 90;
    $hours_in_a_day = 24;

    $min_temp = -24;
    $max_temp = 44;

    $day_temp_avg = 0;
    $days_temperatures = 0;

    $lowest_and_highest_temps = [];

    // generate temperatures for all the days (90)
    for ($i = 0; $i < $days; $i++){

        // generate average temperature for the specific day (24 hours)
        for ($j = 0; $j < $hours_in_a_day; $j++){

            // 24 random generations get into the $day_temp variable
            $day_temp_avg += rand($min_temp, $max_temp);
        }

        // get the average for the day from 24 hours
        $day_temp_avg /= $hours_in_a_day;

        // all daily temperatures are stored in an array to be processed later
        $lowest_and_highest_temps[$i] = $day_temp_avg;

        // add all daily temperatures into the days_temperatures array
        $days_temperatures += $day_temp_avg;
    }

    // get the average for all the days from 90 days and print them
    $days_temperatures /= $days;

    $days_temperatures_integer = (int) $days_temperatures;
    print "Average daily temperature for 3 months :: $days_temperatures_integer &deg;C<br><br>";

    // easier working with the values later
    sort($lowest_and_highest_temps);

    $lowest_5 = array_slice($lowest_and_highest_temps, 0, 5);
    $highest_5 = array_slice($lowest_and_highest_temps, -5);

    $count_one = 1;
    print "5 lowest temperatures: <br>";
    foreach ($lowest_5 as $key => $value) {
        $value = (int)$value;
        print "$count_one :: $value &deg;C <br>";
        $count_one += 1;
    }

    print "<br>";

    $count_two = 5;
    print "5 highest temperatures: <br>";
    foreach ($highest_5 as $key => $value) {
        $value = (int)$value;
        print "$count_two :: $value &deg;C <br>";
        $count_two -= 1;
    }

?>

</table>

</body>
</html>
