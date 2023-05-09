<?php
require '../DbConfig.php';
if (isset($_POST["submit"]) && isset($_COOKIE['user'])) {
    $userID = json_decode($_COOKIE['user'])->user_Id;
    $providerName = $_POST["providerName"];
    $providerNIC = $_POST["providerNIC"];
    $phoneNumber = $_POST["phoneNumber"];
    $email = $_POST["email"];
    $vehiNumber = $_POST["vehiNumber"];
    $vehiType = $_POST["vehiType"];
    $pricePerKm = $_POST["pricePerKm"];
    $fuelType = $_POST["fuelType"];
    $createdDate = date('Y-m-d H:i:s');
    $unique_id = uniqid('', true);
    $unique_number = substr(str_replace(['.', '0'], '', $unique_id), 0, 18);
    $ref = $unique_number;

    if ($_FILES["image"]["error"] == 4) {
        echo
        "<script> alert('Image Does Not Exist'); </script>";
    } else {
        $fileName = $_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];

        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
        if (!in_array($imageExtension, $validImageExtension)) {
            echo
            "
      <script>
        alert('Invalid Image Extension');
      </script>
      ";
        } else if ($fileSize > 1000000) {
            echo
            "
      <script>
        alert('Image Size Is Too Large');
      </script>
      ";
        } else {
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;

            move_uploaded_file($tmpName, '../../upload/serviceImg/' . $newImageName);
            $query = "INSERT INTO vehicle_service (vehicle_Id, provider_name, provider_nic, phone_number, email, image,  vehicle_num, vehicle_type, fuel_type, price_per_km, status, service_no, created_by, created_date, isActive) 
            VALUES(0, '$providerName', '$providerNIC', '$phoneNumber', '$email', '$newImageName', '$vehiNumber', '$vehiType', '$fuelType', '$pricePerKm', '1', '$ref', '$userID', '$createdDate', '1' )";
            $sql = "UPDATE user SET is_vehicle_provider='1' WHERE user_Id= '$userID'";

            mysqli_query($conn, $query);
            mysqli_query($conn, $sql);
            echo

            "
      <script>
        alert('Successfully Added');
        document.location.replace('./ViewVehicleServices.php');
      </script>
      ";
            $conn->close();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/newService.css">
    <script type="text/javascript" src="../../js/mangerRegister.js"></script>
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
</head>

<?php
$title = "TravePal";
require_once("../Common/header.php");
?>

<body>
    <div>
        <center>
            <div style="background-color: #00357A; width: 70%; text-align:center;padding-bottom:20px">
                <center>
                    <h2 id="heder-register">Add Service Details</h2>
                </center>
                <?php
                if (isset($_COOKIE['user'])) {

                    $userID = json_decode($_COOKIE['user'])->user_Id;


                    $sql = "SELECT * FROM user WHERE user_Id= '" . $userID . "'";
                    $result = $conn->query($sql);
                    // echo $conn->query($sql);
                    // $data = json_encode($result->user);
                    if ($result) {
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                ?>
                                <form class="reg-form" method="POST" action="AddNewVehicle.php" autocomplete="off" enctype="multipart/form-data">
                                    <table style="width:90%">
                                        <tr VALIGN=CENTER style="text-align: center;">
                                            <td style="width: 50%;">
                                                <input pattern="[a-zA-Z\.]+\s)*[a-zA-Z\.]" type="text" class="reg-input" id="providerName" name="providerName" placeholder="Service Provider Name" value="<?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?>" required />
                                            </td>
                                            <td style="width: 50%;">
                                                <input type="text" class="reg-input" id="providerNIC" name="providerNIC" placeholder="Service Provider NIC" required />
                                            </td>
                                        </tr>
                                        <tr VALIGN=CENTER style="text-align: center;">
                                            <td style="width: 50%;">
                                                <input type="tel" class="reg-input" id="phoneNumber" name="phoneNumber" placeholder="Phone Number" required />
                                            </td>
                                            <td style="width: 50%;">
                                                <input type="email" class="reg-input" id="email" name="email" placeholder="Email" value="<?php echo $row['email']; ?>" required />
                                            </td>
                                        </tr>
                                        <tr VALIGN=CENTER style="text-align: center;">
                                            <td style="width: 50%;">
                                                <input type="file" class="reg-input" style="padding: 10px 10px;" name="image" id="image" accept=".jpg, .jpeg, .png" required />
                                            </td>

                                        </tr>
                                        <tr>
                                        </tr>
                                        <tr VALIGN=CENTER style="text-align: center;">
                                            <td style="width: 50%;">
                                                <input type="text" class="reg-input" id="vehiNumber" name="vehiNumber" placeholder="Vehicle Number" required />
                                            </td>
                                            <td style="width: 50%;">
                                                <select name="fuelType" id="fuelType" required style="width: 525px;  background-color: var(--accentcolor); opacity: 0.75; height: 38px; box-sizing: border-box; border: none; border-radius: 5px; font-size: 14px; font-weight: bold; color:#808080;">
                                                    <option value="" disabled selected>Select vehicle type</option>
                                                    <option value="Car">Car</option>
                                                    <option value="Van">Van</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr VALIGN=CENTER style="text-align: center;">
                                            <td style="width: 50%;">
                                                <input type="text" class="reg-input" id="pricePerKm" name="pricePerKm" placeholder="Price Per KM" required />
                                            </td>
                                            <td style="width: 50%;">
                                                <select name="fuelType" id="fuelType" required style="width: 525px;  background-color: var(--accentcolor); opacity: 0.75; height: 38px; box-sizing: border-box; border: none; border-radius: 5px; font-size: 14px; font-weight: bold; color:#808080;">
                                                    <option value="" disabled selected>Select fuel type</option>
                                                    <option value="Petrol">Petrol</option>
                                                    <option value="Diesel">Diesel</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                    <button class="add-detail-btn" type="submit" name="submit">Add Details</button>
                                </form>
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
            </div>
        </center>
    </div>
    <br><br><br>
</body>

<?php require_once("../Common/footer.php"); ?>

</html>