<?php
session_start();
require_once('inc/connection.php');
require_once('inc/functions.php');
?>

<?php
$title = "Home - TravePal";
require_once("./inc/header.php");
?>

<main>
    <h1>Welcome to TravePal!</h1>
</main>

<?php
require_once("./inc/footer.php");
?>

<?php mysqli_close($connection); ?>
