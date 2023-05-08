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
    <table>
        <tr VALIGN=TOP>
            <?php include '../Common/header.php'; ?>
        </tr>
        <tr VALIGN=TOP>
            <center>
                <h2 class="preplanned-header">Preplanned tours</h2>
                <p class="preplanned-des">We have customized tours according to climate changes in Sri Lanka for more experience</p>
            </center>
            <!-- HTML -->
            <div class="product-list">
                <?php
                if (isset($_GET['season']) && isset($_GET['type'])) {
                    require "../DbConfig.php";
                    $season = $_GET['season'];
                    $type = $_GET['type'];
                    $sql = "SELECT * FROM new_plan WHERE season= '" . $season . "' AND type_of_package= '" . $type . "' AND by_manager = '". 1 ."'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $serializedOptions = $row["destination"];
                            $selectedOptions = unserialize($serializedOptions);
                ?>
                            <a href="./EnterTourDetails.php?id=<?php echo $row['plan_Id']; ?>" class="product-box">
                                <img src="../../upload/PlannedTourImg/<?php echo $row['image']; ?>" alt="<?php echo $row['location']; ?>">
                                <h3><?php echo $row['location']; ?></h3>
                                <p class="subtitle"><?php foreach ($selectedOptions as $option) {
                                                        echo $option . "| ";
                                                    } ?></p>
                                <div class="price-row">
                                    <!-- <span class="price">LKR<?php echo $row['price']; ?></span> -->
                                    <span class="text-right"><?php echo $row['no_of_day']; ?> Days</span>
                                </div>
                            </a>
                <?php
                        }
                    } else {
                        echo "No Tours found.";
                    }
                }
                // Close connection
                $conn->close();
                ?>
            </div>


        </tr>
    </table>
    <script>
      function myFunction(arr){
        console.log(JSON.stringify(arr), "------------------------")
      }
    </script>
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