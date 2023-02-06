<?php
session_start();
require_once('inc/connection.php');
?>

<?php
$title = "Service Details";
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
                <button class="active" onclick="location.href = 'sp-service-details.php';">Service Details</button>
                <button onclick="location.href = 'sp-update-profile.php';">Update Profile</button>
                <button onclick="location.href = 'sp-update-availability.php';">Update Availability</button>
                <br> <br> <br> <br> <br>
            </div> 
        </div>


        <!-- Profile -->
        <h2>Accommodation Provider</h2>
        <div class="profile-content">
                <div  class="details">
                    <p>
                        <input type="text" placeholder="Service Provider Id" disabled value="<?php echo "YOUR ID : " . $user_id; ?>"> 
                    </p> 
                </div>
                <div class="details">
                    <p>
                        &nbsp; District : 
                        <input type="text" placeholder="Service Provider District" name="" id="" value="<?php echo "" ; ?>" disabled>
                    </p> 
                </div>
                <div class="details">
                    <p>
                        &nbsp; Address : 
                        <input type="text" placeholder="Service Provider Address" name="" id="" value="<?php echo  ""; ?>" disabled>
                    </p> 
                </div>
                <div class="details">
                    <p>
                        &nbsp; Accommodation Type : 
                        <input type="text" placeholder="Service Provider Acc.Type" name="" id="" value="<?php echo "" ; ?>" disabled>
                    </p> 
                </div>
                <div class="details">
                    <p>
                        &nbsp; With Food : 
                        <input type="text" placeholder="With food" name="" id="" value="<?php echo "" ; ?>" disabled>
                    </p> 
                </div>
                <div class="details">
                    <p>
                        &nbsp; Price per room : 
                        <input type="text" placeholder="Price per room" name="" id="" value="<?php echo "" ; ?>" disabled>
                    </p> 
                </div>
                <button type="submit" name="submit">Add Services</button>
        </div>
    </div>
</div>

<?php
require_once("../inc/footer.php");
?>

<?php mysqli_close($connection); ?>
        