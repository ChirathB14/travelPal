<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/preplanned.css">

    <script src="sweetalert2.all.min.js"></script>
</head>

<?php
    $title = "Customize Tour | TravelPal";
?>

<body>
    <table style="width: 100%;">
        <tr VALIGN=TOP style="width: 100%;">
            <td style="width: 100%;">
                <?php include '../Common/header.php'; ?>
            </td>
        </tr>
        <tr VALIGN=TOP style="width: 100%;">
            <td style="width: 100%;">
                <div>
                    <br>
                    <h2 class="preplanned-des">Select Accomadation Service</h2>
                    <br>

                    <div class="box">
                        <table style="width: 100%;border-collapse: collapse;">
                            <thead>
                                <tr>
                                    <th class="th-txt">Image</th>
                                    <th class="th-txt">Name</th>
                                    <th class="th-txt">NIC</th>
                                    <th class="th-txt">Number</th>
                                    <th class="th-txt">Email</th>
                                    <th class="th-txt">Type</th>
                                    <th class="th-txt">Price</th>
                                    <th class="th-txt">Has food</th>
                                    <th class="th-txt">Has AC</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require '../DbConfig.php';
                                $acc_sql = "SELECT a.* 
                                FROM accomadation_service a
                                JOIN new_plan p ON a.address LIKE CONCAT('%', p.location, '%') LIMIT 1;";
                                // $acc_sql = "SELECT * FROM accomadation_service WHERE status= '" . 2 . "'";
                                $acc_result = $conn->query($acc_sql);

                                if ($acc_result) {
                                    if ($acc_result->num_rows > 0) {
                                        while ($acc_row = $acc_result->fetch_assoc()) { ?>
                                            <tr onclick="window.location='./SelectVehicle.php?common=<?php echo $_GET['common'] ?>&acc=<?php echo $acc_row['accomadation_Id']; ?>'" class="table-row">
                                                <td class="image"><img src="../../upload/serviceImg/<?php echo $acc_row['image']; ?>" alt="Place image"></td>
                                                <td class="td-txt"><?php echo $acc_row['provider_name']; ?></td>
                                                <td class="td-txt"><?php echo $acc_row['provider_nic']; ?></td>
                                                <td class="td-txt"><?php echo $acc_row['phone_number']; ?></td>
                                                <td class="td-txt"><?php echo $acc_row['email']; ?></td>
                                                <td class="td-txt"><?php echo $acc_row['service_type']; ?></td>
                                                <td class="td-txt"><?php echo $acc_row['price_per_room']; ?></td>
                                                <td class="icon-img">
                                                    <?php
                                                    if ($acc_row['food'] == 1) { ?>
                                                        <img src="../../images/checked.png">
                                                    <?php } else { ?>
                                                        <img src="../../images/cancel.png" alt="Place image">
                                                    <?php } ?>
                                                </td>
                                                <td class="icon-img">
                                                    <?php
                                                    if ($acc_row['a_c'] == 1) { ?>
                                                        <img src="../../images/checked.png">
                                                    <?php } else { ?>
                                                        <img src="../../images/cancel.png" alt="Place image">
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <button style="width: 80px; height: 30px; font-size: 14px; margin-left: 20px;">select</button>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    } else { ?>

                                        <tr>
                                            <td class="td-txt" colspan="9">Sorry! Currently there's no available services</td>
                                        </tr>
                                <?php }
                                }
                                ?>
                            </tbody>
                        </table>

                        <div style="width:98%;text-align:right;margin-top:20px">
                            <button onclick="window.location='./SelectVehicle.php?common=<?php echo $_GET['common'] ?>&acc=0'" type="submit" name="next" value="next" class="nxt_btn">Skip</button>
                        </div>
                    </div>
                </div>

            </td>
        </tr>
    </table>
<br><br>
</body>

    <?php require_once("../Common/footer.php");?>

</html>