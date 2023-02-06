<?php require_once('../../inc/connection.php')?>

<?php
$title = "Approve Service Details";
require_once("../../inc/header.php");
?>

<head>
        <link rel="stylesheet" href="/travelPal/css/main.css" type="text/css">
        <link rel="stylesheet" href="/travelPal/css/form.css" type="text/css">
</head>

<div class="page-content">
    <div class="services-container">
        <h2>Approve Service Details</h2>
        <div class="services-sub-container">
            <div class="input-elements">
                <input type="text" name="name" placeholder="  Service Provider Name *" required>
                <input type="tel" name="phone-number" placeholder="  Phone Number *" required>
                <input type="file" name="profile" placeholder="Upload Photo" style="padding: 10px;">
            </div>
            <div class="input-elements">
                <input type="text" name="NIC" placeholder="  Service Provider NIC *" required>
                <input type="email" name="email" placeholder="  Service Provider Email *" required>
            </div>
        </div>
        <hr> <br>
        <h5 style="margin-left: 45px;">Accommodation provider,</h5>
        <div class="services-sub-container">
            <div class="input-elements">
                <input type="text" name="reg-number" placeholder="  Registration Number" required>
                <div class="preference">
                    <p>with food</p>
                    <input type="checkbox" name="" id=""> <h6>Yes</h6> 
                    <input type="checkbox" name="" id=""> <h6>No</h6> 
                </div>
                <div class="preference">
                    <p>with A/C</p>
                    <input type="checkbox" name="" id=""> <h6>Yes</h6> 
                    <input type="checkbox" name="" id=""> <h6>No</h6> 
                </div>
            </div>
            <div class="input-elements">
                <input type="text" name="address" placeholder="  Service Provider address" required>
                <input type="text" name="price" placeholder="  Price per room" required>
            </div>
        </div>
        <hr> <br>
        <button type="submit" name="submit">Approve</button>
        <br>
    </div>
</div>

<?php require_once("../../inc/footer.php");?>

<?php mysqli_close($connection); ?>