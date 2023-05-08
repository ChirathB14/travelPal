<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/preplanned.css">
    <link rel="stylesheet" href="../../css/newFooter.css">
    <title>Travel Pal</title>
</head>

<body style="background-color: #0E064D;">
    <table>
        <tr VALIGN=TOP>
            <?php include '../Common/header.php'; ?>
        </tr>
        <tr VALIGN=TOP>
            <h2 class="preplanned-des">Enter The Tour Details</h2>
            <div style="background-color: #00357A80;">

            </div>
            <div class="box">
                <?php
                if (isset($_GET['id'])) {
                    require "../DbConfig.php";
                    $plan_Id = $_GET['id'];
                    $sql = "SELECT * FROM new_plan WHERE plan_Id= '" . $plan_Id . "'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $serializedOptions = $row["destination"];
                            $selectedOptions = unserialize($serializedOptions);
                ?>
                            <div class="row">
                                <div class="label">Season :</div>
                                <div class="value"><?php echo $row['season']; ?></div>
                            </div>
                            <div class="row">
                                <div class="label">Location :</div>
                                <div class="value"><?php echo $row['location']; ?></div>
                            </div>
                            <div class="row">
                                <div class="label">Destinations :</div>
                                <div class="value"><?php foreach ($selectedOptions as $option) {
                                                        echo $option . "| ";
                                                    } ?></div>
                            </div>

            </div>
            <form method="POST" action="EnterTourDetails.php?id=<?php echo $_GET['id']; ?>">
                <div class="box" style="margin-top: 15px;">
                    <div class="row">
                        <div class="label">Start Date : </div>
                        <input class="value" type="date" name="date_picker" required>
                    </div>
                </div>

                <div class="box" style="margin-top: 15px;">
                    <div class="row">
                        <div class="label">No Of Tourist : </div>
                        <input class="value" type="number" name="no_tourist" placeholder="xxx" required>
                    </div>
                </div>
                <div style="width:85%;text-align:right;margin-top:20px">
                    <button type="submit" name="next" value="next" class="nxt_btn">Save & Next</button>
                </div>
    <?php
                        }
                    } else {
                        echo "No Details found.";
                    }
                }
                // Close connection
                $conn->close();
    ?>
    <?php
    require '../DbConfig.php';
    if (isset($_POST['next']) && isset($_COOKIE['user'])) {
        $tourID = $_GET['id'];
        $userID = json_decode($_COOKIE['user'])->user_Id;

        $date_picker = $_POST['date_picker'];
        $date_time = DateTime::createFromFormat('Y-m-d', $date_picker);
        $startDate = $date_time->format('Y-m-d H:i:s.u');

        $noOfTourist = $_POST['no_tourist'];
        $createdDate = date('Y-m-d H:i:s');
        $common = uniqid();
        $isActive = true;

        $sqltwo = "INSERT INTO user_tours (user_tours_id, tour_id, start_date, no_of_tourist, created_by, created_date, isActive,  status, common_id)
                    VALUES (0,'$tourID','$startDate','$noOfTourist','$userID','$createdDate','$isActive', '1', '$common' )";

        if ($conn->query($sqltwo) === TRUE) {
            echo '<script language = "javascript">
            alert("Details Saved Success. Now you can add services")
            window.location = "./SelectAccomadation.php?common=' . $common . '"';
            echo '</script>';
        } else {
            echo '<script language = "javascript">';
            echo 'alert("Unsuccessfully :( ")';
            echo '</script>';
        }
        $conn->close();
    }

    ?>
            </form>






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
</html>