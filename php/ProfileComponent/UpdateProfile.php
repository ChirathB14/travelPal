<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/profile.css">

    <script type="text/javascript" src="../../js/profile.js"></script>

    <style>
        .update {
            display: flex;
            flex-direction: row;
            background-color: var(--accentcolor);
            color: var(--primarycolor);
            border-radius: 5px;
            border: none;
            cursor: pointer;
            margin: 10px;
        }

        .update label {
            font-size: 14px;
            font-weight: 500;
            margin: 25px 10px 25px 15px;
        }

        .update input {
            font-size: 14px;
            font-weight: 500;
            margin: 15px;
            border-radius: 5px;
            border: 2px solid gray;
            padding: 5px 10px;
        }
    </style>
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

                    <table style="width:100%; height: 100%; overflow-y: hidden;">
                        <tr VALIGN=TOP>
                        <?php include './subComponent/VerticleHeader.php'; ?>
                            <td class="td-profile">
                                <div class="main-wrapper" style="margin-top: 10px;">
                                    <h2 class="heder-profile">Update Profile</h2>
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
                                        <form method="POST" action="UpdateProfile.php">
                                            <div class="update">
                                                <label class="line-txt" for="firstName" style="width:25%"><b>First Name:</b></label>
                                                <input class="line-wrapper line-txt" type="text" id="firstName" name="firstName" style="width:75%" placeholder="First Name" value="<?php echo $row['first_name']; ?>" required>
                                            </div>
                                            <div class="update">
                                                <label class="line-txt" for="lastName" style="width:25%"><b>Last Name:</b></label>
                                                <input class="line-wrapper line-txt" type="text" id="lastName" name="lastName" style="width:75%" placeholder="Last Name" value="<?php echo $row['last_name']; ?>" required>
                                            </div>
                                            <div class="update">
                                                <label class="line-txt" for="email" style="width:25%"><b>Email:</b></label>
                                                <input class="line-wrapper line-txt" type="email" id="email" name="email" style="width:75%" placeholder="Email" value="<?php echo $row['email']; ?>" required>
                                            </div>
                                            <div class="update">
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
    
<footer>
        <hr>
        <div class="footer-bottom">
                © <?php echo date("Y"); ?> TRAVEL PAL ALL RIGHTS RESERVED
        </div>
</footer>

</html>