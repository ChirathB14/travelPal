<?php
// session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $title; ?>
    </title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/travelPal/css/styles.css">
</head>

<body>
    <?php
    if (!isset($_SESSION['user_id'])) {
        echo "
        <div class=\"header\">
            <div class=\"navigationbar\">
                <div class=\"nav-Logo\">
                    <img src=\"/travelPal/assets/logo tpal.png\" alt=\"TRAVELPal\">
                </div>
                <div class=\"menu\">
                    <button class=\"nav\" onclick=\"location.href = '/travelPal/index.php';\">HOME</button>
                    <button class=\"nav\">TOUR PLAN</button>
                    <button class=\"nav\" onclick=\"location.href = '/travelPal/contactus.php';\">CONTACT US</button>
                    <button class=\"nav\">BLOGS</button>
                    <button class=\"logout-btn\" onclick=\"location.href = '/travelPal/register.php';\" >REGISTER</button>
                    <button class=\"logout-btn\" onclick=\"location.href = 'login.php';\" ><i class=\"fa fa-user fa-lg\" aria-hidden=\"true\"></i>LOG IN</button>
                </div>            
            </div>
            <div class=\"navigationbarfoot\">
                <hr>  
            </div>    
        </div> ";
    } else {
        echo "
        <div class=\"header\">
            <div class=\"navigationbar\">
                <div class=\"nav-Logo\">
                    <img src=\"/travelPal/assets/logo tpal.png\" alt=\"TRAVELPal\">
                </div>
                <div class=\"menu\">
                    <button class=\"nav\" onclick=\"location.href = '/travelPal/index.php';\">HOME</button>
                    <button class=\"nav\"onclick=\"location.href = '/travelPal/tourplan-pre.php';\">TOUR PLAN</button>
                    <button class=\"nav\">CONTACT US</button>
                    <button class=\"nav\">BLOGS</button>
                    <button class=\"nav\">PROFILE</button>
                    <button class=\"logout-btn\" onclick=\"location.href = 'logout.php';\" ><i class=\"fa fa-user fa-lg\" aria-hidden=\"true\"></i>LOG OUT</button>
                </div>            
            </div>
            <div class=\"navigationbarfoot\">
                <hr>  
            </div>    
        </div> ";
    }
    ?>