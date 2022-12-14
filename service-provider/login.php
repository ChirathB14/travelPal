<?php
session_start();
// require_once('/travelPal/inc/connection.php');
// require_once('/travelPal/inc/functions.php');
require_once('../inc/connection.php');
require_once('../inc/functions.php');

$email = '';

//check for form submission
if (isset($_POST['submit'])) {

    $errors = array();

    //check if the username and password has been entered
    if (!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1) {
        $errors[] = 'Username is missing/invalid!';
    }

    if (!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1) {
        $errors[] = 'Password is missing/invalid!';
    }

    //checking email is existing
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $query = "SELECT * FROM Users WHERE email = '{$email}' LIMIT 1";

    $result_set = mysqli_query($connection, $query);

    verify_query($result_set);

    if (mysqli_num_rows($result_set) != 1) {
        $errors[] = "Email is invalid!";
    }

    //check if there are any errors in the form
    if (empty($errors)) {
        //save username and pssword into variables
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        $hashed_password = sha1($password);

        $query = "SELECT * 
                  FROM Users u, serviceprovider sp
                  WHERE email = '{$email}'
                        AND password = '{$hashed_password}'
                        AND u.userID = sp.userID
                  LIMIT 1";
        $result_set = mysqli_query($connection, $query);

        //check if the user is valid
        verify_query($result_set);

        //query successful
        if (mysqli_num_rows($result_set) == 1) {
            //valid user found
            $user = mysqli_fetch_assoc($result_set);
            $_SESSION['user_id'] = $user['userID'];
            $_SESSION['full_name'] = $user['firstName'] . " " . $user['lastName'];
            $_SESSION['user_type'] = "ServiceProvider";

            //redirect to profile page
            header('Location: sp-profile.php');
            $email = '';
        } else {
            //password is invalid
            $errors[] = 'Invalid password!';
        }
    }
}

?>

<?php
$title = "Login";
require_once("../inc/header.php");
?>
<div class="login">
    <form action="login.php" method="post">
        <fieldset>
            <h1>LOGIN</h1>
            <?php
            if (isset($errors) && !empty($errors)) {
                echo '<p class="error"> ';
                foreach ($errors as $error) {
                    echo "- " . $error . '<br>';
                }
                echo '</p>';
            }
            ?>
            <?php
            if (isset($_GET['logout'])) {
                echo '<p class="info">You have successfully logged out</p>';
            }
            ?>
            <p>
                <input class="textinput" type="email" name="email" id="" placeholder="Email Address" required <?php echo 'value="' . $email . '"'; ?>>
            </p>
            <p>
                <input class="textinput" type="password" name="password" id="password" placeholder="Password" required>
            </p>
            <div class="password" style="font-size: 12px ;">
                <div>
                    <input class="checkbox" type="checkbox" name="remember" id="remember" value="yes">
                    <label for="remember">show password</label>
                    <a class="" href="reset-pw.php">Forgot password?</a>
                </div>
            </div>
            <p>
                <button type="submit" name="submit"> <b>LOGIN </b></button>
            </p>
            <div class="new-user">
                <a href="./registration.php">New user? Create an account</a>
            </div>
        </fieldset>
    </form>
</div>
<script src="../js/jquery.js"></script>
<script>
    $(document).ready(function() {
        $('#remember').click(function() {
            if ($('#remember').is(':checked')) {
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