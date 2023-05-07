<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/header.css">
    <script src="https://kit.fontawesome.com/c82cd88752.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../js/checkAccess.js"></script>
    <title>Travel Pal</title>
</head>

<body onload="checkAccess(false)">
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
</body>

</html>