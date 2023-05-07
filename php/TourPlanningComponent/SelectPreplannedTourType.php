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
            <center>
                <h2 class="preplanned-header">Preplanned tours</h2>
                <p class="preplanned-des">We have customized tours according to climate changes in Sri Lanka for more experience</p>
            </center>
            <div class="seasons">
                <?php
                require '../DbConfig.php';
                $season_sql = "SELECT * FROM season WHERE isActive= '" . 1 . "'";
                $season_result = $conn->query($season_sql);
                if ($season_result) {
                    if ($season_result->num_rows > 0) {
                        while ($season_row = $season_result->fetch_assoc()) {
                ?>
                            <div class="season">
                                <h2><?php echo $season_row['season_name']; ?></h2>
                                <div class="types" style="background-color: rgba(50, 121, 114, 0.5);">
                                    <?php
                                    $type_sql = "SELECT * FROM plan_types WHERE isActive= '" . 1 . "'";
                                    $type_result = $conn->query($type_sql);
                                    if ($type_result) {
                                        if ($type_result->num_rows > 0) {
                                            while ($type = $type_result->fetch_assoc()) {
                                    ?>
                                                <a href="./ViewAvailablePreplannedTours.php?season=<?php echo $season_row['season_name']; ?>&type=<?php echo ($type["name"]) ?>" class="type" style="background-color: #00357A;">
                                                    <img src="../../images/TourTypes/<?php echo ($type["image"]) ?>" alt="Type">
                                                    <h3><?php echo ($type["name"]) ?></h3>
                                                </a>

                                    <?php
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                <?php
                        }
                    }
                }
                ?>
            </div>
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