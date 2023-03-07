<?php 
session_start();
require_once('../../inc/connection.php');
require_once ('../../inc/functions.php');

//checking if the user is logged in
if (!$_SESSION['user_id']) {
    header('Location: login.php');
}

$errors = array();
$report_id = '';

if (isset($_POST['submit'])) {

    $user_id = mysqli_real_escape_string($connection, trim($_POST['userID']));
    $firstName = mysqli_real_escape_string($connection, trim($_POST['firstName']));
    $email = mysqli_real_escape_string($connection, trim($_POST['email']));
    $nic = mysqli_real_escape_string($connection, trim($_POST['nic']));
    $phoneNo = mysqli_real_escape_string($connection, trim($_POST['phoneNo']));
    $serviceType = mysqli_real_escape_string($connection, trim($_POST['serviceType']));
    $startDate = mysqli_real_escape_string($connection, trim($_POST['startDate']));
    $endDate = mysqli_real_escape_string($connection, trim($_POST['endDate']));
    
    //checking required fields
    if (empty($user_id) || empty($firstName) || empty($email) || empty($nic) || empty($phoneNo) || empty($startDate) || empty($endDate)) {
        array_push($errors, "All the fields are required");
    }

    //checking whether the service type is selected
    if (empty($serviceType)) {
        array_push($errors, "Service Type is not selected");
    }

    //checking maxlength
    $max_len_fields = array('firstName' => 50, 'email' => 50);

    //checking max length fields
    $errors = array_merge($errors, check_max_length($max_len_fields));

    if (empty($errors)) {
        $query = "INSERT INTO report (
            `userID`, `startDate`, `endDate`
          ) VALUES (
            '{$user_id}', '{$startDate}', '{$endDate}'
          )";

        $result = mysqli_query($connection, $query);
        
        if($result) {
            header('location: report.php');
        } else {
            header('Location: sm-GenerateReport.php?failed=yes');
        }
    }
}

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
                <img src="../../assets/Profile.png" alt="profile picture">
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

        <div class="profile-content">
        <h2>Service Details</h2>
        <form action="report.php" class="form-update" method='post'>
            <input type="hidden" name="report_id" value="<?php echo $report_id; ?>">
                <div class="details-update">
                    <p>
                        &nbsp; User ID : 
                        <input type="text" name="user_id">
                    </p> 
                </div>
                <div class="details-update">
                    <p>
                        &nbsp; Name : 
                        <input type="text" name="firstName">
                    </p> 
                </div>
                <div class="details-update">
                    <p>
                        &nbsp; Email : 
                        <input type="email" name="email">
                    </p> 
                </div>
                <div class="details-update">
                    <p>
                        &nbsp; NIC : 
                        <input type="text" name="nic">
                    </p> 
                </div>
                <div class="details-update">
                    <p>
                        &nbsp; Phone Number : 
                        <input type="text" name="phoneNo">
                    </p> 
                </div>
                <div class="details-update" style="margin-bottom: 11px">
                    <p>
                        <select id="" name="serviceType" style="width: 377px;  margin-top: 7px; 
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
                        <input type="date" name="startDate">
                    </p> 
                </div>
                <div class="details-update-date">
                    <p>
                        &nbsp; End Date : 
                        <input type="date" name="endDate">
                    </p> 
                </div>
                <button type="submit" name="submit">Generate Report</button>
        </form>
        </div>
        </div>
    </div>

<?php require_once("../../inc/footer.php");?>

<?php mysqli_close($connection); ?>
