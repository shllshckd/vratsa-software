<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Homework 2</title>
</head>
<body>
    <div>
        <h3>
        <?php 

        $username = "Kris";

        $role1 = "assistant";
        $role2 = "student";
        $role3 = "lecturer";

        $course_type_1 = 1;
        $course_type_2 = 2;
        $course_type_3 = 3;

        $days = 2;

        print("Hi, ${username}!
              You`ve been approved to take part in the course ${course_type_1} as a ${role3}.
              The course ${course_type_1} will last for ${days} days."); 
        ?>
        </h3>
    </div>
</body>
</html>