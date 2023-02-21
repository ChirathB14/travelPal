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
    if (empty($season) || empty($Location) || empty($Budget) || empty($Type_of_Package) || empty($No_of_Nights)) {
        array_push($errors, "All the fields are required");
    }

    //checking maxlength
    $max_len_fields = array('season' => 100, 'Location' => 100, 'Budget' => 100, 'Type_of_Package' => 100);

    //checking max length fields
    $errors = array_merge($errors, check_max_length($max_len_fields));

    if (empty($errors)) {
        $tourplanID = rand(0, 100);
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

<head>
    <link rel="stylesheet" href="/travelPal/css/main.css" type="text/css">
</head>

<div class="body">
    <!-- Profile page content -->
    <div class="page-content">
        <!-- Dashboard - Site Manager -->
        <div class="Dashboard">
            <div class="Dashboard-top">
                <img src="../../assets/Profile.png" alt="">
                <h4><?php echo $_SESSION['full_name']; ?></h4>
            </div>
            <div class="Dashboard-bottom">
                <button onclick="location.href = 'sm-myprofile.php';">My Profile</button>
                <button onclick="location.href = 'sm-updateprofile.php';">Update Profile</button>
                <button onclick="location.href = 'sm-GenerateReport.php';">Generate Report</button>
                <button class="active" onclick="location.href = 'sm-CreateTourPlan.php';">Create Tour Plan</button>
                <button onclick="location.href = 'sm-AP.php';">Accommodation Provider</button>
                <button onclick="location.href = 'sm-VP.php';">Vehicle Provider</button>
                <button onclick="location.href = 'sm-TG.php';">Tourist Guide</button>
            </div>
        </div>


        <div class="content">
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
                echo "<p class='error'> Failed to add the new record. Error: " . mysqli_error($connection) . "</p>";
            }
            ?>

            <div class="profile-content">
                <form action="" class="form-update" method='post'>
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                    <div class="details-update" style="margin-bottom: 11px">
                        <p>
                            <select id="" name="season" style="width: 377px;  margin-top: 7px; 
                            background-color: var(--accentcolor); height: 34px;
                            border: none; font-size: 12px; font-weight: bold;">
                                <option value="" disabled selected>SELECT A SEASON</option>
                                <option value="NOVEMBER-MARCH">NOVEMBER-MARCH</option>
                                <option value="APRIL-JUNE">APRIL-JUNE</option>
                                <option value="JULY-OCTOMBER">JULY-OCTOMBER</option>
                            </select>
                        </p>
                    </div>
                    <div class="details-update">
                        <p>
                            &nbsp; Location :
                            <input type="text" placeholder="Location" name="Location" value="<?php echo $Location; ?>" required>
                        </p>
                    </div>
                    <div class="details-update">
                        <p>
                            &nbsp; No of Nights :
                            <input type="number" placeholder="No of Nights" name="No_of_Nights" value="<?php echo $No_of_Nights; ?>" required min=0>
                        </p>
                    </div>
                    <div class="details-update">
                        <p>
                            &nbsp; Budget :
                            <input type="text" placeholder="Budget" name="Budget" value="<?php echo $Budget; ?>" required>
                        </p>
                    </div>
                    <div class="details-update" style="margin-bottom: 11px">
                        <p>
                            <select id="" name="season" style="width: 377px;  margin-top: 7px; 
                            background-color: var(--accentcolor); height: 34px;
                            border: none; font-size: 12px; font-weight: bold;">
                                <option value="" disabled selected>TYPE OF PACKAGE</option>
                                <option value="Luxury Tours">Luxury Tours</option>
                                <option value="Budget Tours">Budget Tours</option>
                                <option value="Family Tours">Family Tours</option>
                                <option value="Honeymoon Tours">Honeymoon Tours</option>
                            </select>
                        </p>
                    </div>
                    <button Type="submit">Create Tour Plan</button>
                </form>
            </div>
        </div>
    </div>

    <?php require_once "../../inc/footer.php"; ?>
    <?php mysqli_close($connection); ?>