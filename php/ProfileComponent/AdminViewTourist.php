<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/profile.css">

    <script type="text/javascript" src="../../js/profile.js"></script>
</head>

<?php
    $title = "Admin View - TravePal";
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
                                <div class="main-wrapper">
                                    <h2 class="heder-profile">Tourist</h2>
                                    <div>
                                        <table>
                                            <thead>
                                                <tr class="table-header" style="border:1px solid rgb(255, 255, 255);">
                                                    <th style="min-width: 200px;">Name</th>
                                                    <th style="min-width: 200px;">Email</th>
                                                    <th style="min-width: 200px;">Address</th>
                                                    <!-- <th style="min-width: 150px;">Edit</th> -->
                                                    <th style="min-width: 200px;">Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $getManagers = "SELECT * FROM user WHERE user_type= '" . 3 . "'";
                                                $manage_result = $conn->query($getManagers);
                                                if ($manage_result) {
                                                    if ($manage_result->num_rows > 0) {
                                                        while ($manager = $manage_result->fetch_assoc()) { ?>
                                                            <tr style="background-color: #FFFFFFCC;">
                                                                <td class="td-txt"><?php echo $manager['first_name']; ?> <?php echo $manager['last_name']; ?></td>
                                                                <td class="td-txt"><?php echo $manager['email']; ?></td>
                                                                <td class="td-txt"><?php echo $manager['address']; ?></td>
                                                                <!-- <td style="padding: 5px 5px;">
                                                                    <a href="UpdateManager.php?id=<?php echo $manager['user_Id']; ?>&page=location:./AdminViewTourist.php">
                                                                        <center><button style="background-color: var(--accentcolor); width:20px; height:20px;" type="submit" value="editBtn"><img src="../../images/edit-text.png" alt="edit" width="16" height="16"></button></center>
                                                                    </a>
                                                                </td> -->
                                                                <td style="padding: 5px 5px;">
                                                                    <a href="./subComponent/DeleteUserItem.php?id=<?php echo $manager['user_Id']; ?>&page=location:../AdminViewTourist.php">
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
                                                    echo "Error in " . $sql . " " . $conn->error;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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

<footer>
        <hr>
        <div class="footer-bottom">
                © <?php echo date("Y"); ?> TRAVEL PAL ALL RIGHTS RESERVED
        </div>
</footer>

</html>