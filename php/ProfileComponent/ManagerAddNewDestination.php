<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="../../js/mangerRegister.js"></script>
    <script src="sweetalert2.all.min.js"></script>
    <link rel="icon" type="image/x-icon" href="/travelPal/favicon.ico">
    <title>Travel Pal</title>

    <style>
        .register {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            margin: 5vh;
        }

        .new-user {
            display: flex;
            flex-direction: column;
            margin-top: 12px;
        }

        .new-user a {
            text-decoration: underline;
            text-align: center;
            margin: 12px 0px 5px 90px;
            font-size: 12px;
        }

        /* The container must be positioned relative: */
        .select {
            position: relative;
        }
        
        /* Style items (options): */
        .select-items {
            position: absolute;
            color: var(--accentcolor);
            background-color: var(--primarycolor);
            cursor: pointer;
            top: 100%;
            left: 0;
            right: 0;
            z-index: 99;
        }
        
        /* Hide the items when the select box is closed: */
        .select-hide {
            display: none;
        }
        
        .select-items div:hover, .same-as-selected {
            background-color: var(--secondarycolor);
        }
    </style>
</head>

<body style="margin: 100px;">
    <div id="overlay" class="register">
        <div>
            <center>
                <h2 id="heder-register">create new destination</h2>
            </center>
            <form class="reg-form" method="POST" action="ManagerAddNewDestination.php">
                <div style="width:100%;text-align:center">
                    <select id="location" name="location" class="reg-input" required style="width: 400px;  margin-top: 12px; 
                            background-color: var(--accentcolor); opacity: 0.75; height: 40px;
                            box-sizing: border-box; border: none; border-radius: 5px;
                            font-size: 10px; font-weight: bold; color:#808080;">
                        <option value="" disabled selected hidden>&nbsp;&nbsp; LOCATION</option>
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
                            echo 'swal.fire ({
                                title: "Destination Already Exists",
                                text: "Please try again",
                                icon: "error",
                                confirmButtonText: "OK",
                                confirmButtonColor: "var(--primarycolor)",
                                footer: "TravelPal"
                            })';
                            // echo 'alert("Destination Already Exists :( ")';
                            echo '</script>';
                        } else {
                            $sqltwo = "INSERT INTO destinations (destination_Id, location, experience, destination, created_by, created_date, isActive)
                                    VALUES (0,'$location','$experience','$destination','$userID','$createdDate','$isActive' )";

function alert() {
    echo '<script>
    Swal.fire({
        title: "Successfully Added",
        text: "New Destination Added",
        icon: "success",
        confirmButtonText: "OK",
        confirmButtonColor: "var(--primarycolor)",
        footer: "TravelPal"
         }).then(() => {
            document.location.replace("./ManagerNewPlan.php");
          })
          </script>';
}
                            if ($conn->query($sqltwo) === TRUE) {
                               alert();
                            } else {
                                echo '<script language = "javascript">';
                                echo 'swal.fire ({
                                    title: "Unsuccessfull :( ",
                                    text: "Please try again",
                                    icon: "error",
                                    confirmButtonText: "OK",
                                    confirmButtonColor: "var(--primarycolor)",
                                    footer: "TravelPal"
                                })';
                                // echo 'alert("Unsuccessfully :( ")';
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