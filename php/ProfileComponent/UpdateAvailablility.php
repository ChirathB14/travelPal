<?php
require '../DbConfig.php';
if (isset($_POST["submit"]) && isset($_COOKIE['user'])) {
    $userID = json_decode($_COOKIE['user'])->user_Id;
    $service = $_POST["service"];
    $serviceDetails = $_POST["serviceDetails"];
    $createdDate = date('Y-m-d H:i:s');

    $date_picker1 = $_POST['startDate'];
    $date_time1 = DateTime::createFromFormat('Y-m-d', $date_picker1);
    $startDate = $date_time1->format('Y-m-d H:i:s.u');

    $date_picker2 = $_POST['endDate'];
    $date_time2 = DateTime::createFromFormat('Y-m-d', $date_picker2);
    $endDate = $date_time2->format('Y-m-d H:i:s.u');

    $query = "INSERT INTO unavailability (unavailability_Id, service_ref, service_type, start_date, end_date, created_by, created_date,  isActive) 
    VALUES(0, '$serviceDetails[0]', '$service', '$startDate', '$endDate', '$userID', '$createdDate', '1' )";
    mysqli_query($conn, $query);
    echo

    "
<script>
alert('Successfully Added');
document.location.replace('./ViewAvailability.php');
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

    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/newService.css">
    <script type="text/javascript" src="../../js/mangerRegister.js"></script>
    <script src="../../js/jquery-3.6.4.min.js"></script>

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

        .label {
            font-weight: 600;
            margin-right: 5px;
            flex: 1;
            font-size: 17px;
            font-family: 'Poppins', sans-serif;
            font-style: normal;
            line-height: 30px;
            letter-spacing: 0.1em;

            color: #FFFFFF;
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
                    <h2 id="heder-register">Add Unavailabilty Details</h2>
                </center>
                <form class="reg-form" method="POST" action="UpdateAvailablility.php" autocomplete="off" enctype="multipart/form-data">
                    <table style="width:90%">
                        <tr VALIGN=CENTER style="text-align: center;">
                            <td style="width: 50%;">
                                <div class="label">Service Type </div>
                                <select id="service" name="service" class="reg-input" required>
                                    <option value="" disabled selected hidden>Service Type</option>
                                    <option value="Accomadation">Accomadation</option>
                                    <option value="Vehicle">Vehicle</option>
                                    <option value="Tour Guide">Tour Guide</option>
                                </select>
                                <!-- <input pattern="[a-zA-Z\.]+\s)*[a-zA-Z\.]" type="text" class="reg-input" id="providerName" name="providerName" placeholder="Service Provider Name" required /> -->
                            </td>
                            <td style="width: 50%;">
                                <div class="label">Service Number </div>
                                <select id="serviceDetails" name="serviceDetails[]" class="reg-input" required>
                                    <option value="" disabled selected hidden>Service Number</option>
                                </select>
                            </td>
                        </tr>
                        <tr VALIGN=CENTER style="text-align: center;">
                            <td style="width: 50%;">
                                <div class="label">Start Date </div>
                                <input class="reg-input" type="date" name="startDate" placeholder="Start Date" id="myStartDateInput" required>
                            </td>
                            <td style="width: 50%;">
                                <div class="label">End Date </div>
                                <input class="reg-input" type="date" name="endDate" placeholder="End Date" id="myEndDateInput" required>
                            </td>
                        </tr>
                    </table>
                    <hr style="height:2px;background-color:aliceblue;width:100%" />
                    <button class="add-detail-btn" type="submit" name="submit">Add Details</button>
                </form>
            </div>
        </center>

    </div>
    <br><br><br>

    <script>
        $(document).ready(function() {

            // When the country select changes, send an AJAX request to get the corresponding cities
            $('#service').change(function() {
                var service = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: './subComponent/Get_Services.php', // Replace with the URL of your PHP script that gets the cities
                    data: {
                        service: service
                    },
                    dataType: 'json',
                    success: function(data) {
                        // Clear the city select and add the new options
                        $('#serviceDetails').html('<option value="" disabled selected hidden>Service Details</option>');
                        $.each(data, function(index, value) {
                            $('#serviceDetails').append('<option value="' + value + '">' + value + '</option>');
                        });
                    }
                });
            });
        });
    </script>
</body>

<?php require_once("../Common/footer.php");?>

</html>