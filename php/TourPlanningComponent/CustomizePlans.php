<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../../css/header.css"> -->
    <!-- <link rel="stylesheet" href="../../css/custermizePlan.css"> -->
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/profile.css">

    <!-- <link rel="stylesheet" href="../../css/newFooter.css"> -->
    <script type="text/javascript" src="../../js/custermizePlan.js"></script>
    <script src="../../js/jquery-3.6.4.min.js"></script>

    <style>        
        ::-webkit-file-upload-button {
            color: white;
            background: var(--secondarycolor);
            padding: 5px;
            border: none;
            border-radius: 5px;
            height: 25px;
            float: right;
            position: inherit;
        }

        ::-webkit-file-upload-button :hover {
            background: #438a5e;
            cursor: progress;
        }
    </style>
</head>

<body style="background-color: #0E064D;">
    <script>
        function hideParagraph() {
            document.getElementById("requird-destination").style.display = "none";
        }

        function showParagraph() {
            document.getElementById("requird-destination").style.display = "display";
        }
    </script>
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
        $title = "Customize Your Plan - TravePal";
        require_once("../Common/header.php");
        ?>
                    <!-- <ul class="header-ul">
                        <li class="header-left-li"><img class="headerbtm" src="../../images/logo.png" alt="logo" width="150" height="50"></li>
                        <li class="header-left-li"><a class="header-left-li a" href="../../index.php">Home</a></li>
                        <li class="header-left-li"><a class="header-left-li a" href="../TourPlanningComponent/TourPlanningIndex.php">Tour Plan</a></li>
                        <li class="header-left-li"><a class="header-left-li a" href="../Blog/ContactUS.php">Contact Us</a></li>
                        <li class="header-left-li"><a class="header-left-li a" href="../Blog/ViewBlogs.php">Blogs</a></li>
                        <li class="header-left-li"><a class="header-left-li a" style="background-color: #00357A;" id="profile" href="./Profile.php">Profile</a></li>
                        <li class="header-right-li"><a class="header-left-li a" id="logout"><button class="button-login" onclick="logOut()"><img src="../../images/User-Icon.png" alt="logo" width="20" height="20" style="margin-right: 10px;">Logout</button></a></li>
                    </ul>
                    <hr style="background-color: #327972;color:#327972"/> -->
                    <!-- <div class="register"> -->
                    <div class="profile-main-wrapper" style="width: 40%; margin: 5% auto 5% auto;">
                        <h2 class="heder-profile" style="color: var(--primarycolor);">Create New Plan</h2>
                        <div class="profile-main-wrapper">
                            <form method="POST" action="CustomizePlans.php" autocomplete="off" enctype="multipart/form-data">
                                <center>
                                    <div class="input-elements">
                                        <select id="season" name="season" class="line-wrapper line-txt" style="width: 400px;  margin-top: 12px; 
                                                    background-color: var(--accentcolor); opacity: 0.75; height: 40px;
                                                    box-sizing: border-box; border: none; border-radius: 5px;
                                                    font-size: 10px; font-weight: bold; color:#808080;" required>
                                            <option value="" disabled selected hidden>Season</option>
                                            <?php
                                            $season_sql = "SELECT * FROM season WHERE isActive= '" . 1 . "'";
                                            $season_result = $conn->query($season_sql);
                                            if ($season_result) {
                                                if ($season_result->num_rows > 0) {
                                                    while ($season = $season_result->fetch_assoc()) {
                                            ?>
                                                        <option value="<?php echo ($season["season_name"]) ?>"><?php echo ($season["season_name"]) ?></option>
                                            <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- <div class="input-elements"> -->
                                        <select id="location" name="location" class="line-wrapper line-txt" style="width: 400px;  margin-top: 12px; 
                                                background-color: var(--accentcolor); opacity: 0.75; height: 40px;
                                                box-sizing: border-box; border: none; border-radius: 5px;
                                                font-size: 10px; font-weight: bold; color:#808080;" required>
                                            <option value="" disabled selected hidden>Location</option>
                                            <?php
                                            $location_sql = "SELECT * FROM districts WHERE isActive= '" . 1 . "'";
                                            $location_result = $conn->query($location_sql);
                                            if ($location_result) {
                                                if ($location_result->num_rows > 0) {
                                                    while ($location = $location_result->fetch_assoc()) {
                                            ?>
                                                        <option value="<?php echo ($location["name"]) ?>"><?php echo ($location["name"]) ?></option></a>
                                            <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                    <!-- </div> -->
                                    <!-- <div class="input-elements"> -->
                                        <select onclick="hideParagraph()" id="destination" name="destination[]" class="line-wrapper line-txt" style="width: 400px;  margin-top: 12px; 
                                                background-color: var(--accentcolor); opacity: 0.75; height: 40px;
                                                box-sizing: border-box; border: none; border-radius: 5px;
                                                font-size: 10px; font-weight: bold; color:#808080;" multiple required>
                                            <option value="" disabled>Destination</option>
                                        </select>
                                    <!-- </div> -->
                                    <p id="requird-destination" style="color:red; font-size: 12px;">* Destinations are required</p>
                                    <!-- <div class="input-elements"> -->
                                        <select id="typeOfPackage" name="typeOfPackage" class="line-wrapper line-txt" style="width: 400px;  margin-top: 12px; 
                                                background-color: var(--accentcolor); opacity: 0.75; height: 40px; box-sizing: border-box; border: none; border-radius: 5px;
                                                font-size: 10px; font-weight: bold; color:#808080;" required>
                                            <option value="" disabled selected hidden>Type Of Package</option>
                                            <?php
                                            $type_sql = "SELECT * FROM plan_types WHERE isActive= '" . 1 . "'";
                                            $type_result = $conn->query($type_sql);
                                            if ($type_result) {
                                                if ($type_result->num_rows > 0) {
                                                    while ($type = $type_result->fetch_assoc()) {
                                            ?>
                                                        <option value="<?php echo ($type["name"]) ?>"><?php echo ($type["name"]) ?></option>
                                            <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                    <!-- </div> -->
                                    <div class="input-elements">
                                        <input class="line-wrapper line-txt" type="text" id="noOfDays" name="noOfDays" style="width: 400px;  margin-top: 12px; 
                            background-color: var(--accentcolor); opacity: 0.75; height: 40px;
                            box-sizing: border-box; border: none; border-radius: 5px;
                            font-size: 10px; font-weight: bold; color:#808080;" min="1" placeholder="No Of Days" pattern="^\d+$" required>
                                    </div>
                                    <!-- <div class="line-wrapper">
                                        <input class="line-wrapper line-txt" type="text" id="price" name="price" style="width:90%" placeholder="Price" pattern="^\d+(\d{3})*(\.\d{1,2})?$" required>
                                    </div> -->
                                    <!-- <div class="input-elements">
                                        <input class="line-wrapper line-txt" type="file" name="image" id="image" accept=".jpg, .jpeg, .png" required>
                                    </div> -->
                                    <div class="new-user" >
                                        <button class="update-btn" type="submit" id="SaveBtn" name="SaveBtn" value="SaveBtn">Next</button>
                                    </div>

                                    </center>
                                <?php
                                if (isset($_POST['SaveBtn'])) {
                                    if (isset($_POST["destination"])) {
                                        $selectedOptions = $_POST['destination'];
                                        // Serialize the selected options into a string
                                        //! Note that when retrieving the serialized string from the SQL column, you'll need to use the unserialize() function to convert it back into an array of values. 
                                        $destination = serialize($selectedOptions);
                                        $location = $_POST["location"];
                                        $noOfDays = $_POST["noOfDays"];
                                        $price = 0;
                                        $typeOfPackage = $_POST["typeOfPackage"];
                                        $isActive = true;
                                        $season = $_POST["season"];
                                        $createdDate = date('Y-m-d H:i:s');

                                        $sqltwo = "INSERT INTO new_plan (plan_Id, season, location, no_of_day, price, type_of_package, isActive,  destination, image, created_date, created_by, by_manager) VALUES (0,'$season','$location','$noOfDays','$price','$typeOfPackage','$isActive', '$destination', 'None', '$createdDate', '$userID', '0' )";
                                        if ($conn->query($sqltwo) === TRUE) {
                                            $pk = mysqli_insert_id($conn);
                                            echo '<script language = "javascript">';
                                            echo 'moveToNext(' . $pk . ')';
                                            echo '</script>';
                                        } else {
                                            echo '<script language = "javascript">';
                                            echo 'alert("Unsuccessfull :( ")';
                                            echo '</script>';
                                        }
                                    } else {
                                        echo '<script language = "javascript">
                                                    showParagraph()
                                              </script>';
                                    }
                                }

                                ?>
                            </form>



                        </div>
                    </div>

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


    <script>
        $(document).ready(function() {
            // When the country select changes, send an AJAX request to get the corresponding cities
            $('#location').change(function() {
                var location = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: './subComponent/Get_Destination.php', // Replace with the URL of your PHP script that gets the cities
                    data: {
                        location: location
                    },
                    dataType: 'json',
                    success: function(data) {
                        // Clear the city select and add the new options
                        $('#destination').html('<option value="" disabled selected hidden>Destination</option>');
                        $.each(data, function(index, value) {
                            $('#destination').append('<option value="' + value + '">' + value + '</option>');
                        });
                    }
                });
            });
        });
    </script>
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
    </footer> -->
    <!-- footer -->
    <?php require_once("../Common/footer.php");?>
</html>