<?php
session_start();
require_once('../../inc/connection.php');
require_once('../../inc/functions.php');
?>

<?php 
$title = "Dashboard";
require_once('../../inc/header.php') 
?>

<head>
    <!-- CSS Import -->
    <link rel="stylesheet" href="../../css/main.css" type="text/css">
    <link rel="stylesheet" href="../../css/admin-styles.css" type="text/css">
</head>

<div class="body">
    <div class="page-content">
        <!-- Dashboard - Admin -->
        <div class="Dashboard">
            <div class="Dashboard-top">
                <img src="../../assets/profile.png" alt="Profile pic">
                <h4><?php echo $_SESSION['full_name']; ?></h4>
            </div>
            <div class="Dashboard-bottom">
                <button class="active" onclick="location.href = 'admin-dashboard.php';">Dashboard</button>
                <button onclick="location.href = 'admin_profile.php';">Site Manager</button>
                <button onclick="location.href = 'admin_tourist.php';">Tourist</button>
                <button onclick="location.href = 'accomodation_provider.php';">Accommodation Provider</button>
                <button onclick="location.href = 'vehicle_provider.php';">Vehicle Provider</button>
                <button onclick="location.href = 'tourist_guide.php';">Tourist Guide</button>
                <br> <br> <br> <br> <br>
            </div> 
        </div>

    <div class="admin-content">
    <h2>Admin Dashboard</h2>   
        <form action="" class="" method='post'>
                <div class="admin">
                    <h5>
                        &nbsp; <br> Tourists 
                        <input type="number" name="" id="" placeholder="No" style="margin: 5px 25px 0px 35px;">
                    </h5> 
                </div>
                <br>
                <div class="admin">
                    <h5>
                        &nbsp; Acc. <br> provider  
                        <input type="number" name="" id="" placeholder="No">
                    </h5> 
                </div>
                <div class="admin">
                    <h5>
                        &nbsp; Vehicle <br> provider  
                        <input type="number" name="" id="" placeholder="No">
                    </h5> 
                </div>
                <div class="admin">
                    <h5>
                        &nbsp; Tour <br> Guide  
                        <input type="number" name="" id="" placeholder="No">
                    </h5> 
                </div>
                <div class="admin">
                    <h5>
                        &nbsp; Site <br> manager  
                        <input type="number" name="" id="" placeholder="No">
                    </h5> 
                </div>
        </form>
    </div>
    </div>
</div>

<?php
require_once("../../inc/footer.php");
?>

<?php mysqli_close($connection); ?>
