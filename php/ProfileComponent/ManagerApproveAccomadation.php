<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>Travel Pal</title>
</head>

<body style="background-image: url('../../images/registerBG.png')">
    <div id="overlay">
        <center>
            <div style="background-color: #00357A; width: 80%; text-align:center;padding-bottom:20px">
                <center>
                    <h2 id="heder-register">Accommodation Service Details</h2>
                </center>
                <?php
                require '../DbConfig.php';
                if (isset($_GET['id'])) {
                    $serviceID = $_GET['id'];
                    $sql = "SELECT * FROM accomadation_service WHERE accomadation_Id= '" . $serviceID . "'";
                    $result = $conn->query($sql);
                    // echo $conn->query($sql);
                    // $data = json_encode($result->user);
                    if ($result) {
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                ?>
                                <hr style="height:2px;background-color:aliceblue;width:100%" />
                                <center>
                                    <div>
                                        <img src="../../upload/serviceImg/<?php echo $row['image']; ?>" alt="edit" width="100" height="100">
                                    </div>
                                </center>
                                <form class="reg-form" method="POST" action="ManagerApproveAccomadation.php?Id=<?php echo urlencode($_GET['id']); ?>" autocomplete="off">
                                    <table style="width:90%">
                                        <tr VALIGN=CENTER style="text-align: center;">
                                            <td style="width: 50%;">
                                                <div class="line-wrapper">
                                                    <p class="line-txt">
                                                        <?php echo $row['provider_name']; ?>
                                                    </p>
                                                </div>
                                            </td>
                                            <td style="width: 50%;">
                                                <div class="line-wrapper">
                                                    <p class="line-txt">
                                                        <?php echo $row['provider_nic']; ?>
                                                    </p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr VALIGN=CENTER style="text-align: center;">
                                            <td style="width: 50%;">
                                                <div class="line-wrapper">
                                                    <p class="line-txt">
                                                        <?php echo $row['phone_number']; ?>
                                                    </p>
                                                </div>
                                            </td>
                                            <td style="width: 50%;">
                                                <div class="line-wrapper">
                                                    <p class="line-txt">
                                                        <?php echo $row['email']; ?>
                                                    </p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr VALIGN=CENTER style="text-align: center;">
                                            <td style="width: 50%;">
                                                <div class="line-wrapper">
                                                    <p class="line-txt">
                                                        <?php echo $row['service_type']; ?>
                                                    </p>
                                                </div>
                                            </td>
                                            <td style="width: 50%;">
                                                <div class="line-wrapper">
                                                    <p class="line-txt">
                                                        <?php echo $row['reg_number']; ?>
                                                    </p>
                                                </div>
                                            </td>

                                        </tr>
                                        <tr VALIGN=CENTER style="text-align: center;">
                                            <td style="width: 50%;">
                                                <div class="line-wrapper">
                                                    <p class="line-txt">
                                                        <?php echo $row['address']; ?>
                                                    </p>
                                                </div>
                                            </td>
                                            <td style="width: 50%;">
                                                <div class="line-wrapper">
                                                    <p class="line-txt">
                                                        <?php echo $row['price_per_room']; ?>
                                                    </p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr VALIGN=CENTER style="text-align: center;">
                                            <td style="width: 50%;">
                                                <table style="width: 100%;">
                                                    <tr VALIGN=CENTER style="text-align: center;">
                                                        <td>
                                                            <p class="switch-label">With Food</p>

                                                        </td>
                                                        <td>
                                                            <label class="switch">
                                                                <input type="checkbox" name="food" value="true" <?php
                                                                                                                if ($row['food'] == 1) {
                                                                                                                    echo ("checked");
                                                                                                                }
                                                                                                                ?> disabled>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr VALIGN=CENTER style="text-align: center;">
                                                        <td>
                                                            <p class="switch-label">With A/C</p>

                                                        </td>
                                                        <td>
                                                            <label class="switch">
                                                                <input type="checkbox" name="ac" value="true" <?php
                                                                                                                if ($row['a_c'] == 1) {
                                                                                                                    echo ("checked");
                                                                                                                }
                                                                                                                ?> disabled>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td style="width: 50%;">
                                            </td>
                                        </tr>
                                        <tr style="text-align: center;">
                                            <td style="width: 50%;">
                                                <button class="add-detail-btn" type="submit" name="submit">Approve</button>
                                            </td>
                                            <td style="width: 50%;">
                                                <button class="add-detail-btn" style="background-color: red;" type="submit" name="decline">Decline</button>
                                            </td>
                                        </tr>
                                    </table>
                                    <hr style="height:2px;background-color:aliceblue;width:100%" />
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
                if (isset($_POST['submit'])) {
                    $approvedServiceID = $_GET['Id'];
                    $approved = "UPDATE accomadation_service SET status='2' WHERE accomadation_Id= '$approvedServiceID'";

                    if ($conn->query($approved) === TRUE) {
                        echo "<script language = 'javascript'>
                        alert('Approved Success')
                        document.location.replace('./ManagerViewAccomadations.php');
                        </script>";
                    } else {
                        echo '<script language = "javascript">';
                        echo 'alert("Unsuccessfull :( ")';
                        echo '</script>';
                    }
                    $conn->close();
                }
                if (isset($_POST['decline'])) {
                    $declineServiceID = $_GET['Id'];
                    $decline = "UPDATE accomadation_service SET status='3' WHERE accomadation_Id= '$declineServiceID'";

                    if ($conn->query($decline) === TRUE) {
                        echo "<script language = 'javascript'>
                        alert('Decline Success')
                        document.location.replace('./ManagerViewAccomadations.php');
                        </script>";
                    } else {
                        echo '<script language = "javascript">';
                        echo 'alert("Unsuccessfull :( ")';
                        echo '</script>';
                    }
                    $conn->close();
                }

                ?>
            </div>
        </center>

    </div>


</body>

</html>