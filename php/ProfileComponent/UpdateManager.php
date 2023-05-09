<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/registration.css">
    <script type="text/javascript" src="../../js/mangerRegister.js"></script>
</head>

<?php
    $title = "Register Manager - TravePal";
?>

<body style="background-image: url('../../images/registerBG.png')">

    <div id="overlay">
        <div class="register" style="margin: 115px 0px 110px 0px;">
            <!-- <center>
                
            </center> -->
            <?php
            require '../DbConfig.php';
            if (isset($_GET['id'])) {
                $userID = $_GET['id'];
                $page = $_GET['page'];
                $sql = "SELECT first_name, last_name, email, address FROM user WHERE user_Id= '" . $userID . "'";
                $result = $conn->query($sql);
                // echo $conn->query($sql);
                // $data = json_encode($result->user);
                if ($result) {
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
            ?>
                            <form class="reg-form" method="POST" action="UpdateManager.php?userId=<?php echo urlencode($_GET['id']);?>&newPage=<?php echo urlencode($_GET['page']);?>">
                            <h2 id="heder-register">&nbsp;&nbsp;&nbsp; update manager account</h2>
                            <div class="input-elements">
                                <input type="text" class="reg-input" id="fname" name="fname" placeholder="First Name" value="<?php echo $row['first_name']; ?>" required />
                                <input type="text" class="reg-input" id="lname" name="lname" placeholder="Last Name" value="<?php echo $row['last_name']; ?>" required />
                                <input type="text" class="reg-input" id="address" name="address" placeholder="Address" value="<?php echo $row['address']; ?>" required />
                                <input type="email" class="reg-input" id="email" name="email" placeholder="Email" value="<?php echo $row['email']; ?>" required />
                                <br>
                                <button type="submit" id="registerbtn" name="registerbtn" value="registerbtn" class="registerbtn">Update</button>
                            </div>
                            </form>
            <?php
                        }
                    }
                } else {
                    echo "Error in " . $sql . "
                    " . $conn->error;
                }

                $conn->close();
            }
            ?>
            <?php
            require '../DbConfig.php';
            if (isset($_POST['registerbtn'])) {
                $first = $_POST["fname"];
                $last = $_POST["lname"];
                $address = $_POST["address"];
                $email = $_POST["email"];
                $updateUserID = $_GET['userId'];
                $updatePage = $_GET['newPage'];
                $update = "UPDATE user SET first_name='$first', last_name='$last', email='$email', address ='$address' WHERE user_Id= '$updateUserID'";

                if ($conn->query($update) === TRUE) {
                    echo '<script language = "javascript">';
                    echo 'alert("Update Success")';
                    echo '</script>';
                    header($updatePage);
                } else {
                    echo '<script language = "javascript">';
                    echo 'alert("Unsuccessfull :( ")';
                    echo '</script>';
                }
                $conn->close();
            }

            ?>
        </div>
    </div>
</body>

<footer>
        <hr>
        <div class="footer-bottom">
                © <?php echo date("Y"); ?> TRAVEL PAL ALL RIGHTS RESERVED
        </div>
</footer>

</html>