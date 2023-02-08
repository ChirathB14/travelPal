<?php require_once('../../inc/connection.php')?>

<?php
$title = "Approve Service Details";
require_once("../../inc/header.php");
?>

<head>
        <link rel="stylesheet" href="/travelPal/css/main.css" type="text/css">
        <link rel="stylesheet" href="/travelPal/css/form.css" type="text/css">
</head>

<form action="">
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
        <h5 style="margin-left: 45px;">Vehicle provider,</h5>
        <div class="services-sub-container">
            <div class="input-elements">
                <input type="text" name="vehicle-number" placeholder="  Vehicle Number" required>
                <input type="text" name="price" placeholder="  Price per KM" required>
            </div>
            <div class="input-elements">
                <input type="text" name="" placeholder="  Vehicle Type" required>
                <input type="text" name="" placeholder=" Fuel Type" required>
            </div>
        </div>
        <hr> <br>
        <button type="submit" name="submit">Approve</button>
        <br>
    </div>
</div>
</form>

<?php require_once("../../inc/footer.php");?>

<?php mysqli_close($connection); ?>