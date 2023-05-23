<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/preplanned.css">
</head>

<?php
$title = "Customize Tour | TravelPal";
?>

<body>
    <table>
        <tr VALIGN=TOP>
            <?php include '../Common/header.php'; ?>
        </tr>
        <tr VALIGN=TOP>
            <br>
            <h2 class="preplanned-des">Summary of your tour plan</h2>
            <br>

            <?php
            session_start();
            if (isset($_GET['common'])) {
                require "../DbConfig.php";
                $common_id = $_GET['common'];
                $sql = "SELECT * FROM user_tours WHERE common_id= '" . $common_id . "'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $plan_Id =  $row["tour_id"];
                        $sql_newPlan = "SELECT * FROM new_plan WHERE plan_Id= '" . $plan_Id . "'";
                        //new plan
                        $result_newPlan = $conn->query($sql_newPlan);
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
                                <div class="value"><?php echo $original_date;?></div>
                            </div>
                            <div class="row">
                                <div class="label">End Date :</div>
                                <div class="value"><?php echo $new_date ?></div>
                            </div>
                            <div class="row">
                                <div class="label">No Of Dates :</div>
                                <div class="value"><?php echo $newPlan_row['no_of_day']; ?></div>
                            </div>

                        </div>

                        <div class="box" style="margin-top: 10px;">
                            <div class="row">
                                <div class="label">No Of Tourists :</div>
                                <div class="value"><?php echo $row['no_of_tourist']; ?></div>
                            </div>

                        </div>
                        <div class="box" style="margin-top: 10px;">
                            <div class="title">Accomadation Service</div>
                            <?php
                            $accomadation_Id = $_GET["acc"];
                            $sql_accoumadation = "SELECT * FROM accomadation_service WHERE accomadation_Id= '" . $accomadation_Id . "'";
                            //new plan
                            $result_accoumadation = $conn->query($sql_accoumadation);
                            if ($result_accoumadation->num_rows > 0) {
                                $accoumadation_row = $result_accoumadation->fetch_assoc();
                                $acc_price = $accoumadation_row['price_per_room'];
                            ?>
                                <div class="row">
                                    <div class="label">Name :</div>
                                    <div class="value"><?php echo $accoumadation_row['provider_name']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="label">Phone :</div>
                                    <div class="value"><?php echo $accoumadation_row['phone_number']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="label">Email :</div>
                                    <div class="value"><?php echo $accoumadation_row['email']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="label">Have Food :</div>
                                    <div class="value">
                                        <?php
                                        if ($accoumadation_row['food'] == 1) { ?>
                                            Yes
                                        <?php } else { ?>
                                            No
                                        <?php }
                                        ?></div>
                                </div>
                                <div class="row">
                                    <div class="label">Have A/C :</div>
                                    <div class="value">
                                        <?php
                                        if ($accoumadation_row['a_c'] == 1) { ?>
                                            Yes
                                        <?php } else { ?>
                                            No
                                        <?php }
                                        ?></div>
                                </div>
                            <?php } else { ?>
                                <center>
                                    <div class="title">No Accomadation Service Selected</div>
                                </center>
                            <?php } ?>
                        </div>
                        <div class="box" style="margin-top: 10px;">
                            <div class="title">Vehicle Service</div>
                            <?php
                            $vehicle_Id = $_GET["veh"];
                            $sql_vehicle = "SELECT * FROM vehicle_service WHERE vehicle_Id= '" . $vehicle_Id . "'";
                            //new plan
                            $result_vehicle = $conn->query($sql_vehicle);
                            if ($result_vehicle->num_rows > 0) {
                                $vehicle_row = $result_vehicle->fetch_assoc();
                                $vehicle_price = $vehicle_row['price_per_km'];
                            ?>
                                <div class="row">
                                    <div class="label">Name :</div>
                                    <div class="value"><?php echo $vehicle_row['provider_name']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="label">Phone :</div>
                                    <div class="value"><?php echo $vehicle_row['phone_number']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="label">Email :</div>
                                    <div class="value"><?php echo $vehicle_row['email']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="label">Vehicle Number :</div>
                                    <div class="value"><?php echo $vehicle_row['vehicle_num']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="label">Vehicle Type :</div>
                                    <div class="value"><?php echo $vehicle_row['vehicle_type']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="label">Fuel Type :</div>
                                    <div class="value"><?php echo $vehicle_row['fuel_type']; ?></div>
                                </div>
                            <?php } else { ?>
                                <center>
                                    <div class="title">No Vehicle Service Selected</div>
                                </center>
                            <?php } ?>
                        </div>
                        <div class="box" style="margin-top: 10px;">
                            <div class="title">Tour Guide Service</div>
                            <?php
                            $guide_Id = $_GET["guide"];
                            $sql_guide = "SELECT * FROM tour_guide WHERE guide_Id= '" . $guide_Id . "'";
                            //new plan
                            $result_guide = $conn->query($sql_guide);
                            if ($result_guide->num_rows > 0) {
                                $guide_row = $result_guide->fetch_assoc();
                                $guide_price = $guide_row['price_per_day'];
                            ?>
                                <div class="row">
                                    <div class="label">Name :</div>
                                    <div class="value"><?php echo $guide_row['provider_name']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="label">Phone :</div>
                                    <div class="value"><?php echo $guide_row['phone_number']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="label">Email :</div>
                                    <div class="value"><?php echo $guide_row['email']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="label">Reagister Number :</div>
                                    <div class="value"><?php echo $guide_row['reg_number']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="label">Experience :</div>
                                    <div class="value"><?php echo $guide_row['experience']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="label">Languages :</div>
                                    <div class="value"><?php echo $guide_row['languages']; ?></div>
                                </div>
                            <?php } else { ?>
                                <center>
                                    <div class="title">No Tour Guide Service Selected</div>
                                </center>
                            <?php } ?>
                        </div>
                        <div class="box" style="margin-top: 10px;">
                            <?php

                            $price1_numeric = preg_replace("/[^0-9.]/", "", $guide_price);
                            $price2_numeric = preg_replace("/[^0-9.]/", "", $vehicle_price);
                            $price3_numeric = preg_replace("/[^0-9.]/", "", $acc_price);
                            $price4_numeric = preg_replace("/[^0-9.]/", "", $tour_price);



                            $sum = $price1_numeric + $price2_numeric + $price3_numeric + $price4_numeric;
                            $_SESSION['price'] = $sum;


                            ?>
                            <div class="row">
                                <div class="label">Total Price :</div>
                                <div class="value"><?php echo "LKR " . number_format($sum, 2); ?></div>
                            </div>

                        </div>
                        <div style="width:87%;text-align:right;margin-top:20px;margin-bottom:20px">
                            <button onclick="window.location='./SubComponent/UpdateUserTours.php?common=<?php echo $_GET['common'] ?>&acc=<?php echo $_GET['acc'] ?>&veh=<?php echo $_GET['veh'] ?>&guide=<?php echo $_GET['guide'] ?>&price=<?php echo $sum ?>'" type="submit" name="next" value="next" class="nxt_btn" style="width: 300px;">Procced To Payment</button>
                        </div>

            <?php
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

<?php require_once("../Common/footer.php"); ?>

</html>