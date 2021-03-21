<?php

/**
 * @param $type
 * @param $name
 * @param $value
 * @param $class
 * @param $id
 * @param $placeholder
 * @return string
 */
function printInputWithParameters($type, $name, $value, $placeholder, $class, $id = ''): string
{
    $input = "<input type=\"$type\" name=\"$name\" value=\"$value\" 
                        class=\"$class\" id=\"$id\" placeholder=\"$placeholder\"/>";
    return $input;
}

?>

<form action="" method="post">
    <?php

    echo printInputWithParameters('text', 'first_name', '', 'First name...', 'form-control');
    echo "<br>";

    echo printInputWithParameters('text', 'last_name', '', 'First name...', 'form-control');
    echo "<br>";

    echo printInputWithParameters('submit', 'submit', 'submit', '', 'form-control');
    echo "<br>";

    ?>
</form>
