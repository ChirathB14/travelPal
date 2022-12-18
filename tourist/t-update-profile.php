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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="body">
    <div class="dashboard">
            <img src="/travelPal/assets/profile.png" alt="">
            <p><?php echo $_SESSION['full_name']; ?></p>
            <button class="select" onclick="location.href = 't-profile.php';">MY PROFILE</button>
            <button class="nav" onclick="location.href = 't-update-profile.php';">UPDATE PROFILE</button>
            <button class="nav" onclick="location.href = 't-view-tours.php';">VIEW TOURS</button>
        </div>
        <?php
if (!empty($errors)) {
    display_errors($errors);
}
?>

        <div class="content">
        <h1>PROFILE</h1>
            <table class="table">
                <tr class="row">
                    <td colspan="2">
                        <?php echo "Your ID : " . $user_id; ?>
                    </td>
                </tr>
                <tr class="row">
                    <td>
                        <label for="">First name:</label>
                        <input type="text" name="first_name" id="" <?php echo 'value="' . $first_name . '"'; ?> >
                    </td>
                    <td>
                        <img src="/travelPal/assets/Frame.png" alt="TRAVELPal">
                    </td>
                </tr>
                <tr class="row">
                    <td>
                        <label for="">Last name:</label>
                        <input type="text" name="last_name" id="" <?php echo 'value="' . $last_name . '"'; ?> >
                    </td>
                    <td>
                        <img src="/travelPal/assets/Frame.png" alt="TRAVELPal">
                    </td>
                </tr>
                <tr class="row">
                    <td>
                        <label for="">Email address:</label>
                        <input type="email" name="email" id="" <?php echo 'value="' . $email . '"'; ?> >
                    </td>
                    <td>
                        <img src="/travelPal/assets/Frame.png" alt="TRAVELPal">
                    </td>
                </tr>
            </table>
        </div>


    </div>
    <div class="footer">
        <hr>
        <p>© 2022 TRAVEL PAL ALL RIGHTS RESERVED</p>
    </div>
</body>
</html>



<main>
    <h1>Update Profile</h1>
    <p>
        <a href="t-profile.php"> MY PROFILE</a>
        <a href="t-update-profile.php"> UPDATE PROFILE</a>
        <a href="#t-tours.php"> VIEW TOURS</a>
    </p>

    <?php
if (!empty($errors)) {
    display_errors($errors);
}
?>

    <form action="t-update-profile.php" class="userform" method='post'>
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        <p>
            <label for="">First name:</label>
            <input type="text" name="first_name" id="" <?php echo 'value="' . $first_name . '"'; ?> >
        </p>
        <p>
            <label for="">Last name:</label>
            <input type="text" name="last_name" id="" <?php echo 'value="' . $last_name . '"'; ?> >
        </p>
        <p>
            <label for="">Email address:</label>
            <input type="email" name="email" id="" <?php echo 'value="' . $email . '"'; ?> >
        </p>
        <p>
            <label for="">Password:</label>
            <span>************</span> | <a href="t-change-password.php?user_id=<?php echo $user_id; ?>">Change
                Password</a>
        </p>
        <p>
            <label for="">&nbsp;</label>
            <button type="submit" name="submit">Update</button>
        </p>

    </form>
</main>
<?php
require_once "../inc/footer.php";
?>

<?php mysqli_close($connection);?>
