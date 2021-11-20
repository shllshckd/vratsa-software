<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Homework 4</title>
</head>
<body>
    <div>
        <h3>
        <?php 

        $rectangle_side_a = 10;
        $rectangle_side_b = 20;
        $rectangle_face = $rectangle_side_a * $rectangle_side_b;

        $square_side = 15;
        $square_face = $square_side * $square_side;
        
        $triangle_side = 10;
        $triangle_height = 15;
        $triangle_face = ($triangle_side * $triangle_height) / 2;

        $radius = 15;
        $circle_face = 3.14 * $radius * $radius;

        print "Type: Rectangle | <br>
            ==> A = ${rectangle_side_a} |
                B = ${rectangle_side_b} |
                S = ${rectangle_face}
                <br>"; 

        print "Type: Square | <br>
            ==> A = ${square_side} |
                S = ${square_face} |
                <br>"; 

        print "Type: Triangle | <br>
            ==> A = ${triangle_side} |
                hA = ${triangle_height} |
                S = ${triangle_face}
                <br>"; 

        print "Type: Circle | <br>
            ==> r = ${radius} |
                S = ${circle_face}
                <br>"; 

        ?>

        </h3>
    </div>
</body>
</html>