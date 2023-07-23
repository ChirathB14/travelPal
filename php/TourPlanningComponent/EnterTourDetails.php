<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/preplanned.css">

    <script type="text/javascript" src="../../js/custermizePlan.js"></script>

    <style>
        input[type="date"]::-webkit-calendar-picker-indicator {
            cursor: pointer;
            filter: invert(0.8);
}
    </style>
</head>

<?php
    $title = "Customize Tour | TravelPal";
?>

<body>
    <table>
        <tr VALIGN=TOP>
            <?php include '../Common/header.php'; ?>
        </tr>
        <tr VALIGN=TOP>
            <br>
            <h2 class="preplanned-des">Enter The Tour Details</h2>
            <br>
            <div class="box">
                <?php
                if (isset($_GET['id'])) {
                    require "../DbConfig.php";
                    $plan_Id = $_GET['id'];
                    $sql = "SELECT * FROM new_plan WHERE plan_Id= '" . $plan_Id . "'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $serializedOptions = $row["destination"];
                            $selectedOptions = unserialize($serializedOptions);
                ?>
                            <!-- <div class="row">
                                <div class="label">Season :</div>
                                <div class="value"><?php echo $row['season']; ?></div>
                            </div> -->
                            <div class="row">
                                <div class="label">Location :</div>
                                <div class="value"><?php echo $row['location']; ?></div>
                            </div>
                            <div class="row">
                                <div class="label">Destinations :</div>
                                <div class="value"><?php foreach ($selectedOptions as $option) {
                                                        echo $option . "| ";
                                                    } ?></div>
                            </div>

            </div>
            <form method="POST" action="EnterTourDetails.php?id=<?php echo $_GET['id']; ?>">
                <div class="box" style="margin-top: 15px;">
                    <div class="row">
                        <div class="label">Start Date : </div>
                        <input class="value" type="date" name="date_picker" id="date_picker" required>
                    </div>
                </div>

                <div class="box" style="margin-top: 15px;">
                    <div class="row">
                        <div class="label">No Of Tourist : </div>
                        <input class="value" type="number" name="no_tourist" placeholder="xxx" required>
                    </div>
                </div>
                <div style="width:87%;text-align:right;margin-top:20px">
                    <button type="submit" name="next" value="next" class="nxt_btn">Next</button>
                </div>
                <br>
    <?php
                        }
                    } else {
                        echo "No Details found.";
                    }
                }
                // Close connection
                $conn->close();
    ?>

    <script>
        //function to validate the date entered by the user
        document.getElementById('date_picker').addEventListener('change',validateDate);
        
        function validateDate(){
            var date = document.getElementById('date_picker').value;
            var today = new Date();
            var selectedDate = new Date(date);
            //calculate a date after 1 year
            var nextYear = new Date();

            //check whether the date entered is not before today 
            if(selectedDate < today){
                alert("Please enter a valid date");
            } else {
                
            } 

            //check whether the date entered is not after 1 year
            nextYear.setFullYear(today.getFullYear() + 1);
            if(selectedDate > nextYear){
                alert("Please select a date within 1 year");
                document.getElementById('date_picker').value = "";
            } else {

            }
        }
    </script>

    <?php
    require '../DbConfig.php';
    if (isset($_POST['next']) && isset($_COOKIE['user'])) {
        $tourID = $_GET['id'];
        $userID = json_decode($_COOKIE['user'])->user_Id;

        $date_picker = $_POST['date_picker'];
        $date_time = DateTime::createFromFormat('Y-m-d', $date_picker);
        $startDate = $date_time->format('Y-m-d');

        $noOfTourist = $_POST['no_tourist'];
        $createdDate = date('Y-m-d');
        $common = uniqid();
        $isActive = true;

        $sqltwo = "INSERT INTO user_tours (user_tours_id, tour_id, start_date, no_of_tourist, created_by, created_date, isActive,  status, common_id)
                    VALUES (0,'$tourID','$startDate','$noOfTourist','$userID','$createdDate','$isActive', '1', '$common' )";

        if ($conn->query($sqltwo) === TRUE) {
            echo '<script language = "javascript">
            alert("Details Saved Success. Now you can add services")
            window.location = "./SelectAccomadation.php?common=' . $common . '"';
            echo '</script>';
        } else {
            echo '<script language = "javascript">';
            echo 'alert("Unsuccessfully :( ")';
            echo '</script>';
        }
        $conn->close();
    }

    ?>
            </form>
        </tr>
    </table>
</body>

    <?php require_once("../Common/footer.php");?>

</html>