<?php 
session_start();
require_once('../../inc/connection.php');
require_once('../../inc/functions.php');

//checking if the user is logged in
if (!$_SESSION['user_id']) {
    header('Location: login.php');
}

$guide_list = '';
$query = "SELECT * FROM users
INNER JOIN tourguide ON users.userID=tourguide.serviceProfileID";

$users = mysqli_query($connection, $query);
?>

<?php
while ($user = mysqli_fetch_assoc($users)) {
    $guide_list .= "<tr>";
    $FullName=$user['firstName']." ".$user['lastName'];
    $guide_list .= "<td>$FullName</td>";
    $guide_list .= "<td>{$user['email']}</td>";
    $guide_list .= "<td><button><a href=\"modify-user.php?user_id={$user['userID']}\" onclick=\"return confirm('Are you sure you want to edit this record?');\">Edit</a></button></td>";
    $guide_list .= "<td><button><a href=\"delete-user.php?user_id={$user['userID']}\" onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</a></button></td>";
    $guide_list .= "</tr>";
}
?>

<?php 
$title = "Tour Guide - View";
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
                <button onclick="location.href = 'accomodation_provider.php';">Accommodation Provider</button>
                <button onclick="location.href = 'vehicle_provider.php';">Vehicle Provider</button>
                <button class="active" onclick="location.href = 'tourist_guide.php';">Tourist Guide</button>
                <br> <br> <br> <br> <br>
            </div> 
        </div>

        
    <div class="content">
        <h2>Tour Guide</h2>
        <table class="admin-table">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <!-- <th>Last login</th> -->
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php echo $guide_list; ?>   
        </table>
    </div>
    </div>
</div>

<?php
require_once("../../inc/footer.php");
?>

<?php mysqli_close($connection); ?>