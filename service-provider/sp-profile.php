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

<div class="body">
    <div class="dashboard">
        <img src="/travelPal/assets/profile.png" alt="">
        <p>
            <?php echo $_SESSION['full_name']; ?>
        </p>
        <button class="select" onclick="location.href = 'sp-profile.php';">MY PROFILE</button>
        <button class="nav" onclick="location.href = 'sp-update-profile.php';">UPDATE PROFILE</button>
    </div>
    <div class="content">
        <?php
        if (isset($_GET['profile_updated'])) {
            echo '<p class="info-1">Profile updated successfully</p>';
        }
        ?>
        <h1>PROFILE</h1>
        <table class="table">
            <tr class="row">
                <td>
                    <?php echo "YOUR ID : " . $user_id; ?>
                </td>
            </tr>
            <tr class="row">
                <td>
                    <?php echo "FIRST NAME : " . $first_name; ?>
                </td>
            </tr>
            <tr class="row">
                <td>
                    <?php echo "LAST NAME : " . $last_name; ?>
                </td>
            </tr>
            <tr class="row">
                <td>
                    <?php echo "EMAIL : " . $email; ?>
                </td>
            </tr>
            <tr class="row">
                <td>
                    <?php echo "LOCATION : " . $location; ?>
                </td>
            </tr>
            <tr class="row">
                <td>
                    <?php echo "PHONE NUMBER : " . $phoneNo; ?>
                </td>
            </tr>
            <tr class="row">
                <td>
                    <?php echo "NIC : " . $nic; ?>
                </td>
            </tr>
        </table>

    </div>
</div>


<?php
require_once("../inc/footer.php");
?>

<?php mysqli_close($connection); ?>