<?php
    $title = 'Question 1';
    include 'includes/header.php';
?>

<a href="session_destroy.php">exit</a>
    <p>Current score: <?= $_SESSION['game_result'] ?></p>
    <form method="post" action="question2.php">
        <input type="radio" name="answer" value="0">Answer 1
        <input type="radio" name="answer" value="0">Answer 2
        <input type="radio" name="answer" value="1">Answer 3
        <input type="submit" name="submit" value="answer">
    </form>
<?php
    include 'includes/footer.php';
?>