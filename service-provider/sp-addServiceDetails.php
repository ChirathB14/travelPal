<?php
session_start();
require_once('inc/connection.php');
?>

<?php
$title = "Add Services";
require_once("../inc/header.php");
?>

<head>
    <!-- CSS Import -->
    <link rel="stylesheet" href="../css/main.css" type="text/css">
</head>

<div class="body">
    <!-- Profile page content -->
    <div class="page-content">
        <!-- Dashboard - Service Provider -->
        <div class="Dashboard">
            <div class="Dashboard-top">
                <img src="../assets/profile.png" alt="Profile pic">
                <h4><?php echo $_SESSION['full_name']; ?></h4>
            </div>
            <div class="Dashboard-bottom">
                <button onclick="location.href = 'sp-profile.php';">My Profile</button>
                <button class="active" onclick="location.href = 'sp-serviceDetails.php';">Service Details</button>
                <button onclick="location.href = 'sp-update-profile.php';">Update Profile</button>
                <button onclick="location.href = 'sp-update-availability.php';">Update Availability</button>
                <br> <br> <br> <br> <br>
            </div> 
        </div>

        <!-- Profile -->
        <div class="profile-content">
            <h2>No services added</h2>
            <br><br>
            <button type="submit" name="submit"><a href="sp-serviceDetails.php">Add Services</a></button>
        </div>
    </div>

<?php
require_once("../inc/footer.php");
?>

<?php mysqli_close($connection); ?>