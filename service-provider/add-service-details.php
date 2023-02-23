<?php 
session_start();
require_once('../inc/connection.php');
require_once('../inc/functions.php');

//checking if the user is logged in
if (!$_SESSION['user_id'] && !$_SESSION['user_type']) {
    header('Location: login.php');
}

$errors = array();
$user_id = '';
$first_name = '';
$serviceType = '';
$email = '';

//accommodation provider
$regNo = '';
$phoneNo = '';
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

$user_id = mysqli_real_escape_string($connection, $_SESSION['user_id']);

if (isset($_SESSION['user_id'])) {
    //getting the user information
    $user_id = mysqli_real_escape_string($connection, $_SESSION['user_id']);
    $query1 = "SELECT * 
              FROM Users u, serviceprovider sp 
              WHERE u.userID = {$user_id} 
                    AND u.userID = sp.userID
              LIMIT 1";

    $result_set1 = mysqli_query($connection, $query1);

    if ($result_set1) {
        if (mysqli_num_rows($result_set1) == 1) {
            //user found
            $result = mysqli_fetch_assoc($result_set1);
            $first_name = $result['firstName'];
            $email = $result['email'];
        } else {
            //user not found
            // header('Location: sp-addServiceDetails.php?err=user_not_found');
        }
    } else {
        //query unsuccessful
        // header('Location: sp-addServiceDetails.php?err=query_failed');
    }
}

if (isset($_POST['submit'])) {
    $serviceType = mysqli_real_escape_string($connection, trim($_POST['serviceType']));
    $phoneNo = mysqli_real_escape_string($connection, trim($_POST['phoneNo']));

    //accommodation provider
    $regNo = mysqli_real_escape_string($connection, trim($_POST['regNo']));
    $address = mysqli_real_escape_string($connection, trim($_POST['address']));
    $pricePerRoom = mysqli_real_escape_string($connection, trim($_POST['pricePerRoom']));

    //vehicle provider
    $vehicleNumber = mysqli_real_escape_string($connection, trim($_POST['vehicleNumber']));
    $pricePerKm = mysqli_real_escape_string($connection, trim($_POST['pricePerKm']));
    $vehicleType = mysqli_real_escape_string($connection, trim($_POST['vehicleType']));
    $fuelType = mysqli_real_escape_string($connection, trim($_POST['fuelType']));

    //tour guide
    $reg_number = mysqli_real_escape_string($connection, trim($_POST['reg_number']));
    $pricePerDay = mysqli_real_escape_string($connection, trim($_POST['pricePerDay']));
    $experience = mysqli_real_escape_string($connection, trim($_POST['experience']));
    $languages = mysqli_real_escape_string($connection, trim($_POST['languages']));

    //checking whether the service type is selected
    if (empty($serviceType)) {
        array_push($errors, "Service Type is not selected");
    }

    //checking required fields for the Accommodation Provider
    if ($serviceType == 'Accommodation Provider') {
        if (empty($regNo) || empty($address) || empty($pricePerRoom) || empty($phoneNo)) {
            array_push($errors, "Accommodation provider details required");
        }  
        
            // checking whether the checkbox is/are selected
            $withFoodStatus = $_POST['withFoodStatus'];
            if (empty($withFoodStatus)) {
                array_push($errors, "You didn't select any food status");
            }

            $withAcStatus = $_POST['withAcStatus'];
            if (empty($withAcStatus)) {
                array_push($errors, "You didn't select any AC status");
            }
    }

    //checking required fields for the Vehicle Provider
    if ($serviceType == 'Vehicle Provider') {
        if (empty($vehicleNumber) || empty($pricePerKm) || empty($vehicleType) || empty($fuelType)) {
            array_push($errors, "Vehicle provider details required");
        }  
    }

    //checking required fields for the Tour Guide
    if ($serviceType == 'Tour Guide') {
        if (empty($reg_number) || empty($pricePerDay) || empty($experience) || empty($languages)) {
            array_push($errors, "Tour Guide details required");
        }  
    }

    //checking max length
    $max_len_fields = array('phoneNo'=> 10, 'regNo'=>5);

    //checking max length fields
    $errors = array_merge($errors, check_max_length($max_len_fields));

    if (empty($errors)) {
        if($serviceType == 'Accommodation Provider') {
            // $last_id = mysqli_insert_id($connection);
            $query = "INSERT INTO accomodation(
                        `serviceProfileID`, `regNo`, `address`, `pricePerRoom`, `withFoodStatus`, `withAcStatus`
                        ) VALUES (
                        {$user_id}, '{$regNo}','{$address}', '{$pricePerRoom}', '{$withFoodStatus}', '{$withAcStatus}'
                        )";

            $result = mysqli_query($connection, $query) or (die(mysqli_error()));
        }

        if($serviceType == 'Vehicle Provider') {
            // $last_id = mysqli_insert_id($connection);
            $query = "INSERT INTO transport(
                        `serviceProfileID`, `vehicleNumber`, `pricePerKm`, `vehicleType`, `fuelType`
                        ) VALUES (
                        {$user_id}, '{$vehicleNumber}','{$pricePerKm}', '{$vehicleType}', '{$fuelType}'
                        )";

            $result = mysqli_query($connection, $query);
        }

        if($serviceType == 'Tour Guide') {
            $query = "INSERT INTO tourguide(
                        `serviceProfileID`, `reg_number`, `pricePerDay`, `experience`, `languages`
                        ) VALUES (
                            {$user_id}, '{$reg_number}','{$pricePerDay}', '{$experience}', '{$languages}'
                        )";

                $result = mysqli_query($connection, $query);

                verify_query($result);
        }
    } header('Location: add-service-details.php?success=yes');
} else {
        //header('Location: add-service-details.php?failed=yes');
}
?>

