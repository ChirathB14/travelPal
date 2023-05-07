<?php
require "../../DbConfig.php";
$commonID = $_GET['common'];
$accID = $_GET['acc'];
$vehID = $_GET['veh'];
$guideID = $_GET['guide'];
$price = $_GET['price'];

$update = "UPDATE user_tours SET accomadation_id='$accID', vehicle_id='$vehID', guide_id='$guideID', final_price ='$price', status ='2'  WHERE common_id= '$commonID'";

if ($conn->query($update) === TRUE) {
    echo '<script language = "javascript">';
    echo 'alert("Update Success")';
    echo '</script>';
    header("location:../Payment.php?common=$commonID");
    
} else {
    echo '<script language = "javascript">';
    echo 'alert("Unsuccessfull :( ")';
    echo '</script>';
}
$conn->close();

?>