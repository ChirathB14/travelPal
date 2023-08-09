<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/profile.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript" src="../../js/profile.js"></script>
    <script src="sweetalert2.all.min.js"></script>
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

                            <td class="td-profile" style="width:100%">
                                <div class="main-wrapper">
                                    <h1 class="heder-profile">Profile</h1>
                                    <div class="profile-main-wrapper">
                                        <div>
                                            <img class="headerbtm" src="../../images/Profile.png" alt="logo" width="120" height="120">
                                            <p class="user-name"><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></p>
                                        </div>
                                        <?php
                                        if (isset($_POST['deleteBtn'])) {
                                            $sql = "DELETE FROM user WHERE user_Id= '$userID'";

                                            if ($conn->query($sql) === TRUE) {
                                                echo '<script language = "javascript">';
                                                echo 'onDeleteSuccess()';
                                                echo '</script>';
                                            } else {
                                                echo '<script language = "javascript">';
                                                echo 'Swal.fire({
                                                    title: "Unsuccessfull :( ",
                                                    text: "Please try again",
                                                    icon: "error",
                                                    confirmButtonText: "OK",
                                                    confirmButtonColor: "var(--primarycolor)",
                                                    footer: "TravelPal"
                                                    })';
                                                // echo 'alert("Unsuccessfull :( ")';
                                                echo '</script>';
                                            }
                                            $conn->close();
                                        }
                                        ?> 
                                        <div>
                                            <div class="line-wrapper">
                                                <label for="">First Name : </label>
                                                <input type="text" value="<?php echo $row['first_name']; ?>" disabled>
                                            </div>
                                            <div class="line-wrapper">
                                                <label for="">Last Name : </label>
                                                <input type="text" value="<?php echo $row['last_name']; ?>" disabled>
                                            </div>
                                            <div class="line-wrapper">
                                                <label for="">Email : </label>
                                                <input type="text" value="<?php echo $row['email']; ?>" disabled>
                                            </div>
                                            <div class="line-wrapper">
                                                <label for="">Address : </label>
                                                <input type="text" value="<?php echo $row['address']; ?>" disabled>
                                            </div>
                                        </div>
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