<script src="sweetalert2.all.min.js"></script>

<?php
require '../../DbConfig.php';
if (isset($_GET['id'])) {
$delete_Id = $_GET['id'];
$delete_sql = "DELETE FROM unavailability WHERE unavailability_Id= '$delete_Id'";
if ($conn->query($delete_sql) === TRUE) {
    echo '<script language = "javascript">';
    echo 'Swal.fire({
        title: "Successfully Deleted",
        text: "",
        icon: "success",
        confirmButtonText: "OK",
        confirmButtonColor: "var(--primarycolor)",
        footer: "TravelPal"
        })';
    // echo 'alert("Delete Success")';
    echo '</script>';
    header($_GET['page']);
} else {
    echo '<script language = "javascript">';
    echo 'Swal.fire({
        title: "Unsuccessfull :( ",
        text: "Please try again",
        icon: "error",
        confirmButtonText: "OK",
        confirmButtonColor: "var(--primarycolor)",
        footer: "TravelPal"
        })';
    // echo 'alert("Unsuccessful :( ")';
    echo '</script>';
}
}
?>
