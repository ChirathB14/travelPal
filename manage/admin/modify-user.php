<?php 
session_start();
require_once('../../inc/connection.php');
require_once('../../inc/functions.php');

//checking if the user is logged in
if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
}

$errors = array();
$user_id = '';
$first_name = '';
$last_name = '';
$email = '';

if (isset($_GET['user_id'])) {
    // getting user information
    $user_id = mysqli_real_escape_string($connection, $_GET['user_id']);

    $query = "SELECT * FROM users 
              WHERE userID = {$user_id} LIMIT 1";

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
            header('Location: admin_profile.php?err=user_not_found');
        }
    } else {
        //query unsuccessful
        header('Location: admin_profile.php.php?err=query_failed');
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

    $query = "SELECT * FROM users 
              WHERE email = '{$email}' 
              AND userID != {$user_id} LIMIT 1";

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
            //query success..redirecting to users page
            header('Location: admin_profile.php?profile_updated=true');            
        } else {
            $errors[] = 'Failed to update the profile.';
        }
    }

}
?>

<?php
$title = "Modify-User";
require_once("../../inc/header.php");
?>

<head>
        <link rel="stylesheet" href="/travelPal/css/main.css" type="text/css">
</head>

<div class="body">
        <!-- Profile page content -->
        <div class="page-content">
            <!-- Dashboard - Admin -->
            <div class="Dashboard">
                <div class="Dashboard-top">
                    <img src="../../assets/profile.png" alt="Profile pic">
                    <h4><?php echo $_SESSION['full_name']; ?></h4>
                </div>
                <div class="Dashboard-bottom">
                    <button onclick="location.href = 'admin-dashboard.php';">Dashboard</button>
                    <button onclick="location.href = 'admin_profile.php';">Site Manager</button>
                    <button onclick="location.href = 'admin_tourist.php';">Tourist</button>
                    <button onclick="location.href = 'accomodation_provider.php';">Accommodation Provider</button>
                    <button onclick="location.href = 'vehicle_provider.php';">Vehicle Provider</button>
                    <button onclick="location.href = 'tourist_guide.php';">Tourist Guide</button>
                </div> 
            </div>

        <div class="profile-update-content" style="padding-top: 60px;"> 

        <?php
            if (!empty($errors)) {
                display_errors($errors);
            }
        ?>

        <div class="profile-content">
        <h2>UPDATE PROFILE</h2>
        <form action="modify-user.php" class="form-update" method='post'>
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <div class="details-update">
                    <p>
                        &nbsp; ID :
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
                            <a style="color:black;" href="../manager/sm-change-password.php">Change Password</a>
                        </input>
                    </p> 
                </div>
                <button type="submit" name="submit">Update</button>
        </form>
        </div>
        </div>
    </div>
</div>

<?php require_once("../../inc/footer.php");?>

<?php mysqli_close($connection); ?>
