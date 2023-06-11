<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/profile.css">

    <script type="text/javascript" src="../../js/profile.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>

        .dashboard-top {
            display: flex;
            justify-content: space-between;
            width: 100%;
            height: 100%;
        }

        .dashboard-top-left {
            display: flex;
            justify-content: space-between;
            /* align-items: center; */
            margin: 0 20px 20px 0;
            border-radius: 5px;
            width: 96%;
            height: 180px;
            background-color: #00357A;
            padding: 10px; 
        }

        .dashboard-top-left-bottom {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin: 0 20px 20px 0;
            border-radius: 5px;
            width: 96%;
            /* height: 70%; */
            background-color: #00357A;
            padding: 10px; 
        }

        .dashboard-top-right {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0 20px 20px 0;
            border-radius: 5px;
            margin-bottom: 20px;
            width: 50%;
            background-color: #00357A;
        }

        .dashboard-style {
            width: 30%;
            height: 160px;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 30px;
        }

        .dashboard-top-right .dashboard-bottom {
            display: flex;
            justify-content: space-between;
            width: 100%;
            height: 100%;
        }

        .dashboard-bottom button {
            width: 25%;
            /* height: 15%; */
            border: none;
            background-color: #fff;
            border-radius: 4px;
            padding: 20px;
            cursor: pointer;
            font-size: 14px;
        }

        .dashboard-bottom button:hover {
            background-color: var(--secondarycolor) !important;
        }

        canvas {
            width: 70% !important;
            height: 95% !important;
        }

        .labels {
            color: var(--accentcolor) !important;
        }

        /* Style the tab */
        .tab {
        overflow: hidden;
        display: flex;
        flex-direction: column;
        width: 100%;
        }

        /* Style the buttons that are used to open the tab content */
        .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        height: 100%;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
        background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
        background-color: #ccc;
        color: var(--primarycolor);
        }

        /* Style the tab content */
        .tabcontent {
        display: none;
        /* padding: 6px 12px; */
        border-top: none;
        /* margin-left: 150px; */
        }

        .tabcontent {
        animation: fadeEffect 1s; /* Fading effect takes 1 second */
        }

        /* Go from zero to full opacity */
        @keyframes fadeEffect {
        from {opacity: 0;}
        to {opacity: 1;}
        }

        .report {
            display: flex;
            flex-direction: column;
            text-align: left !important;
            margin-left: 20px;
            padding: 20px;
            font-size: 14px;
            width: 90%;
            height: 80%;
            background-color: var(--accentcolor);
            border-radius: 5px;
            color: var(--primarycolor);
        }

        .reportbtn {
            background-color: var(--secondarycolor);
            color: var(--accentcolor);
            width: 200px;
            height: 40px;
            font-size: 14px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-weight: bold;
            text-transform: uppercase;
        }

    </style>
</head>

