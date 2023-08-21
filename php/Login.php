<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/loginNew.css" />
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script type="text/javascript" src="../js/checkAccess.js"></script>

    <link rel="icon" type="image/x-icon" href="/travelPal/favicon.ico">
    </head>

    <?php
    $title = "TravePal";
    // require_once("Common/header.php");
?>

    <body onload="loginRegisterAccess()">
        <div class="center">
            <!-- <input type="checkbox" id="show" /> -->
            <!-- <label for="show" class="show-btn">View Form</label> -->
            <div class="container">
                <!-- <label
                    for="show"
                    class="close-btn fas fa-times"
                    title="close"
                ></label> -->
                <div class="text" id="heder-login">Login Form</div>
                <form action="Login.php" method="post">
                    <div class="data">
                        <label>Email</label>
                        <input type="email" id="email" name="email" required />
                    </div>
                    <div class="data">
                        <label>Password</label>
                        <input type="password" id="Pass" name="Pass" required />
                    </div>
                    <div class="forgot-pass">
                        <div><input type="checkbox" name="viewPw" id="viewPw" onclick="showPw()"> Show password</div>
                        <div><a href="../php/fogotPassword/ForgotPassword.php">Forgot Password?</a></div>
                    </div>
                    <div class="btn">
                        <div class="inner"></div>
                        <button type="submit" id="loginbtn" name="loginbtn" value="loginbtn">Login</button>
                    </div>
                    <div class="signup-link">
                        New user? <a href="./RegisterUser.php">Create an account</a>
                    </div>
                
                    </form>
            </div>
        </div>

<?php
    session_start();
    require 'DbConfig.php';
    if (isset($_POST['loginbtn'])) {
        $log = $_POST['email'];
        $pword = $_POST['Pass'];


        // $sql = "SELECT * FROM users WHERE email LIKE '%" . $log . "%' AND password LIKE '%" . $pword . "%'";
        $sql = "SELECT * FROM user WHERE email= '" . $log . "'";
        $result = $conn->query($sql);
        // $data = json_encode($result->user);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $password_hash = $row['password'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['name'] = $row['last_name'];
            if (password_verify($pword, $password_hash)) {
                $cookie_name = "user";

                $sql1 = "SELECT first_name, user_Id, last_name, user_type, email FROM user WHERE email= '" . $log . "'";
                $result1 = $conn->query($sql1);
                $row1 = $result1->fetch_assoc();

                $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;
                $cookie_value = json_encode($row1);
                setcookie($cookie_name, $cookie_value, time() + (86400), '/', $domain, false);
                header('location:../index.php');
            } else {
                echo '<script language ="javascript">';
                echo 'Swal.fire({
                    title: "Incorrect Username or Password!",
                    text: "Do you want to continue",
                    icon: "error",
                    confirmButtonText: "Yes",
                    confirmButtonColor: "var(--primarycolor)",
                    footer: "TravePal";
                    })';
                // echo 'alert("Incorrect Username or Password")';
                echo '</script>';
            }
        } else {
            // echo '<script language ="javascript">';
            // echo 'Swal.fire({
            //     title: "Incorrect Username or Password!",
            //     text: "Do you want to continue",
            //     icon: "error",
            //     confirmButtonText: "Yes",
            //     confirmButtonColor: "var(--primarycolor)",
            //     footer: "TravePal";
            //     })';
            echo 'alert("Incorrect Username or Password")';
            // echo '</script>';
        }

        $conn->close();
    }
    ?>

    </body>
</html>