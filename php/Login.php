<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/login.css">
    <script type="text/javascript" src="../js/checkAccess.js"></script>
    <link rel="icon" type="image/x-icon" href="/travelPal/favicon.ico">

    <title>Travel Pal | Login</title>
</head>

<body onload="loginRegisterAccess()">

    <div class="login">
        <form action="Login.php" method="post">
            <h1 id="heder-login">Login</h1>
            <div class="input-elements">
                <input type="email" id="email" name="email" placeholder="  Email" required>
                <input type="password" id="Pass" name="Pass" placeholder="  Password" required>
            </div>
            <div class="password">
                <div><input type="checkbox" name="viewPw" id="viewPw" onclick="showPw()"> Show password</div>
                <a href="../php/fogotPassword/ForgotPassword.php">Forgot Password?</a>
            </div>
            <div class="new-user">
                <button type="submit" id="loginbtn" name="loginbtn" value="loginbtn">Login</button>
                <a href="./RegisterUser.php">New user? Create an account</a>
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
                echo 'alert("Incoreect Username or password1")';
                echo '</script>';
            }
        } else {
            echo '<script language ="javascript">';
            echo 'alert("Incoreect Username or password2")';
            echo '</script>';
        }

        $conn->close();
    }
    ?>
    </form>

    </div>
    </div>
</body>

</html>