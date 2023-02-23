<?php
session_start();
require_once('../inc/connection.php');
require_once ('../inc/functions.php');

// checking if the user is logged in 
if (!$_SESSION['user_id'] && !$_SESSION['user_type']) {
    header('Location: login.php');
}

$errors = array();
$user_id = '';
$serviceProfileID = '';
$regNo = '';
$address = '';
$withAcStatus = '';
$withFoodStatus = '';
$pricePerRoom = '';

if (isset($_SESSION['user_id'])) {
    //getting the user information
    $user_id = mysqli_real_escape_string($connection, $_SESSION['user_id']);

            $query = "SELECT *
                        FROM accomodation 
                        WHERE serviceProfileID = {$user_id}
                        LIMIT 1";

            $result_set = mysqli_query($connection, $query);

                if($result_set) {
                    if (mysqli_num_rows($result_set) == 1) {
                        //user found
                        $result = mysqli_fetch_assoc($result_set);
                        $regNo = $result ['regNo'];
                        $address = $result ['address'];
                        $withAcStatus = $result ['withAcStatus'];
                        $withFoodStatus = $result ['withFoodStatus'];
                        $pricePerRoom = $result ['pricePerRoom'];
                    } else {
                        // not found
                        // header ('Location: add-service-details.php?err=service_details_not_found');
                    }
                } else {
                    //query unsuccessful
                    header('Location: sp-service-details.php?err=query_failed');
                }
}

if (isset($_POST['submit'])) {

    $user_id = $_POST['user_id'];
    $regNo = $_POST['regNo'];
    $address = $_POST['address'];
    $withAcStatus = $_POST['withAcStatus'];
    $withFoodStatus = $_POST['withFoodStatus'];
    $pricePerRoom = $_POST['pricePerRoom'];

    //checking required fields
    if (empty($user_id) || empty($regNo) || empty($address) || empty($withAcStatus) || empty($withFoodStatus) || empty($pricePerRoom)) {
        array_push($errors, "All the fields are required");
    }

    //checking maxlength
    $max_len_fields = array('regNo' => 5);

    //checking max length fields
    $errors = array_merge($errors, check_max_length($max_len_fields));

    if (empty($errors)) {
        //updating the record
        $regNo = mysqli_real_escape_string($connection, trim($_POST['regNo']));
        $address = mysqli_real_escape_string($connection, trim($_POST['address']));
        $withAcStatus = mysqli_real_escape_string($connection, $_POST['withAcStatus']);
        $withFoodStatus = mysqli_real_escape_string($connection, $_POST['withFoodStatus']);
        $pricePerRoom = mysqli_real_escape_string($connection, $_POST['pricePerRoom']);

        $query = "UPDATE accomodation
                    SET regNo = '{$regNo}',
                        address = '{$address}',
                        withAcStatus = '{$withAcStatus}',
                        withFoodStatus = '{$withFoodStatus}',
                        pricePerRoom = '{$pricePerRoom}'
                        WHERE serviceProfileID = {$user_id} 
                    LIMIT 1";

        $result = mysqli_query($connection, $query);
        } else {
            $errors[] = 'Failed to update the service details.';
        }
}
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
                <button class="active" onclick="location.href = 'sp-addServiceDetails.php';">Service Details</button>
                <button onclick="location.href = 'sp-update-profile.php';">Update Profile</button>
                <button onclick="location.href = 'sp-update-availability.php';">Update Availability</button>
                <br> <br> <br> <br> <br>
            </div> 
        </div>


        <!-- Profile -->
        <div clas="content" style="width: 70%; height: 400px; margin:30px 50px 10px 250px;">
        <h2 style="margin-left: 70px">Accommodation Provider</h2>
        <div class="profile-content">
            <form action="sp-service-details.php" method="post">
            <?php
                if (!empty($errors)) {
                    display_errors($errors);
                }
            ?>
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <div  class="details-update">
                    <p>
                        &nbsp; User ID : 
                        <input type="text" name="user_id" disabled value="<?php echo $user_id; ?>"> 
                    </p> 
                </div>
                <div class="details-update">
                    <p>
                        &nbsp; regNo : 
                        <input type="text" name="regNo" value="<?php echo $regNo; ?>" disabled>
                    </p> 
                </div>
                <div class="details-update">
                    <p>
                        &nbsp; Address : 
                        <input type="text" name="address" value="<?php echo $address; ?>">
                    </p> 
                </div>
                <div class="details-update">
                    <p>
                        &nbsp; With A/C : 
                        <input type="text" name="withAcStatus" value="<?php echo $withAcStatus; ?>">
                    </p> 
                </div>
                <div class="details-update">
                    <p>
                        &nbsp; With Food : 
                        <input type="text" name="withFoodStatus" value="<?php echo $withFoodStatus; ?>">
                    </p> 
                </div>
                <div class="details-update">
                    <p>
                        &nbsp; Price per room : 
                        <input type="text" name="pricePerRoom" value="<?php echo $pricePerRoom; ?>">
                    </p> 
                </div>
                <button type="submit" name="submit">
                    <a href="sp-service-details.php">Update Details</a>
                </button>
            </form>
        </div>
        </div>
    </div>
</div>

<?php
require_once("../inc/footer.php");
?>

<?php mysqli_close($connection); ?>
        