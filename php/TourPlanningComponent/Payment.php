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
    echo '<script>';
    echo 'swal.fire ({
        title: "Successfully Added",
        icon: "success",
        confirmButtonText: "OK",
        confirmButtonColor: "var(--primarycolor)",
        footer: "TravelPal"
    })';
    // echo 'alert("Successfully Added")';
    echo 'document.location.replace("./PaymentSuccuess.php?common=" . $common_id . "")';
    echo '</script>';
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/main.css">

    <script src="sweetalert2.all.min.js"></script>

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
            justify-content: center;
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

<?php
$title = "Payment | TravelPal";
?>

<body style="background-color: #0E064D;">
    <table style="width: 100%;">
        <tr VALIGN=TOP>
            <td style="width: 100%;">
                <?php include '../Common/header.php'; ?>
            </td>
        </tr>
        <tr VALIGN=TOP>
            <td style="width: 100%;">
                <br><br>
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
                                    <form action="Payment.php?common=<?php echo $common_id ?>" method="POST" style="margin-left:15%;">
                                        <div class="form-group">
                                            <label for="card-number">Card Number:</label>
                                            <input type="text" name="cardNumber" id="card-number" placeholder="1234 5678 9012 3456" required pattern="^[0-9]{16}$">
                                        </div>
                                        <div class="form-group">
                                            <label for="expiry-date">Expiry Date:</label>
                                            <input type="month" id="expiry-date" name="date" placeholder="MM/YY" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="cvv">CVV:</label>
                                            <input type="number" id="cvv" name="cvv" placeholder="123" required pattern="^[0-9]{3}$">
                                        </div>
                                        <div class="form-group">
                                            <label for="amount">Amount:</label>
                                            <input type="text" id="amount" name="price1" placeholder="$0.00" value="<?php echo $row['final_price'] ?>" disabled required>
                                            <input type="text" id="amount" name="price" placeholder="$0.00" value="<?php echo $row['final_price'] ?>" hidden>
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
    <br><br>
</body>

<?php require_once("../Common/footer.php"); ?>

</html>