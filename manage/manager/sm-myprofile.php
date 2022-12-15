<?php session_start();?>
<?php require_once('../inc/connection.php')?>
<?php if(!isset($_SESSION['userID'])){
    header('Location: login.php');
}
$errors = array();
$user_id = '';
$first_name = '';
$last_name = '';
$email = '';
$password = '';

if (isset($_SESSION['userID'])) {
    //getting the user information
    $user_id = mysqli_real_escape_string($connection, $_SESSION['userID']);
    $query = "SELECT * 
              FROM users u, sitemanager s
              WHERE u.userID = {$user_id} 
                    AND u.userID = s.userID
              LIMIT 1";

    $result_set = mysqli_query($connection, $query);

    if ($result_set) {
        if (mysqli_num_rows($result_set) == 1) {
            //user found
            $result = mysqli_fetch_assoc($result_set);
            $first_name = $result['firstName'];
            $last_name = $result['lastName'];
            $email = $result['email'];
        } else {
            //user not found
            header('Location: sm-updateprofile.php?err=user_not_found');
        }
    } else {
        //query unsuccessful
        header('Location: sm-updateprofile.php?err=query_failed');
    }
}

if (isset($_POST['submit'])) {

    $user_id = $_POST['user_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    $req_fields = array('user_id', 'first_name', 'last_name', 'email');

    //checking required fields
    $errors = array_merge($errors, check_req_fields($req_fields));

    //checking maxlength
    $max_len_fields = array('first_name' => 50, 'last_name' => 50, 'email' => 50);

    //checking required fields
    $errors = array_merge($errors, check_max_length($max_len_fields));

    //checking email address
    if (!is_email($_POST['email'])) {
        $errors[] = 'Email address is invalid.';
    }

    //checking email is existing
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $query = "SELECT * 
              FROM users u, sitemanager s
              WHERE email = '{$email}' 
                    AND u.userID != {$user_id} 
                    AND u.userID = s.userID
              LIMIT 1";

    $result_set = mysqli_query($connection, $query);

    verify_query($result_set);

    if (mysqli_num_rows($result_set) == 1) {
        $errors[] = "Email address already exists.";
    }


    if (empty($errors)) {
        //adding new record
        $first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($connection, $_POST['last_name']);

        $query = "UPDATE Users 
                  SET firstName = '{$first_name}',
                      lastName = '{$last_name}',
                      email = '{$email}'
                   WHERE userID = {$user_id} LIMIT 1";

        $result = mysqli_query($connection, $query);

        if ($result) {
            //query succes..redirecting to users page
            header('Location: sm-updateprofile.php?profile_updated=true');
        } else {
            $errors[] = 'Failed to update the profile.';
        }
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="header">
        <div class="navigationbar">
            <div class="nav-Logo">
                <img src="css/logo tpal.png" alt="TRAVELPal">
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
            <img src="css/profile.png" alt="">
            <p><?php echo $_SESSION['firstName']; ?></p>
            <button class="select" onclick="location.href = 'sm-myprofile.php';">MY PROFILE</button>
            <button class="nav" onclick="location.href = 'sm-updateprofile.php';">UPDATE PROFILE</button>
            <button class="nav" onclick="location.href = 'sm-GenerateReport.php';">GENERATE REPORT</button>
            <button class="nav" onclick="location.href = 'sm-CreateTourPlan.php';">CREATE TOUR PLAN</button>
            <button class="nav" onclick="location.href = 'sm-AP.php';">ACCOMMODATION PROVIDER</button>
            <button class="nav" onclick="location.href = 'sm-VP.php';">VEHICLE PROVIDER</button>
            <button class="nav" onclick="location.href = 'sm-TG.php';">TOURIST GUIDE</button>
        </div>
        <div class="content">
            <h1>PROFILE</h1>
            <table class="table">
                <tr class="row">
                    <td><?php echo "YOUR ID : " . $user_id;?></td>
                </tr>
                <tr class="row">
                    <td><?php echo "FIRST NAME : " . $first_name;?></td>
                </tr>
                <tr class="row">
                    <td><?php echo "LAST NAME : " . $last_name;?></td>
                </tr>
                <tr class="row">
                    <td><?php echo "EMAIL : " . $email;?></td>
                </tr>
            </table>

        </div>
    </div>
    <div class="footer">
        <hr>
        <p>© 2022 TRAVEL PAL ALL RIGHTS RESERVED</p>
    </div>
</body>
</html>