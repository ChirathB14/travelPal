<?php
session_start();
require_once '../../inc/connection.php';
require_once '../../inc/functions.php';
?>

<?php
$title = "Eligible Refund Amount";
require_once "../../inc/header.php";
?>

<head>
    <link rel="stylesheet" href="../../css/main.css" type="text/css">
    <style>
        .details-update input {
            width: 48%;
            height: 55%;
        }
    </style>
</head>

<div class="body">
    <div class="content">
        <div class="profile-content" style="margin: 40px 550px 40px 950px">
        <br>
        <h6>
        <?php echo $_SESSION['full_name']; ?>, <br>
        You are eligible to get the refund. Please fill the below details.
        </h6>
        <div class="details-update" style="width: 360px;">
            <p>
                &nbsp; Refundable Amount :
                <input type="text" name="user_id" placeholder="Rs.XXXXX" disabled>
            </p>
        </div>
        <h3>Account Details</h3>
        <form action="" method='post' style="width: 450px; margin-left: 75px;">
                <div class="details-update">
                    <p>
                        &nbsp; Account Number : 
                        <input type="text" name="" id="" placeholder="XXXX XXXX XXXX">
                    </p> 
                </div>
                <div class="details-update">
                    <p>
                        &nbsp; Account Holder Name : 
                        <input type="text" name="" id="" placeholder="Enter AccountHolder Name">
                    </p> 
                </div>
                <div class="details-update">
                    <p>
                        &nbsp; Bank : 
                        <input type="email" name="" id="" placeholder="Enter Bank Name">
                    </p> 
                </div>
                <div class="details-update">
                    <p>
                        &nbsp; Branch : 
                        <input type="text" name="" id="" placeholder="Enter Branch">
                    </p> 
                </div>
                <button type="" name="" style="width: 30%; margin-left: 120px">Proceed</button>
                <br><br>
        </form>
    </div>
</div>

<?php
require_once("../../inc/footer.php");
?>

<?php mysqli_close($connection); ?>