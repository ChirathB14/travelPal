<?php 
    $title = "Tour plan | TravePal";
    require_once("../Common/header.php"); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/TourPlan.css">
</head>

<!-- Tour plan page content -->
    <div class="tour-plan-top-container">
        <img src="../../images/tourPlan.jpg" alt="Tour Plan"style="opacity: 0.5; width:100%; height:80vh;">
        <div class="Title-Tourplan">
            <div class="title-content">
                <div  class="title">
                    <h1>Welcome to </h1> <img src="../../images/logo.png" alt="TravelPal">
                </div>

                <p>
                    Explore, experience and enjoy the most amazing destinations and take in the magnificence of
                    most unique Sri Lankan socio-cultural and historical splendour with TRAVEL PAL – a luxury
                    tour operator with a promise of truly a premium luxury travel experience in Sri Lanka.
                </p>

                <div style="display: flex; flex-direction: row; width: 650px; padding: 20px;">
                    <button style="border: 3px solid white; background-color: transparent; font-size: 16px; width: 240px; margin-right: 30px;">
                        <a href="../TourPlanningComponent/SelectPreplannedTourType.php">
                            Preplanned Tours
                        </a>
                    </button>
                    <button style="border: 1px solid white; background-color: transparent; font-size: 16px; width: 240px;">
                        <a href="../TourPlanningComponent/CustomizePlans.php">
                            Customize Tour
                        </a>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="features">
        <h1>TravelPal <br> offers <br> you...</h1>
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

    <!-- <div class="TourPlan-buttons">
        <button><a href="../TourPlanningComponent/SelectPreplannedTourType.php">Preplanned Tours</a></button>
        <button><a href="../TourPlanningComponent/CustomizePlans.php">Customize Tour</a></button>
    </div> -->

    <!-- <p>
                    The fascination of Sri Lanka never ends. Astonishment, awe and amazement are just a few
                    emotions that are used to describe travel in this paradise island. Blend these with the
                    lavish and sumptuous accommodation, exquisite and unrivalled levels of gastronomy; a real
                    luxuries experience enjoyed by those who are privileged.
                </p> -->
</div>

<!-- footer -->
<?php require_once("../Common/footer.php");?>

</html>







