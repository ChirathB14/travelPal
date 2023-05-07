<?php

require '../../DbConfig.php';
$location = $_POST['location'];
$result = mysqli_query($conn, "SELECT * FROM destinations WHERE location = '$location'");

// Generate an array of cities
$destinations = array();
while ($row = mysqli_fetch_assoc($result)) {
  $destinations[$row['destination_Id']] = $row['destination'];
}

// Return the destinations as a JSON object
header('Content-Type: application/json');
echo json_encode($destinations);
?>
