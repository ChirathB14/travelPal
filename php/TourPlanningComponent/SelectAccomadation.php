<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/preplanned.css">
    <!-- <link rel="stylesheet" href="../../css/newFooter.css"> -->
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
                    <!-- <div class="box">
                    <ul class="list">
                        <li>
                            <div class="image">
                                <img src="../../images/logo.png" alt="Place image">
                            </div>
                            <div class=" ">
                                <h2 class="name">Place Name</h2>
                                <p class="nic">NIC: 123456789V</p>
                                <p class="phone">Phone: 123-456-7890</p>
                                <p class="email">Email: info@place.com</p>
                                <p class="type2">Type: Restaurant</p>
                                <p class="food">Has food: Yes</p>
                                <p class="ac">Has AC: Yes</p>
                                <p class="price">Price: $$$$</p>
                            </div>
                        </li>
                    </ul>
                    </div> -->

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
                                $acc_sql = "SELECT * FROM accomadation_service WHERE status= '" . 2 . "'";
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
                                            </tr>
                                        <?php
                                        }
                                    } else { ?>

                                        <tr>
                                            <td class="td-txt" colspan="9">No Data Found</td>
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

<!--
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
    -->

    <?php require_once("../Common/footer.php");?>

</html>