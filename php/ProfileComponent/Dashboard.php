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
            align-items: center;
            margin-bottom: 20px;
        }

        .dashboard-style {
            width: 30%;
            height: 110px;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 20px;
        }

        .dashboard-bottom {
            display: flex;
            justify-content: space-between;
            width: 100%;
            height: 400px;
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

                    <table style="width:90%">
                        <tr VALIGN=TOP>
                            <?php include './subComponent/VerticleHeader.php'; ?>

                            <td class="td-profile">
                                <div class="card-profile">
                                    <div class="container-profile">
                                        <br>
                                        <h1 class="profile-title">Dashboard</h1>
                                        <div class="dashboard-top">

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

                                        <h1 class="profile-title">Reports</h1>
                                        <div class="dashboard-bottom">
                                                <div>
                                                <!-- pie graph to show the 3 types of service providers -->
                                                <h2>Service Providers</h2>
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

                                                <div>
                                                <!-- pie graph to show Tour Plans Vs Service Providers -->
                                                <h2>Tour Plans Vs Service Providers</h2>
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

                                                <div>
                                                <!-- pie graph to show the Tours Vs type of package -->
                                                <h2>Tours Vs Type of package</h2>
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
                © <?php echo date("Y"); ?> TRAVEL PAL ALL RIGHTS RESERVED
        </div>
</footer>

</html>