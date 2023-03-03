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
        <img src="assets/home.png" alt="">
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
                <button class="Register">Register Now</button>
        </div>
        <div class="btn-right">
            <h2>Are you a service provider ?</h2>
            <p>Do your business need a highest a rank in Sri Lankan Tourism industry? Do you like 
                to levelup your business? Grab this opportunity now. You can be an Accommodation 
                provider, Vehicle provider or you might be a tour guide. We are with you to promote 
                your business. <br></p>
                <button class="Register">Register Now</button>
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
                <img src="assets/jaffna.png" alt="jaffna">
                <div class="cont">
                    <h3>Jaffna</h3>
                    <div class="fav">
                        <h5><mark>&nbsp;view&nbsp;<i class="fa fa-hand-o-right" aria-hidden="true"></i></mark></h5>
                        <i class="fa fa-heart" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="plans">
                <img src="assets/trinco.png" alt="jaffna">
                <div class="cont">
                    <h3>Trincomalee</h3>
                    <div class="fav">
                        <h5><mark>&nbsp;view&nbsp;<i class="fa fa-hand-o-right" aria-hidden="true"></i></mark></h5>
                        <i class="fa fa-heart" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="plans">
                <img src="assets/nuwra.png" alt="jaffna">
                <div class="cont">
                    <h3>Nuwaraeliya</h3>
                    <div class="fav">
                        <h5><mark>&nbsp;view&nbsp;<i class="fa fa-hand-o-right" aria-hidden="true"></i></mark></h5>
                        <i class="fa fa-heart" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="plans">
                <img src="assets/kandy.png" alt="jaffna">
                <div class="cont">
                    <h3>Kandy</h3>
                    <div class="fav">
                        <h5><mark>&nbsp;view&nbsp;<i class="fa fa-hand-o-right" aria-hidden="true"></i></mark></h5>
                        <i class="fa fa-heart" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <!-- <div class="plans">
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
            </div> -->
        </div>
    </div>
    <br>

    <!-- footer -->
    <?php require_once("./inc/footer.php");?>


<!-- <main>
    <h1>Welcome to TravePal!</h1>
    <?php 
        if($_SESSION['user_type'] == "Admin"){
            echo "Hello admin - {$_SESSION['first_name']}";
        }
    ?>
</main> -->

<?php mysqli_close($connection); ?>
