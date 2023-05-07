<?php
require '../DbConfig.php';
if (isset($_POST["submit"]) && isset($_COOKIE['user'])) {
    $common_id = $_GET['common'];
    $userID = json_decode($_COOKIE['user'])->user_Id;
    $cardNumber = $_POST["cardNumber"];
    $cvv = $_POST["cvv"];
    $createdDate = date('Y-m-d H:i:s');
    $price = $_POST["price"];
    $expDate = $_POST['date'];

    $query = "INSERT INTO payment (payment_Id, card_number, exp_date, cvv, amount, created_by, created_date,  isActive) 
    VALUES(0, '$cardNumber', '$expDate', '$cvv', '$price', '$userID', '$createdDate', '1' )";
    $update = "UPDATE user_tours SET status ='3'  WHERE common_id= '$common_id'";
    mysqli_query($conn, $query);
    mysqli_query($conn, $update);
    echo

    "
<script>
alert('Successfully Added');
document.location.replace('./PaymentSuccuess.php?common=". $common_id ."');
</script>
";
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/newFooter.css">
    <title>Travel Pal</title>
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        }

        header {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }

        header img {
            width: 100px;
            margin-right: 10px;
        }

        header h1 {
            font-size: 28px;
            font-weight: bold;
            color: #333;
            margin: 0;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-group label {
            font-size: 16px;
            font-weight: bold;
            color: #666;
            margin-bottom: 5px;
        }

        .form-group input {
            padding: 12px;
            border: none;
            border-bottom: 2px solid #ccc;
            font-size: 18px;
        }

        .form-group input:focus {
            outline: none;
            border-bottom: 2px solid rgba(238, 180, 68, 0.75);
        }

        .form-group input::placeholder {
            color: #ccc;
        }

        button[type="submit"] {
            background-color: rgba(238, 180, 68, 0.75);
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        button[type="submit"]:hover {
            background-color: #FBC02D;
        }

        button[type="submit"]:active {
            background-color: #FBC02D;
        }

        footer {
            margin-top: 30px;
            text-align: center;
            color: #999;
        }

        footer p {
            font-size: 14px;
            margin: 0;
        }

        @media screen and (max-width: 480px) {
            header h1 {
                font-size: 24px;
            }

            form .form-group input {
                font-size: 16px;
                padding: 10px;
            }

            button[type="submit"] {
                font-size: 16px;
                padding: 10px 16px;
            }

            footer p {
                font-size: 12px;
            }
        }
    </style>
</head>

<body style="background-color: #0E064D;">
    <table style="width: 100%;">
        <tr VALIGN=TOP>
            <td style="width: 100%;">
                <?php include '../Common/header.php'; ?>
            </td>
        </tr>
        <tr VALIGN=TOP>
            <td style="width: 100%;">
                <div class="container">
                    <header>
                        <img src="../../images/logo.png" alt="Logo">
                        <h1>Payment Screen</h1>
                    </header>
                    <?php
                    if (isset($_COOKIE['user'])) {

                        $userID = json_decode($_COOKIE['user'])->user_Id;
                        $common_id = $_GET['common'];
                        $sql = "SELECT * FROM user_tours WHERE common_id= '" . $common_id . "' AND status= '" . 2 . "'";
                        $result = $conn->query($sql);
                        // echo $conn->query($sql);
                        // $data = json_encode($result->user);
                        if ($result) {
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                    ?>
                                    <form action="Payment.php?common=<?php echo $common_id ?>" method="POST">
                                        <div class="form-group">
                                            <label for="card-number">Card Number:</label>
                                            <input type="text" name="cardNumber" id="card-number" placeholder="1234 5678 9012 3456" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="expiry-date">Expiry Date:</label>
                                            <input type="text" id="expiry-date" name="date" placeholder="MM/YY" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="cvv">CVV:</label>
                                            <input type="text" id="cvv" name="cvv" placeholder="123" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="amount">Amount:</label>
                                            <input type="text" id="amount" name="price1" placeholder="$0.00" value="<?php echo $row['final_price'] ?>" disabled required>
                                            <input type="text" id="amount" name="price" placeholder="$0.00" value="<?php echo $row['final_price'] ?>"  hidden>
                                        </div>
                                        <button type="submit" name="submit">Pay Now</button>
                                    </form>
                    <?php
                                }
                            }
                        } else {
                            echo "Error in " . $sql . "
                    " . $conn->error;
                        }

                        $conn->close();
                    } else {
                        header('location:../../index.php');
                    }
                    ?>
                    <footer>
                        <p>&copy; 2023 Payment Screen. All rights reserved.</p>
                    </footer>
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