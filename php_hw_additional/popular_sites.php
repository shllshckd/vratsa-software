<?php

$websites = [
    ["name" => "Google Search", "shortdesc" => "Hey, Google.", "creator" => "Larry Page",
        "userscount" => "4 390 000 000", "techused" => "Python, Angular", "link" => "https://google.com", "logo" => "https://www.sinceindependence.com/wp-content/uploads/2019/06/Google-logo-1-resized.jpg"],

    ["name" => "YouTube", "shortdesc" => "Moving images.", "creator" => "Jawed Karim",
        "userscount" => "1 680 000 000", "techused" => "Python, Angular", "link" => "https://youtube.com", "logo" => "https://logos-world.net/wp-content/uploads/2020/04/YouTube-Emblem.png"],

    ["name" => "Facebook", "shortdesc" => "Slacking off go-to.", "creator" => "Mark Zuckerberg",
        "userscount" => "2 700 000 000", "techused" => "PHP, React", "link" => "https://facebook.com", "logo" => "https://1000logos.net/wp-content/uploads/2016/11/Facebook-logo.png"],

    ["name" => "Wikipedia", "shortdesc" => "The land of knowledge.", "creator" => "Jimmy Wales",
        "userscount" => "40 707 867", "techused" => "PHP, MySQL", "link" => "https://wikipedia.com", "logo" => "https://upload.wikimedia.org/wikipedia/en/thumb/8/80/Wikipedia-logo-v2.svg/1024px-Wikipedia-logo-v2.svg.png"],

    ["name" => "Netflix", "shortdesc" => "Watch shows and movies.", "creator" => "Reed Hastings",
        "userscount" => "73 000 000", "techused" => "Java, Python, React", "link" => "https://netflix.com", "logo" => "https://r9b4z8n9.rocketcdn.me/wp-content/uploads/2020/07/netflix.svg"],
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
<h1>Popular websites</h1>

<table border="1">
    <thead>
    <tr>
        <th>Name</th>
        <th>Short Description</th>
        <th>Creator</th>
        <th>Users Count</th>
        <th>Technologies Used</th>
        <th>Link</th>
        <th>Logo</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($websites as $entry => $site_info) {
        echo "<tr>";
        foreach ($site_info as $site_entry => $cell_info) {
            if ($site_entry === "logo") {
                echo "<td><img src='$cell_info' style='max-width: 150px' alt=''> </td>";
            } elseif ($site_entry === "link") {
                echo "<td><a href=\"$cell_info\">$cell_info</a></td>";
            }
            else {
                echo "<td>$cell_info</td>";
            }
        }
        echo "</tr>";
    } ?>
    </tbody>
</table>

</body>
</html>
