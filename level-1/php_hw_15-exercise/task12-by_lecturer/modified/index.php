<?php
    require_once('includes/header.php');
?>

<form action="script.php" method="post">
    <?php $student_num = 1; ?>
    <?php for ($i = 0; $i <= 3; $i++) { ?>

    <p>
        <label>Student <?= $student_num++ ?></label>
        <?= print_input('text', "students[$i][name]", "Name" )?>
    </p>

    <?php for ($j = 0; $j <= 3; $j++) {?>
        <?php $data_num = 1; ?>
            <p>
                <label>Subject, grade #<?= $data_num++ ?></label>
                <?= print_input('text', "students[$i][subject][$j]", "subject")?>
                <?= print_input('text', "students[$i][grade][$j]", "grade")?>
            </p>
        <?php } ?>
        <?php echo "<hr>"  ?>
    <?php } ?>

    <?= print_input('submit', "submit") ?>

</form>
