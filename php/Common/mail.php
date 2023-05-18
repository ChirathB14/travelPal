<head>
    <script type="text/javascript" src="../../js/profile.js"></script>
</head>

<?php
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

$subject = $_POST['subject'];
$message = $_POST['message'];
$email = $_POST['email'];

 


// Send email using PHPMailer
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";
$mail->Port = "25";
$mail->Username = "system.travelpal@gmail.com";
$mail->Password = "xpfvfzzfmorncftc";
$mail->Subject = $subject;
$mail->setFrom('system.travelpal@gmail.com');
$mail->addAddress($email);
$mail->isHTML(true);
$mail->Body = $message;

if ($mail->send()) {

} else {

}


$conn->close();
