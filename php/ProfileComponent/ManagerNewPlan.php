<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/profile.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script type="text/javascript" src="../../js/profile.js"></script>
    <script src="../../js/jquery-3.6.4.min.js"></script>
</head>

<?php
    $title = "New Tour Plan - TravePal";
?>

<body onload="checkUserAccess();">
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
                  
                    <table style="width:100%;height: 100%;overflow-y: hidden;">
                        <tr VALIGN=TOP>
                            <?php include './subComponent/VerticleHeader.php'; ?>
                            <td class="td-profile" style="text-align:left">
                                <div class="main-wrapper" style="margin-top:10px;">
                                    <div>
                                        <a href="./ManagerAddNewDestination.php">
                                            <button class="add-service-btn" style="width:280px; margin: 10px;">Add New Destination</button>
                                        </a>
                                    </div>

                                    <div class="profile-main-wrapper" style="width: 85%; margin: 0 5% 0 5%;">
                                        <form method="POST" action="ManagerNewPlan.php" autocomplete="off" enctype="multipart/form-data">
                                            <center>
                                            <h1>Create New Plan</h1>
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
                                                    <select onclick="hideParagraph()" id="destination" name="destination[]" class="line-wrapper line-txt" multiple style="width: 400px;  margin-top: 12px; 
                                                    background-color: var(--accentcolor); opacity: 0.75; height: 40px;
                                                    box-sizing: border-box; border: none; border-radius: 5px;
                                                    font-size: 10px; font-weight: bold; color:#808080;" required>
                                                        <option value="" disabled>Destination</option>
                                                    </select>
                                                <p id="requird-destination" style="color:red; font-size: 12px;">* Destinations are required</p>
                                                    <select id="typeOfPackage" name="typeOfPackage" class="line-wrapper line-txt" style="width: 400px;  margin-top: 12px; 
                                                    background-color: var(--accentcolor); opacity: 0.75; height: 40px;
                                                    box-sizing: border-box; border: none; border-radius: 5px;
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
                                                    <input type="text" id="noOfDays" name="noOfDays" placeholder="No Of Days" pattern="^\d+$" required>
                                                    <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" style="padding: 10px;" required>
                                                <button class="update-btn" type="submit" id="SaveBtn" name="SaveBtn" value="SaveBtn" style="margin-left: 90px;">Save</button>
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
                                                    $createdDate = date('Y-m-d');

                                                    if ($_FILES["image"]["error"] == 4) {
                                                        echo
                                                        "<script> alert('Image Does Not Exist'); </script>";
                                                    } else {
                                                        $fileName = $_FILES["image"]["name"];
                                                        $fileSize = $_FILES["image"]["size"];
                                                        $tmpName = $_FILES["image"]["tmp_name"];

                                                        $validImageExtension = ['jpg', 'jpeg', 'png'];
                                                        $imageExtension = explode('.', $fileName);
                                                        $imageExtension = strtolower(end($imageExtension));
                                                        if (!in_array($imageExtension, $validImageExtension)) {
                                                            echo
                                                            "
                                                      <script>
                                                        alert('Invalid Image Extension');
                                                      </script>
                                                      ";
                                                        } else if ($fileSize > 2000000) {
                                                            echo
                                                            "
                                                      <script>
                                                        alert('Image Size Is Too Large');
                                                      </script>
                                                      ";
                                                        } else {
                                                            $newImageName = uniqid();
                                                            $newImageName .= '.' . $imageExtension;
                                                
                                                            move_uploaded_file($tmpName, '../../upload/PlannedTourImg/' . $newImageName);
                                                            $sqltwo = "INSERT INTO new_plan (plan_Id, season, location, no_of_day, price, type_of_package, isActive,  destination, image, created_date, created_by, by_manager)
                                                            VALUES (0,'$season','$location','$noOfDays','$price','$typeOfPackage','$isActive', '$destination', '$newImageName', '$createdDate', '$userID', '1' )";

                                                            if ($conn->query($sqltwo) === TRUE) {
                                                                echo '<script language = "javascript">';
                                                                echo 'newPlanCreated()';
                                                                echo '</script>';
                                                            } else {
                                                                echo '<script language = "javascript">';
                                                                echo 'alert("Unsuccessfull :( ")';
                                                                echo '</script>';
                                                            }
                                                        }
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

<footer>
        <hr>
        <div class="footer-bottom">
                © <?php echo date("Y"); ?> TRAVEL PAL ALL RIGHTS RESERVED
        </div>
</footer>
</html>