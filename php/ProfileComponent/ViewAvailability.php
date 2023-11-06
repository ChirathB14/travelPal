<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/profile.css">
    <link rel="stylesheet" href="../../css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="../../js/profile.js"></script>
</head>

<?php
$title = "Profile";
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

                    <table style="width:100%">
                        <tr VALIGN=TOP>
                            <?php include './subComponent/VerticleHeader.php'; ?>

                            <td class="td-profile">
                                <?php
                                $acc_sql = "SELECT * FROM unavailability WHERE created_by= '" . $userID . "' AND isActive= '" . 1 . "'";
                                $acc_result = $conn->query($acc_sql);
                                if ($acc_result) {
                                    if ($acc_result->num_rows > 0) { ?>
                                        <div class="main-wrapper">
                                            <h2 class="heder-profile">Unavailability List</h2>
                                            <div>
                                                <table style="width: 65vw;">
                                                    <thead>
                                                        <tr class="table-header">
                                                            <th style="min-width: 150px;">Ref No</th>
                                                            <th style="min-width: 150px;">Service</th>
                                                            <th style="min-width: 150px;">Start Date</th>
                                                            <th style="min-width: 150px;">End Date</th>
                                                            <th style="min-width: 150px;">Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while ($acc_row = $acc_result->fetch_assoc()) { ?>

                                                            <tr style="background-color: #FFFFFFCC;">
                                                                <td class="td-txt"><?php echo $acc_row['service_ref']; ?></td>
                                                                <td class="td-txt"><?php echo $acc_row['service_type']; ?></td>
                                                                <td class="td-txt"><?php echo $acc_row['start_date']; ?></td>
                                                                <td class="td-txt"><?php echo $acc_row['end_date']; ?></td>
                                                                <td style="padding: 5px 5px;">
                                                                    <a href="./subComponent/DeleteAvailability.php?id=<?php echo $acc_row['unavailability_Id']; ?>&page=location:../ViewAvailability.php">
                                                                        <center>
                                                                            <button style="background-color: var(--accentcolor); width:20px; height:20px;" type="submit" value="deleteBtn" onclick="return confirm('Are you sure?\nDo You Want To Delete This entry ?');">
                                                                                <img src="../../images/delete.png" alt="delete" width="16" height="16">
                                                                            </button>
                                                                        </center>
                                                                    </a>
                                                                </td>
                                                            </tr>

                                            </div>
                                        </div>
                                    <?php } ?>
                                    </tbody>

                    </table>
                    <div>
                        <a href="./UpdateAvailablility.php">
                            <button class="add-service-btn" style="font-size:15px;">Add Unavailability</button>
                        </a>
                    </div>
                <?php     } else { ?>
                    <div style="width: 80%;text-align: center;padding: 100px 0px;">
                        <h3 class="new-manager">No Unavailabilties Marked</h3>
                        <a href="./UpdateAvailablility.php">
                            <button class="add-service-btn" style="font-size:15px;">Add Unavailability</button>
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