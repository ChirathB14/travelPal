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

<div class="body">
    <div class="dashboard">
        <img src="/travelPal/assets/profile.png" alt="">
        <p>
            <?php echo $_SESSION['full_name']; ?>
        </p>
        <button class="select" onclick="location.href = 't-profile.php';">MY PROFILE</button>
        <button class="nav" onclick="location.href = 't-update-profile.php';">UPDATE PROFILE</button>
        <button class="nav" onclick="location.href = 't-view-tours.php';">VIEW TOURS</button>
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
        </table>

    </div>
</div>


<?php
require_once("../inc/footer.php");
?>

<?php mysqli_close($connection); ?>