<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/profile.css">
    <link rel="stylesheet" href="../../css/newFooter.css">
    <script type="text/javascript" src="../../js/profile.js"></script>


    <title>Travel Pal</title>
</head>

<body style="background-color: #0E064D;" onload="checkUserAccess()">
    <?php
    require '../DbConfig.php';
    if (isset($_COOKIE['user'])) {

        $userID = json_decode($_COOKIE['user'])->user_Id;


        $sql = "SELECT first_name, last_name, email, address FROM user WHERE user_Id= '" . $userID . "'";
        $result = $conn->query($sql);
        // echo $conn->query($sql);
        // $data = json_encode($result->user);
        if ($result) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
    ?>
                    <ul class="header-ul">
                        <li class="header-left-li"><img class="headerbtm" src="../../images/logo.png" alt="logo" width="150" height="50"></li>
                        <li class="header-left-li"><a class="header-left-li a" href="../../index.php">Home</a></li>
                        <li class="header-left-li"><a class="header-left-li a" href="../TourPlanningComponent/TourPlanningIndex.php">Tour Plan</a></li>
                        <li class="header-left-li"><a class="header-left-li a" href="../Blog/ContactUS.php">Contact Us</a></li>
                        <li class="header-left-li"><a class="header-left-li a" href="../Blog/ViewBlogs.php">Blogs</a></li>
                        <li class="header-left-li"><a class="header-left-li a" style="background-color: #00357A;" id="profile" href="./Profile.php">Profile</a></li>
                        <li class="header-right-li"><a class="header-left-li a" id="logout"><button class="button-login" onclick="logOut()"><img src="../../images/User-Icon.png" alt="logo" width="20" height="20" style="margin-right: 10px;">Logout</button></a></li>
                    </ul>
                    <hr style="background-color: #327972;color:#327972"/>
                    <table style="width:100%">
                        <tr VALIGN=TOP>
                            <?php include './subComponent/VerticleHeader.php'; ?>

                            <td class="td-profile">
                                <?php
                                $acc_sql = "SELECT * FROM unavailability WHERE created_by= '" . $userID . "' AND isActive= '" . 1 ."'";
                                $acc_result = $conn->query($acc_sql);
                                if ($acc_result) {
                                    if ($acc_result->num_rows > 0) { ?>
                                        <div class="main-wrapper">
                                            <h2 class="heder-profile">Unavailabilty List</h2>
                                            <div>
                                                <table>
                                                    <thead>
                                                        <tr class="table-header" style="border:1px solid rgb(255, 255, 255);">
                                                            <th style="min-width: 150px;">Ref No</th>
                                                            <th style="min-width: 150px;">Service</th>
                                                            <th style="min-width: 150px;">Start Date</th>
                                                            <th style="min-width: 150px;">End Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while ($acc_row = $acc_result->fetch_assoc()) { ?>

                                                            <tr style="background-color: #FFFFFFCC;">
                                                                <td class="td-txt"><?php echo $acc_row['service_ref']; ?></td>
                                                                <td class="td-txt"><?php echo $acc_row['service_type']; ?></td>
                                                                <td class="td-txt"><?php echo $acc_row['start_date']; ?></td>
                                                                <td class="td-txt"><?php echo $acc_row['end_date']; ?></td>
                                                            </tr>

                                            </div>
                                        </div>
                                    <?php } ?>
                                    </tbody>

                    </table>
                    <div>
                        <a href="./UpdateAvailablility.php">
                            <button class="add-service-btn">Mark Unavailabilty</button>
                        </a>
                    </div>
                <?php     } else { ?>
                    <div style="width: 80%;text-align: center;padding: 100px 0px;">
                        <h3 class="new-manager">No Unavailabilty Marked</h3>
                        <a href="./UpdateAvailablility.php">
                            <button class="add-service-btn">Mark Unavailabilty</button>
                        </a>
                    </div>
            <?php
                                    }
                                }
            ?>
            </td>
            </tr>
            </table>

<?php
                }
            }
        } else {
            echo "Error in " . $sql . "
                    " . $conn->error;
        }

        $conn->close();
    } else {
        header('location:../../index.php');
    }
?>
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