<?php
    $title = "Dashboard - TravePal";
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

                    <table style="width:95%">
                        <tr VALIGN=TOP>
                            <td style="">
                                <?php include './subComponent/VerticleHeader.php'; ?>
                            </td>
                            

                            <td class="td-profile">
                                
                                    <div class="container-profile">
                                        <br>
                                        <h1 class="profile-title">Dashboard</h1>
                                        <div class="dashboard-top">

                                        <div>
                                            <div class="dashboard-top-left">
                                                <!-- Display total no of managers-->
                                                <div class="dashboard-style">
                                                    <h2>No of Managers</h2>
                                                    <?php
                                                    // Query to get the total no of managers from the table by counting the records which has user_type = 2 
                                                    $sql = "SELECT COUNT(user_Id) AS total FROM user WHERE user_type = 2";
                                                    $result = $conn->query($sql);
                                                    $data = $result->fetch_assoc();
                                                    ?>
                                                    <!-- display the count of the smanagers -->
                                                    <h2><?php echo $data['total']; ?></h2>
                                                </div>

                                                <!-- Display total no of tourists-->
                                                <div class="dashboard-style">
                                                    <h2>No of Tourists</h2>
                                                    <?php
                                                    // Query to get the total no of tourists from the table by counting the records which has user_type = 3 
                                                    $sql = "SELECT COUNT(user_Id) AS total FROM user WHERE user_type = 3";
                                                    $result = $conn->query($sql);
                                                    $data = $result->fetch_assoc();
                                                    ?>
                                                    <!-- display the count of the tourists -->
                                                    <h2><?php echo $data['total']; ?></h2>
                                                </div>

                                                <!-- Display total no of service providers-->
                                                <div class="dashboard-style">
                                                    <h2>No of Service Providers</h2>
                                                    <?php
                                                    // Query to get the total no of service providers from the table by counting the records which has user_type = 4 
                                                    $sql = "SELECT COUNT(user_Id) AS total FROM user WHERE user_type = 4";
                                                    $result = $conn->query($sql);
                                                    $data = $result->fetch_assoc();
                                                    ?>
                                                    <!-- display the count of the service providers -->
                                                    <h2><?php echo $data['total']; ?></h2>
                                                </div>
                                            </div>

                                            <div class="dashboard-top-left-bottom">
                                                <br>

                                                <h2>Users</h2>
                                                <?php
                                                    if(isset($_GET['search'])){
                                                        $search = mysqli_real_escape_string($conn, $_GET['search']);
                                                        $sql1 = "SELECT * FROM user WHERE (first_name LIKE '%{$search}%' or last_name LIKE '%{$search}%' or email LIKE '%{$search}%' or address LIKE '%{$search}%' or user_type LIKE '%{$search}%') ";
                                            
                                                    } else {
                                                        $sql1 = "SELECT *  FROM user "; 
                                                    }
                                                    $result1 = $conn->query($sql1);
                                                ?>

                                                <div class="search">
                                                    <form action="AdminViewUsers.php" method="get">
                                                        <p style="margin:12px;">
                                                            <input style="width:100%; height:40px; border-radius:5px;" type="search" name="search" id="" placeholder="  Search Users..." >
                                                        </p>
                                                    </form>
                                                </div>

                                                <!-- View Tourist List -->
                                                <h2 class="heder-profile">Tourist</h2>
                                                <div>
                                                    <table>
                                                        <thead>
                                                            <tr class="table-header" style="background-color: var(--primarycolor);">
                                                                <th style="min-width: 195px;">Name</th>
                                                                <th style="min-width: 195px;">Email</th>
                                                                <th style="min-width: 195px;">Address</th>
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

                                                <br>
                                                <!-- View Accommodation provider List -->
                                                <h2 class="heder-profile">Accommodation Provider</h2>
                                                <div>
                                                    <table>
                                                        <thead>
                                                            <tr class="table-header" style="background-color: var(--primarycolor);">
                                                                <th style="min-width: 195px;">Name</th>
                                                                <th style="min-width: 195px;">Email</th>
                                                                <th style="min-width: 195px;">Address</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $getManagers = "SELECT * FROM user WHERE user_type= '" . 4 . "' AND is_accommodation= '" . true . "'";
                                                            $manage_result = $conn->query($getManagers);
                                                            if ($manage_result) {
                                                                if ($manage_result->num_rows > 0) {
                                                                    while ($manager = $manage_result->fetch_assoc()) { ?>
                                                                        <tr style="background-color: #FFFFFFCC;">
                                                                            <td class="td-txt"><?php echo $manager['first_name']; ?> <?php echo $manager['last_name']; ?></td>
                                                                            <td class="td-txt"><?php echo $manager['email']; ?></td>
                                                                            <td class="td-txt"><?php echo $manager['address']; ?></td>
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
                                                                echo "Error in " . $sql . " " . $conn->$error;
                                                            }
                                                            ?>
                                                        </tbody>

                                                    </table>
                                                </div>

                                                <br>
                                                <!-- View Vehicle Provider list -->
                                                <h2 class="heder-profile">Vehicle Provider</h2>
                                                <div>
                                                    <table>
                                                        <thead>
                                                            <tr class="table-header" style="background-color: var(--primarycolor);">
                                                                <th style="min-width: 200px;">Name</th>
                                                                <th style="min-width: 200px;">Email</th>
                                                                <th style="min-width: 200px;">Address</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $getManagers = "SELECT * FROM user WHERE user_type= '" . 4 . "' AND is_vehicle_provider= '" . true . "'";
                                                            $manage_result = $conn->query($getManagers);
                                                            if ($manage_result) {
                                                                if ($manage_result->num_rows > 0) {
                                                                    while ($manager = $manage_result->fetch_assoc()) { ?>
                                                                        <tr style="background-color: #FFFFFFCC;">
                                                                            <td class="td-txt"><?php echo $manager['first_name']; ?> <?php echo $manager['last_name']; ?></td>
                                                                            <td class="td-txt"><?php echo $manager['email']; ?></td>
                                                                            <td class="td-txt"><?php echo $manager['address']; ?></td>
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

                                                <br>
                                                <!-- View Tour Guide list -->
                                                <h2 class="heder-profile">Tourist Guide</h2>
                                                <div>
                                                    <table>
                                                        <thead>
                                                            <tr class="table-header" style="background-color: var(--primarycolor);">
                                                                <th style="min-width: 200px;">Name</th>
                                                                <th style="min-width: 200px;">Email</th>
                                                                <th style="min-width: 200px;">Address</th>
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
                                        </div>

                                        <!-- Graphs & Statistics -->
                                            <div class="dashboard-top-right">
                                                
                                                <h1 class="profile-title">Reports</h1>

                                                <script>
                                                    function openReport(evt, reportName) {
                                                    // Declare all variables
                                                    var i, tabcontent, tablinks;

                                                    // Get all elements with class="tabcontent" and hide them
                                                    tabcontent = document.getElementsByClassName("tabcontent");
                                                    for (i = 0; i < tabcontent.length; i++) {
                                                        tabcontent[i].style.display = "none";
                                                    }

                                                    // Get all elements with class="tablinks" and remove the class "active"
                                                    tablinks = document.getElementsByClassName("tablinks");
                                                    for (i = 0; i < tablinks.length; i++) {
                                                        tablinks[i].className = tablinks[i].className.replace(" active", "");
                                                    }

                                                    // Show the current tab, and add an "active" class to the button that opened the tab
                                                    document.getElementById(reportName).style.display = "block";
                                                    evt.currentTarget.className += " active";

                                                    // Get the element with id="defaultOpen" and click on it
                                                    // document.getElementById("defaultOpen").click();
                                                    }
                                                </script>

                                                <div class="dashboard-bottom">
                                                <!-- Tab links -->
                                                <div class="tab">
                                                    <div>
                                                        <button class="tablinks" onclick="openReport(event, 'Service Providers')" id="defaultOpen">Service Providers</button>
                                                        <button class="tablinks" onclick="openReport(event, 'Tour Plans Vs Service Providers')">Tour Plans Vs Service Providers</button>
                                                        <button class="tablinks" onclick="openReport(event, 'Tours Vs Type of package')">Tours Vs Type of package</button>
                                                    </div>
                                                <!-- <br> -->
                                                
                                                <!-- Tab content -->
                                                <div id="Service Providers" class="tabcontent">
                                                    <!-- pie graph to show the 3 types of service providers -->
                                                    <!-- <h2>Service Providers</h2> -->
                                                    <br>
                                                        <canvas id="myChart" width="300" height="300">
                                                        </canvas>

                                                        <script>
                                                            var ctx = document.getElementById('myChart').getContext('2d');

                                                            var accommodationCount = <?php
                                                                $sql = "SELECT COUNT(user_Id) AS total FROM user WHERE is_accommodation = 1";
                                                                $result = $conn->query($sql);
                                                                $data = $result->fetch_assoc();
                                                                echo $data['total'];
                                                            ?>;

                                                            var vehicleCount = <?php
                                                                $sql = "SELECT COUNT(user_Id) AS total FROM user WHERE is_vehicle_provider = 1 AND user_type = 4";
                                                                $result = $conn->query($sql);
                                                                $data = $result->fetch_assoc();
                                                                echo $data['total'];
                                                            ?>;

                                                            var guideCount = <?php
                                                                $sql = "SELECT COUNT(user_Id) AS total FROM user WHERE is_guide = 1 AND user_type = 4";
                                                                $result = $conn->query($sql);
                                                                $data = $result->fetch_assoc();
                                                                echo $data['total'];
                                                            ?>;

                                                            var chart = new Chart(ctx, {
                                                                type: 'pie',
                                                                data: {
                                                                    labels: ['Accommodation', 'Vehicle', 'Guide'],
                                                                    datasets: [{
                                                                        label: 'Service Providers',
                                                                        backgroundColor: ['rgb(255, 99, 132)', 'rgb(54, 162, 235)', 'rgb(255, 205, 86)'],
                                                                        borderColor: 'rgb(255, 255, 255)',
                                                                        data: [accommodationCount, vehicleCount, guideCount]
                                                                    }]
                                                                },
                                                                options: {}
                                                            });
                                                        </script>
                                                </div>

                                                <div id="Tour Plans Vs Service Providers" class="tabcontent">
                                                <!-- pie graph to show Tour Plans Vs Service Providers -->
                                                <!-- <h2>Tour Plans Vs Service Providers</h2> -->
                                                    <br>
                                                        <canvas id="TourPlanVsSPChart" width="300" height="300">
                                                        </canvas>

                                                        <script>
                                                            var cty = document.getElementById('TourPlanVsSPChart').getContext('2d');

                                                            // Using all 3 services
                                                            var AllServicesCount = <?php
                                                                $sql = "SELECT COUNT(tour_id) AS total FROM user_tours 
                                                                        WHERE accomadation_id IS NOT NULL AND accomadation_id != 0 
                                                                        AND vehicle_id IS NOT NULL AND vehicle_id != 0 
                                                                        AND guide_id IS NOT NULL AND guide_id != 0";
                                                                $result = $conn->query($sql);
                                                                $data = $result->fetch_assoc();
                                                                echo $data['total'];
                                                            ?>;

                                                            // Using 2 services
                                                            var TwoServicesCount = <?php
                                                                $sql = "SELECT COUNT(tour_id) AS total FROM user_tours 
                                                                        WHERE (accomadation_id IS NOT NULL AND accomadation_id != 0 AND vehicle_id IS NOT NULL AND vehicle_id != 0) 
                                                                        OR (accomadation_id IS NOT NULL AND accomadation_id != 0 AND guide_id IS NOT NULL AND guide_id != 0) 
                                                                        OR (vehicle_id IS NOT NULL AND vehicle_id != 0 AND guide_id IS NOT NULL AND guide_id != 0)";
                                                                $result = $conn->query($sql);
                                                                $data = $result->fetch_assoc();
                                                                echo $data['total'];
                                                            ?>;

                                                            // Using only 1 service
                                                            var OneServiceCount = <?php
                                                                $sql = "SELECT COUNT(tour_id) AS total FROM user_tours 
                                                                        WHERE (accomadation_id IS NOT NULL AND accomadation_id != 0) 
                                                                        OR (vehicle_id IS NOT NULL AND vehicle_id != 0) 
                                                                        OR (guide_id IS NOT NULL AND guide_id != 0)";
                                                                $result = $conn->query($sql);
                                                                $data = $result->fetch_assoc();
                                                                echo $data['total'];
                                                            ?>;

                                                            var chart = new Chart(cty, {
                                                                type: 'pie',
                                                                data: {
                                                                    labels: ['All services', 'Two services', 'Only one service'],
                                                                    datasets: [{
                                                                        label: 'Tours Vs Service Providers',
                                                                        backgroundColor: ['rgb(255, 99, 132)', 'rgb(54, 162, 235)', 'rgb(255, 205, 86)'],
                                                                        borderColor: 'rgb(255, 255, 255)',
                                                                        data: [AllServicesCount, TwoServicesCount, OneServiceCount]
                                                                    }]
                                                                },
                                                                options: {}
                                                            });
                                                        </script>
                                                </div>

                                                <div id="Tours Vs Type of package" class="tabcontent">
                                                <!-- pie graph to show the Tours Vs type of package -->
                                                <!-- <h2>Tours Vs Type of package</h2> -->
                                                    <br>
                                                        <canvas id="ToursVsTypeChart" width="300" height="300">
                                                        </canvas>

                                                        <script>
                                                            var ctz = document.getElementById('ToursVsTypeChart').getContext('2d');

                                                            // No of family tours
                                                            var familyCount = <?php
                                                                $sql = "SELECT COUNT(plan_id) AS total FROM new_plan WHERE type_of_package = 'Family'";
                                                                $result = $conn->query($sql);
                                                                $data = $result->fetch_assoc();
                                                                echo $data['total'];
                                                            ?>;

                                                            // No of honeymoon tours
                                                            var honeymoonCount = <?php
                                                                $sql = "SELECT COUNT(plan_id) AS total FROM new_plan WHERE type_of_package = 'Honeymoon'";
                                                                $result = $conn->query($sql);
                                                                $data = $result->fetch_assoc();
                                                                echo $data['total'];
                                                            ?>;

                                                            // No of Budget tours
                                                            var budgetCount = <?php
                                                                $sql = "SELECT COUNT(plan_id) AS total FROM new_plan WHERE type_of_package = 'Budget'";
                                                                $result = $conn->query($sql);
                                                                $data = $result->fetch_assoc();
                                                                echo $data['total'];
                                                            ?>;

                                                            // No of Luxury tours
                                                            var luxuryCount = <?php
                                                                $sql = "SELECT COUNT(plan_id) AS total FROM new_plan WHERE type_of_package = 'Luxury'";
                                                                $result = $conn->query($sql);
                                                                $data = $result->fetch_assoc();
                                                                echo $data['total'];
                                                            ?>;

                                                            var chart = new Chart(ctz, {
                                                                type: 'pie',
                                                                data: {
                                                                    labels: ['Family', 'Honeymoon', 'Budget', 'Luxury'],
                                                                    datasets: [{
                                                                        label: 'Tours Vs Type of package',
                                                                        backgroundColor: ['rgb(255, 99, 132)', 'rgb(54, 162, 235)', 'rgb(255, 205, 86)', 'rgb(75, 192, 192)'],
                                                                        borderColor: 'rgb(255, 255, 255)',
                                                                        data: [familyCount, honeymoonCount, budgetCount, luxuryCount]
                                                                    }]
                                                                },
                                                                options: {}
                                                            });
                                                        </script>
                                                </div>
                                                            
                                                <!-- Generate report for a tour-->
                                                <div>
                                                    <br><br>
                                                    <h2>Generate report</h2>
                                                    <br>
                                                    <form action="Dashboard.php" method="post">

                                                    <!-- get tour plan id from user and according to the id retrieve tour details -->
                                                    <label for="tourId">Enter tour plan id : </label>
                                                    <input type="text" id="tourId" name="tourId" placeholder="Tour plan id" required style="height: 40px; width: 120px; border-radius: 5px; padding-inline-start: 10px;">
                                                    <br><br>
                                                    <input type="submit" name="GetTourDetails" value="Get tour details" class="reportbtn">
                                                    </form>
                                                    <br>

                                                    <!-- when click the button get tour details display the related tour data from user_tours table-->
                                                    <?php
                                                        if(isset($_POST['GetTourDetails'])) {
                                                            $sql = "SELECT * FROM user_tours, new_plan WHERE tour_id = '".$_POST['tourId']."' LIMIT 1";
                                                            $result = $conn->query($sql);

                                                            if($result->num_rows > 0) {
                                                                while($row = $result->fetch_assoc()) {
                                                                    echo "<div class=\"report\">";
                                                                    echo "<h3>Tour Details</h3><br><br>";
                                                                    echo "<b>Tour plan id: ".$row['tour_id']."<br>";
                                                                    echo "<b>Location: </b>".$row['location']."<br>";
                                                                    echo "<b>Tour plan type: </b>".$row['type_of_package']."<br>";
                                                                    echo "<b>Start date: </b>".$row['start_date']."<br>";
                                                                    echo "<b>No of Days: </b>".$row['no_of_day']."<br>";
                                                                    echo "<b>No of Tourists: </b>".$row['no_of_tourist']."<br>";
                                                                    echo "<b>Accomadation id: </b>".$row['accomadation_id']."<br>";
                                                                    echo "<b>Vehicle id: </b>".$row['vehicle_id']."<br>";
                                                                    echo "<b>Guide id: </b>".$row['guide_id']."<br>";
                                                                    echo "<b>Total cost: Rs. </b>".$row['final_price']."<br>";
                                                                    echo "</div>";
                                                        }
                                                    ?>

                                                        
                                                    <br>

                                                    <!-- export the report as a pdf doc -->
                                                    <form action="export.php" method="post" target="_blank">
                                                        <input type="hidden" name="tourId" value="<?php echo $_POST['tourId']; ?>">
                                                        <input type="submit" name="export" value="Export as PDF" class="reportbtn">
                                                    </form>
                                                    
                                                    
                                                </div>

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
                                                    } else {
                                                        echo "no results";
                                                    }
                                                    
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
                © <?php echo date("Y"); ?> TRAVEL PAL ALL RIGHTS RESERVED
        </div>
</footer>

</html>