<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/profile.css">

    <script type="text/javascript" src="../../js/custermizePlan.js"></script>
    <script src="../../js/jquery-3.6.4.min.js"></script>
    <script src="sweetalert2.all.min.js"></script>

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

        input {
    height: 45px;
    width: 100%;
    outline: none;
    font-size: 16px;
    border-radius: 5px;
    padding-left: 15px;
    border: 1px solid #ccc;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
  }
    </style>
</head>

<body style="background-color: white !important;">
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

                    <div  style="width: 50%; margin: 8% auto; box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.3);">
                    <br>
                        <h2 class="heder-profile" style="color: var(--primarycolor);">Create New Plan</h2>
                        <div>
                            <form method="POST" action="CustomizePlans.php" autocomplete="off" enctype="multipart/form-data">
                                <center>
                                        <br>
                                        <!-- <p style="color: var(--accentcolor); font-size: 14px; text-align: left;">Select the location*</p> -->
                                        <select id="location" name="location" class="line-wrapper line-txt" 
                                                style="
                                                height: 45px;
                                                width: 400px;
                                                outline: none;
                                                font-size: 12px;
                                                border-radius: 5px;
                                                padding-left: 15px;
                                                border: 1px solid #ccc;
                                                border-bottom-width: 2px;
                                                transition: all 0.3s ease;
                                                margin-left: 195px;
                                                " required>
                                            <option value="" disabled selected hidden>LOCATION</option>
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

                                        <br>
                                        <!-- <p style="color: var(--accentcolor); font-size: 14px; text-align: left;">Select the destination*</p> -->
                                        <select onclick="hideParagraph()" id="destination" name="destination[]" class="line-wrapper line-txt" 
                                                style="height: 45px;
                                                width: 400px;
                                                outline: none;
                                                font-size: 12px;
                                                border-radius: 5px;
                                                padding-left: 15px;
                                                border: 1px solid #ccc;
                                                border-bottom-width: 2px;
                                                transition: all 0.3s ease;
                                                margin-left: 195px;" multiple required>
                                            <option value="" disabled>DESTINATION</option>
                                        </select>

                                        <br>
                                        <!-- <p id="requird-destination" style="color: red; font-size: 14px; text-align: left; display: none;">Select Type of the package*</p> -->
                                        <select id="typeOfPackage" name="typeOfPackage" class="line-wrapper line-txt" 
                                                style="height: 45px;
                                                width: 400px;
                                                outline: none;
                                                font-size: 12px;
                                                border-radius: 5px;
                                                padding-left: 15px;
                                                border: 1px solid #ccc;
                                                border-bottom-width: 2px;
                                                transition: all 0.3s ease;
                                                margin-left: 195px;" required>
                                            <option value="" disabled selected hidden>TYPE OF PACKAGE</option>
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
                                    
                                        <br>
                                        <!-- <p style="color: var(--accentcolor); font-size: 14px; text-align: left;">Select no of days*</p> -->
                                        <div class="input-elements">
                                            <input class="line-wrapper line-txt" type="number" id="noOfDays" name="noOfDays" 
                                                style="height: 45px;
                                                width: 400px;
                                                outline: none;
                                                font-size: 14px;
                                                border-radius: 5px;
                                                padding-left: 15px;
                                                border: 1px solid #ccc;
                                                border-bottom-width: 2px;
                                                transition: all 0.3s ease;
                                                margin-left: 0px;" min="1" placeholder="No Of Days" pattern="^\d+$" required>
                                        </div>
                                        <div class="new-user" >
                                            <button class="update-btn" type="submit" id="SaveBtn" name="SaveBtn" value="SaveBtn" style="background-color: var(--primarycolor);">Next</button>
                                            <br><br>
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
                                        $createdDate = date('Y-m-d');

                                        $sqltwo = "INSERT INTO new_plan (plan_Id, location, no_of_day, price, type_of_package, isActive,  destination, image, created_date, created_by, by_manager) VALUES (0,'$location','$noOfDays','$price','$typeOfPackage','$isActive', '$destination', 'None', '$createdDate', '$userID', '0' )";
                                        if ($conn->query($sqltwo) === TRUE) {
                                            $pk = mysqli_insert_id($conn);
                                            echo '<script language = "javascript">';
                                            echo 'moveToNext(' . $pk . ')';
                                            echo '</script>';
                                        } else {
                                            echo '<script language = "javascript">';
                                            echo 'swal.fire ({
                                                    title: "Unsuccessfull",
                                                    text: "Something went wrong",
                                                    icon: "error",
                                                    confirmButtonText: "Retry",
                                                    confirmButtonColor: "#0E064D",
                                                    footer: "TravelPal"
                                                    })';
                                            // echo 'alert("Unsuccessfull :( ")';
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
                    " . $conn->$error;
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

    <!-- footer -->
    <footer>
        <hr>
        <div class="footer-bottom">
                © <?php echo date("Y"); ?> TRAVEL PAL ALL RIGHTS RESERVED
        </div>
</footer>
</html>