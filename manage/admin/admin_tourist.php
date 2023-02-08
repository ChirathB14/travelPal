<?php 
session_start();
require_once('../../inc/connection.php');
require_once('../../inc/functions.php');

//checking if the user is logged in
if (!$_SESSION['user_id']) {
    header('Location: login.php');
}

$sitemanager_list = '';
$query = "SELECT * FROM users
INNER JOIN sitemanager ON users.userID=sitemanager.userID";

// echo $query;
// die();

$users = mysqli_query($connection, $query);

// verify_query($users);
// $user = mysqli_fetch_assoc($users);
// var_dump($user);
// die();

while ($user = mysqli_fetch_assoc($users)) {
    $sitemanager_list .= "<tr>";
    $FullName=$user['firstName']." ".$user['lastName'];
    $sitemanager_list .= "<td>$FullName</td>";
    $sitemanager_list .= "<td>{$user['email']}</td>";
    // $user_list .= "<td><a href=''><i class="fa-regular fa-pen-to-square"></i></a></td>";
    // $user_list .= "<td><a href=''><i class="fa-solid fa-trash-can"></i></a></td>";
    $sitemanager_list .= "</tr>";
}


?>

<?php require_once('../../inc/connection.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin_view | TravelPal</title>

    <!-- CSS Import -->
    <link rel="stylesheet" href="../../css/admin-styles.css">   

    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<?php
require_once("../../inc/header.php");
?>
    <div class="body">
        <div class="dashboard">
            <img src="../../assets/profile.png" alt="">
            <p><?php echo $_SESSION['firstName']; ?></p>
            <button class="select" onclick="location.href = 'admin_profile.php';">SITE MANAGER</button>
            <button class="nav" onclick="location.href = 'admin_tourist.php';">TOURIST</button>
            <button class="nav" onclick="location.href = 'accomodation_provider.php';">ACCOMODATION PROVIDER</button>
            <button class="nav" onclick="location.href = 'vehicle_provider.php';">VEHICLE PROVIDER</button>
            <button class="nav" onclick="location.href = 'tourist_guide.php';">TOURIST GUIDE</button>
        </div>
        <div class="content">
            <h1>TOURIST</h1>
            <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <!-- <th>Last login</th> -->
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php echo $sitemanager_list; ?>   
        </table>
            
        </div>
    </div>
    </div>
    <div class="footer">
        <hr>
        <p>© 2022 TRAVEL PAL ALL RIGHTS RESERVED</p>
    </div>
</body>
</html>