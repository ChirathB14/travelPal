<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/main.css">
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/favicon-16x16.png">
    <link rel="icon" type="image/x-icon" href="/travelPal/favicon.ico">

    <link rel="stylesheet" href="../../css/header.css">
    <script src="https://kit.fontawesome.com/c82cd88752.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../js/checkAccess.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Travel Pal</title>
</head>

<body onload="checkAccess(false)">
    <?php
    if (!isset($_COOKIE['user'])) {
        echo "
        <div class=\"header\">
            <div class=\"navigationbar\">
                <div class=\"nav-Logo\">
                    <a href=\"/travelPal/index.php\">
                        <img src=\"/travelPal/images/logo.png\" alt=\"TRAVELPal\">
                    </a>
                </div>
                <div class=\"menu\">
                    <button class=\"nav\" onclick=\"location.href = '/travelPal/index.php';\">HOME</button>
                    <button class=\"nav\"onclick=\"location.href = '/travelPal/php/TourPlanningComponent/TourPlanningIndex.php';\">TOUR PLAN</button>
                    <button class=\"nav\" onclick=\"location.href = '/travelPal/php/Blog/ContactUS.php';\">CONTACT US</button>
                    <button class=\"nav\"onclick=\"location.href = '/travelPal/php/Blog/ViewBlogs.php';\">BLOGS</button>
                    <button class=\"logout-btn\" id=\"register\"  onclick=\"location.href = '/travelPal/php/RegisterUser.php';\" >REGISTER</button>
                    <button class=\"logout-btn\" id=\"login\" onclick=\"location.href = '/travelPal/php/Login.php';\" ><i class=\"fa fa-user fa-lg\" aria-hidden=\"true\"></i>&nbsp;&nbsp;LOG IN</button>
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
                    <a href=\"/travelPal/index.php\">
                        <img src=\"/travelPal/images/logo.png\" alt=\"TRAVELPal\">
                    </a>
                </div>
                <div class=\"menu\">
                    <button class=\"nav\" onclick=\"location.href = '/travelPal/index.php';\">HOME</button>
                    <button class=\"nav\"onclick=\"location.href = '/travelPal/php/TourPlanningComponent/TourPlanningIndex.php';\">TOUR PLAN</button>
                    <button class=\"nav\"onclick=\"location.href = '/travelPal/php/Blog/ContactUS.php';\">CONTACT US</button>
                    <button class=\"nav\"onclick=\"location.href = '/travelPal/php/Blog/ViewBlogs.php';\">BLOGS</button>
                    <button class=\"nav\"onclick=\"location.href = '/travelPal/php/ProfileComponent/Profile.php';\">PROFILE</button>
                    <button class=\"logout-btn\" id=\"logout\" onclick=\"logOut()\"><i class=\"fa fa-user fa-lg\" aria-hidden=\"true\"></i>&nbsp;&nbsp;LOG OUT</button>
                </div>            
            </div>
            <div class=\"navigationbarfoot\">
                <hr>  
            </div>    
        </div> ";
    }
    ?>


    <!--
    <ul class="header-ul">
        <li class="header-left-li"><img class="headerbtm" src="../../images/logo.png" alt="logo" width="150" height="50"></li>
        <li class="header-left-li"><a class="header-left-li a" href="../../index.php">Home</a></li>
        <li class="header-left-li"><a class="header-left-li a" href="../TourPlanningComponent/TourPlanningIndex.php">Tour Plan</a></li>
        <li class="header-left-li"><a class="header-left-li a" href="../Blog/ContactUS.php">Contact Us</a></li>
        <li class="header-left-li"><a class="header-left-li a" href="../Blog/ViewBlogs.php">Blogs</a></li>
        <li class="header-left-li"><a class="header-left-li a" id="profile" href="../../php/ProfileComponent/Profile.php">Profile</a></li>
        <li class="header-right-li"><a class="header-left-li a" id="login" href="../../php/Login.php"><button class="button-login" href="../Blog/ViewBlogs.php"><img src="../../images/User-Icon.png" alt="logo" width="20" height="20" style="margin-right: 10px;">Login</button></a></li>
        <li class="header-right-li"><a class="header-left-li a" id="register" href="../../php/RegisterUser.php"><button class="button-register" href="../Blog/ViewBlogs.php"><img src="../../images/User-Icon.png" alt="logo" width="20" height="20" style="margin-right: 10px;">Register</button></a></li>
        <li class="header-right-li"><a class="header-left-li a" id="logout" onclick="logOut()"><button class="button-login" href="../Blog/ViewBlogs.php"><img src="../../images/User-Icon.png" alt="logo" width="20" height="20" style="margin-right: 10px;">Logout</button></a></li>
    </ul>
    <hr style="background-color: #327972;color:#327972" />
-->
</body>

</html>