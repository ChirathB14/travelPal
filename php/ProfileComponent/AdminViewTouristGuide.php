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
                                <div class="main-wrapper">
                                    <h2 class="heder-profile">Tourist Guide</h2>
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
                                                $getManagers = "SELECT * FROM user WHERE user_type= '" . 4 . "' AND is_guide= '" . true . "'";
                                                $manage_result = $conn->query($getManagers);
                                                if ($manage_result) {
                                                    if ($manage_result->num_rows > 0) {
                                                        while ($manager = $manage_result->fetch_assoc()) { ?>
                                                            <tr style="background-color: #FFFFFFCC;">
                                                                <td class="td-txt"><?php echo $manager['first_name']; ?> <?php echo $manager['last_name']; ?></td>
                                                                <td class="td-txt"><?php echo $manager['email']; ?></td>
                                                                <td class="td-txt"><?php echo $manager['address']; ?></td>
                                                                <td style="padding: 5px 5px;">
                                                                    <a href="UpdateManager.php?id=<?php echo $manager['user_Id']; ?>&page=location:./AdminViewTouristGuide.php">
                                                                        <center><button type="submit" value="editBtn"><img src="../../images/edit-text.png" alt="edit" width="16" height="16"></button></center>
                                                                    </a>

                                                                </td>
                                                                <td style="padding: 5px 5px;">
                                                                    <a href="./subComponent/DeleteUserItem.php?id=<?php echo $manager['user_Id']; ?>&page=location:../AdminViewTouristGuide.php">
                                                                        <center> <button type="submit" value="deleteBtn" onclick="return confirm('Are you sure?\n Do You Want To Delete This User ?');"><img src="../../images/delete.png" alt="delete" width="16" height="16"></button> </center>
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