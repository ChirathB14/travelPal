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

    <title>TravelPal</title>
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

        $userJson = $_COOKIE['user'];
        $userData = json_decode($userJson, true);
        $firstName = isset($userData['FIRST_NAME']) ? $userData['FIRST_NAME'] : '';
        $firstName = trim($firstName);

        echo "
        <div class=\"header\">
            <div class=\"welcome-message\">
                Welcome, $firstName!
            </div>
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
</body>

</html>