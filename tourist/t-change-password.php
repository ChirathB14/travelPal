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

    <form action="t-change-password.php" class="userform" method='post'>
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        <p>
            <label for="">First name:</label>
            <input type="text" name="first_name" id="" <?php echo 'value="' . $first_name . '"'; ?> disabled>
        </p>
        <p>
            <label for="">Last name:</label>
            <input type="text" name="last_name" id="" <?php echo 'value="' . $last_name . '"'; ?> disabled>
        </p>
        <p>
            <label for="">Email address:</label>
            <input type="email" name="email" id="" <?php echo 'value="' . $email . '"'; ?> disabled>
        </p>
        <p>
            <label for="">Password:</label>
            <input type="password" name="password" id="password">
        </p>
        <p>
            <label for="">Show Password:</label>
            <input type="checkbox" name="showpassword" id="showpassword" style="width:20px;height:20px">
        </p>
        <p>
            <label for="">&nbsp;</label>
            <button type="submit" name="submit">Update Password</button>
        </p>

    </form>
</main>
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