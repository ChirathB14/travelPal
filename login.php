<?php
session_start();
require_once('./inc/connection.php');
require_once('./inc/functions.php');
?>

<?php
$title = "Register";
require_once("./inc/header.php");
?>

<head>
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/main.css">
</head>

<div class="registerAs">
    <h1>Login As</h1>
    <div class="register-as">
        <p>
            <a href="./tourist/login.php"><button type="submit" name="submit"> <b> A Tourist -></b></button></a>
            <br> <br>
            <a href="./service-provider/login.php"><button type="submit" name="submit"> <b> A Service Provider -></b></button></a>
        </p>
    </div>
</div>

<?php
require_once("./inc/footer.php");
?>

<?php mysqli_close($connection); ?>