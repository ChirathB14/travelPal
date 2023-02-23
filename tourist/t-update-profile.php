<?php
session_start();
require_once '../inc/connection.php';
require_once '../inc/functions.php';

//checking if the user is logged in
if (!$_SESSION['user_id']) {
    header('Location: t-login.php');
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
              FROM Users u, Tourist t
              WHERE u.userID = {$user_id}
                    AND u.userID = t.userID
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
            header('Location: t-update-profile.php?err=user_not_found');
        }
    } else {
        //query unsuccessful
        header('Location: t-update-profile.php?err=query_failed');
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
              FROM Users u, Tourist t
              WHERE email = '{$email}'
                    AND u.userID != {$user_id}
                    AND u.userID = t.userID
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
            $_SESSION['full_name'] = $first_name . " " . $last_name;
            header('Location: t-profile.php?profile_updated=true');
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
        <!-- Dashboard - Tourist -->
        <div class="Dashboard">
            <div class="Dashboard-top">
                <img src="../assets/profile.png" alt="Profile pic">
                <h4><?php echo $_SESSION['full_name']; ?></h4>
            </div>
            <div class="Dashboard-bottom">
                <button onclick="location.href = 't-profile.php';">My Profile</button>
                <button class="active" onclick="location.href = 't-update-profile.php';">Update Profile</button>
                <button onclick="location.href = 't-view-tours.php';">View Tours</button>
                <!-- <br> <br> <br> <br> <br> -->
            </div>    
        </div>

        <div class="profile-update-content"> 
        <?php
        if (!empty($errors)) {
            display_errors($errors);
        }
        ?>

        <div class="profile-content"style="margin: 75px 0px 10px 0px;" >
        <h2>UPDATE PROFILE</h2>
        <form action="t-update-profile.php" class="form-update" method='post'>
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
                            <a style="color:black;" href="t-change-password.php">Change Password</a>
                        </input>
                    </p> 
                </div>
                <button type="submit" name="submit">Update</button>
        </form>
        </div>
        </div>
    </div>

<?php
require_once "../inc/footer.php";
?>

<?php mysqli_close($connection); ?>