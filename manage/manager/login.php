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
                $_SESSION['full_name'] = $user['firstName'] . " " . $user['lastName'];

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

<head>
    <link rel="stylesheet" href="../css/login.css">
</head>

<div class="login">
    <form action="login.php" method="post">
            <h1>Login</h1>

            <?php
                if (isset($errors) && !empty($errors)) {
                    echo '<p class="error"> ';
                    foreach ($errors as $error) {
                        echo "- " . $error . '<br>';
                    }
                    echo '</p>';
                }
            ?>

            <!-- Successfully logout -->
            <?php
            if (isset($_GET['logout'])) {
                echo '<p class="info"> Logged out successfully!</p>';
            }
            ?>

                <div class="input-elements">
                    <input type="text" name="email" placeholder="  Email" required <?php echo 'value="' . $email . '"'; ?>>
                    <input type="password" name="password" placeholder="  Password" required>
                </div>
                <div class="password">
                    <div><input type="checkbox" name="remember" id="remember" value="yes"> Remember password</div>
                    <a href="password-reset.php">Forgot Password?</a>
                </div>
                <div class="new-user">
                    <button type="submit" name="submit">Login</button>
                </div>
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

<?php
require_once("../../inc/footer.php");
?>

<?php mysqli_close($connection); ?>

