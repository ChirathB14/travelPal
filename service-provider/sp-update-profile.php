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

<div class="body">

    <div class="dashboard">
        <img src="/travelPal/assets/profile.png" alt="">
        <p><?php echo $_SESSION['full_name']; ?></p>
        <button class="nav" onclick="location.href = 'sp-profile.php';">MY PROFILE</button>
        <button class="select" onclick="location.href = 'sp-update-profile.php';">UPDATE PROFILE</button>
    </div>

    <div class="content">
        <?php
        if (!empty($errors)) {
            display_errors($errors);
        }
        ?>
        <h1>UPDATE PROFILE</h1>
        <form action="sp-update-profile.php" class="" method='post'>
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            <table class="table">
                <tr class="row">
                    <td colspan="2">
                        <?php echo "Your ID : " . $user_id; ?>
                    </td>
                </tr>
                <tr class="row">
                    <td>
                        <label for="">First name:</label>
                        <input type="text" name="firstName" id="" <?php echo 'value="' . $first_name . '"'; ?>>
                    </td>
                </tr>
                <tr class="row">
                    <td>
                        <label for="">Last name:</label>
                        <input type="text" name="lastName" id="" <?php echo 'value="' . $last_name . '"'; ?>>
                    </td>
                </tr>
                <tr class="row">
                    <td>
                        <label for="">Email address:</label>
                        <input type="email" name="email" id="" <?php echo 'value="' . $email . '"'; ?>>
                    </td>
                </tr>
                <tr class="row">
                    <td>
                        <label for="">Password:</label>
                        <input type="text" value="************" disabled></input> <br><a style="color:black;" href="t-change-password.php?user_id=<?php echo $user_id; ?>">Change Password</a>
                    </td>
                </tr>
                <tr class="row">
                    <td>
                        <label for="">Location:</label>
                        <input type="text" name="location_old1" id="" <?php echo 'value="' . $location . '"'; ?> disabled>
                        <input type="hidden" name="location_old" id="" <?php echo 'value="' . $location . '"'; ?> >
                        <select class="textinput" id="" name="location">
                            <option value="" disabled selected>PLEASE SELECT NEW LOCATION</option>
                            <option value="Colombo">COLOMBO</option>
                            <option value="Gampaha">GAMPAHA</option>
                            <option value="Kalutara">KALUTARA</option>
                        </select>
                    </td>
                </tr>
                <tr class="row">
                    <td>
                        <label for="">Phone Number:</label>
                        <input type="text" name="phoneNo" id="" <?php echo 'value="' . $phoneNo . '"'; ?>>
                    </td>
                </tr>
                <tr class="row">
                    <td>
                        <label for="">NIC:</label>
                        <input type="text" name="NIC" id="" <?php echo 'value="' . $nic . '"'; ?>>
                    </td>
                </tr>
                <tr class="row">
                    <td>
                        <button type="submit" name="submit">Update</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
require_once "../inc/footer.php";
?>

<?php mysqli_close($connection); ?>