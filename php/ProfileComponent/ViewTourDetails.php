<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/preplanned.css">
    <link rel="stylesheet" href="../../css/main.css">
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<?php
    $title = "Tour Summary - TravePal";
    require "../DbConfig.php";
?>

<body>
    <table>
        <tr VALIGN=TOP>
            <?php include '../Common/header.php'; ?>
        </tr>
        <tr VALIGN=TOP>
            <br>
            <h2 class="preplanned-des">Summary of the Tour Booking</h2>
            <br>
            
            <?php
            if (isset($_GET['tour_id']) && !empty($_GET['tour_id'])) {
                // require "../DbConfig.php";
                $tour_id = $_GET['tour_id'];
                $sql = "SELECT * FROM user_tours WHERE tour_id = '$tour_id' LIMIT 1";
                echo $sql;
                
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $plan_Id =  $row["tour_id"];
                        $sql_newPlan = "SELECT * FROM new_plan WHERE plan_Id= '" . $plan_Id . "'";
                        // echo $sql_newPlan;
                        
                        
                        $result_newPlan = $conn->query($sql_newPlan);

                        if ($result_newPlan->num_rows > 0) {
                        //new plan
                        $newPlan_row = $result_newPlan->fetch_assoc();
                        $serializedOptions = $newPlan_row["destination"];
                        $selectedOptions = unserialize($serializedOptions);

                        //Date
                        $original_date = $row['start_date']; // the original date
                        $days_to_add = $newPlan_row["no_of_day"]; // the number of days to add
                        $new_date = date('Y-m-d', strtotime($original_date . ' + ' . $days_to_add . ' days'));

                        //price
                        $tour_price = $newPlan_row["price"];
                        $acc_price = 0;
                        $vehicle_price = 0;
                        $guide_price = 0;
            ?>

                        <div class="box">
                            <div class="row">
                                <div class="label">Season :</div>
                                <div class="value"><?php echo $newPlan_row['season']; ?></div>
                            </div>
                            <div class="row">
                                <div class="label">Location :</div>
                                <div class="value"><?php echo $newPlan_row['location']; ?></div>
                            </div>
                            <div class="row">
                                <div class="label">Destinations :</div>
                                <div class="value"><?php foreach ($selectedOptions as $option) {
                                                        echo $option . "| ";
                                                    } ?></div>
                            </div>
                        </div>

                        <div class="box" style="margin-top: 10px;">
                            <div class="title">Duration</div>
                            <div class="row">
                                <div class="label">Start Date :</div>
                                <div class="value"><?php echo $original_date; ?></div>
                            </div>
                            <div class="row">
                                <div class="label">End Date :</div>
                                <div class="value"><?php echo $new_date ?></div>
                            </div>
                            <div class="row">
                                <div class="label">No Of Days :</div>
                                <div class="value"><?php echo $newPlan_row['no_of_day']; ?></div>
                            </div>

                        </div>

                        <div class="box" style="margin-top: 10px;">
                            <div class="row">
                                <div class="label">No Of Tourists :</div>
                                <div class="value"><?php echo $row['no_of_tourist']; ?></div>
                            </div>

                        </div>

            <?php
                        }
                    }
                } else {
                    echo "No Details found.";
                }
            }
            // Close connection
            $conn->close();
            ?>
        </tr>
    </table>

</body>
<br><br>
<footer>
        <hr>
        <div class="footer-bottom">
                © <?php echo date("Y"); ?> TRAVEL PAL ALL RIGHTS RESERVED
        </div>
</footer>
</html>