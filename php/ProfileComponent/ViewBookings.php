<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/profile.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script type="text/javascript" src="../../js/profile.js"></script>
    <script type="text/javascript" src="../../js/checkAccess.js"></script>
</head>

<?php
    $title = "View Bookings";
?>

<body onload="checkUserAccess()">
    <?php
    require '../DbConfig.php';
    if (isset($_COOKIE['user'])) {

        $userID = json_decode($_COOKIE['user'])->user_Id;
        $sql = "SELECT first_name, last_name, email, address FROM user WHERE user_Id= '" . $userID . "'";
        $result = $conn->query($sql);

        if ($result) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
    ?>

    <!-- Navigation Bar -->
    <div class="header">
            <div class="navigationbar">
                <div class="nav-Logo">
                    <a href="/travelPal/index.php">
                        <img src="/travelPal/images/logo.png" alt="TRAVELPal">
                    </a>
                </div>
                <div class="menu">
                    <button class="nav" onclick="location.href = '/travelPal/index.php';">HOME</button>
                    <button class="nav"onclick="location.href = '/travelPal/php/TourPlanningComponent/TourPlanningIndex.php';">TOUR PLAN</button>
                    <button class="nav" onclick="location.href = '/travelPal/php/Blog/ContactUS.php';">CONTACT US</button>
                    <button class="nav"onclick="location.href = '/travelPal/php/Blog/ViewBlogs.php';">BLOGS</button>
                    <button class="nav"onclick="location.href = '/travelPal/php/ProfileComponent/Profile.php';">PROFILE</button>
                    <button class="logout-btn" id="logout" onclick="logOut()"><i class="fa fa-user fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;LOG OUT</button>
                </div>            
            </div>
            <div class="navigationbarfoot">
                <hr>  
            </div>    
    </div>

                    <table style="width: 100%;">
                        <tr VALIGN=TOP>
                            <?php include './subComponent/VerticleHeader.php'; ?>
                            <td class="td-profile">
                                <?php
                                $acc_sql = "SELECT ut.*
                                            FROM user_tours ut
                                            JOIN accomadation_service a ON ut.accomadation_id = a.accomadation_id
                                            JOIN vehicle_service v ON ut.vehicle_id = v.vehicle_id
                                            JOIN tour_guide g ON ut.guide_id = g.guide_id
                                            WHERE ut.accomadation_id = a.accomadation_id
                                            OR ut.vehicle_id = v.vehicle_id
                                            OR ut.guide_id = g.guide_id
                                            AND a.created_by = '" . $userID . "'
                                            AND v.created_by = '" . $userID . "'
                                            AND g.created_by = '" . $userID . "' ";
                                
                                $acc_result = $conn->query($acc_sql);
                                if ($acc_result) {
                                    if ($acc_result->num_rows > 0) { ?>
                                        <div class="main-wrapper">
                                            <h2 class="heder-profile">My Tour Bookings</h2>
                                            <div>
                                                <table syle="width: 85vw !important;">
                                                    <thead>
                                                        <tr class="table-header">
                                                            <th style="min-width: 150px;">Tour Id</th>
                                                            <th style="min-width: 150px;">Created Date</th>
                                                            <th style="min-width: 150px;">Start Date</th>
                                                            <th style="min-width: 150px;">No Of People</th>
                                                            <th style="min-width: 150px;">Status</th>
                                                            <th style="min-width: 150px;">View Detail</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while ($acc_row = $acc_result->fetch_assoc()) { ?>
                                                            <tr style="background-color: #FFFFFFCC;">
                                                                <td class="td-txt"><?php echo $acc_row['user_tours_id']; ?></td>
                                                                <td class="td-txt"><?php echo $acc_row['created_date']; ?></td>
                                                                <td class="td-txt"><?php $date = DateTime::createFromFormat('Y-m-d H:i:s.u', $acc_row['start_date']); // create a DateTime object from the timestamp
                                                                                    $formatted_date = $date->format('Y-m-d'); // format the DateTime object
                                                                                    echo $formatted_date; ?></td>
                                                                <td class="td-txt"><?php echo $acc_row['no_of_tourist']; ?></td>
                                                                <td class="td-txt"><?php if ($acc_row['status'] == 1) { ?>
                                                                        Pending Details
                                                                    <?php } else if ($acc_row['status'] == 2) { ?>
                                                                        Pending Payment
                                                                    <?php } else { ?>
                                                                        Complete
                                                                    <?php }
                                                                    ?> </td>

                                                                    <td>
                                                                    <center>
                                                                        <a href="ViewTourDetails.php?tour_id=<?php echo $acc_row['user_tours_id']; ?>">
                                                                            <button type="submit" value="editBtn" style="background-color: var(--accentcolor); width:20px; height:20px;">
                                                                                <img src="../../images/view.png" alt="view" width="16" height="16">
                                                                            </button>
                                                                        </a>
                                                                    </center>
                                                                    </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    <?php     } else { ?>
                                        <center>
                                        <h3 class="new-manager" style="margin-top: 20%;">No Bookings Found</h3>
                                        </center>
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
                    " . $conn->$error;
        }

        $conn->close();
    } else {
        header('location:../../index.php');
    }
    ?>

</body>

<footer>
        <hr>
        <div class="footer-bottom">
                © <?php echo date("Y"); ?> TRAVEL PAL ALL RIGHTS RESERVED
        </div>
</footer>

</html>