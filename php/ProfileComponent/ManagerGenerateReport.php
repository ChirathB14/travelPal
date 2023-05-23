<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/profile.css">
    <script type="text/javascript" src="../../js/profile.js"></script>
    <script src="../../js/jquery-3.6.4.min.js"></script>
</head>

<?php
    $title = "Generate Report - TravePal";
?>
<body onload="checkUserAccess();">
    <!-- <script>
        function hideParagraph() {
            document.getElementById("requird-destination").style.display = "none";
        }

        function showParagraph() {
            document.getElementById("requird-destination").style.display = "display";
        }
    </script> -->
    <?php
    require '../DbConfig.php';
    if (isset($_COOKIE['user'])) {

        $userID = json_decode($_COOKIE['user'])->user_Id;


        $sql = "SELECT first_name, last_name, email, address FROM user WHERE user_Id= '" . $userID . "'";
        $result = $conn->query($sql);
        // echo $conn->query($sql);
        // $data = json_encode($result->user);
        // 11111111
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
<div class="Report-row">
    <div class="Report-columnLeft">
        <?php include './subComponent/VerticleHeader.php'; ?>
    </div>
    <div class="Report-column"style="margin-left:15% ; margin-right:15%; background-color: #D9D9D9;">
    <div class="profile-main-wrapper" >
                                        <form method="POST" action="report.php" autocomplete="off" enctype="multipart/form-data">
                                            <center>
                                            <h2 class="heder-profile" style="color: var(--primarycolor);">Service Details</h2>
                                                <div class="input-elements">
                                                    <div class="line-wrapper line-txt">
                                                        <p>
                                                            &nbsp; User ID : 
                                                            <input type="text" name="user_id">
                                                        </p> 
                                                    </div>
                                                    <div class="line-wrapper line-txt">
                                                        <p>
                                                            &nbsp; Name : 
                                                            <input type="text" name="firstName">
                                                        </p> 
                                                    </div>
                                                    <div class="line-wrapper line-txt">
                                                        <p>
                                                            &nbsp; Email : 
                                                            <input type="email" name="email">
                                                        </p> 
                                                    </div>
                                                    <div class="line-wrapper line-txt">
                                                        <p>
                                                            &nbsp; NIC : 
                                                            <input type="text" name="nic">
                                                        </p> 
                                                    </div>
                                                    <div class="line-wrapper line-txt">
                                                        <p>
                                                            &nbsp; Phone Number : 
                                                            <input type="text" name="phoneNo">
                                                        </p> 
                                                    </div>
                                                    <div class="line-wrapper line-txt" >
                                                        <p>
                                                            <select id="" class="line-wrapper line-txt"name="serviceType" style="width: 377px;  margin-top: 7px; 
                                                                background-color: var(--accentcolor); height: 34px;
                                                                border: none; font-size: 10px; font-weight: bold;">
                                                                <option value="" disabled hidden selected >SELECT SERVICE TYPE</option>
                                                                <option value="Accommodation Provider">Accommodation Provider</option>
                                                                <option value="Vehicle Porvider">Vehicle Porvider</option>
                                                                <option value="Tour Guide">Tour Guide</option>
                                                            </select>
                                                        </p> 
                                                    </div>
                                                    <div class="line-wrapper line-txt" >
                                                        <p>
                                                            &nbsp; Start Date : 
                                                            <input type="date" name="startDate">
                                                        </p> 
                                                    </div>
                                                    <div class="line-wrapper line-txt">
                                                        <p>
                                                            &nbsp; End Date : 
                                                            <input type="date" name="endDate">
                                                        </p> 
                                                    </div>
                                                    <button type="submit" class="" name="Reportbtn">Generate Report</button>
                                            </div>
                                            </center>
                                        </form>
                                        
                                        </div>

                                        <?php
                                            $errors = array();
                                            $report_id = '';

                                            if (isset($_POST['Reportbtn'])) {
                                                    $userID = $_POST["user_id"];
                                                    $firstName =$_POST['firstName'];
                                                    $email = trim($_POST['email']);
                                                    $nic = trim($_POST['nic']);
                                                    $phoneNo = trim($_POST['phoneNo']);
                                                    $serviceType = trim($_POST['serviceType']);
                                                    $startDate = trim($_POST['startDate']);
                                                    $endDate = trim($_POST['endDate']);

                
                                                        //checking required fields
                                                        if (empty($userID) || empty($firstName) || empty($email) || empty($nic) || empty($phoneNo) || empty($startDate) || empty($endDate)) {
                                                            array_push($errors, "All the fields are required");
                                                        }

                                                        //checking whether the service type is selected
                                                        if (empty($serviceType)) {
                                                            array_push($errors, "Service Type is not selected");
                                                        }

                                                        //checking maxlength
                                                        $max_len_fields = array('firstName' => 50, 'email' => 50);

                                                        //checking max length fields
                                                        $errors = array_merge($errors, check_max_length($max_len_fields));

                                                        if (empty($errors)) {
                                                            $sqltwo = "INSERT INTO report(userID, startDate, endDate) VALUES ($userID, $startDate, $endDate)";
                                                        }
                                                            if ($conn->query($sqltwo) === TRUE) {
                                                                header('location: report.php');
                                                                echo '<script language = "javascript">';
                                                                echo 'newPlanCreated()';
                                                                echo '</script>';
                                                            } else {
                                                                header('Location: ManagerGenerateReport.php?failed=yes');
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



        </div>
    </div>
</div>



<?php
                }
                else {
            echo "Error in " . $sql . "
                    " . $conn->error;
        }

        $conn->close(); 
    // 1111111
    ?>

</body>

<footer>
        <hr>
        <div class="footer-bottom">
                © <?php echo date("Y"); ?> TRAVEL PAL ALL RIGHTS RESERVED
        </div>
</footer>
</html>
    