<?php
$title = "Add Service Details";
require_once("../inc/header.php");
?>

<head>
        <link rel="stylesheet" href="/travelPal/css/main.css" type="text/css">
        <link rel="stylesheet" href="/travelPal/css/form.css" type="text/css">
</head>

<div class="page-content">
    <div class="services-container" style="width: 70%; margin-left: 190px;">
        <h2>Add Service Details</h2>

    <form action="add-service-details.php" method="post" style="width: 50%;">

            <?php
            //print errors
            if (!empty($errors)) {
                display_errors($errors);
            }

            //added successfully 
            if (isset($_GET['success'])) {
                echo '<p class="info">You have successfully submitted the service details.</p>';
            }

            //failed to add
            if (isset($_GET['failed'])) {
                echo "<p class='error'> Failed to submit the service details. Error: " .mysqli_error($connection)."</p>";
            }
            ?>

        <!-- Common service details -->
        <div class="services-sub-container">
            <div class="input-elements">
                <input type="text" name="firstName" placeholder="  Service Provider Name *" <?php echo 'value="' . $first_name . '"'; ?>>
                <div class="select">
                    <select id="" name="serviceType" placeholder="  Service Type" style="width: 350px;  margin-top: 12px; 
                            background-color: var(--accentcolor); opacity: 0.75; height: 40px;
                            box-sizing: border-box; border: none; border-radius: 5px;
                            font-size: 10px; font-weight: bold; color:#808080;">
                        <option value="" disabled selected>SERVICE TYPE</option>
                        <option value="Accommodation Provider">Accommodation Provider</option>
                        <option value="Vehicle Provider">Vehicle Provider</option>
                        <option value="Tour Guide">Tour Guide</option>
                    </select>
                </div>
            </div>
            <div class="input-elements">
                <input type="email" name="email" placeholder="  Service Provider Email *" <?php echo 'value="' . $email . '"'; ?>>
                <input type="file" name="profile" placeholder="Upload Photo" style="padding: 10px;">
            </div>
        </div>
        <hr> <br>

        <!-- Accommodation Provider service details -->
        <h5 style="margin-left: 45px;">If you an Accommodation provider,</h5>
        <div class="services-sub-container">
            <div class="input-elements">
                <input type="text" name="regNo" placeholder="  Registration Number" <?php echo 'value="' . $regNo . '"'; ?>>
                <input type="tel" name="phoneNo" placeholder="  Phone Number" <?php echo 'value="' . $phoneNo . '"'; ?>>
                <div class="preference">
                    <p>with food</p>
                    <input type="checkbox" name="withFoodStatus" value="yes"> <h6>Yes</h6> 
                    <input type="checkbox" name="withFoodStatus" value="no"> <h6>No</h6> 
                </div>
            </div>
            <div class="input-elements">
                <input type="text" name="address" placeholder="  Service Provider address" <?php echo 'value="' . $address . '"'; ?>>
                <input type="text" name="pricePerRoom" placeholder="  Price per room" <?php echo 'value="' . $pricePerRoom . '"'; ?>>
                <div class="preference">
                    <p>with A/C</p>
                    <input type="checkbox" name="withAcStatus" value="yes"> <h6>Yes</h6> 
                    <input type="checkbox" name="withAcStatus" value="no"> <h6>No</h6> 
                </div>
            </div>
        </div>
        <hr> <br>

        <!-- Vehicle Provider service details -->
        <h5 style="margin-left: 45px;">If you a Vehicle provider,</h5>
        <div class="services-sub-container">
            <div class="input-elements">
                <input type="text" name="vehicleNumber" placeholder="  Vehicle Number" <?php echo 'value="' . $vehicleNumber . '"'; ?>>
                <input type="text" name="pricePerKm" placeholder="  Price per KM" <?php echo 'value="' . $pricePerKm . '"'; ?>>
            </div>
            <div class="input-elements">
                <input type="text" name="vehicleType" placeholder="  Vehicle Type" <?php echo 'value="' . $vehicleType . '"'; ?>>
                <input type="text" name="fuelType" placeholder=" Fuel Type" <?php echo 'value="' . $fuelType . '"'; ?>>
            </div>
        </div>
        <hr> <br>

        <!-- Tour Guide service details -->
        <h5 style="margin-left: 45px;">If you a Tour Guide,</h5>
        <div class="services-sub-container">
            <div class="input-elements">
                <input type="text" name="reg_number" placeholder="  Registration Number" <?php echo 'value="' . $reg_number . '"'; ?>>
                <input type="text" name="pricePerDay" placeholder="  Price Per Day" <?php echo 'value="' . $pricePerDay . '"'; ?>>
            </div>
            <div class="input-elements">
                <input type="text" name="experience" placeholder="  Experience" <?php echo 'value="' . $experience . '"'; ?>>
                <input type="text" name="languages" placeholder="  Languages" <?php echo 'value="' . $languages . '"'; ?>>
            </div>
        </div>
        <hr> <br>

        <div class="form-bottom">
            <input type="checkbox" name="" style="margin: 0px 15px 15px 45px;" required> <h6>I assure that all the details given by me are true</h6>
        </div>
        <button type="submit" name="submit">Add Details</button>
        <br>
    </div>
    </form>
</div>

<?php require_once("../inc/footer.php");?>

<?php mysqli_close($connection); ?>