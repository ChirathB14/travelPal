<?php session_start();

require_once '../../inc/connection.php';
require_once '../../inc/functions.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
}

$season = '';
$Location = '';
$No_of_Days = '';
$Budget = '';
$Type_of_Package = '';
$No_of_Nights = '';
$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $season = $_POST['season'];
    $Location = $_POST['Location'];
    $No_of_Days = $_POST['No_of_Days'];
    $Budget = $_POST['Budget'];
    $Type_of_Package = $_POST['Type_of_Package'];
    $No_of_Nights = $_POST['No_of_Nights'];

    $errors = array();

    //checking required fields
    if (empty($season) || empty($Location) || empty($No_of_Days) || empty($Budget) || empty($Type_of_Package) || empty($No_of_Nights)) {
        array_push($errors, "All the fields are required");
    }

    //checking maxlength
    $max_len_fields = array('season' => 100, 'Location' => 100, 'Budget' => 100, 'Type_of_Package' => 100);

    //checking max length fields
    $errors = array_merge($errors, check_max_length($max_len_fields));

    if (empty($errors)) {
        $tourplanID = rand(0,100);
        $sql = "INSERT INTO premadetourplan(tourPlanID,budget,userID,season,location,noOfDays,type)
                VALUES ($tourplanID, $Budget,$user_id,'$season','$Location',$No_of_Days,'$Type_of_Package');";

        $result = mysqli_query($connection, $sql);

        if ($result) {
            // echo "<p class='info'>You have successfully registered</p>";
            header('Location: sm-CreateTourPlan.php?success=yes');
            $season = '';
            $Location = '';
            $No_of_Days = '';
            $Budget = '';
            $Type_of_Package = '';
            $No_of_Nights = '';
        } else {
            header('Location: sm-CreateTourPlan.php?failed=yes');
            // echo "<p class='error'> Failed to add the new record. Error: " .mysqli_error($connection)."</p>";
        }
    }

//     $sql = "INSERT INTO premadetourplan(budget,userID,season,location,noOfDays,type)
// VALUES ($Budget,$user_id,'$season','$Location',$No_of_Days,'$Type_of_Package');";

//     $result = mysqli_query($connection, $sql);

}

?>
<?php
$title = "Create tour plan";
require_once "../../inc/header.php";
?>
    <div class="body">
        <div class="dashboard">
            <img src="../../assets/profile.png" alt="">
            <p><?php echo $_SESSION['firstName']; ?></p>
            <button class="nav" onclick="location.href = 'sm-myprofile.php';">MY PROFILE</button>
            <button class="nav" onclick="location.href = 'sm-updateprofile.php';">UPDATE PROFILE</button>
            <button class="nav" onclick="location.href = 'sm-GenerateReport.php';">GENERATE REPORT</button>
            <button class="select" onclick="location.href = 'sm-CreateTourPlan.php';">CREATE TOUR PLAN</button>
            <button class="nav" onclick="location.href = 'sm-AP.php';">ACCOMMODATION PROVIDER</button>
            <button class="nav" onclick="location.href = 'sm-VP.php';">VEHICLE PROVIDER</button>
            <button class="nav" onclick="location.href = 'sm-TG.php';">TOURIST GUIDE</button>
        </div>


        <div class="content">
            <!-- Create New Tour Plan -->
            <div class="create-plan">
                <h2>Create New Plan</h2>
                <?php
                    if (!empty($errors)) {
                        display_errors($errors);
                    }
                ?>
                <?php
                if (isset($_GET['success'])) {
                    echo '<p class="info">Tour plan added successfully.</p>';
                }
                ?>
                <?php
                if (isset($_GET['failed'])) {
                    echo "<p class='error'> Failed to add the new record. Error: " .mysqli_error($connection)."</p>";
                }
                ?>
                
<div class="content">
            <form action="" method="post">
                <table class="table">
                    <tr class="row">
                        <td>
                            <label for="season">Season</label>
                                <select name="season" id="cars">
                                    <option value="" selected>Select a season</option>
                                    <option value="NOVEMBER-MARCH">NOVEMBER-MARCH</option>
                                    <option value="APRIL-JUNE">APRIL-JUNE</option>
                                    <option value="JULY-OCTOMBER">JULY-OCTOMBER</option>
                                </select>
                        </td>
                    </tr>
                    <tr class="row"> 
                        <td>
                            <label for="Location">Location</label>
                            <input type="text" placeholder="Location" name="Location" <?php echo 'value="' . $Location . '"'; ?> required>
                        </td>
                    </tr>
                    <tr class="row">
                        <td>
                            <label for="No_of_Days">No of Days</label>
                            <input type="number" placeholder="No of Days" name="No_of_Days" <?php echo 'value="' . $No_of_Days . '"'; ?> required>
                        </td>
                    </tr>
                    <tr class="row">
                        <td>
                            <label for="No_-f_Nights">No of Nights</label>
                            <input type="number" placeholder="No of Nights" name="No_of_Nights" <?php echo 'value="' . $No_of_Nights . '"'; ?> required min=0> 
                        </td>
                    </tr>
                    <tr class="row">
                        <td>  
                            <label for="Budget">Budget</label>
                            <input type="text" placeholder="Budget" name="Budget" <?php echo 'value="' . $Budget . '"'; ?> required>
                        </td>
                    </tr>

                    <tr class="row">
                        <td>
                            <label for="Type_of_Package">Type of Package</label>
                            <input type="text" placeholder="Type of Package" name="Type_of_Package" <?php echo 'value="' . $Type_of_Package . '"'; ?> required>
                        </td>
                    </tr>
                </table>
                <button Type="submit">Create Tour Plan</button>
            </form>
        </div>
            </div>
        </div>
    </div>
    <?php require_once "../../inc/footer.php";?>
