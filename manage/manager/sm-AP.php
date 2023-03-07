<?php 
session_start();
require_once('../../inc/connection.php');

//checking if the user is logged in
if(!isset($_SESSION['user_id'])) {
    header('Location: login.php');
}
?>

<?php
$title = "Profiles - Accommodation Provider";
require_once("../../inc/header.php");
?>

<head>
    <!-- CSS Import -->
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/profiles-view.css">
</head>
    
    <!-- Profile page content -->
    <div class="page-content">
        <!-- Dashboard - Tourist -->
        <div class="Dashboard">
            <div class="Dashboard-top">
                <img src="../../assets/Profile.png" alt="Profile Picture">
                <h4><?php echo $_SESSION['full_name']; ?></h4>
            </div>
            <div class="Dashboard-bottom">
                <button onclick="location.href = 'sm-myprofile.php';">My Profile</button>
                <button onclick="location.href = 'sm-updateprofile.php';">Update Profile</button>
                <button onclick="location.href = 'sm-GenerateReport.php';">Generate Report</button>
                <button onclick="location.href = 'sm-CreateTourPlan.php';">Create Tour Plan</button>
                <button class="active" onclick="location.href = 'sm-AP.php';">Accommodation Provider</button>
                <button onclick="location.href = 'sm-VP.php';">Vehicle Provider</button>
                <button onclick="location.href = 'sm-TG.php';">Tourist Guide</button>
            </div>
        </div>

        <!-- Accommodation Provider profile view -->
        <div class="profileViewContent">
            <div class="profileView">
                <form action="sm-AP.php" method="post">
                <input class="id" type="text" placeholder="XXX">
                <img src="../../assets/Profile.png" alt="Profile Picture">
                <table>
                    <tr>
                        <input type="text" placeholder="Service provider name">
                        <input type="text" placeholder="Service provider nic">
                        <input type="text" placeholder="Phone Number">
                        <input type="text" placeholder="Email">
                        <input type="text" placeholder="Registration Number">
                        <input type="text" placeholder="Address">
                        <input type="text" placeholder="Price per room">
                    </tr>
                </table>
                </form>
            </div>
    
            <div class="profileView">
                <form action="">
                <input class="id" type="text" placeholder="XXX">
                <img src="../../assets/Profile.png" alt="Profile Picture">
                    <input type="text" placeholder="Service provider name">
                    <input type="text" placeholder="Service provider nic">
                    <input type="text" placeholder="Phone Number">
                    <input type="text" placeholder="Email">
                    <input type="text" placeholder="Registration Number">
                    <input type="text" placeholder="Address">
                    <input type="text" placeholder="Price per room">
                </form>
            </div>
    
            <div class="profileView">
                <form action="">
                <input class="id" type="text" placeholder="XXX">
                <img src="../../assets/Profile.png" alt="Profile Picture">
                    <input type="text" placeholder="Service provider name">
                    <input type="text" placeholder="Service provider nic">
                    <input type="text" placeholder="Phone Number">
                    <input type="text" placeholder="Email">
                    <input type="text" placeholder="Registration Number">
                    <input type="text" placeholder="Address">
                    <input type="text" placeholder="Price per room">
                </form>
            </div>
        </div>
    </div>

<?php require_once("../../inc/footer.php");?>

<?php mysqli_close($connection); ?>
