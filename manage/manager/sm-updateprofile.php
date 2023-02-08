<?php 

session_start();
require_once('../../inc/connection.php');
require_once('../../inc/functions.php');


if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
}
$errors = array();
$user_id = '';
$first_name = '';
$last_name = '';
$email = '';
$password = '';

if (isset($_SESSION['user_id'])) {
    //getting the user information
    $user_id = mysqli_real_escape_string($connection, $_SESSION['user_id']);
    $query = "SELECT * 
              FROM users u, sitemanager s
              WHERE u.userID = {$user_id} 
                    AND u.userID = s.userID
              LIMIT 1";

    $result_set = mysqli_query($connection, $query);

    if ($result_set) {
        if (mysqli_num_rows($result_set) == 1) {
            //user found
            $result = mysqli_fetch_assoc($result_set);
            $first_name = $result['firstName'];
            $last_name = $result['lastName'];
            $email = $result['email'];
        } else {
            //user not found
            header('Location: sm-updateprofile.php?err=user_not_found');
        }
    } else {
        //query unsuccessful
        header('Location: sm-updateprofile.php?err=query_failed');
    }
}

if (isset($_POST['submit'])) {

    $user_id = $_POST['user_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    $req_fields = array('user_id', 'first_name', 'last_name', 'email');

    //checking required fields
    $errors = array_merge($errors, check_req_fields($req_fields));

    //checking maxlength
    $max_len_fields = array('first_name' => 50, 'last_name' => 50, 'email' => 50);

    //checking required fields
    $errors = array_merge($errors, check_max_length($max_len_fields));

    //checking email address
    if (!is_email($_POST['email'])) {
        $errors[] = 'Email address is invalid.';
    }

    //checking email is existing
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $query = "SELECT * 
              FROM users u, sitemanager s
              WHERE email = '{$email}' 
                    AND u.userID != {$user_id} 
                    AND u.userID = s.userID
              LIMIT 1";

    $result_set = mysqli_query($connection, $query);

    verify_query($result_set);

    if (mysqli_num_rows($result_set) == 1) {
        $errors[] = "Email address already exists.";
    }


    if (empty($errors)) {
        //adding new record
        $first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($connection, $_POST['last_name']);

        $query = "UPDATE Users 
                  SET firstName = '{$first_name}',
                      lastName = '{$last_name}',
                      email = '{$email}'
                   WHERE userID = {$user_id} LIMIT 1";

        $result = mysqli_query($connection, $query);

        if ($result) {
            //query succes..redirecting to users page
            header('Location: sm-updateprofile.php?profile_updated=true');
        } else {
            $errors[] = 'Failed to update the profile.';
        }
    }

}
?>

<?php
$title = "Site Manager-Update profile";
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
                <img src="/travelPal/assets/Profile.png" alt="">
                <h4><?php echo $_SESSION['full_name']; ?></h4>
            </div>
            <div class="Dashboard-bottom">
                <button onclick="location.href = 'sm-myprofile.php';">My Profile</button>
                <button class="active" onclick="location.href = 'sm-updateprofile.php';">Update Profile</button>
                <button onclick="location.href = 'sm-GenerateReport.php';">Generate Report</button>
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

        <h2>UPDATE PROFILE</h2>
        <div class="profile-content">
        <form action="sm-updateprofile.php" class="form-update" method='post'>
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
                <button type="submit" name="submit">Update</button>
        </form>
        </div>
        </div>
    </div>

<?php require_once("../../inc/footer.php");?>

<?php mysqli_close($connection); ?>
