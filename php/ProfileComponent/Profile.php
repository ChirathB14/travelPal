<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/profile.css">

    <script type="text/javascript" src="../../js/profile.js"></script>

    <script type="text/javascript" src="../../js/sweetalert2.min.js"></script>
    <script type="text/javascript" src="../../js/jquery-3.6.4.min.js"></script>
</head>

<?php
$title = "Profile - TravePal";
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
                                <div class="main-wrapper">
                                    <h2 class="heder-profile">Profile</h2>
                                    <div class="profile-main-wrapper">
                                        <?php
                                        if (isset($_POST['deleteBtn'])) {
                                            $sql = "DELETE FROM user WHERE user_Id= '$userID'";

                                            if ($conn->query($sql) === TRUE) {
                                                echo '<script language = "javascript">';
                                                echo 'onDeleteSuccess()';
                                                echo '</script>';
                                            } else {
                                                echo '<script language = "javascript">';
                                                echo 'alert("Unsuccessfull :( ")';
                                                echo '</script>';
                                            }
                                            $conn->close();
                                        }
                                        ?>
                                        <div class="line-wrapper">
                                            <p class="line-txt">
                                                First Name : <?php echo $row['first_name']; ?>
                                            </p>
                                        </div>
                                        <div class="line-wrapper">
                                            <p class="line-txt">
                                                Last Name : <?php echo $row['last_name']; ?>
                                            </p>
                                        </div>
                                        <div class="line-wrapper">
                                            <p class="line-txt">
                                                Email : <?php echo $row['email']; ?>
                                            </p>
                                        </div>
                                        <div class="line-wrapper">
                                            <p class="line-txt">
                                                Address : <?php echo $row['address']; ?>
                                            </p>
                                        </div>


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
        <?php echo date("Y"); ?> © TRAVEL PAL - ALL RIGHTS RESERVED
    </div>
</footer>

</html>