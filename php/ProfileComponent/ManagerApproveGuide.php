<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <Link rel="stylesheet" href="../../css/main.css">
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

        .line-wrappers {
            width: 100%;
            height: 30px;
            border-radius: 5px;
            background-color: #fff;
            border-bottom: 1px solid #00357A;
            position: relative;
            padding: 0 0 0 0px;
        }

        .line-wrappers .line-txt {
            top: 0;
            left: 0;
            padding: 0 10px 0 10px;
            line-height: 30px;
            font-size: 14px;
            color: #00357A;
            transition: all 0.3s ease;
            pointer-events: none;
            margin: 5px;
        }
    </style>
    <title>Travel Pal</title>
</head>

<body>
    <div style="width: 100vw;">
        <center>
            <div style="background-color: #00357A; width: 70%; text-align:center;padding-bottom:20px">
                <center>
                    <h2 id="heder-register">Tourist Guide Service Details</h2>
                </center>
                <?php
                require '../DbConfig.php';
                if (isset($_GET['id'])) {
                    $serviceID = $_GET['id'];
                    $sql = "SELECT * FROM tour_guide WHERE guide_Id= '" . $serviceID . "'";
                    $result = $conn->query($sql);
                    // echo $conn->query($sql);
                    // $data = json_encode($result->user);
                    if ($result) {
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                ?>

                                <center>
                                    <div>
                                        <img src="../../upload/serviceImg/<?php echo $row['image']; ?>" alt="edit" width="100" height="100">
                                    </div>
                                </center>
                                <form class="reg-form" method="POST" action="ManagerApproveGuide.php?Id=<?php echo urlencode($_GET['id']); ?>" autocomplete="off">
                                    <table style="width:90%">
                                        <tr VALIGN=CENTER style="text-align: center;">
                                            <td style="width: 50%;">
                                                <div class="line-wrappers">
                                                    <p class="line-txt">
                                                        <?php echo $row['provider_name']; ?>
                                                    </p>
                                                </div>
                                            </td>
                                            <td style="width: 50%;">
                                                <div class="line-wrappers">
                                                    <p class="line-txt">
                                                        <?php echo $row['provider_nic']; ?>
                                                    </p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr VALIGN=CENTER style="text-align: center;">
                                            <td style="width: 50%;">
                                                <div class="line-wrappers">
                                                    <p class="line-txt">
                                                        <?php echo $row['phone_number']; ?>
                                                    </p>
                                                </div>
                                            </td>
                                            <td style="width: 50%;">
                                                <div class="line-wrappers">
                                                    <p class="line-txt">
                                                        <?php echo $row['email']; ?>
                                                    </p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr VALIGN=CENTER style="text-align: center;">
                                            <!-- <td style="width: 50%;">
                                                <div class="line-wrappers">
                                                    <p class="line-txt">
                                                        <?php //echo $row['service_type']; ?>
                                                    </p>
                                                </div>
                                            </td> -->
                                            <td style="width: 50%;">
                                                <div class="line-wrappers">
                                                    <p class="line-txt">
                                                        <?php echo $row['reg_number']; ?>
                                                    </p>
                                                </div>
                                            </td>

                                        </tr>
                                        <tr VALIGN=CENTER style="text-align: center;">
                                            <!-- <td style="width: 50%;">
                                                <div class="line-wrappers">
                                                    <p class="line-txt">
                                                        <?php //echo $row['experience']; ?>
                                                    </p>
                                                </div>
                                            </td> -->
                                            <td style="width: 50%;">
                                                <div class="line-wrappers">
                                                    <p class="line-txt">
                                                        <?php echo $row['price_per_day']; ?>
                                                    </p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr VALIGN=CENTER style="text-align: center;">
                                            <td style="width: 50%;">
                                            <div class="line-wrappers">
                                                    <p class="line-txt">
                                                        <?php echo $row['languages']; ?>
                                                    </p>
                                                </div>
                                            </td>
                                            <td style="width: 50%;">
                                            </td>
                                        </tr>
                                        <tr style="text-align: center;">
                                            <td style="width: 50%;">
                                                <button class="add-detail-btn" style="width: 200px;" type="submit" name="submit">Approve</button>
                                            </td>
                                            <td style="width: 50%;">
                                                <button class="add-detail-btn" style="background-color: rgb(134, 2, 2); width: 200px;" type="submit" name="decline">Decline</button>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                <?php
                            }
                        }
                    } else {
                        echo "Error in " . $sql . "
                    " . $conn->$error;
                    }

                    $conn->close();
                }
                ?>
                <?php
                require '../DbConfig.php';
                if (isset($_POST['submit'])) {
                    $approvedServiceID = $_GET['Id'];
                    $approved = "UPDATE tour_guide SET status='2' WHERE guide_Id= '$approvedServiceID'";

                    if ($conn->query($approved) === TRUE) {
                        echo "<script language = 'javascript'>
                        alert('Approved Success')
                        document.location.replace('./ManagerViewGuide.php');
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
                    $decline = "UPDATE tour_guide SET status='3' WHERE guide_Id= '$declineServiceID'";

                    if ($conn->query($decline) === TRUE) {
                        echo "<script language = 'javascript'>
                        alert('Decline Success')
                        document.location.replace('./ManagerViewGuide.php');
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