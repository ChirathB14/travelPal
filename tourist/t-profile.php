<?php
session_start();
require_once('../inc/connection.php');
require_once('../inc/functions.php');

//checking if the user is logged in
if (!$_SESSION['user_id']) {
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
    $query = "SELECT * 
              FROM Users u, Tourist t 
              WHERE u.userID = {$user_id} 
                    AND u.userID = t.userID
              LIMIT 1";

    $result_set = mysqli_query($connection, $query);

    if ($result_set) {
        if (mysqli_num_rows($result_set) == 1) {
            //user found
            $result = mysqli_fetch_assoc($result_set);
            $first_name = $result['firstName'];
            $last_name = $result['lastName'];
            $email = $result['email'];
        } else {
            //user not found
            header('Location: t-profile.php?err=user_not_found');
        }
    } else {
        //query unsuccessful
        header('Location: t-profile.php?err=query_failed');
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
        <!-- Dashboard - Tourist -->
        <div class="Dashboard">
            <div class="Dashboard-top">
                <img src="../assets/Profile.png" alt="">
                <h4><?php echo $_SESSION['full_name']; ?></h4>
            </div>
            <div class="Dashboard-bottom">
                <button class="active" onclick="location.href = 't-profile.php';">My Profile</button>
                <button onclick="location.href = 't-update-profile.php';">Update Profile</button>
                <button onclick="location.href = 't-view-tours.php';">View Tours</button>
                <br> <br> <br> <br> <br>
            </div>
        </div>
        <div class="profile">
            <?php
            if (isset($_GET['profile_updated'])) {
                echo '<p class="info-1">Profile updated successfully</p>';
            }
            ?>
            <h2>Profile</h2>

            <div class="profile-content">
                <div  class="details">
                    <p>
                        <input type="text" placeholder="Tourist Id" disabled value="<?php echo "YOUR ID : " . $user_id; ?>"> 
                    </p> 
                </div>
                <div  class="details">
                    <p>
                        <input type="text" placeholder="Tourist First name" disabled value="<?php echo "FIRST NAME : " . $first_name; ?>"> 
                    </p> 
                </div>
                <div  class="details">
                    <p>
                        <input type="text" placeholder="Tourist Last Name" disabled value="<?php echo "LAST NAME : " . $last_name; ?>"> 
                    </p> 
                </div>
                <div  class="details">
                    <p>
                        <input type="text" placeholder="Tourist Email" disabled value="<?php echo "EMAIL : " . $email; ?>"> 
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