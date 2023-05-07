<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/preplanned.css">
    <link rel="stylesheet" href="../../css/newFooter.css">
    <title>Travel Pal</title>
</head>

<body style="background-color: #0E064D;">
    <table style="width: 100%;">
        <tr VALIGN=TOP style="width: 100%;">
            <td style="width: 100%;">
                <?php include '../Common/header.php'; ?>
            </td>
        </tr>
        <tr VALIGN=TOP style="width: 100%;">
            <td style="width: 100%;">
                <div>
                    <h2 class="preplanned-des">Select Vehicle Service</h2>

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
                                    <th class="th-txt">Price Per km</th>
                                    <th class="th-txt">Vehicle Number</th>
                                    <th class="th-txt">Vehicle Type</th>
                                    <th class="th-txt">Fuel Type</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require '../DbConfig.php';
                                $acc_sql = "SELECT * FROM vehicle_service WHERE status= '" . 2 . "'";
                                $acc_result = $conn->query($acc_sql);
                                if ($acc_result) {
                                    if ($acc_result->num_rows > 0) {
                                        while ($acc_row = $acc_result->fetch_assoc()) { ?>
                                            <tr onclick="window.location='./SelectGuide.php?common=<?php echo $_GET['common'] ?>&acc=<?php echo $_GET['acc'] ?>&veh=<?php echo $acc_row['vehicle_Id'] ?>'" class="table-row">
                                                <td class="image"><img src="../../upload/serviceImg/<?php echo $acc_row['image']; ?>" alt="Place image"></td>
                                                <td class="td-txt"><?php echo $acc_row['provider_name']; ?></td>
                                                <td class="td-txt"><?php echo $acc_row['provider_nic']; ?></td>
                                                <td class="td-txt"><?php echo $acc_row['phone_number']; ?></td>
                                                <td class="td-txt"><?php echo $acc_row['email']; ?></td>
                                                <td class="td-txt"><?php echo $acc_row['service_type']; ?></td>
                                                <td class="td-txt"><?php echo $acc_row['price_per_km']; ?></td>
                                                <td class="td-txt"><?php echo $acc_row['vehicle_num']; ?></td>
                                                <td class="td-txt"><?php echo $acc_row['vehicle_type']; ?></td>
                                                <td class="td-txt"><?php echo $acc_row['fuel_type']; ?></td>
                                            </tr>
                                        <?php
                                        }
                                    } else { ?>

                                        <tr>
                                            <td class="td-txt" colspan="10">No Data Found</td>
                                        </tr>
                                <?php }
                                }
                                ?>
                            </tbody>
                        </table>

                        <div style="width:85%;text-align:right;margin-top:20px">
                            <button onclick="window.location='./SelectGuide.php?common=<?php echo $_GET['common'] ?>&acc=<?php echo $_GET['acc'] ?>&veh=0'" type="submit" name="next" value="next" class="nxt_btn">Skip</button>
                        </div>
                    </div>
                </div>

            </td>
        </tr>
    </table>

</body>
<footer class="custom-footer">
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
    </footer>
</html>