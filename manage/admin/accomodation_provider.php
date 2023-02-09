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

<?php 
$title = "Accommodation Provider - View";
require_once('../../inc/header.php') 
?>

<head>
    <!-- CSS Import -->
    <link rel="stylesheet" href="../../css/main.css" type="text/css">
    <link rel="stylesheet" href="../../css/admin-styles.css">
</head>

<div class="body">
    <!-- Profile page content -->
    <div class="page-content">
        <!-- Dashboard - Service Provider -->
        <div class="Dashboard">
            <div class="Dashboard-top">
                <img src="../../assets/profile.png" alt="Profile pic">
                <h4><?php echo $_SESSION['full_name']; ?></h4>
            </div>
            <div class="Dashboard-bottom">
                <button onclick="location.href = 'admin_profile.php';">Site Manager</button>
                <button onclick="location.href = 'admin_tourist.php';">Tourist</button>
                <button class="active" onclick="location.href = 'accomodation_provider.php';">Accommodation Provider</button>
                <button onclick="location.href = 'vehicle_provider.php';">Vehicle Provider</button>
                <button onclick="location.href = 'tourist_guide.php';">Tourist Guide</button>
                <br> <br> <br> <br> <br>
            </div> 
        </div>

        
    <div class="content">
        <h2>Accommodation Provider</h2>
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

<?php
require_once("../../inc/footer.php");
?>

<?php mysqli_close($connection); ?>