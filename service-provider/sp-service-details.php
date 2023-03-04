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

//accommodation provider
$regNo = '';
$address = '';
$pricePerRoom = '';
$withAcStatus = '';
$withFoodStatus = '';

//vehicle provider
$vehicleNumber = '';
$pricePerKm = '';
$vehicleType = '';
$fuelType = '';

//tour guide
$reg_number = '';
$pricePerDay = '';
$experience = '';
$languages = '';

if (isset($_SESSION['user_id'])) {
    //getting the user information
    $user_id = mysqli_real_escape_string($connection, $_SESSION['user_id']);

            // if Accommodation Provider,
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
                        } 
                    } else {
                        //query unsuccessful
                        header('Location: sp-service-details.php?err=query_failed');
                    }

            // if Vehicle Provider,
                $query = "SELECT *
                        FROM transport
                        WHERE serviceProfileID = {$user_id}
                        LIMIT 1";

                $result_set = mysqli_query($connection, $query);

                    if($result_set) {
                        if (mysqli_num_rows($result_set) == 1) {
                            //user found
                            $result = mysqli_fetch_assoc($result_set);                            
                            $vehicleNumber = $result['vehicleNumber'];
                            $pricePerKm = $result['pricePerKm'];
                            $vehicleType = $result['vehicleType'];
                            $fuelType = $result['fuelType'];
                        } 
                    } else {
                        //query unsuccessful
                        header('Location: sp-service-details.php?err=query_failed');
                    }

            // if Tour Guide,
                $query = "SELECT *
                        FROM tourguide 
                        WHERE serviceProfileID = {$user_id}
                        LIMIT 1";

                $result_set = mysqli_query($connection, $query);

                    if($result_set) {
                        if (mysqli_num_rows($result_set) == 1) {
                            //user found
                            $result = mysqli_fetch_assoc($result_set);
                            $reg_number = $result['reg_number'];
                            $pricePerDay = $result['pricePerDay'];
                            $experience = $result['experience'];
                            $languages = $result['languages'];
                        } 
                    } else {
                        //query unsuccessful
                        header('Location: sp-service-details.php?err=query_failed');
                    }
}

if (isset($_POST['submit'])) {

    $user_id = $_POST['user_id'];
    // if Accommodation Provider,
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

    // if Vehicle Provider,
        $vehicleNumber = ($_POST['vehicleNumber']);
        $pricePerKm = ($_POST['pricePerKm']);
        $vehicleType = ($_POST['vehicleType']);
        $fuelType = ($_POST['fuelType']);

        //checking required fields
        if (empty($user_id) || empty($vehicleNumber) || empty($pricePerKm) || empty($vehicleType) || empty($fuelType)) {
            array_push($errors, "All the fields are required");
        }

        if (empty($errors)) {
            //updating the record
            $vehicleNumber = mysqli_real_escape_string($connection, trim($_POST['vehicleNumber']));
            $pricePerKm = mysqli_real_escape_string($connection, $_POST['pricePerKm']);
            $vehicleType = mysqli_real_escape_string($connection, $_POST['vehicleType']);
            $fuelType = mysqli_real_escape_string($connection, $_POST['fuelType']);

            $query = "UPDATE transport
                        SET vehicleNumber = '{$vehicleNumber}',
                            pricePerKm = '{$pricePerKm}',
                            vehicleType = '{$vehicleType}',
                            fuelType = '{$fuelType}'
                            WHERE serviceProfileID = {$user_id} 
                        LIMIT 1";

            $result = mysqli_query($connection, $query);
            } else {
                $errors[] = 'Failed to update the service details.';
            }


    // if Tour Guide,
        $reg_number = ($_POST['reg_number']);
        $pricePerDay = ($_POST['pricePerDay']);
        $experience = ($_POST['experience']);
        $languages = ($_POST['languages']);
       
        //checking required fields
        if (empty($user_id) || empty($reg_number) || empty($pricePerDay) || empty($experience) || empty($languages)) {
            array_push($errors, "All the fields are required");
        }

        if (empty($errors)) {
            //updating the record
            $reg_number = mysqli_real_escape_string($connection, trim($_POST['reg_number']));
            $pricePerDay = mysqli_real_escape_string($connection, $_POST['pricePerDay']);
            $experience = mysqli_real_escape_string($connection, $_POST['experience']);
            $languages = mysqli_real_escape_string($connection, $_POST['languages']);

            $query = "UPDATE tourguide
                        SET reg_number = '{$reg_number}',
                            pricePerDay = '{$pricePerDay}',
                            experience = '{$experience}',
                            languages = '{$languages}'
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
        <?php 
            // checking if the user is an accomodation provider 
            $query = "SELECT * 
                    FROM accomodation 
                    WHERE serviceProfileID = {$user_id}
                    LIMIT 1";

            $result_set = mysqli_query($connection, $query);

            if ($result_set) {
            echo '';
        }
    ?> 
    
    <div class="content">
        <div class="profile-content">
        <h2>Accommodation Provider</h2>
            <form action="sp-service-details.php" method="post" style="width: 80%; margin: 0px 10px 10px 40px;">
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
                        <input type="text" name="regNo" value="<?php echo $regNo; ?>">
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
                    Update Details
                </button>
            </form>
        </div> 

        <!-- <div>
        <h2>Vehicle Provider</h2>
            <form action="">
            if vehicle provider
            <div class="details-update">
                    <p>
                        &nbsp; Vehicle Number : 
                        <input type="text" name="vehicleNumber" value="<?php echo $vehicleNumber; ?>">
                    </p> 
                </div>
                <div class="details-update">
                    <p>
                        &nbsp; Price Per Km : 
                        <input type="text" name="pricePerKm" value="<?php echo $pricePerKm; ?>">
                    </p> 
                </div>
                <div class="details-update">
                    <p>
                        &nbsp; Vehicle Type : 
                        <input type="text" name="vehicleType" value="<?php echo $vehicleType; ?>">
                    </p> 
                </div>
                <div class="details-update">
                    <p>
                        &nbsp; Fuel Type : 
                        <input type="text" name="fuelType" value="<?php echo $fuelType; ?>">
                    </p> 
                </div>
            </form>
        </div> -->

        <!-- <div>
            <form action="">
                if Tour guide,
                <div class="details-update">
                    <p>
                        &nbsp; Vehicle Number : 
                        <input type="text" name="vehicleNumber" value="<?php echo $vehicleNumber; ?>">
                    </p> 
                </div>
                <div class="details-update">
                    <p>
                        &nbsp; Price Per Km : 
                        <input type="text" name="pricePerKm" value="<?php echo $pricePerKm; ?>">
                    </p> 
                </div>
                <div class="details-update">
                    <p>
                        &nbsp; Vehicle Type : 
                        <input type="text" name="vehicleType" value="<?php echo $vehicleType; ?>">
                    </p> 
                </div>
                <div class="details-update">
                    <p>
                        &nbsp; Fuel Type : 
                        <input type="text" name="fuelType" value="<?php echo $fuelType; ?>">
                    </p> 
                </div>
            </form>
        </div> -->
        </div>
    </div>
</div>

<?php
require_once("../inc/footer.php");
?>

<?php mysqli_close($connection); ?>
        