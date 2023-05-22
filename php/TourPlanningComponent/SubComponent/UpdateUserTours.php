<?php
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';
require '../../PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;

require "../../DbConfig.php";
$commonID = $_GET['common'];
$accID = $_GET['acc'];
$vehID = $_GET['veh'];
$guideID = $_GET['guide'];
$price = $_GET['price'];

$startDatesql= "SELECT start_date FROM user_tours WHERE common_id = '$commonID'";
$startDateRes = $conn->query($startDatesql);
//get the start_date from startDate object
while ($row = $startDateRes->fetch_assoc()){
    $startDate = $row['start_date'];
}
// $startDate = '2021-08-20';

function getEmail($table, $id, $conn, $column){
    $sql = "SELECT email FROM $table WHERE $column = '$id'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()){
        $email = $row['email'];
    }
    return $email;
}

function getEmails($commonID, $conn){
    $spIdsSql = "SELECT accomadation_id,vehicle_id, guide_id FROM user_tours WHERE common_id = '$commonID'";
    $spIds = $conn->query($spIdsSql);
    while ($reservation = $spIds->fetch_assoc()){
        $accID = $reservation['accomadation_id'];
        $vehID = $reservation['vehicle_id'];
        $guideID = $reservation['guide_id'];
    }

    //retrieve emails
    $accEmail = getEmail("accomadation_service", $accID, $conn, 'accomadation_Id');
    $vehEmail = getEmail("vehicle_service", $vehID, $conn, 'vehicle_Id');
    $guideEmail = getEmail("tour_guide", $guideID, $conn, 'guide_Id');

    $emails = array($accEmail, $vehEmail, $guideEmail);

    return $emails;
}

$update = "UPDATE user_tours SET accomadation_id='$accID', vehicle_id='$vehID', guide_id='$guideID', final_price ='$price', status ='2'  WHERE common_id= '$commonID'";

if ($conn->query($update) === TRUE) {

    $emails = getEmails($commonID, $conn);
    // Send email using PHPMailer
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Port = "25";
    $mail->Username = "system.travelpal@gmail.com";
    $mail->Password = "xpfvfzzfmorncftc";
    $mail->Subject = "You have a reservation - TravelPal";

    $mail->setFrom('system.travelpal@gmail.com');

    //loop through the emails array and add each email to the recipient list
    foreach ($emails as $email) {
        $mail->addBCC($email);
    }

    $mail->isHTML(true);
    $mail->Body = "<p>Hi,</p>
                    <p>You have a reservation on <b>$startDate</b></p>
                    <p>Kindly log in to your TravelPal account to see the full details.</p>
                    <p>Regards,</p>
                    <a href='http://localhost/travelPal'>TravelPal</a>";
    if ($mail->send()) {
        echo '<script language = "javascript">';
        echo 'alert("Update Success")';
        echo '</script>';
        header("location:../Payment.php?common=$commonID");
    } else {
        // Display an error message if email was not sent successfully
        echo '<script language = "javascript">';
        echo 'alert("Email send failed! :( ")';
        echo '</script>';
    }
} else {
    echo '<script language = "javascript">';
    echo 'alert("Unsuccessful :( ")';
    echo '</script>';
}
$conn->close();

?>