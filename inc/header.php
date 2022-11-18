<?php
session_start();
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
    <link rel="stylesheet" href="./css/main.css">
</head>

<body>
    <?php 
    if(!isset($_SESSION['user_id'])){
        echo 
        "<div class=\"header\">
            <a href=\"#landing\" class=\"logo\">CompanyLogo</a>
            <div class=\"nav\">
                <a class=\"active\" href=\"#home\">HOME</a>
                <a href=\"#tour-plan.php\">TOUR PLAN</a>
                <a href=\"#contact-us.php\">CONTACT US</a>
                <a href=\"#blog.php\">BLOG</a>
            </div>
            <div class=\"header-right\">
                <a href=\"#register.php\" class=\"register-btn\">REGISTER</a>
                <a href=\"login.php\" class=\"login-btn\">LOGIN</a>
            </div>
        </div>";
    }else{
        echo 
        "<div class=\"header\">
            <a href=\"#landing\" class=\"logo\">CompanyLogo</a>
            <div class=\"nav\">
                <a class=\"active\" href=\"#home\">HOME</a>
                <a href=\"#tour-plan.php\">TOUR PLAN</a>
                <a href=\"#contact-us.php\">CONTACT US</a>
                <a href=\"#blog.php\">BLOG</a>
                <a href=\"#profile.php\">PROFILE</a>
            </div>
            <div class=\"header-right\">
                <a href=\"logout.php\" class=\"logout-btn\">LOGOUT</a>
            </div>
        </div>";
        
    }
?>
