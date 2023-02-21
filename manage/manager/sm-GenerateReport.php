<?php session_start();?>
<?php require_once('../../inc/connection.php')?>

<?php
$title = "Generate Report";
require_once("../../inc/header.php");
?>

<head>
        <link rel="stylesheet" href="/travelPal/css/main.css" type="text/css">
</head>

<div class="body">
        <!-- Profile page content -->
        <div class="page-content">
        <!-- Dashboard - Site Manager -->
        <div class="Dashboard">
            <div class="Dashboard-top">
                <img src="../../assets/Profile.png" alt="">
                <h4><?php echo $_SESSION['full_name']; ?></h4>
            </div>
            <div class="Dashboard-bottom">
                <button onclick="location.href = 'sm-myprofile.php';">My Profile</button>
                <button onclick="location.href = 'sm-updateprofile.php';">Update Profile</button>
                <button class="active" onclick="location.href = 'sm-GenerateReport.php';">Generate Report</button>
                <button onclick="location.href = 'sm-CreateTourPlan.php';">Create Tour Plan</button>
                <button onclick="location.href = 'sm-AP.php';">Accommodation Provider</button>
                <button onclick="location.href = 'sm-VP.php';">Vehicle Provider</button>
                <button onclick="location.href = 'sm-TG.php';">Tourist Guide</button>
            </div>
        </div>

        <div class="content"> 
        <?php
        if (!empty($errors)) {
            display_errors($errors);
        }
        ?>

        <h2>Service Details</h2>
        <div class="profile-content">
        <form action="t-update-profile.php" class="form-update" method='post'>
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <div class="details-update">
                    <p>
                        &nbsp; Name : 
                        <input type="text" name="first_name" id="" placeholder="Service Provider Name">
                    </p> 
                </div>
                <div class="details-update">
                    <p>
                        &nbsp; NIC : 
                        <input type="text" name="nic" id="" placeholder="Service Provider NIC">
                    </p> 
                </div>
                <div class="details-update">
                    <p>
                        &nbsp; Phone Number : 
                        <input type="text" name="phone_number" placeholder="Phone Number"  id="">
                    </p> 
                </div>
                <div class="details-update" style="margin-bottom: 11px">
                    <p>
                        <select id="" name="service_type" style="width: 377px;  margin-top: 7px; 
                            background-color: var(--accentcolor); height: 34px;
                            border: none; font-size: 10px; font-weight: bold;">
                            <option value="" disabled selected>SELECT SERVICE TYPE</option>
                            <option value="Accommodation Provider">Accommodation Provider</option>
                            <option value="Vehicle Porvider">Vehicle Porvider</option>
                            <option value="Tour Guide">Tour Guide</option>
                        </select>
                    </p> 
                </div>
                <div class="details-update-date">
                    <p>
                        &nbsp; Start Date : 
                        <input type="date" name="" id="">
                    </p> 
                </div>
                <div class="details-update-date">
                    <p>
                        &nbsp; End Date : 
                        <input type="date" name="" id="">
                    </p> 
                </div>
                <button type="submit" name="submit">Update</button>
        </form>
        </div>
        </div>
    </div>

<?php require_once("../../inc/footer.php");?>

<?php mysqli_close($connection); ?>
