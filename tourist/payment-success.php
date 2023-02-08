<?php require_once('../inc/connection.php')?>

<?php
$title = "Payment Successful";
require_once("../inc/header.php");
?>

<head>
        <link rel="stylesheet" href="/travelPal/css/main.css" type="text/css">
        <link rel="stylesheet" href="/travelPal/css/form.css" type="text/css">
</head>

<div class="body-successful">
    <img src="../assets/Vector.png" alt="">
    <br><br>
    <h2>Payment Successful</h2>
    <p>Thank you for your payment. <br>
    We will be in contact and provide you more details.</p>
    <br>
    <button><a href="after-payment.php">To see the summary</a></button>
</div>

<?php require_once("../inc/footer.php");?>

<?php mysqli_close($connection); ?>