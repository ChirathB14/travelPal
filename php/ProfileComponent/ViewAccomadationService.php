<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/profile.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="../../js/profile.js"></script>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</head>

<?php
    $title = "View Acc | TravelPal";
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

                    <table style="width:100%">
                        <tr VALIGN=TOP>
                            <?php include './subComponent/VerticleHeader.php'; ?>

                            <td class="td-profile">
                                <?php
                                $acc_sql = "SELECT * FROM accomadation_service WHERE created_by= '" . $userID . "'";
                                $acc_result = $conn->query($acc_sql);
                                if ($acc_result) {
                                    if ($acc_result->num_rows > 0) { ?>
                                        <div class="main-wrapper">
                                            <h2 class="heder-profile">Accommodation Services</h2>
                                            <div>
                                                <table style="width: 65vw;">
                                                    <thead>
                                                        <tr class="table-header">
                                                            <th style="min-width: 140px;">Ref No</th>
                                                            <th style="min-width: 140px;">Name</th>
                                                            <th style="min-width: 140px;">Email</th>
                                                            <th style="min-width: 140px;">NIC</th>
                                                            <th style="min-width: 140px;">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while ($acc_row = $acc_result->fetch_assoc()) { ?>

                                                            <tr style="background-color: #FFFFFFCC;">
                                                                <td class="td-txt"><?php echo $acc_row['service_no']; ?></td>
                                                                <td class="td-txt"><?php echo $acc_row['provider_name']; ?></td>
                                                                <td class="td-txt"><?php echo $acc_row['email']; ?></td>
                                                                <td class="td-txt"><?php echo $acc_row['provider_nic']; ?></td>
                                                                <td class="td-txt"><?php  
                                                                if($acc_row['status'] == 1){
                                                                    echo "Pending";
                                                                }
                                                                else if($acc_row['status'] == 2){
                                                                    echo "Approved";
                                                                }else{
                                                                    echo "Decline";
                                                                }
                                                                ?></td>
                                                            </tr>

                                            </div>
                                        </div>
                                    <?php } ?>
                                    </tbody>

                    </table>
                    <div>
                        <a href="./AddNewAccomodation.php">
                            <button class="add-service-btn">Add Service</button>
                        </a>
                    </div>
                <?php     } else { ?>
                    <div style="width: 80%;text-align: center;padding: 100px 0px;">
                        <h3 class="new-manager">No Accommodation Service Added</h3>
                        <a href="./AddNewAccomodation.php">
                            <button class="add-service-btn">Add Service</button>
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