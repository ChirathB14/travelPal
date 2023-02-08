<?php
session_start();
require_once '../inc/connection.php';
require_once '../inc/functions.php';

//checking if the user is logged in
if (!$_SESSION['user_id'] && !$_SESSION['user_type']) {
    header('Location: login.php');
}

$errors = array();
$user_id = '';
$firstName = '';
$lastName = '';
$email = '';
$password = '';
$confirmPassword = '';
$location = '';
$phoneNo = '';
$nic = '';

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
            $last_name = $result['lastName'];
            $email = $result['email'];
            //retrieving rest of user details
            $query2 = "SELECT * 
                        FROM serviceprovider 
                        WHERE userID = {$user_id} 
                        LIMIT 1";
            $result_set2 = mysqli_query($connection, $query2);

            if ($result_set2) {
                if (mysqli_num_rows($result_set2) == 1) {
                    //user found
                    $result = mysqli_fetch_assoc($result_set2);
                    $location = $result['location'];
                    $phoneNo = $result['phoneNo'];
                    $nic = $result['NIC'];
                } else {
                    //user not found
                    header('Location: sp-profile.php?err=user_details_not_found');
                }
            } else {
                //query unsuccessful
                header('Location: sp-profile.php?err=query_failed');
            }
        } else {
            //user not found
            header('Location: sp-profile.php?err=user_not_found');
        }
    } else {
        //query unsuccessful
        header('Location: sp-profile.php?err=query_failed');
    }
}

if (isset($_POST['submit'])) {

    $user_id = $_POST['user_id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phoneNo = $_POST['phoneNo'];
    $nic = $_POST['NIC'];

    //function to undefined index error on location
    $location = isset($_POST['location']) ? $_POST['location'] : $_POST['location_old'];

    $passwordHash = sha1($password);

    //checking required fields
    if (empty($firstName) || empty($lastName) || empty($email) || empty($phoneNo) || empty($nic)) {
        array_push($errors, "All the fields are required");
    }

    //checking user type is selected
    if (empty($location)) {
        array_push($errors, "Location is not selected");
    }

    //checking email address
    if (!is_email($email)) {
        array_push($errors, "Email address is invalid.");
    }

    //checking nic
    if (!is_nic($nic)) {
        array_push($errors, "NIC is invalid.");
    }

    //checking maxlength
    $max_len_fields = array('firstName' => 50, 'lastName' => 50, 'email' => 50, 'phoneNo' => 10);

    //checking max length fields
    $errors = array_merge($errors, check_max_length($max_len_fields));

    //checking email is existing
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $query = "SELECT * FROM Users WHERE email = '{$email}' AND userID != {$user_id} LIMIT 1";

    $result_set = mysqli_query($connection, $query);

    verify_query($result_set);

    if (mysqli_num_rows($result_set) == 1) {
        $errors[] = "Email address already exists.";
    }

    //function to clean user entered data


    if (empty($errors)) {
        //updating the record
        $first_name = mysqli_real_escape_string($connection, $_POST['firstName']);
        $last_name = mysqli_real_escape_string($connection, $_POST['lastName']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $phoneNo = mysqli_real_escape_string($connection, $_POST['phoneNo']);
        $nic = mysqli_real_escape_string($connection, $_POST['NIC']);

        $query1 = "UPDATE Users
                    SET firstName = '{$first_name}',
                      lastName = '{$last_name}',
                      email = '{$email}'
                    WHERE userID = {$user_id} LIMIT 1";

        $result1 = mysqli_query($connection, $query1);

        if ($result1) {
            $query2 = "UPDATE serviceprovider
                    SET location = '{$location}',
                      phoneNo = '{$phoneNo}',
                      NIC = '{$nic}'
                    WHERE userID = {$user_id} LIMIT 1";

            $result2 = mysqli_query($connection, $query2);
            if($result2){
                //query success..redirecting to users page
                header('Location: sp-profile.php?profile_updated=true');
            }else{
                $errors[] = 'Failed to update the profile.';
            }
        } else {
            $errors[] = 'Failed to update the profile.';
        }
    }
}

?>

<?php
$title = "Update Profile";
require_once "../inc/header.php";
?>

<head>
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
                <button onclick="location.href = 'sp-addServiceDetails.php';">Service Details</button>
                <button class="active" onclick="location.href = 'sp-update-profile.php';">Update Profile</button>
                <button onclick="location.href = 'sp-update-availability.php';">Update Availability</button>
                <br> <br> <br> <br> <br>
            </div> 
        </div>

    <div class="content">
        <?php
        if (!empty($errors)) {
            display_errors($errors);
        }
        ?>

        <h2>UPDATE PROFILE</h2>
        <div class="profile-content">
        <form action="sp-update-profile.php" class="" method='post' style="margin-left: 70px;">
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <div class="details-update">
                    <p>
                        &nbsp; Your ID :
                        <input type="text" name="user_id" value="<?php echo  $user_id; ?>" disabled>
                    </p>
                </div>
                <div class="details-update">
                    <p>
                        &nbsp; First Name : 
                        <input type="text" name="first_name" id="" value="<?php echo $first_name ; ?>">
                    </p> 
                </div>
                <div class="details-update">
                    <p>
                        &nbsp; Last Name : 
                        <input type="text" name="last_name" id="" value="<?php echo $last_name ; ?>">
                    </p> 
                </div>
                <div class="details-update">
                    <p>
                        &nbsp; Email : 
                        <input type="email" name="email" id="" value="<?php echo $email ; ?>">
                    </p> 
                </div>
                <div  class="details-password">
                    <p>
                        <input type="password" value="********" disabled>
                            <a style="color:black;" href="sp-change-password.php">Change Password</a>
                        </input>
                    </p> 
                </div>
                <div class="details-update">
                    <p>
                        &nbsp; Location : 
                        <input type="text" name="location_old1" id="" value="<?php echo $location ; ?>" disabled>
                        <input type="hidden" name="location_old" id="" <?php echo 'value="' . $location . '"'; ?> >
                        <select id="" name="location" style="width: 375px;  margin-top: 7px; 
                            background-color: var(--accentcolor); height: 34px;
                            border: none; font-size: 10px; font-weight: bold;">
                            <option value="" disabled selected>SELECT NEW LOCATION</option>
                            <option value="Colombo">COLOMBO</option>
                            <option value="Gampaha">GAMPAHA</option>
                            <option value="Kalutara">KALUTARA</option>
                        </select>
                    </p> 
                </div>
                <br>
                <div class="details-update" style="margin-top: 15px;">
                    <p>
                        &nbsp; Phone Number : 
                        <input type="text" name="phoneNo" id="" <?php echo 'value="' . $phoneNo . '"'; ?>>
                    </p> 
                </div>
                <div class="details-update">
                    <p>
                        &nbsp; NIC : 
                        <input type="text" name="NIC" id="" <?php echo 'value="' . $nic . '"'; ?>>
                    </p> 
                </div>
                <button type="submit" name="submit">Update</button>
        </form>
    </div>
</div>

<?php mysqli_close($connection); ?>