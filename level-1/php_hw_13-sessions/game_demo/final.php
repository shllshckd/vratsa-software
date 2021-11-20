<?php
    $title = 'Final results';
    include 'includes/header.php';
?>

<h3>
    <?php echo $_SESSION['user_name']; ?>
</h3>

<?php
    if($_POST['answer'] == '1') {
        $_SESSION['game_result'] += 1;
    }
?>

<p>current score: <?php echo $_SESSION['game_result']; ?></p>
<a href="session_destroy.php">exit</a>

<?php
    include 'includes/footer.php';
?>

