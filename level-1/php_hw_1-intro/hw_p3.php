<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Homework 3</title>
</head>
<body>
    <div>
        <h3>
        <?php 

        $username_1 = "Kris";
        $username_2 = "Peter";
        $username_3 = "Todor";

        $role1 = "assistant";
        $role2 = "student";
        $role3 = "lecturer";

        $course_type_1 = 1;
        $course_type_2 = 2;
        $course_type_3 = 3;

        $days = 2;

        print("Hi, ${username_1}!
              You`ve been approved to take part in the course ${course_type_1} as a ${role3}.
              The course ${course_type_1} will last for ${days} days."); 
        
        print("<br/>");

        print("Hi, ${username_2}!
            You`ve been approved to take part in the course ${course_type_2} as a ${role1}.
            The course ${course_type_2} will last for ${days} days."); 
    
        print("<br/>");

        print("Hi, ${username_3}!
            You`ve been approved to take part in the course ${course_type_3} as a ${role2}.
            The course ${course_type_3} will last for ${days} days."); 
        
        ?>
        </h3>
    </div>
</body>
</html>