<?php
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script type="text/javascript" src="../js/profile.js"></script>
    <script src="sweetalert2.all.min.js"></script>

    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/registration.css">
    <script type="text/javascript" src="../../js/mangerRegister.js"></script>
</head>

<?php
$title = "Register Manager - TravePal";
?>

<body style="background-image: url('../../images/registerBG.png')">
    <div id="overlay">
        <br><br>
        <div class="register" style="margin: 62px 0px 60px 0px;">
            <form class="reg-form" method="POST" action="RegisterManager.php" onsubmit="return cheakpassword()">
                <button class="back-button" onclick="history.back()">
                    < Back</button>
                        <center>
                            <h2 id="heder-register">Create a manager account</h2>
                        </center>
                        <div class="input-elements">
                            <input type="text" id="fname" name="fname" placeholder="  First Name" required />
                            <input type="text" id="lname" name="lname" placeholder="  Last Name" required />
                            <input type="text" id="address" name="address" placeholder="  Address" required />
                            <input type="tel" id="telephone" name="telephone" placeholder="  Telephone Number" required />
                            <input type="email" id="email" name="email" placeholder="  Email" required pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$" />
                            <!-- <input type="password" name="Pass" id="Pass" placeholder=" PASSWORD" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$" title="Must include atleast 1 uppercase letter, 1 lowercase letter, 1 number and 1 special character.
                    Should be more than 8 characters and less than 16 characters.">
                            <input type="password" name="rePass" id="rePass" placeholder=" CONFIRM PASSWORD" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$" title="Must include atleast 1 uppercase letter, 1 lowercase letter, 1 number and 1 special character.
                    Should be more than 8 characters and less than 16 characters."> -->
                            <br>
                            <button type="submit" id="registerbtn" name="registerbtn" value="registerbtn" class="registerbtn">Create Manager Account</button>
                        </div>
                        <?php
                        require '../DbConfig.php';
                        if (isset($_POST['registerbtn'])) {
                            $hasedPass = password_hash($_POST["Pass"], null);
                            $first = $_POST["fname"];
                            $last = $_POST["lname"];
                            $address = $_POST["address"];
                            $telephone = $_POST["telephone"];
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
                                    echo 'Swal.fire({
                                        title: "Email Already Exists :( ",
                                        text: "Please try again",
                                        icon: "error",
                                        confirmButtonText: "OK"
                                        })';
                                    // echo 'alert("Email Already Exists :( ")';
                                    echo '</script>';
                                } else {
                                    // Generate OTP and send it to user's email
                                    $otp = rand(100000, 999999);

                                    $sqltwo = "INSERT INTO user (user_Id, first_name, last_name, address, telephone, email, password, isActive,  user_type, created_date, otp)
                                    VALUES (0,'$first','$last','$address', '$telephone','$email',NULL,'$isActive', '$userType', '$createdDate', '$otp' )";

                                    if ($conn->query($sqltwo) === TRUE) {
                                        // Send email using PHPMailer
                                        $mail = new PHPMailer();
                                        $mail->isSMTP();
                                        $mail->Host = "smtp.gmail.com";
                                        $mail->SMTPAuth = true;
                                        $mail->SMTPSecure = "tls";
                                        $mail->Port = "25";
                                        $mail->Username = "system.travelpal@gmail.com";
                                        $mail->Password = "xpfvfzzfmorncftc";
                                        $mail->Subject = "You were added as a Manager in TravelPal";

                                        $mail->setFrom('system.travelpal@gmail.com');
                                        $mail->addAddress($email);

                                        $mail->isHTML(true);
                                        $mail->Body = "<p>Hi $first $last,</p>
                                                       <p>You were added as a Manager.</p> 
                                                       <p>Your OTP verify code is <b>$otp </b><br></p>
                                                       <p>Use this link to create your password:  <a href='http://localhost/travelPal/php/fogotPassword/verify_otp.php?email=$email'> Click here</a><br></p>
                                                       <p>Regards,</p>
                                                       <a href='http://localhost/travelPal'>TravelPal</a>";
                                        if ($mail->send()) {
                                            echo '<script language = "javascript">';
                                            echo 'success()';
                                            echo '</script>';
                                        } else {
                                            // Display an error message if email was not sent successfully
                                            echo '<script language = "javascript">';
                                            echo 'Swal.fire({
                                                title: "Email send failed! :( ",
                                                text: "Please try again",
                                                icon: "error",
                                                confirmButtonText: "OK"
                                                })';
                                            // echo 'alert("Email send failed! :( ")';
                                            echo '</script>';
                                        }
                                    } else {
                                        echo '<script language = "javascript">';
                                        echo 'Swal.fire({
                                            title: "Unsuccessful :( ",
                                            text: "Please try again",
                                            icon: "error",
                                            confirmButtonText: "OK"
                                            })';
                                        // echo 'alert("Unsuccessful :( ")';
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

<!-- footer
<footer>
        <hr>
        <div class="footer-bottom">
                © <?php echo date("Y"); ?> TRAVEL PAL ALL RIGHTS RESERVED
        </div>
</footer> -->

</html>