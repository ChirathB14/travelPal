<?php
session_start();
require_once('../inc/connection.php');
require_once('../inc/functions.php');

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
            header('Location: t-change-password.php?err=user_not_found');
        }
    } else {
        //query unsuccessful
        header('Location: t-change-password.php?err=query_failed');
    }
}

if (isset($_POST['submit'])) {

    $user_id = $_POST['user_id'];
    $password = $_POST['password'];

    //checking required fields
    $req_fields = array('user_id', 'password');
    $errors = array_merge($errors, check_req_fields($req_fields));

    //checking maxlength
    $max_len_fields = array('password' => 40);
    $errors = array_merge($errors, check_max_length($max_len_fields));

    if (empty($errors)) {
        //adding new record
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        $hashed_password = sha1($password);

        $query = "UPDATE Users 
                  SET `password` = '{$hashed_password}'
                  WHERE userID = {$user_id} LIMIT 1";

        $result = mysqli_query($connection, $query);

        if ($result) {
            //query succes..redirecting to users page
            header('Location: t-profile.php?pw_updated=true');
        } else {
            $errors[] = 'Failed to update the password.';
        }
    }
}

?>

<?php
$title = "Update Password";
require_once("../inc/header.php");
?>

<head>
    <link rel="stylesheet" href="../css/main.css" type="text/css">
</head>

<!-- Profile page content -->
<div class="page-content">
        <!-- Dashboard - Tourist -->
        <div class="Dashboard">
            <div class="Dashboard-top">
                <img src="../assets/profile.png" alt="Profile pic">
                <h4><?php echo $_SESSION['full_name']; ?></h4>
            </div>
            <div class="Dashboard-bottom">
            <button onclick="location.href = 'sp-profile.php';">My Profile</button>
                <button onclick="location.href = 'sp-service-details.php';">Service Details</button>
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

        <h2>Update Profile</h2>
        <div class="profile-content">
        <form action="t-change-password.php" class="userform" method='post' style="width: 80%;">
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            <div class="details-update">
                    <p>
                        &nbsp; First Name : 
                        <input type="text" name="first_name" id="" value="<?php echo $first_name ; ?>" disabled>
                    </p> 
            </div>
            <div class="details-update">
                    <p>
                        &nbsp; Last Name : 
                        <input type="text" name="last_name" id="" value="<?php echo $last_name ; ?>" disabled>
                    </p> 
            </div>
            <div class="details-update">
                    <p>
                        &nbsp; Email : 
                        <input type="email" name="email" id="" value="<?php echo $email ; ?>" disabled>
                    </p> 
            </div>
            <div class="details-update">
                    <p>
                        &nbsp; Password : 
                        <input type="password" name="password" id="password" value="<?php echo $password ; ?>">
                    </p> 
            </div>
            <div  class="details-showpassword">
                    <p>
                        <input type="checkbox" name="showpassword" id="showpassword" style="width:15px;height:15px"> Show Password
                    </p> 
            </div>
            <button type="submit" name="submit">Update Password</button>
        </form>
        </div>
        </div>
    </div>

    <div class="content"> 

<?php
if (!empty($errors)) {
    display_errors($errors);
}
?>

<h2>Update Profile</h2>
<div class="profile-content">
<form action="t-change-password.php" class="userform" method='post' style="width: 80%;">
    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
    <div class="details-update">
            <p>
                &nbsp; First Name : 
                <input type="text" name="first_name" id="" value="<?php echo $first_name ; ?>" disabled>
            </p> 
    </div>
    <div class="details-update">
            <p>
                &nbsp; Last Name : 
                <input type="text" name="last_name" id="" value="<?php echo $last_name ; ?>" disabled>
            </p> 
    </div>
    <div class="details-update">
            <p>
                &nbsp; Email : 
                <input type="email" name="email" id="" value="<?php echo $email ; ?>" disabled>
            </p> 
    </div>
    <div class="details-update">
            <p>
                &nbsp; Password : 
                <input type="password" name="password" id="password" value="<?php echo $password ; ?>">
            </p> 
    </div>
    <div  class="details-showpassword">
            <p>
                <input type="checkbox" name="showpassword" id="showpassword" style="width:15px;height:15px"> Show Password
            </p> 
    </div>
    <button type="submit" name="submit">Update Password</button>
</form>
</div>
</div>
</div>


<script src="../js/jquery.js"></script>
<script>
    $(document).ready(function () {
        $('#showpassword').click(function () {
            if ($('#showpassword').is(':checked')) {
                $('#password').attr('type', 'text');
            } else {
                $('#password').attr('type', 'password');
            }
        });
    });
</script>
<?php
require_once("../inc/footer.php");
?>

<?php mysqli_close($connection); ?>
