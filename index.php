<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/main.css">

    <script type="text/javascript" src="./js/checkAccess.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 500px;
            margin: auto;
            text-align: center;
            }

            .title {
            color: grey;
            font-size: 18px;
            }

            .pre {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: var(--primarycolor);
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
            }

            a {
            text-decoration: none;
            font-size: 22px;
            color: white;
            }

            .pre:hover, a:hover {
            opacity: 0.7;
            }
    </style>
</head>

<?php
    $title = "Home - TravePal";
    require_once("php/Common/header.php");
?>

<body onload="checkAccess(true)" style="background-color: var(--accentcolor) !important; color: var(--primarycolor);">

    <div class="home">
        <img src="./images/home.png" alt="home-bg">
        <div class="welcome">
            <h3>&nbsp; welcome to travelPal</h3>
            <br>
            <h1>plan your next<br> trip with <br> <mark> travelpal</mark></h1>
            <br>
            <h5>&nbsp; &nbsp; We support you to travel within Sri Lanka with the superb experience</h5>
            <br>

            <button style="border: 3px solid white; background-color: var(--primarycolor); font-size: 16px; width: 240px; margin-left: 20px; color:white !important;">
                        <a href="./php/TourPlanningComponent/SelectPreplannedTourType.php">
                            Join with us
                        </a>
                    </button>
        </div>
        <br><br>
    </div>
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
    <div>
    <h1><mark> travel pal </mark> offers You...</h1>
    <div class="offers">
            <div class="left">
                <h2>Get a personalized trip</h2>
                <p>A full day by day itinerary based on your preferences</p>
            </div>
            <div class="left">
                <h2>Customize trip</h2>
                <br>
                <p>Refine your trip. We'll find the best routes and schedules</p>
            </div>
            <div class="left">
                <h2>Book & manage trip</h2>
                <br>
                <p>Choose from the best hotels. Everything in one place.</p>
            </div>
    </div>
    <br>
    <!-- <p style="width: 80vw; margin-left: 100px; font-size: 18px; font-weight: 400px;">
                    Explore, experience and enjoy the most amazing destinations and take in the magnificence of
                    most unique Sri Lankan socio-cultural and historical splendour with TRAVEL PAL – a luxury
                    tour operator with a promise of truly a premium luxury travel experience in Sri Lanka.
                </p>
                <br><br> -->
    <div style="display: flex; flex-direction: row; width: 100vw; padding-left: 100px;">
    <div class="card">
        <img src="./images/preplanned.png" alt="" style="width:100%">
        <h1>Willing to travel?</h1>
        <!-- <p class="title">Willing to travel?</p> -->
        <br>
        <p>We have preplanned tours for you with specialized packages!</p>
        <br>
        <p><button class="pre">
            <a href="./php/TourPlanningComponent/SelectPreplannedTourType.php">
                            Preplanned Tours
                        </a>
            </button></p>
    </div>

    <div class="card">
        <img src="./images/preplanned.png" alt="" style="width:100%">
        <h1>personalization?</h1>
        <!-- <p class="title">Willing to travel?</p> -->
        <br>
        <p>Here's the opportunity for you to plan trip on your own!</p>
        <br>
        <p><button class="pre">
        <a href="./php/TourPlanningComponent/CustomizePlans.php">
                            Customize Tour
                        </a>
            </button></p>
    </div>
                </div>
    </div>
    <br><br>
    <div class="popular">
        <h1>popular</h1>
        <div class="tourist">
            <div class="plans">
                <a href="./php/Blog/popular/ViewPopular-Jaffna.php">
                    <img src="./images/jaffna.png" alt="jaffna">
                    <div class="cont">
                        <h3>Jaffna</h3>
                        <div class="fav">
                            <h5><mark>&nbsp;view&nbsp;<i class="fa fa-hand-o-right" aria-hidden="true"></i></mark></h5>
                            <i class="fa fa-heart" aria-hidden="true"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="plans">
                <a href="./php/Blog/popular/ViewPopular-Kandy.php">
                    <img src="./images/kandy.jpg" alt="Kandy">
                    <div class="cont">
                        <h3>Kandy</h3>
                        <div class="fav">
                            <h5><mark>&nbsp;view&nbsp;<i class="fa fa-hand-o-right" aria-hidden="true"></i></mark></h5>
                            <i class="fa fa-heart" aria-hidden="true"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="plans">
                <a href="./php/Blog/popular/ViewPopular-Galle.php">
                    <img src="./images/galle.jpg" alt="Galle">
                    <div class="cont">
                        <h3>Galle</h3>
                        <div class="fav">
                            <h5><mark>&nbsp;view&nbsp;<i class="fa fa-hand-o-right" aria-hidden="true"></i></mark></h5>
                            <i class="fa fa-heart" aria-hidden="true"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="plans">
                <a href="./php/Blog/popular/ViewPopular-Nuwaraeliya.php">
                    <img src="./images/nuwra.png" alt="Nuwara Eliya">
                    <div class="cont">
                        <h3>Nuwara Eliya</h3>
                        <div class="fav">
                            <h5><mark>&nbsp;view&nbsp;<i class="fa fa-hand-o-right" aria-hidden="true"></i></mark></h5>
                            <i class="fa fa-heart" aria-hidden="true"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <br>

    <!-- footer -->
    <?php require_once("php/Common/footer.php");?>
</html>
