<?php
session_start();
require_once('../inc/connection.php');
require_once('../inc/functions.php');

//checking if the user is logged in
if (!$_SESSION['user_id'] && !$_SESSION['user_type'] == 'ServiceProvider') {
    header('Location: login.php');
}

$errors = array();
$user_id = '';
$first_name = '';
$last_name = '';
$email = '';
$password = '';

if (isset($_SESSION['user_id'])) {
    //getting the user information
    $user_id = mysqli_real_escape_string($connection, $_SESSION['user_id']);
    $query1 = "SELECT * 
              FROM Users u, serviceprovider sp 
              WHERE u.userID = {$user_id} 
                    AND u.userID = sp.userID
              LIMIT 1";

    $result_set1 = mysqli_query($connection, $query1);

    if ($result_set1) {
        if (mysqli_num_rows($result_set1) == 1) {
            //user found
            $result = mysqli_fetch_assoc($result_set1);
            $first_name = $result['firstName'];
            $last_name = $result['lastName'];
            $email = $result['email'];

            //retrieving rest of service-provider details
            $query2 = "SELECT * 
                        FROM serviceprovider 
                        WHERE userID = {$user_id} 
                        LIMIT 1";
            $result_set2 = mysqli_query($connection, $query2);

            if ($result_set2) {
                if (mysqli_num_rows($result_set2) == 1) {
                    //user found
                    $result = mysqli_fetch_assoc($result_set2);
                    $location = $result['location'];
                    $phoneNo = $result['phoneNo'];
                    $nic = $result['NIC'];
                } else {
                    //user not found
                    header('Location: sp-profile.php?err=user_details_not_found');
                }
            } else {
                //query unsuccessful
                header('Location: sp-profile.php?err=query_failed');
            }
        } else {
            //user not found
            header('Location: sp-profile.php?err=user_not_found');
        }
    } else {
        //query unsuccessful
        header('Location: sp-profile.php?err=query_failed');
    }
}

?>

<?php
$title = "Profile";
require_once("../inc/header.php");
?>

<head>
        <link rel="stylesheet" href="../css/main.css" type="text/css">

        <!-- Disable input profile details in profile pages -->
        <script lang="javascript">
        function disable() {
          document.querySelectorAll('input').forEach(element => element.disabled = true);
        }
        </script>
</head>

<div class="body">
    <!-- Profile page content -->
    <div class="page-content">
        <!-- Dashboard - Service Provider -->
        <div class="Dashboard">
            <div class="Dashboard-top">
                <img src="/travelPal/assets/Profile.png" alt="">
                <h4><?php echo $_SESSION['full_name']; ?></h4>
            </div>
            <div class="Dashboard-bottom">
                <button class="active" onclick="location.href = 'sp-profile.php';">My Profile</button>
                <button onclick="location.href = 'sp-addServiceDetails.php';">Service Details</button>
                <button onclick="location.href = 'sp-update-profile.php';">Update Profile</button>
                <button onclick="location.href = 'sp-update-profile.php';">Update Availability</button>
                <br> <br> <br> <br> <br> <br>
            </div>
        </div>

        <div class="profile">
            <?php
            if (isset($_GET['profile_updated'])) {
                echo '<p class="info-1">Profile updated successfully</p>';
            }
            ?>

            <div class="profile-content">
            <h2>Profile</h2>
                <div  class="details">
                    <p>
                        <input type="text" placeholder="Service Provider Id" disabled value="<?php echo "YOUR ID : " . $user_id; ?>"> 
                    </p> 
                </div>
                <div  class="details">
                    <p>
                        <input type="text" placeholder="Service Provider First name" disabled value="<?php echo "FIRST NAME : " . $first_name; ?>"> 
                    </p> 
                </div>
                <div  class="details">
                    <p>
                        <input type="text" placeholder="Service Provider Last Name" disabled value="<?php echo "LAST NAME : " . $last_name; ?>"> 
                    </p> 
                </div>
                <div  class="details">
                    <p>
                        <input type="text" placeholder="Service Provider Email" disabled value="<?php echo "EMAIL : " . $email; ?>"> 
                    </p> 
                </div>
                <div  class="details">
                    <p>
                        <input type="text" placeholder="Service Provider Location" disabled value="<?php echo "LOCATION : " . $location; ?>"> 
                    </p> 
                </div>
                <div  class="details">
                    <p>
                        <input type="tel" style="width:200px" placeholder="Service Provider Phone Number" disabled value="<?php echo "PHONE NUMBER : " . $phoneNo; ?>"> 
                    </p> 
                </div>
                <div  class="details">
                    <p>
                        <input type="text" placeholder="Service Provider NIC" disabled value="<?php echo "NIC : " . $nic; ?>"> 
                    </p> 
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require_once("../inc/footer.php");
?>

<?php mysqli_close($connection); ?>