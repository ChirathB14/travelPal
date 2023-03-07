<?php
$title = "Generate Report";
?>

<head>
        <link rel="stylesheet" href="/travelPal/css/main.css" type="text/css">

        <style>
            .report {
                display: flex;
                flex-direction: row;
            }

            .report img {
                width: 45%;
                margin-left: 40px;
            }

            .report h2 {
                padding-top: 40px;
            }
        </style>
</head>

<body>
<div class="profile-content" style="margin-left: 300px;">
        <div class="report">
            <img src="/travelPal/assets/logo tpal 1.png" alt="TRAVELPal">
            <br><br>
            <h2>Service Details Report</h2>
        </div>
        <br>
                <div class="details-update" style="padding-top: 10px;">
                    <p>
                        &nbsp; User ID : 
                        <?php echo $_POST['user_id']; ?>
                    </p> 
                </div>
                <div class="details-update" style="padding-top: 10px;">
                    <p>
                        &nbsp; Name : 
                        <?php echo $_POST['firstName']; ?>
                    </p> 
                </div>
                <div class="details-update" style="padding-top: 10px;">
                    <p>
                        &nbsp; Email : 
                        <?php echo $_POST['email']; ?>
                    </p> 
                </div>
                <div class="details-update" style="padding-top: 10px;">
                    <p>
                        &nbsp; NIC : 
                        <?php echo $_POST['nic']; ?> 
                    </p> 
                </div>
                <div class="details-update" style="padding-top: 10px;">
                    <p>
                        &nbsp; Phone Number : 
                        <?php echo $_POST['phoneNo']; ?>
                    </p> 
                </div>
                <div class="details-update" style="padding-top: 10px;">
                    <p>
                        &nbsp; Service Type :
                        <?php echo $_POST['serviceType']; ?>
                    </p> 
                </div>
                <div class="details-update" style="padding-top: 10px;">
                    <p>
                        &nbsp; Start Date : 
                        <?php echo $_POST['startDate']; ?>
                    </p> 
                </div>
                <div class="details-update" style="padding-top: 10px;">
                    <p>
                        &nbsp; End Date : 
                        <?php echo $_POST['endDate']; ?>
                    </p> 
                </div>
    </div>
</body>
    