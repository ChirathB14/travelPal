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
        <form action="">
        <div class="password-content">
            <h2>Reset Password</h2>
            <div class="input-elements">
                <p>Email</p>
                <input type="email" name="">
                <br>
                <p>OTP</p>
                <div class="otp">
                    <input type="number" name="">
                    <input type="number" name="">
                    <input type="number" name="">
                    <input type="number" name="">
                    <input type="number" name="">
                    <input type="number" name="">
                </div>
            </div>
            <button type="submit">Next</button>
        </div>
        </form>
    </body>

<?php
require_once("./inc/footer.php");
?>

<?php mysqli_close($connection); ?>
