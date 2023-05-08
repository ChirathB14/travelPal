<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/main.css">
    
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/newFooter.css">
    <script type="text/javascript" src="./js/checkAccess.js"></script>

    <!--
    <style>
        .container {
            display: flex;
        }

        .left-side,
        .right-side {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .content {
            text-align: center;
        }

        .subheading {
            margin-bottom: 10px;
            font-family: 'Poppins', sans-serif;
            font-style: normal;
            font-weight: 900;
            font-size: 17px;
            line-height: 26px;

            /* identical to box height */
            letter-spacing: 0.21em;
            text-transform: uppercase;

            /* selected colour2 */
            color: #327972;
        }

        .heading {

            font-family: 'Poppins', sans-serif;
            font-style: normal;
            font-weight: 900;
            font-size: 60px;
            line-height: 90px;
            letter-spacing: 0.07em;
            text-transform: uppercase;

            /* White */
            color: #FFFFFF;

            text-shadow: 0px 4px 8px rgba(0, 0, 0, 0.25);
        }

        .heading2 {
            margin-bottom: 10px;

            font-family: 'Poppins', sans-serif;
            font-style: normal;
            font-weight: 900;
            font-size: 60px;
            line-height: 90px;
            letter-spacing: 0.07em;
            text-transform: uppercase;
            color: #EEB444;

            text-shadow: 0px 4px 8px rgba(0, 0, 0, 0.25);
        }

        .description {
            font-family: 'Poppins', sans-serif;
            font-style: normal;
            font-weight: 400;
            font-size: 17px;
            line-height: 26px;

            /* identical to box height */

            /* White */
            color: #FFFFFF;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        /* second part */
        .container2 {
            display: flex;
        }

        .left-side2,
        .right-side2 {
            width: 100%;
            padding: 30px;
        }

        .left-side2 {
            background: #327972;
        }

        .right-side2 {
            background: #EEB444;
        }

        .title2 {
            margin-bottom: 10px;
            font-family: 'Poppins', sans-serif;
            font-style: normal;
            font-weight: 900;
            font-size: 24px;
            line-height: 26px;

            /* identical to box height */
            letter-spacing: 0.21em;
            text-transform: uppercase;

            /* selected colour2 */
            color: #fff;
        }

        .description2 {
            font-size: 18px;
            line-height: 1.5;
            font-family: 'Poppins', sans-serif;
            font-style: normal;
            font-weight: 600;

            /* identical to box height */
            letter-spacing: 0.21em;

            /* selected colour2 */
            color: #fff;
        }

        .offers-head {

            font-family: 'Poppins', sans-serif;
            font-style: normal;
            font-weight: 900;
            font-size: 36px;
            line-height: 54px;

            /* identical to box height */
            letter-spacing: 0.07em;
            text-transform: uppercase;
            color: #FFFFFF;
        }

        /* third section */
        .container3 {
            display: flex;
            flex-wrap: wrap;
            background: #327972;
        }

        .row3 {
            display: flex;
            width: 100%;
            justify-content: space-evenly;
            align-items: center;
            margin-bottom: 20px;
            margin: 10px;
        }

        .box3 {
            width: calc((100% / 3) - 100px);
            /* width for three boxes per row, minus spacing */
            background-color: #eee;
            padding: 20px;
            box-sizing: border-box;
            margin-right: 20px;
            background: #00357A;
            border-radius: 15px;
            height: 200px;
            /* spacing between boxes */
        }

        .box3:last-child {
            margin-right: 0;
            /* remove spacing for the last box in a row */
        }

        .title3 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .description3 {
            font-size: 18px;
            line-height: 1.5;
        }

        .reg-btn {
            background: #EEB444;
            border-radius: 5px;
            font-family: 'Poppins', sans-serif;
            font-style: normal;
            font-weight: 800;
            font-size: 28px;
            line-height: 42px;
            text-align: center;
            letter-spacing: 0.1em;
            text-transform: uppercase;

            color: #FFFFFF;
            margin: 30px 0px;
            padding: 10px;
        }

    </style>
    -->
</head>

<?php
    $title = "Home - TravePal";
    require_once("php/Common/header.php");
?>

<body onload="checkAccess(true)">

<!--
    <ul class="header-ul">
        <li class="header-left-li"><img class="headerbtm" src="./images/logo.png" alt="logo" width="150" height="50"></li>
        <li class="header-left-li"><a class="header-left-li a" href="./index.php">Home</a></li>
        <li class="header-left-li"><a class="header-left-li a" href="./php/TourPlanningComponent/TourPlanningIndex.php">Tour Plan</a></li>
        <li class="header-left-li"><a class="header-left-li a" href="./php/Blog/ContactUS.php">Contact Us</a></li>
        <li class="header-left-li"><a class="header-left-li a" href="./php/Blog/ViewBlogs.php">Blogs</a></li>
        <li class="header-left-li"><a class="header-left-li a" id="profile" href="./php/ProfileComponent/Profile.php">Profile</a></li>
        <li class="header-right-li"><a class="header-left-li a" id="login" href="./php/Login.php"><button class="button-login" href="../Blog/ViewBlogs.php"><img src="./images/User-Icon.png" alt="logo" width="20" height="20" style="margin-right: 10px;">Login</button></a></li>
        <li class="header-right-li"><a class="header-left-li a" id="register" href="./php/RegisterUser.php"><button class="button-register" href="../Blog/ViewBlogs.php"><img src="./images/User-Icon.png" alt="logo" width="20" height="20" style="margin-right: 10px;">Register</button></a></li>
        <li class="header-right-li"><a class="header-left-li a" id="logout" onclick="logOut()"><button class="button-login" href="../Blog/ViewBlogs.php"><img src="./images/User-Icon.png" alt="logo" width="20" height="20" style="margin-right: 10px;">Logout</button></a></li>
    </ul>
    <hr style="background-color: #327972;color:#327972" />
    -->

    <div class="home">
        <img src="./images/home.png" alt="home-bg">
        <div class="welcome">
            <h3>&nbsp; welcome to travelPal</h3>
            <h1>plan your next<br> trip with <br> <mark> travelpal</mark></h1>
            <h5>&nbsp; &nbsp; We support you to travel within Sri Lanka with the superb experience</h5>
        </div>
    </div>
    <br> <br>
    <div class="selection">
        <div class="btn-left">
            <h2>Are you a tourist ?</h2>
            <p>Join with us today to make your dreams true. We offer you preplanned tour 
                plans with several packages which ease planning a tour and make the moments 
                precious. Customize tours with us, we help you to acheive your destination and make 
                golden memories in your life. <br></p>
                <a href="/travelPal/php/RegisterUser.php">
                    <button class="Register">Register Now</button>
                </a>
        </div>
        <div class="btn-right">
            <h2>Are you a service provider ?</h2>
            <p>Do your business need a highest a rank in Sri Lankan Tourism industry? Do you like 
                to levelup your business? Grab this opportunity now. You can be an Accommodation 
                provider, Vehicle provider or you might be a tour guide. We are with you to promote 
                your business. <br></p>
                <a href="/travelPal/php/RegisterUser.php">
                    <button class="Register">Register Now</button>
                </a>
        </div>
    </div>
    <h1><mark> travel pal </mark> offers You...</h1>
    <div class="offers">
            <div class="left">
                <h2>Get a personalized trip</h2>
                <p>A full day by day itinerary based on your preferences</p>
            </div>
            <div class="left">
                <h2>Customize it</h2>
                <br>
                <p>Refine your trip. We'll find the best routes and schedules</p>
            </div>
            <div class="left">
                <h2>Book & manage it</h2>
                <br>
                <p>Choose from the best hotels. Everything in one place.</p>
            </div>
    </div>
    <div class="popular">
        <h1>popular</h1>
        <div class="tourist">
            <div class="plans">
                <img src="./images/jaffna.png" alt="jaffna">
                <div class="cont">
                    <h3>Jaffna</h3>
                    <div class="fav">
                        <h5><mark>&nbsp;view&nbsp;<i class="fa fa-hand-o-right" aria-hidden="true"></i></mark></h5>
                        <i class="fa fa-heart" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="plans">
                <img src="./images/trinco.png" alt="jaffna">
                <div class="cont">
                    <h3>Trincomalee</h3>
                    <div class="fav">
                        <h5><mark>&nbsp;view&nbsp;<i class="fa fa-hand-o-right" aria-hidden="true"></i></mark></h5>
                        <i class="fa fa-heart" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="plans">
                <img src="./images/nuwra.png" alt="jaffna">
                <div class="cont">
                    <h3>Nuwaraeliya</h3>
                    <div class="fav">
                        <h5><mark>&nbsp;view&nbsp;<i class="fa fa-hand-o-right" aria-hidden="true"></i></mark></h5>
                        <i class="fa fa-heart" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="plans">
                <img src="./images/kandy.png" alt="jaffna">
                <div class="cont">
                    <h3>Kandy</h3>
                    <div class="fav">
                        <h5><mark>&nbsp;view&nbsp;<i class="fa fa-hand-o-right" aria-hidden="true"></i></mark></h5>
                        <i class="fa fa-heart" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!--
    <div>
        <div class="container">
            <div class="left-side">
                <div style="margin-inline-start: 30px;">
                    <h2 class="subheading">WELCOME TO travelpal</h2>
                    <h1 class="heading">Plan your next trip with</h1>
                    <h1 class="heading2">TRAVELpal</h1>
                    <p class="description">We support you to travel within Sri Lanka with the superb Experience</p>
                </div>
            </div>
            <div class="right-side">
                <div class="content">
                    <img src="./images/travelPal-DESTINATIONS.png" alt="Image Description">
                </div>
            </div>
        </div>
        <div class="container2">
            <div class="left-side2">
                <h2 class="title2">Are you a tourist ?</h2>
                <p class="description2">Join with us today to make your dreams true. We offer you preplanned tour plans with several packages which ease planning a tour and make the moments precious. Customize tours with us, we help you to acheive your destination and make golden memories in your life. </p>
            </div>
            <div class="right-side2">
                <h2 class="title2">Are you a service provider?</h2>
                <p class="description2">Do your business need a highest a rank in Sri Lankan Tourism industry? Do you like to levelup your business? Grab this opportunity now. You can be an Accommodation provider, Vehicle provider or you might be a tour guide. We are with you to promote your business. </p>
            </div>
        </div>
        <div style="padding: 40px 100px;">
            <p class="description2" style="text-align: center;">Do your business need a highest a rank in Sri Lankan Tourism industry? Do you like to levelup your business? Grab this opportunity now. You can be an Accommodation provider, Vehicle provider or you might be a tour guide. We are with you to promote your business. </p>

        </div>
        <div>
            <h3 class="offers-head" style="text-align: center;">Travel pal offers you...</h3>
        </div>

        <div class="container3">
            <div>
                <h2 class="offers-head" style="text-align: right; margin: 10px 20px">Tourist</h2>
            </div>
            <div class="row3">
                <div class="box3">
                    <h2 class="title2">Get a personalized trip</h2>
                    <p class="description2">A full day by day itinerary based on your preferences</p>
                </div>
                <div class="box3">
                    <h2 class="title2">Customize it</h2>
                    <p class="description2">Refine your trip. We'll find the
                        best routes and schedules</p>
                </div>
                <div class="box3">
                    <h2 class="title2">Book
                        & manage
                        it
                    </h2>
                    <p class="description2">Choose from the best hotels. Everything in one place.</p>
                </div>
            </div>
            <div>
                <h2 class="offers-head" style="text-align:end; margin: 10px 20px">Service providers</h2>
            </div>
            <div class="row3">
                <div class="box3">
                    <h2 class="title2">Get your vehical registered
                    </h2>
                    <p class="description2">get paid for your vehical with
                        TRAVELPAL</p>
                </div>
                <div class="box3">
                    <h2 class="title2">Get your Accommodation
                        registered
                    </h2>
                    <p class="description2">Promote your business with
                        TRAVELPAL</p>
                </div>
                <div class="box3">
                    <h2 class="title2">Get yourself registered
                    </h2>
                    <p class="description2">we value your service as a tour guide with
                        TRAVELPAL</p>
                </div>
            </div>
        </div>
        <div style="text-align: center;">
            <a href="./php/RegisterUser.php">
                <button class="reg-btn">Register Now</button>
            </a>
        </div>

    </div>
</body>

<footer class="custom-footer">
    <div class="footer-left">
        <img src="./images/logo.png" alt="Company logo" class="footer-logo">
        <div class="footer-title">
            <h3 class="footer-heading">Get inspired ! Recieve travel discounts, tips & behind the scene stories</h3>
        </div>
        <form class="footer-form">
            <input type="text" class="footer-input" placeholder="Enter your email address">
            <button type="submit" class="footer-button">Subscribe</button>
        </form>
        <table style="width: 100%;margin-top:20px">
            <tr>
                <td class="footer-td-text">HOME</td>
                <td class="footer-td-text">ABOUT US</td>
                <td class="footer-td-text">CONTACT US</td>
            </tr>
            <tr>
                <td class="footer-td-text">BLOGs</td>
                <td class="footer-td-text">Tour plans</td>
                <td class="footer-td-text">Preplanned Tour</td>
            </tr>
            <tr>
                <td class="footer-td-text">Customize Tour</td>
                <td class="footer-td-text">BLOGs</td>
                <td class="footer-td-text">Create Blogs</td>
            </tr>
        </table>

    </div>
    <div class="footer-right">
        <img src="./images/footerimg.png" alt="Image description" class="footer-image">
    </div>
</footer>
-->

    <!-- footer -->
    <?php require_once("php/Common/footer.php");?>
</html>
