<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/TourPlan.css">
    <link rel="stylesheet" href="../../css/newFooter.css">
    <title>Travel Pal</title>
    <!--
    <style>
        .center {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 50px;
        }

        .center img {
            margin-left: 20px;
        }

        .center h1 {

            font-family: 'Poppins', sans-serif;
            font-style: normal;
            font-weight: 800;
            font-size: 40px;
            line-height: 192.5%;

            /* or 115px */
            text-align: center;
            letter-spacing: 0.195em;
            text-transform: uppercase;

            color: #FFFFFF;
        }

        .poster img {
            display: block;
            max-width: 100%;
            height: auto;
        }

        .description {
            font-family: 'Poppins', sans-serif;
            font-style: normal;
            font-weight: 600;
            font-size: 20px;
            line-height: 192.5%;

            /* or 38px */
            text-align: center;
            letter-spacing: 0.195em;
            text-transform: uppercase;

            color: #FFFFFF;
            padding: 25px;
        }

        .container {
            display: flex;
            justify-content: center;
            margin: 50px auto;
            max-width: 800px;
            text-align: center;
        }

        .box {
            background-color: #f2f2f2;
            border-radius: 5px;
            flex-basis: 30%;
            padding: 20px;
            margin: 0 10px;
        }

        .box h2 {
            margin-top: 0;

            font-family: 'Poppins', sans-serif;
            font-style: normal;
            font-weight: 800;
            font-size: 20px;
            line-height: 192.5%;

            /* or 46px */
            text-align: center;
            letter-spacing: 0.195em;
            text-transform: uppercase;

            color: #0E064D;
        }

        .box p {
            font-size: 24px;
            margin-bottom: 0;

            font-family: 'Poppins', sans-serif;
            font-style: normal;
            font-weight: 600;
            font-size: 18px;
            line-height: 192.5%;

            /* or 46px */
            text-align: center;
            letter-spacing: 0.195em;
            text-transform: uppercase;

            color: #0E064D;
        }

        .container-btn {
            display: flex;
            flex-direction: row;
            justify-content: center;
        }

        .button {
            display: inline-block;
            padding: 12px 24px;
            text-align: center;
            font-family: 'Poppins';
            font-style: normal;
            font-weight: bold;
            font-size: 16px;
            line-height: 48px;
            letter-spacing: 0.1em;
            text-transform: uppercase;

            color: #FFFFFF;
            border-radius: 5px;
            margin: 0 10px;

            background: #00357A;
            border-radius: 15px;
        }
    </style>
    -->
</head>

<?php 
$title = "Tour plan | TravePal";
include '../Common/header.php'; 
?>

<!-- Tour plan page content -->
<div class="page-content">
    <div class="tour-plan-top-container">
        <img src="../../images/tourPlan.png" alt="Tour Plan">
        <div class="Title-Tourplan">
            <h1>Welcome to </h1> <img src="../../images/logo.png" alt="TravelPal">
        </div>
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
        <button><a href="../TourPlanningComponent/SelectPreplannedTourType.php">Preplanned Tours</a></button>
        <button><a href="../TourPlanningComponent/CustomizePlans.php">Customize Tour</a></button>
    </div>
</div>

<!--
<body style="background-color: #0E064D;">
    <table>
        <tr VALIGN=TOP>
            
        </tr>
        <tr VALIGN=TOP>
            <table>
                <tr VALIGN=CENTER>
                    <div class="center">
                        <h1>Welcome To</h1>
                        <img src="../../images/logo.png" alt="Your Image">
                    </div>
                    <div class="poster">
                        <img src="../../images/planYourTrip.png" alt="Your Image"  width="100%" height="auto">

                    </div>
                    <p class="description">
                        The fascination of Sri Lanka never ends. Astonishment, awe and amazement are just a few emotions that are used to describe travel in this paradise island. Blend these with the lavish and sumptuous accommodation, exquisite and unrivalled levels of gastronomy; a real luxuries experience enjoyed by those who are privileged.

                        Explore, experience and enjoy the most amazing destinations and take in the magnificence of most unique Sri Lankan socio-cultural and historical splendour with TRAVEL PAL – a luxury tour operator with a promise of truly a premium luxury travel experience in Sri Lanka.
                    </p>
                    <div class="container">
                        <div class="box">
                            <h2>Get a personalized trip</h2>
                            <p>A full day by day itinerary based on your preferences</p>
                        </div>
                        <div class="box">
                            <h2>Customize it</h2>
                            <p>Refine your trip. We'll find the best routes and schedules</p>
                        </div>
                        <div class="box">
                            <h2>Book it & manage it</h2>
                            <p>Choose from the best hotels. Everything in one place.</p>
                        </div>
                    </div>
                    <div class="container-btn">
                        <a href="../TourPlanningComponent/SelectPreplannedTourType.php" class="button">Preplanned Tours</a>
                        <a href="../TourPlanningComponent/CustomizePlans.php" class="button">Customized</a>
                    </div>
                </tr>
            </table>
        </tr>
    </table>
</body>

<footer class="custom-footer">
        <div class="footer-left">
            <img src="../../images/logo.png" alt="Company logo" class="footer-logo">
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
            <img src="../../images/footerimg.png" alt="Image description" class="footer-image">
        </div>
    </footer>
-->

<!-- footer -->
<?php require_once("../Common/footer.php");?>

</html>







