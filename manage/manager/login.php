<?php session_start(); ?>
<?php
require_once('../../inc/connection.php');
require_once('../../inc/functions.php');
?>
<?php

$email = '';

//check for form submission
if (isset($_POST['submit'])) {
    //check enter username and password
    $errors = array();
    if (!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1) {
        $errors[] = 'Username is Missing or Invalid';
    }
    if (!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1) {
        $errors[] = 'Password is Missing or Invalid';
    }

    //checking email is existing
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $query = "SELECT * FROM Users WHERE email = '{$email}' LIMIT 1";

    $result_set = mysqli_query(
        $connection,
        $query
    );

    verify_query($result_set);

    if (mysqli_num_rows($result_set) != 1) {
        $errors[] = "Email is invalid!";
    }

    //check if there are any errors in the form
    if (empty($errors)) {
        // save user name and password in to variables
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        $hashed_password = sha1($password);

        //prepare database query for check whether the user name and passwords are correct
        $query = "SELECT * FROM users
                INNER JOIN sitemanager ON users.userID=sitemanager.userID 
                WHERE email = '{$email}'
                AND password ='{$hashed_password}'
                LIMIT 1";

        $result_set = mysqli_query($connection, $query);
        if ($result_set) {
            if (mysqli_num_rows($result_set) == 1) {
                //valid user found
                $user = mysqli_fetch_assoc($result_set);
                $_SESSION['user_id'] = $user['userID'];
                $_SESSION['firstName'] = $user['firstName'] . " " . $user['lastName'];

                //redirect to the profile
                header('Location: sm-myprofile.php');
                $email = '';
            } else {
                $errors[] = 'Invalid password';
            }
        } else {
            $errors[] = 'Database query failed';
        }
    }
}
?>

<?php
$title = "Login";
require_once("../../inc/header.php");
?>
<div class="login">
    <form action="login.php" method="post">
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
            <input class="textinput" type="password" name="password" id="" placeholder="password" required>
        </p>
        <div class="password" style="font-size: 10px ;">
            <div>
                <input class="checkbox" type="checkbox" name="remember" id="remember" value="yes">
                <label for="remember">show password</label>
                <a class="" href="reset-pw.php">Forgot password?</a>
            </div>
        </div>
        <p>
            <button type="submit" name="submit"> <b>LOGIN </b></button>
        </p>
    </form>
</div>
<script src="../../js/jquery.js"></script>
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
<?php require_once("../../inc/footer.php"); ?>
<?php mysqli_close($connection); ?>