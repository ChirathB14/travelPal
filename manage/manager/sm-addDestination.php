<?php session_start();

require_once '../../inc/connection.php';
require_once '../../inc/functions.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
}

$dest_name = '';
$province = '';
$experience = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = array();

    $dest_name = mysqli_real_escape_string($connection, trim($_POST['dest_name']));
    if(isset($_POST['province'])){
        $province = mysqli_real_escape_string($connection, trim($_POST['province']));
    }else{
        array_push($errors, "Please select a province");

    }
    if(isset($_POST['experience'])){
        $experience = mysqli_real_escape_string($connection, trim($_POST['experience']));
    }else{
        array_push($errors, "Please select an experience");

    }


    //checking required fields
    if (empty($dest_name) || empty($province) || empty($experience) ) {
        array_push($errors, "All the fields are required");
    }

    //checking maxlength
    $max_len_fields = array('dest_name' => 200);

    //checking max length fields
    $errors = array_merge($errors, check_max_length($max_len_fields));

    if (empty($errors)) {

        $sql = "INSERT INTO destination(province,experience,destination_name)
                VALUES ('$dest_name', '$province','$experience');";

        $result = mysqli_query($connection, $sql);

        if ($result) {
            header('Location: sm-addDestination.php?success=yes');
        } else {
            header('Location: sm-addDestination.php?failed=yes');
        }
    }
}

?>
<?php
$title = "Add destination";
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
                <button class="active" onclick="location.href = 'sm-addDestination.php';">Add a Destination</button>
                <button onclick="location.href = 'sm-CreateTourPlan.php';">Create Tour Plan</button>
                <button onclick="location.href = 'sm-AP.php';">Accommodation Provider</button>
                <button onclick="location.href = 'sm-VP.php';">Vehicle Provider</button>
                <button onclick="location.href = 'sm-TG.php';">Tourist Guide</button>
            </div>
        </div>


        <div class="content">
            <h2>Add a Destination</h2>

            <?php
            if (!empty($errors)) {
                display_errors($errors);
            }
            ?>
            <?php
            if (isset($_GET['success'])) {
                echo '<p class="info-1">Destination added successfully.</p>';
            }
            ?>
            <?php
            if (isset($_GET['failed'])) {
                echo "<p class='error'> Failed to add the new record. Error: " . mysqli_error($connection) . "</p>";
            }
            ?>
            <div class="profile-content" style="margin-top:10px;">
                <form action="sm-addDestination.php" class="form-update" method='post'>
                    <div class="details-update" style="margin-bottom: 11px;font-weight: bold;">
                        <p>
                            &nbsp; Destination name: &nbsp;&nbsp;
                            <input type="text" placeholder="Enter the destination name" name="dest_name" value="<?php echo $dest_name; ?>" required>
                        </p>
                    </div>
                    <div class="details-update" style="margin-bottom: 11px">
                        <p>
                            <select id="" name="province" style="width: 340px;  
                            background-color: var(--accentcolor); height: 34px;
                            border: none; font-size: 12px; font-weight: bold;">
                                <option value="" disabled selected>SELECT THE PROVINCE</option>
                                <option value="WESTERN">WESTERN</option>
                                <option value="EASTERN">EASTERN</option>
                                <option value="SOUTHERN">SOUTHERN</option>
                                <option value="NOTHERN">NOTHERN</option>
                                <option value="CENTRAL">CENTRAL</option>
                                <option value="UVA">UVA</option>
                                <option value="NORTH CENTRAL">NORTH CENTRAL</option>
                                <option value="NORTH WESTERN">NORTH WESTERN</option>
                                <option value="SABARAGAMUWA">SABARAGAMUWA</option>
                            </select>
                        </p>
                    </div>
                    <div class="details-update" style="margin-bottom: 11px">
                        <p>
                            <select id="" name="experience" style="width: 340px;  
                            background-color: var(--accentcolor); height: 34px;
                            border: none; font-size: 12px; font-weight: bold;">
                                <option value="" disabled selected>SELECT THE EXPERIENCE</option>
                                <option value="CULTURAL & HERITAGE">CULTURAL & HERITAGE</option>
                                <option value="BEACH HOLIDAYS">BEACH HOLIDAYS</option>
                                <option value="CITY BREAKS">CITY BREAKS</option>
                                <option value="WILDLIFE">WILDLIFE</option>
                                <option value="ADVENTURE">ADVENTURE</option>
                                <option value="COLONICAL TOURS">COLONICAL TOURS</option>
                            </select>
                        </p>
                    </div>
                    <button Type="submit">Add destination</button>
                </form>
            </div>
        </div>
    </div>

    <?php require_once "../../inc/footer.php"; ?>
    <?php mysqli_close($connection); ?>