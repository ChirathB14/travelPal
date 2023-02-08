<!-- Navigation Bar -->
<?php
session_start();
$title = "Tour plan | TravePal";
require_once("./inc/header.php");
?>
<head>
    <link rel="stylesheet" href="/travelPal/css/main.css">
    <link rel="stylesheet" href="/travelPal/css/TourPlan.css">
</head>


<!-- Tour plan page content -->
<div class="page-content">
    <div class="Title-Tourplan">
        <h1>Welcome to </h1> <img src="./assets/logo tpal.png" alt="TravelPal">
    </div>
    <div class="Tourplan-image">
        <img src="./assets/tourPlan.png" alt="Tour Plan">
        <h3>Plan your <br> next trip <br> with <br> TravelPal</h3>
        <hr>
    </div>

    <p>
        The fascination of Sri Lanka never ends. Astonishment, awe and amazement are just a few
        emotions that are used to describe travel in this paradise island. Blend these with the
        lavish and sumptuous accommodation, exquisite and unrivalled levels of gastronomy; a real
        luxuries experience enjoyed by those who are privileged.
    </p>

    <p>
        Explore, experience and enjoy the most amazing destinations and take in the magnificence of
        most unique Sri Lankan socio-cultural and historical splendour with TRAVEL PAL – a luxury
        tour operator with a promise of truly a premium luxury travel experience in Sri Lanka.
    </p>

    <div class="features">
        <div class="feature-content">
            <h4>Get a personalized trip</h4>
            <p>A full day by day <br> itinerary based on your <br> preferences</p>
        </div>
        <div class="feature-content">
            <h4>Customize it</h4>
            <p>Refine your trip. We'll <br> find the <br> best routes and <br> schedules</p>
        </div>
        <div class="feature-content">
            <h4>Book it & manage it</h4>
            <p>Choose from the best <br> hotels. Everything in <br> one place.</p>
        </div>
    </div>

    <div class="TourPlan-buttons">
        <button>Preplanned Tours</button>
        <button><a href="/travelPal/tourist/customize-tour-plan1.php">Customize Tour</a></button>
    </div>
</div>

<!-- Footer -->
<?php require_once("./inc/footer.php");?>