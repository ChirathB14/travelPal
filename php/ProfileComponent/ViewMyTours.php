<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/profile.css">

    <script type="text/javascript" src="../../js/profile.js"></script>
    <script type="text/javascript" src="../../js/checkAccess.js"></script>
</head>

<?php
    $title = "View Tours";
?>

<body onload="checkUserAccess()">
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

                    <table style="width: 80%;">
                        <tr VALIGN=TOP>
                            <?php include './subComponent/VerticleHeader.php'; ?>
                            <td class="td-profile">
                                <?php
                                $acc_sql = "SELECT * FROM user_tours WHERE created_by= '" . $userID . "'";
                                $acc_result = $conn->query($acc_sql);
                                if ($acc_result) {
                                    if ($acc_result->num_rows > 0) { ?>
                                        <div class="main-wrapper">
                                            <h2 class="heder-profile">My Tour Plan</h2>
                                            <div>
                                                <table syle="width: 65vw !important;">
                                                    <thead>
                                                        <tr class="table-header">
                                                            <th style="min-width: 150px;">Id</th>
                                                            <th style="min-width: 150px;">Start Date</th>
                                                            <th style="min-width: 150px;">No Of People</th>
                                                            <th style="min-width: 150px;">Status</th>
                                                            <th style="min-width: 150px;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while ($acc_row = $acc_result->fetch_assoc()) { ?>
                                                            <tr style="background-color: #FFFFFFCC;">
                                                                <td class="td-txt"><?php echo $acc_row['user_tours_id']; ?></td>
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

                                                                <td class="td-txt">
                                                                    <a href="<?php
                                                                                if ($acc_row['status'] == 2) { ?>
                                                                       ../TourPlanningComponent/Payment.php?common=<?php echo $acc_row['common_id']; ?>
                                                                    <?php } else if ($acc_row['status'] == 1) { ?>
                                                                        ../TourPlanningComponent/SelectAccomadation.php?common=<?php echo $acc_row['common_id']; ?>
                                                                    <?php } else { ?>
                                                                        ../TourPlanningComponent/AllTourSummary.php?common=<?php echo $acc_row['common_id'] ?>
                                                                   <?php }
                                                                    ?>">
                                                                        <center><button type="submit" value="editBtn" style="background-color: var(--accentcolor); width:20px; height:20px;"><img src="../../images/edit-text.png" alt="edit" width="16" height="16"></button></center>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    <?php     } else { ?>
                                        <center>
                                        <h3 class="new-manager" style="margin-top: 20%;">No Tours Found</h3>
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