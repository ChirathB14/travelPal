<script src="sweetalert2.all.min.js"></script>

<?php
session_start();
require "../../DbConfig.php";
$commonID = $_GET['common'];
$accID = $_GET['acc'];
$vehID = $_GET['veh'];
$guideID = $_GET['guide'];
$price = $_GET['price'];
$_SESSION["common"] = $commonID;

$update = "UPDATE user_tours SET accomadation_id='$accID', vehicle_id='$vehID', guide_id='$guideID', final_price ='$price', status ='2'  WHERE common_id= '$commonID'";

if ($conn->query($update) === TRUE) {
    echo '<script language = "javascript">';
    echo 'Swal.fire({
        title: "Successfully Updated",
        text: "",
        icon: "success",
        confirmButtonText: "OK",
        confirmButtonColor: "var(--primarycolor)",
        footer: "TravelPal"
        })';
    // echo 'alert("Update Success")';
    echo '</script>';
    header("location:../stripe/checkout.php");
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
    // echo 'alert("Unsuccessfull :( ")';
    echo '</script>';
}
$conn->close();