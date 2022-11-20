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

<main>
    <h1>Welcome, <?php echo $_SESSION['full_name'];?></h1>
    <p>
        <a href="t-profile.php"> MY PROFILE</a>
        <a href="t-update-profile.php"> UPDATE PROFILE</a>
        <a href="#t-tours.php"> VIEW TOURS</a>
    </p>

    <?php
    if (!empty($errors)) {
        display_errors($errors);
    }
    ?>

    <?php
    if (isset($_GET['profile_updated'])) {
            echo '<p class="info"> Profile updated successfully!</p>';
    }
    if (isset($_GET['pw_updated'])) {
            echo '<p class="info"> Password updated successfully!</p>';
    }
    ?>

    <form action="modify-user.php" class="userform" method='post'>
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        <p>
            <label for="">First name:</label>
            <?php echo $first_name; ?>
        </p>
        <p>
            <label for="">Last name:</label>
            <?php echo $last_name; ?>
        </p>
        <p>
            <label for="">Email address:</label>
            <?php echo $email; ?>
        </p>
        <p>
            <label for="">Password:</label>
            <span>************</span> 
        </p>
    </form>
</main>
<?php
require_once("../inc/footer.php");
?>

<?php mysqli_close($connection); ?>
