<?php 
session_start();
require_once('../../inc/connection.php');
require_once('../../inc/functions.php');

//checking if the user is logged in
if (!$_SESSION['user_id']) {
    header('Location: login.php');
}

if (isset($_GET['user_id'])) {
    // getting user information
    $user_id = mysqli_real_escape_string($connection, $_GET['user_id']);

    $query = " DELETE FROM users
                WHERE userID = {$user_id} LIMIT 1";

   $result = mysqli_query($connection, $query);

    if ($result) {
        //query success..redirecting 
        header('Location: admin_profile.php?record_deleted=true');
    } else {
        $errors[] = 'Failed to delete the record.';
    }
} else {
    header ('Location: admin_profile.php');
}
?>