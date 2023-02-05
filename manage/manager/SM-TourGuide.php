<?php require_once('../../inc/connection.php')?>

<?php
$title = "Profiles - Tour Guide";
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
                <h4>M.S.SILVA</h4>
            </div>
            <div class="Dashboard-bottom">
                <button><a href="sm-myprofile.php">My Profile</a></button>
                <button><a href="sm-updateprofile.php">Update Profile</a></button>
                <button><a href="">Generate Report</a></button>
                <button><a href="">Create Tour Plan</a></button>
                <button><a href="SM-AccProvider.html">Accommodation Provider</a></button>
                <button><a href="SM-VehicleProvider.html">Vehicle Provider</a></button>
                <button class="active"><a href="SM-TourGuide.html">Tourist Guide</a></button>
                <br> <br> <br>
            </div>
        </div>

        <!-- Tour Guide profile view -->
        <div class="profileViewContent">
            <div class="profileView">
                <input class="id" type="text" placeholder="XXX">
                <img src="../../assets/Profile.png" alt="Profile Picture">
                <form action="">
                    <input type="text" placeholder="Service provider name">
                    <input type="text" placeholder="Service provider nic">
                    <input type="text" placeholder="Phone Number">
                    <input type="text" placeholder="Email">
                    <input type="text" placeholder="Registration Number">
                    <input type="text" placeholder="Experience">
                    <input type="text" placeholder="Price per day">
                    <input type="text" placeholder="Languages">
                </form>
            </div>
    
            <div class="profileView">
                <input class="id" type="text" placeholder="XXX">
                <img src="../../assets/Profile.png" alt="Profile Picture">
                <form action="">
                    <input type="text" placeholder="Service provider name">
                    <input type="text" placeholder="Service provider nic">
                    <input type="text" placeholder="Phone Number">
                    <input type="text" placeholder="Email">
                    <input type="text" placeholder="Registration Number">
                    <input type="text" placeholder="Experience">
                    <input type="text" placeholder="Price per day">
                    <input type="text" placeholder="Languages">
                </form>
            </div>
    
            <div class="profileView">
                <input class="id" type="text" placeholder="XXX">
                <img src="../../assets/Profile.png" alt="Profile Picture">
                <form action="">
                    <input type="text" placeholder="Service provider name">
                    <input type="text" placeholder="Service provider nic">
                    <input type="text" placeholder="Phone Number">
                    <input type="text" placeholder="Email">
                    <input type="text" placeholder="Registration Number">
                    <input type="text" placeholder="Experience">
                    <input type="text" placeholder="Price per day">
                    <input type="text" placeholder="Languages">
                </form>
            </div>
        </div>
    </div>


<?php require_once("../../inc/footer.php");?>

<?php mysqli_close($connection); ?>