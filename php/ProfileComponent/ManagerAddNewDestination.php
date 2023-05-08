<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/registration.css">
    <link rel="stylesheet" href="../../css/main.css">
    <script type="text/javascript" src="../../js/mangerRegister.js"></script>
    <title>Travel Pal</title>
</head>

<body style="background-image: url('../../images/registerBG.png'); margin: 100px;">
    <div id="overlay" class="register">
        <div>
            <h2 id="heder-register">create new destination</h2>
            <form class="reg-form" method="POST" action="ManagerAddNewDestination.php">
                <div style="width:100%;text-align:center">
                    <select id="location" name="location" class="reg-input" required
                    style="width: 400px;  margin-top: 12px; 
                            background-color: var(--accentcolor); opacity: 0.75; height: 40px;
                            box-sizing: border-box; border: none; border-radius: 5px;
                            font-size: 10px; font-weight: bold; color:#808080;">
                        <option value="" disabled selected hidden>Location</option>
                        <?php
                        require '../DbConfig.php';
                        $districts_sql = "SELECT * FROM districts WHERE isActive= '" . 1 . "'";
                        $districts_result = $conn->query($districts_sql);
                        if ($districts_result) {
                            if ($districts_result->num_rows > 0) {
                                while ($districts = $districts_result->fetch_assoc()) {
                        ?>
                                    <option value="<?php echo ($districts["name"]) ?>"><?php echo ($districts["name"]) ?></option>
                        <?php
                                }
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="input-elements">
                    <input type="text" class="reg-input" id="destination" name="destination" placeholder="Destination" required />
                    <input type="text" class="reg-input" id="experience" name="experience" placeholder="Experience" required />
                </div>
                <div class="new-user">
                    <button type="submit" id="registerbtn" name="registerbtn" value="registerbtn" class="registerbtn">Create</button>
                </div>
                
                <?php
                require '../DbConfig.php';
                if (isset($_POST['registerbtn']) && isset($_COOKIE['user'])) {
                    $destination = $_POST["destination"];
                    $location = $_POST["location"];
                    $experience = $_POST["experience"];
                    $createdDate = date('Y-m-d H:i:s');
                    $userID = json_decode($_COOKIE['user'])->user_Id;
                    $isActive = 1;

                    $sql = "SELECT * FROM destinations WHERE location= '" . $location . "' AND lower(destination)= '" . strtolower($destination) . "' ";
                    $result = $conn->query($sql);
                    if ($result) {
                        if ($result->num_rows > 0) {
                            echo '<script language = "javascript">';
                            echo 'alert("Destination Already Exists :( ")';
                            echo '</script>';
                        } else {
                            $sqltwo = "INSERT INTO destinations (destination_Id, location, experience, destination, created_by, created_date, isActive)
                                    VALUES (0,'$location','$experience','$destination','$userID','$createdDate','$isActive' )";

                            if ($conn->query($sqltwo) === TRUE) {
                                echo
                                "
                                <script>
                                    alert('Successfully Added');
                                    document.location.replace('./ManagerNewPlan.php');
                                </script>
                                ";
                            } else {
                                echo '<script language = "javascript">';
                                echo 'alert("Unsuccessfully :( ")';
                                echo '</script>';
                            }
                            $conn->close();
                        }
                    }
                }

                ?>
            </form>
        </div>
    </div>


</body>

</html>