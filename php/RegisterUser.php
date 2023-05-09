<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/registration.css">
    <script type="text/javascript" src="../js/register.js"></script>
    <script type="text/javascript" src="../js/checkAccess.js"></script>
    <link rel="icon" type="image/x-icon" href="/travelPal/favicon.ico">

    <title>Travel Pal</title>
</head>

<!-- 
                <body style="background-image: url('../images/registerBG.png')" onload="loginRegisterAccess()">
                <div id="overlay">
            <div>
            <center>
                <h2 id="heder-register">create an account</h2>
            </center>

            <form class="reg-form" method="POST" action="RegisterUser.php" onsubmit="return cheakpassword()">
            -->

<body class="registration" onload="loginRegisterAccess()">
    <div class="register">
        <form action="RegisterUser.php" method="post" onsubmit="return cheakpassword()">
            <h1 id="heder-login">Create an Account</h1>
            <div class="input-elements">
                <input type="text" name="fname" id="fname" placeholder="  FIRST NAME" required>
                <input type="text" name="lname" id="lname" placeholder="  LAST NAME" required>
                <input type="text" name="address" id="address" placeholder="  ADDRESS" required />
                <input type="email" name="email" id="email" placeholder="  EMAIL" required pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$">
                <input type="password" name="Pass" id="Pass" placeholder="  PASSWORD" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$">
                (Must include atleast 1 uppercase letter, 1 lowercase letter, 1 number and 1 special character.
                Should be more than 8 characters and less than 16 characters.)
                <input type="password" name="rePass" id="rePass" placeholder="  CONFIRM PASSWORD" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$">
                <select id="usertype" name="usertype" required style="width: 400px;  margin-top: 12px; 
                            background-color: var(--accentcolor); opacity: 0.75; height: 40px;
                            box-sizing: border-box; border: none; border-radius: 5px;
                            font-size: 14px; font-weight: bold; color:#808080;">
                    <option value="" disabled selected hidden>REGISTER AS</option>
                    <option value="3">Tourist</option>
                    <option value="4">Service Provider</option>
                </select>
            </div>
            <div class="new-user">
                <button type="submit" id="registerbtn" name="registerbtn" value="registerbtn">
                    Register
                </button>
                <P>
                    <a href="./Login.php"> Already have an Account? Log in</a>
                </P>
            </div>
        </form>
    </div>

    <!--
                <input type="text" class="reg-input" id="fname" name="fname" placeholder="First Name" required />
                <input type="text" class="reg-input" id="lname" name="lname" placeholder="Last Name" required />
                <input type="text" class="reg-input" id="address" name="address" placeholder="Address" required />
                <input type="email" class="reg-input" id="email" name="email" placeholder="Email" required />
                <input type="password" class="reg-input" id="Pass" name="Pass" placeholder="Password" required />
                <input type="password" class="reg-input" id="rePass" name="rePass" placeholder="Confirm Password" required />
                <select id="usertype" name="usertype" class="reg-input" required>
                    <option value="" disabled selected hidden>Register As:</option>
                    <option value="3">Tourist</option>
                    <option value="4">Service Provider</option>
                </select>
                <button type="submit" id="registerbtn" name="registerbtn" value="registerbtn" class="registerbtn">Register</button>
                -->

    <?php
    require './DbConfig.php';
    if (isset($_POST['registerbtn'])) {
        $hasedPass = password_hash($_POST["Pass"], null);
        $first = $_POST["fname"];
        $last = $_POST["lname"];
        $address = $_POST["address"];
        $email = $_POST["email"];
        $psw = $hasedPass;
        $isActive = true;
        $userType = $_POST["usertype"];
        $createdDate = date('Y-m-d H:i:s');

        $sql = "SELECT * FROM user WHERE email= '" . $email . "'";
        $result = $conn->query($sql);
        if ($result) {
            if ($result->num_rows > 0) {
                echo '<script language = "javascript">';
                echo 'alert("Email Already Exists :( ")';
                echo '</script>';
            } else {
                $sqltwo = "INSERT INTO user (user_Id, first_name, last_name, address, email, password, isActive,  user_type, created_date)
                                    VALUES (0,'$first','$last','$address','$email','$psw','$isActive', '$userType', '$createdDate' )";

                if ($conn->query($sqltwo) === TRUE) {
                    echo '<script language = "javascript">';
                    echo 'success()';
                    echo '</script>';
                } else {
                    echo '<script language = "javascript">';
                    echo 'alert("Unsuccessfully :( ")';
                    echo '</script>';
                }
                $conn->close();
            }
        }
    }

    ?>
    <!--
            </form>
            <a href="./Login.php">
                <p class="have-account">already have an account?</p>
            </a>
        </div>
    </div>
-->

</body>

</html>