<?php
session_start();
require_once('inc/connection.php');
require_once('inc/functions.php');
?>

<?php
$title = "Home - TravePal";
require_once("./inc/header.php");
?>

<head>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/index.css">
</head>

    <div class="home">
        <div class="welcome">
            <h3>welcome to travelPal</h3>
            <h1>plan your next<br> trip with <br> <mark> travelpal</mark></h1>
            <h5>We support you to travel within Sri Lanka with the superb experience</h5>
        </div>
        <div class="logo"> <img src="assets/logo.png" alt=""></div>
    </div>
    <br> <br>
    <div class="selection">
        <div class="btn-left">
            <h2>Are you a tourist ?</h2>
            <p>Join with us today to make your dreams true. We offer you preplanned tour 
                plans with several packages which ease planning a tour and make the moments 
                precious. Customize tours with us, we help you to acheive your destination and make 
                golden memories in your life. <br></p>
                <i class="fa fa-long-arrow-right fa-3x" aria-hidden="true"></i>
        </div>
        <div class="btn-right">
            <h2>Are you a service provider ?</h2>
            <p>Do your business need a highest a rank in Sri Lankan Tourism industry? Do you like 
                to levelup your business? Grab this opportunity now. You can be an Accommodation 
                provider, Vehicle provider or you might be a tour guide. We are with you to promote 
                your business. <br></p>
                <i class="fa fa-long-arrow-right fa-3x" aria-hidden="true"></i>
        </div>
    </div>
    <div class="home">
        <p>The fascination of Sri Lanka never ends. Astonishment, awe and amazement are just a few emotions 
            that are used to describe travel in this paradise island. Blend these with the lavish and sumptuous 
            accommodation, exquisite and unrivalled levels of gastronomy; a real luxuries experience enjoyed by 
            those who are privileged.<br><br> Explore, experience and enjoy the most amazing destinations and take in the 
            magnificence of most unique Sri Lankan socio-cultural and historical splendour with TRAVEL PAL - a luxury tour 
            operator with a promise of truly a premium luxury travel experience in Sri Lanka.
        </p>
    </div>
    <h1>travel pal offers You... </h1>
    <br>
    <div class="offers">
    <br> 
        <h1>Tourist</h1>
        <div class="tourist">
            <div class="left">
                <h2>Get a personalized trip</h2>
                <p>A full day by day itinerary based on your preferences</p>
            </div>
            <div class="left">
                <h2>Customize it</h2>
                <p>Refine your trip. We'll find the best routes and schedules</p>
            </div>
            <div class="left">
                <h2>Book & manage it</h2>
                <p>Choose from the best hotels. Everything in one place.</p>
            </div>
        </div>
        <h1>Service Provider</h1>
        <div class="tourist">
            <div class="left">
                <h2>Get your vehical registered</h2>
                <p>get paid for your vehical with TRAVELPAL</p>
            </div>
            <div class="left">
                <h2>Get your Accommodation registered </h2>
                <p> Promote your business with TRAVELPAL</p>
            </div>
            <div class="left">
                <h2>Get yourself registered </h2>
                <p>We value your service as a tour guide with TRAVELPAL</p>
            </div>
        </div>  
    </div>
    <div class="reg-button">
        <button> Register now</button>        
    </div>
    <br>
    <div class="popular">
        <br>
        <h1>popular</h1>
        <div class="tourist">
            <div class="plans">
                <img src="assets/jaffna.png" alt="jaffna">
                <div class="cont">
                    <h3>Jaffna</h3>
                    <h5><mark>&nbsp;view&nbsp;<i class="fa fa-hand-o-right" aria-hidden="true"></i></mark></h5>
                    <i class="fa fa-heart" aria-hidden="true"></i>
                </div>
            </div>
            <div class="plans">
                <img src="assets/trinco.png" alt="jaffna">
                <div class="cont">
                    <h3>Trincomalee</h3>
                    <h5><mark>&nbsp;view&nbsp;<i class="fa fa-hand-o-right" aria-hidden="true"></i></mark></h5>
                    <i class="fa fa-heart" aria-hidden="true"></i>
                </div>
            </div>
            <div class="plans">
                <img src="assets/nuwra.png" alt="jaffna">
                <div class="cont">
                    <h3>Nuwaraeliya</h3>
                    <h5><mark>&nbsp;view&nbsp;<i class="fa fa-hand-o-right" aria-hidden="true"></i></mark></h5>
                    <i class="fa fa-heart" aria-hidden="true"></i>
                </div>
            </div>
        </div>
        <div class="tourist">
        <div class="plans">
                <img src="assets/kandy.png" alt="jaffna">
                <div class="cont">
                    <h3>Kandy</h3>
                    <h5><mark>&nbsp;view&nbsp;<i class="fa fa-hand-o-right" aria-hidden="true"></i></mark></h5>
                    <i class="fa fa-heart" aria-hidden="true"></i>
                </div>
            </div>
            <div class="plans">
                <img src="assets/negambo.png" alt="jaffna">
                <div class="cont">
                    <h3>Negambo</h3>
                    <h5><mark>&nbsp;view&nbsp;<i class="fa fa-hand-o-right" aria-hidden="true"></i></mark></h5>
                    <i class="fa fa-heart" aria-hidden="true"></i>
                </div>
            </div>
            <div class="plans">
                <img src="assets/galle.png" alt="jaffna">
                <div class="cont">
                    <h3>Galle</h3>
                    <h5><mark>&nbsp;view&nbsp;<i class="fa fa-hand-o-right" aria-hidden="true"></i></mark></h5>
                    <i class="fa fa-heart" aria-hidden="true"></i>
                </div>
            </div>
        </div>
        <div class="home-dropdown">
            <button class="drp-dwn">Packages <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></button> 
            <button class="viewall">view all</button>
        </div>
        <br>
    </div>
    <br>

    <!-- footer -->


<!-- <main>
    <h1>Welcome to TravePal!</h1>
    <?php 
        if($_SESSION['user_type'] == "Admin"){
            echo "Hello admin - {$_SESSION['first_name']}";
        }
    ?>
</main> -->

<?php mysqli_close($connection); ?>
