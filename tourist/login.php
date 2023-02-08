<?php
session_start();
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
                  FROM Users u, Tourist t
                  WHERE email = '{$email}'
                        AND password = '{$hashed_password}'
                        AND u.userID = t.userID
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
            $_SESSION['user_type'] = "Tourist";

            //redirect to users.php
            header('Location: t-profile.php');
            $email = '';
        } else {
            //username and password is invalid
            $errors[] = 'Invalid password';
        }
    }
}
?>

<?php
$title = "Login";
require_once("../inc/header.php");
?>

<head>
    <link rel="stylesheet" href="../css/main.css">
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
                    <input type="text" name="email" placeholder="  Email">
                    <input type="password" name="password" placeholder="  Password">
                </div>
                <div class="password">
                    <div><input type="checkbox" name="remember" id=""> Remember password</div>
                    <a href="">Forgot Password?</a>
                </div>
                <div class="new-user">
                    <button type="submit" name="submit">Login</button>
                    <a href="../register.php">New user? Create an account</a>
                </div>
    </form>
</div>

<?php
require_once("../inc/footer.php");
?>

<?php mysqli_close($connection); ?>