<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/registration.css">
    <script type="text/javascript" src="../../js/mangerRegister.js"></script>
    <title>Travel Pal</title>
</head>

<body style="background-image: url('../../images/registerBG.png')">
    <div id="overlay">
        <div>
            <center>
                <h2 id="heder-register">create manager account</h2>
            </center>
            <form class="reg-form" method="POST" action="RegisterManager.php" onsubmit="return cheakpassword()">
                <input type="text" class="reg-input" id="fname" name="fname" placeholder="First Name" required />
                <input type="text" class="reg-input" id="lname" name="lname" placeholder="Last Name" required />
                <input type="text" class="reg-input" id="address" name="address" placeholder="Address" required />
                <input type="email" class="reg-input" id="email" name="email" placeholder="Email" required />
                <input type="password" class="reg-input" id="Pass" name="Pass" placeholder="Password" required />
                <input type="password" class="reg-input" id="rePass" name="rePass" placeholder="Confirm Password" required />
                <button type="submit" id="registerbtn" name="registerbtn" value="registerbtn" class="registerbtn">Register</button>
                <?php
                require '../DbConfig.php';
                if (isset($_POST['registerbtn'])) {
                    $hasedPass = password_hash($_POST["Pass"], null);
                    $first = $_POST["fname"];
                    $last = $_POST["lname"];
                    $address = $_POST["address"];
                    $email = $_POST["email"];
                    $psw = $hasedPass;
                    $isActive = true;
                    $userType = 2;
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
            </form>
        </div>
    </div>


</body>

</html>