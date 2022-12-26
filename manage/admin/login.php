<?php session_start(); ?>
<?php require_once('../../inc/connection.php') ?>
<?php
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
    //check if there are any errors in the form
    if (empty($errors)) {
        // save user name and password in to variables
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        $hashed_password = sha1($password);

        //prepare database query for check whether the user name and passwords are correct
        $query = "SELECT * FROM users
                INNER JOIN siteadmin ON users.userID=siteadmin.userID 
                WHERE email = '{$email}'
                AND password ='{$hashed_password}'
                LIMIT 1";
        // echo $query;
        // die();
        $result_set = mysqli_query($connection, $query);
        // var_dump($result_set);
        if ($result_set) {
            if (mysqli_num_rows($result_set) == 1) {
                //valid user found
                $user = mysqli_fetch_assoc($result_set);
                $_SESSION['user_id'] = $user['userID'];
                $_SESSION['firstName'] = $user['firstName'] . " " . $user['lastName'];

                //redirect to the user.php
                header('Location: admin_profile.php');
            } else {
                $errors[] = 'Invalid username or Password 1';
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $title  ?></title>
    <link rel="stylesheet" href="css/styles.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="index">
    <div class="login">
        <form action="login.php" method="post">
            <fieldset>
                <legend>
                    <h1>LOGIN</h1>
                </legend>
                <?php
                if (isset($errors) && !empty($errors)) {
                    echo '<p class="error">Invalid user name or password</p>';
                }
                ?>
                <?php
                if (isset($_GET['logout'])) {
                    echo '<p class="info">You have successfully logged out</p>';
                }
                ?>
                <p>
                    <input class="textinput" type="text" name="email" id="" placeholder="Email Address">
                </p>
                <p>
                    <input class="textinput" type="password" name="password" id="" placeholder="Password">
                </p>
                <div class="divl" style="font-size: 10px ;">
                    <P>
                        <input class="checkbx" type="checkbox" name="remember" id="" value="yes">
                        <label for="remember">REMEMBER ME</label>
                    </P>
                </div>
                <div class="divr" style="font-size: 10px ;">
                    <input type="button" value="FORGOT PASSWORD?" class="forgotpw" id="btnHome" onClick="document.location.href='resetpw.php'" />
                </div>
                <p>
                    <button type="submit" name="submit"> <b>LOGIN </b>

                    </button>
                </p>
            </fieldset>
        </form>
    </div>
</body>

</html>
<?php mysqli_close($connection); ?>