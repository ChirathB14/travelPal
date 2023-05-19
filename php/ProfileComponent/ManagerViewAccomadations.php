<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/main.css">               
    <link rel="stylesheet" href="../../css/profile.css">

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

<?php
            $title = "View Accommodation - TravePal";
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
                                <div class="main-wrapper">
                                    <h2 class="heder-profile">Accommodation Provider</h2>
                                    <div>
                                        <table>
                                            <thead>
                                                <tr class="table-header" style="border:1px solid rgb(255, 255, 255);">
                                                    <th style="min-width: 150px;">Name</th>
                                                    <th style="min-width: 150px;">Email</th>
                                                    <th style="min-width: 150px;">Address</th>
                                                    <th style="min-width: 150px;">Edit</th>
                                                    <th style="min-width: 150px;">Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $getManagers = "SELECT * FROM user WHERE user_type= '" . 4 . "' AND is_accommodation= '" . true . "'";
                                                $manage_result = $conn->query($getManagers);
                                                if ($manage_result) {
                                                    if ($manage_result->num_rows > 0) {
                                                        while ($manager = $manage_result->fetch_assoc()) { ?>
                                                            <tr style="background-color: #FFFFFFCC;">
                                                                <td class="td-txt"><?php echo $manager['first_name']; ?> <?php echo $manager['last_name']; ?></td>
                                                                <td class="td-txt"><?php echo $manager['email']; ?></td>
                                                                <td class="td-txt"><?php echo $manager['address']; ?></td>
                                                                <td style="padding: 5px 5px;">
                                                                    <a href="UpdateManager.php?id=<?php echo $manager['user_Id']; ?>&page=location:./AdminViewAccommodation.php">
                                                                        <center><button style="background-color: var(--accentcolor); width:20px; height:20px;" type="submit" value="editBtn"><img src="../../images/edit-text.png" alt="edit" width="16" height="16"></button></center>
                                                                    </a>

                                                                </td>
                                                                <td style="padding: 5px 5px;">
                                                                    <a href="./subComponent/DeleteUserItem.php?id=<?php echo $manager['user_Id']; ?>&page=location:../AdminViewAccommodation.php">
                                                                        <center> <button style="background-color: var(--accentcolor); width:20px; height:20px;" type="submit" value="deleteBtn" onclick="return confirm('Are you sure?\n Do You Want To Delete This User ?');"><img src="../../images/delete.png" alt="delete" width="16" height="16"></button> </center>
                                                                    </a>

                                                                </td>
                                                            </tr>
                                                        <?php }
                                                    } else { ?>
                                                        <tr style="background-color: #FFFFFFCC;">
                                                            <td class="td-txt" colspan="4">
                                                                <center>No data available.</center>
                                                            </td>
                                                        </tr>
                                                <?php }
                                                } else {
                                                    echo "Error in " . $sql . " " . $conn->$error;
                                                }
                                                ?>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr></tr>
                    </table>
                    <table style="width:80%">
                        <tr VALIGN=TOP>
                            

                            <td class="td-profile">
                                <?php
                                $acc_sql = "SELECT * FROM accomadation_service WHERE status= '" . 1 . "'";
                                $acc_result = $conn->query($acc_sql);
                                if ($acc_result) {
                                    if ($acc_result->num_rows > 0) { ?>
                                        <div class="main-wrapper">
                                            <h2 class="heder-profile">Accommodation Services</h2>
                                            <div>
                                                <table style="width: 65vw;">
                                                    <thead>
                                                        <tr class="table-header">
                                                            <th style="min-width: 150px;">Name</th>
                                                            <th style="min-width: 150px;">Email</th>
                                                            <th style="min-width: 150px;">NIC</th>
                                                            <th style="min-width: 150px;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while ($acc_row = $acc_result->fetch_assoc()) { ?>

                                                            <tr style="background-color: #FFFFFFCC;">
                                                                <td class="td-txt"><?php echo $acc_row['provider_name']; ?></td>
                                                                <td class="td-txt"><?php echo $acc_row['email']; ?></td>
                                                                <td class="td-txt"><?php echo $acc_row['provider_nic']; ?></td>
                                                                <td class="td-txt">
                                                                    <a href="ManagerApproveAccomadation.php?id=<?php echo $acc_row['accomadation_Id']; ?>">
                                                                        <center><button type="submit" value="editBtn" style="background-color: var(--accentcolor); width:20px; height:20px;" ><img src="../../images/edit-text.png" alt="edit" width="16" height="16"></button></center>
                                                                    </a>
                                                                </td>
                                                            </tr>

                                            </div>
                                        </div>
                                    <?php } ?>
                                                    </tbody>

                                                </table>
                    
                            <?php     } else { ?>
                                <div style="width: 80%;text-align: center; align-items:center; justify-content:center;padding: 100px 100px;">
                                <center>
                                    <h3 class="new-manager">No Accommodation Services for approve</h3>
                                </center>
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