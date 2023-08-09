<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/registration.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript" src="../js/register.js"></script>
    <script type="text/javascript" src="../js/checkAccess.js"></script>
    <script src="sweetalert2.all.min.js"></script>
    
    <link rel="icon" type="image/x-icon" href="/travelPal/favicon.ico">

    <style>
        .input-elements {
            width: 650px;
        }

        .register-inputs {
            display: inline-block;
        }

        .register-inputs label {
            padding-top: 20px !important;
            font-size: 18px;
        }

        .register-inputs input {
            float: right;
            width: 400px;
        }

        .register-inputs select {
            float: right;
            width: 400px;
        }

        .new-user { 
            align-items: center;
        }
    </style>
</head>

<?php
    $title = "TravePal";
    require_once("Common/header.php");
?>

<body class="registration" onload="loginRegisterAccess()">
    <div class="register">
        <form action="RegisterUser.php" method="post" onsubmit="return cheakpassword()">
            <!-- <button class="back-button" onclick="history.back()">
                < Back</button> -->
                    <h1 id="heder-login">Create an Account</h1>
                    <div class="input-elements">
                        <div class="register-inputs">
                            <label for="">First Name :</label>
                            <input type="text" name="fname" id="fname" placeholder=" FIRST NAME" required oninvalid="this.setCustomValidity('Enter first name')" oninput="this.setCustomValidity('')">
                        </div>

                        <div class="register-inputs">
                            <label for="">Last Name :</label>
                            <input type="text" name="lname" id="lname" placeholder=" LAST NAME" required oninvalid="this.setCustomValidity('Enter last name')" oninput="this.setCustomValidity('')">
                        </div>

                        <div class="register-inputs">
                            <label for="">Address :</label>
                            <input type="text" name="address" id="address" placeholder=" ADDRESS" required oninvalid="this.setCustomValidity('Enter address')" oninput="this.setCustomValidity('')" />
                        </div>
                        
                        <div class="register-inputs">
                            <label for="">Email :</label>
                            <input type="email" name="email" id="email" placeholder=" EMAIL" required pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$">
                        </div>
                        
                        <div class="register-inputs">
                            <label for="">Password :</label>
                            <input type="password" name="Pass" id="Pass" placeholder=" PASSWORD" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$" title="Must include atleast 1 uppercase letter, 1 lowercase letter, 1 number and 1 special character.
                            Should be more than 8 characters and less than 16 characters.">
                        </div>
                        
                        <div class="register-inputs">
                            <label for="">Confirm Password :</label>
                            <input type="password" name="rePass" id="rePass" placeholder=" CONFIRM PASSWORD" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$" title="Must include atleast 1 uppercase letter, 1 lowercase letter, 1 number and 1 special character.
                            Should be more than 8 characters and less than 16 characters.">
                        </div>
                        
                        <div class="register-inputs">
                            <label for="">User Type :</label>
                            <select id="usertype" name="usertype" required style="width: 400px;  margin-top: 12px; 
                                background-color: var(--accentcolor); opacity: 0.75; height: 40px;
                                box-sizing: border-box; border: none; border-radius: 5px;
                                font-size: 14px; font-weight: bold; color:#808080;">
                                <option value="" disabled selected hidden> &nbsp;REGISTER AS</option>
                                <option value="3">Tourist</option>
                                <option value="4">Service Provider</option>
                            </select>
                        </div>
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
                echo 'Swal.fire({
                    title: "Email Already Exists :( ",
                    text: "Please try again",
                    icon: "error",
                    confirmButtonText: "OK",
                    confirmButtonColor: "var(--primarycolor)",
                    footer: "TravelPal"
                    })';
                // echo 'alert("Email Already Exists :( ")';
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
                    echo 'Swal.fire({
                        title: "Unsuccessfull :( ",
                        text: "Please try again",
                        icon: "error",
                        confirmButtonText: "OK",
                        confirmButtonColor: "var(--primarycolor)",
                        footer: "TravelPal"
                        })';
                    // echo 'alert("Unsuccessfully :( ")';
                    echo '</script>';
                }
                $conn->close();
            }
        }
    }

    ?>

</body>

<footer>
        <hr>
        <div class="footer-bottom">
                © <?php echo date("Y"); ?> TRAVEL PAL ALL RIGHTS RESERVED
        </div>
</footer>

</html>