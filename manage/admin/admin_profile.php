<?php 
session_start();
require_once('../../inc/connection.php');
require_once('../../inc/functions.php');
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
    $Name=$user['firstName']." ".$user['lastName'];
    $sitemanager_list .= "<td>$Name</td>";
    $sitemanager_list .= "<td>{$user['email']}</td>";
    // $user_list .= "<td><a href=''><i class="fa-regular fa-pen-to-square"></i></a></td>";
    // $user_list .= "<td><a href=''><i class="fa-solid fa-trash-can"></i></a></td>";
    $sitemanager_list .= "</tr>";
}
?>

<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="../../css/admin/adminstyle.css">
</head>

<body>
    <div class="header">
        <div class="navigationbar">
            <div class="nav-Logo">
                <img src="../../assets/logo tpal.png" alt="TRAVELPal">
            </div>
            <div class="menu">
                <button class="nav">HOME</button>
                <button class="nav">TOUR PLAN</button>
                <button class="nav">CONTACT US</button>
                <button class="nav">BLOGS</button>
                <button class="nav-select">PROFILE</button>
                <button class="logout-btn" onclick="location.href = 'logout.php';" ><i class="fa fa-user fa-lg" aria-hidden="true"></i>LOG OUT</button>
            </div>            
        </div>
        <div class="navigationbarfoot">
            <hr>  
        </div>    
    </div>
    <div class="body">
        <div class="dashboard">
            <img src="../../assets/profile.png" alt="">
            <button class="select" onclick="location.href = 'admin_profile.php';">SITE MANAGER</button>
            <button onclick="location.href = 'admin_tourist.php';">TOURIST</button>
            <button onclick="location.href = 'accomodation_provider.php';">ACCOMODATION PROVIDER</button>
            <button onclick="location.href = 'vehicle_provider.php';">VEHICLE PROVIDER</button>
            <button onclick="location.href = 'tourist_guide.php';">TOURIST GUIDE</button>
            
        </div>
        <div class="content">
            <h1>SITE MANAGER</h1>
            <table class="masterlist">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <!-- <th>Last login</th> -->
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php echo $sitemanager_list; ?>
        </table>
            
        <a href="add_siteManager.php">+ Site Manager</a>   

        </div>
    </div>
    </div>
    <div class="footer">
        <hr>
        <p>© 2022 TRAVEL PAL ALL RIGHTS RESERVED</p>
    </div>
</body>
<?php mysqli_close($connection); ?>
