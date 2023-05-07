<?php

require '../../DbConfig.php';
$service = $_POST['service'];
$userID = json_decode($_COOKIE['user'])->user_Id;

$serviceDetails = array();
if ($service == "Accomadation") {
    $result = mysqli_query($conn, "SELECT * FROM accomadation_service WHERE status= '" . 2 . "' AND created_by= '" . $userID ."'");
    while ($row = mysqli_fetch_assoc($result)) {
        $serviceDetails[$row['accomadation_Id']] = $row['service_no'];
    }
}else if ($service == "Vehicle"){
    $result = mysqli_query($conn, "SELECT * FROM vehicle_service WHERE status= '" . 2 . "' AND created_by= '" . $userID ."'");
    while ($row = mysqli_fetch_assoc($result)) {
        $serviceDetails[$row['vehicle_Id']] = $row['service_no'];
    }
}else{
    $result = mysqli_query($conn, "SELECT * FROM tour_guide WHERE status= '" . 2 . "' AND created_by= '" . $userID ."'");
    while ($row = mysqli_fetch_assoc($result)) {
        $serviceDetails[$row['guide_Id']] = $row['service_no'];
    }
}



// Return the serviceDetails as a JSON object
header('Content-Type: application/json');
echo json_encode($serviceDetails);
