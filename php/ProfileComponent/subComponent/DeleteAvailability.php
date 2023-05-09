<?php
require '../../DbConfig.php';
if (isset($_GET['id'])) {
$delete_Id = $_GET['id'];
$delete_sql = "DELETE FROM unavailability WHERE unavailability_Id= '$delete_Id'";
if ($conn->query($delete_sql) === TRUE) {
    echo '<script language = "javascript">';
    echo 'alert("Delete Success")';
    echo '</script>';
    header($_GET['page']);
} else {
    echo '<script language = "javascript">';
    echo 'alert("Unsuccessful :( ")';
    echo '</script>';
}
}
?>
