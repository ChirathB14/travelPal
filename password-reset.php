<?php
session_start();
require_once('inc/connection.php');
?>

<?php
$title = "Password Reset";
?>

<head>
    <link rel="stylesheet" href="./css/main.css" type="text/css">
</head>

    <body>
        <div class="password-content">
            <h2>Reset Password</h2>
            <div class="input-elements">
                <p>New Password</p>
                <input type="password">
                <br>
                <p>Confirm Password</p>
                <input type="password">
            </div>
            <button type="submit">Next</button>
        </div>
    </body>

<?php
require_once("./inc/footer.php");
?>

<?php mysqli_close($connection); ?>
