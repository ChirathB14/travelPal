<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- <link rel="stylesheet" href="../../css/header.css"> -->
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/profile.css">
    <!-- <link rel="stylesheet" href="../../css/newFooter.css"> -->
    <script type="text/javascript" src="../../js/profile.js"></script>
</head>


<?php
    $title = "Update Profile - TravePal";
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
        
                    <!-- <ul class="header-ul">

                        <li class="header-left-li"><img class="headerbtm" src="../../images/logo.png" alt="logo" width="150" height="50"></li>
                        <li class="header-left-li"><a class="header-left-li a" href="../../index.php">Home</a></li>
                        <li class="header-left-li"><a class="header-left-li a" href="../TourPlanningComponent/TourPlanningIndex.php">Tour Plan</a></li>
                        <li class="header-left-li"><a class="header-left-li a" href="../Blog/ContactUS.php">Contact Us</a></li>
                        <li class="header-left-li"><a class="header-left-li a" href="../Blog/ViewBlogs.php">Blogs</a></li>
                        <li class="header-left-li"><a class="header-left-li a" style="background-color: #00357A;" id="profile" href="./Profile.php">Profile</a></li>
                        <li class="header-right-li"><a class="header-left-li a" id="logout"><button class="button-login" onclick="logOut()"><img src="../../images/User-Icon.png" alt="logo" width="20" height="20" style="margin-right: 10px;">Logout</button></a></li>
                    </ul> 
                    <hr style="background-color: #327972;color:#327972"/>
                --> 

                    <table style="width:100%; height: 100%; overflow-y: hidden;">
                        <tr VALIGN=TOP>
                        <?php include './subComponent/VerticleHeader.php'; ?>
                            <td class="td-profile">
                                <div class="main-wrapper" style="margin-top: 10px;">
                                    <h2 class="heder-profile">Update Profile</h2>
                                    <div class="profile-main-wrapper">
                                        <!-- <form method="POST" action="UpdateProfile.php">
                                            <button class="delete-btn" id="deleteBtn" name="deleteBtn">xxx</button>
                                        </form> -->
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
                                        <form method="POST" action="UpdateProfile.php">
                                            <div class="line-wrapper">
                                                <label class="line-txt" for="firstName" style="width:25%"><b>First Name:</b></label>
                                                <input class="line-wrapper line-txt" type="text" id="firstName" name="firstName" style="width:75%" placeholder="First Name" value="<?php echo $row['first_name']; ?>" required>
                                            </div>
                                            <div class="line-wrapper">
                                                <label class="line-txt" for="lastName" style="width:25%"><b>Last Name:</b></label>
                                                <input class="line-wrapper line-txt" type="text" id="lastName" name="lastName" style="width:75%" placeholder="Last Name" value="<?php echo $row['last_name']; ?>" required>
                                            </div>
                                            <div class="line-wrapper">
                                                <label class="line-txt" for="email" style="width:25%"><b>Email:</b></label>
                                                <input class="line-wrapper line-txt" type="email" id="email" name="email" style="width:75%" placeholder="Email" value="<?php echo $row['email']; ?>" required>
                                            </div>
                                            <div class="line-wrapper">
                                                <label class="line-txt" for="address" style="width:25%"><b>Address:</b></label>
                                                <input class="line-wrapper line-txt" type="text" id="address" name="address" style="width:75%" placeholder="Address" value="<?php echo $row['address']; ?>" required>
                                            </div>
                                            <center>
                                                <button class="update-btn" type="submit" id="updateBtn" name="updateBtn" value="updateBtn">Save</button>
                                            </center>
                                            <?php
                                            if (isset($_POST['updateBtn'])) {

                                                $first = $_POST["firstName"];
                                                $last = $_POST["lastName"];
                                                $email = $_POST["email"];
                                                $address = $_POST["address"];



                                                $sql = "UPDATE user SET first_name='$first', last_name='$last', email='$email', address ='$address' WHERE user_Id= '$userID'";

                                                if ($conn->query($sql) === TRUE) {
                                                    echo '<script language = "javascript">';
                                                    echo 'onUpdateSuccess()';
                                                    echo '</script>';
                                                } else {
                                                    echo '<script language = "javascript">';
                                                    echo 'alert("Unsuccessfull :( ")';
                                                    echo '</script>';
                                                }
                                                $conn->close();
                                            }
                                            ?>
                                        </form>
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

<!-- <footer class="custom-footer">
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
--> 
    
<footer>
        <hr>
        <div class="footer-bottom">
                © <?php echo date("Y"); ?> TRAVEL PAL ALL RIGHTS RESERVED
        </div>
</footer>

</html>