<head>
    <script type="text/javascript" src="../../js/profile.js"></script>
</head>

<?php
// Get the email and new password from the form
$email = $_POST['email'];

require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Connect to the database
require "../DbConfig.php";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the email exists in the database
$stmt = $conn->prepare("SELECT * FROM user WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo '<script language ="javascript">';
    echo 'onError("Invalid email","ForgotPassword.php")';
    echo '</script>';
} else {
    // Generate OTP and send it to user's email
    $otp = rand(100000, 999999);

    // Send email using PHPMailer
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Port = "25";
    $mail->Username = "system.travelpal@gmail.com";
    $mail->Password = "xpfvfzzfmorncftc";
    $mail->Subject = "Your verify code";

    $mail->setFrom('system.travelpal@gmail.com');
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Body = "<p>Dear user, </p> 
                   <p>Your OTP verify code is <b>$otp</b><br></p>
                   <p>Regards,</p>
                   <p>TravelPal</p>";

    if ($mail->send()) {
        $stmt = $conn->prepare("UPDATE user SET otp=? WHERE email=?");
        $stmt->bind_param("ss", $otp, $email);
        $stmt->execute();
        // Redirect to OTP verification page passing the email as a parameter
        header('Location: verify_otp.php?email=' . $email);
    } else {
        // Display an error message if email was not sent successfully
        echo '<script language ="javascript">';
        echo 'onError("Mail Not Sent!Try again.","ForgotPassword.php")';
        echo '</script>';
    }
}

$conn->close();
