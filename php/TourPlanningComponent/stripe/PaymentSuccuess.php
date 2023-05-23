<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/main.css">

    <style>
        .container {
            display: flex;
            align-items: center;
            margin: 0;
        }

        .image-container {
            flex: 1;
        }

        .image-container img {
            height: 50%;
            width: 50%;
        }

        .content-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
        }

        .title {
            text-align: center;
            font-weight: 800;
            font-size: 24px;
            line-height: 54px;
            text-align: center;
            letter-spacing: 0.1em;
            color: #FFFFFF;
        }

        .description {
            text-align: center;
            font-weight: 500;
            font-size: 20px;
            line-height: 48px;
            text-align: center;
            letter-spacing: 0.1em;
            color: #FFFFFF;
        }

        .button {
            display: block;
            margin-top: 20px;
            background: #EEB444;
            border-radius: 15px;
            font-weight: 700;
            font-size: 16px;
            padding: 0%;
            line-height: 54px;
            text-align: center;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--accentcolor);
        }
    </style>
</head>

<?php
$title = "Payment Successfull";
session_start();
$common = $_SESSION['common'];
// var_dump($common) or die();
$sql = "UPDATE user_tours SET status ='3' WHERE common_id='$common'";
require './DbConfig.php';
$conn->query($sql);
?>

<body>

    <div class="header">
        <div class="navigationbar">
            <div class="nav-Logo">
                <a href="/travelPal/index.php">
                    <img src="/travelPal/images/logo.png" alt="TRAVELPal">
                </a>
            </div>
            <div class="menu">
                <button class="nav" onclick="location.href = '/travelPal/index.php';">HOME</button>
                <button class="nav" onclick="location.href = '/travelPal/php/TourPlanningComponent/TourPlanningIndex.php';">TOUR PLAN</button>
                <button class="nav" onclick="location.href = '/travelPal/php/Blog/ContactUS.php';">CONTACT US</button>
                <button class="nav" onclick="location.href = '/travelPal/php/Blog/ViewBlogs.php';">BLOGS</button>
                <button class="nav" onclick="location.href = '/travelPal/php/ProfileComponent/Profile.php';">PROFILE</button>
                <button class="logout-btn" id="logout" onclick="logOut()"><i class="fa fa-user fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;LOG OUT</button>
            </div>
        </div>
        <div class="navigationbarfoot">
            <hr>
        </div>
    </div>

    <table style="width: 100%;">
        <tr VALIGN=TOP>
            <td style="width: 100%;">
            </td>
        </tr>
        <tr VALIGN=TOP>
            <td style="width: 100%;">
                <center>
                    <br>
                    <div class="container">
                        <div class="content-container">
                            <div class="image-container">
                                <img src="../../../images/checked.png" alt="Image Description">
                            </div>
                            <h2 class="title">Payment Successful</h2>
                            <p class="description">Thank you for your payment. we will be in contact with more details</p>
                            <a href="../../TourPlanningComponent/AllTourSummary.php?common=<?php echo $common; ?>">
                                <br>
                                <button class="button">Click to see the summary</button>
                            </a>
                        </div>
                    </div>
                </center>
            </td>
        </tr>
    </table>
    <br>
</body>


<?php require_once("../../Common/footer.php"); ?>

</html>