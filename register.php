<?php
session_start();
// require_once('/travelPal/inc/connection.php');
// require_once('/travelPal/inc/functions.php');
require_once('inc/connection.php');
require_once('inc/functions.php');
?>

<?php
$title = "Register";
require_once("inc/header.php");
?>
<div class="login">
    <fieldset>
        <legend>
            <h1>Register As</h1>
        </legend>
        <p>
            <a href="./tourist/registration.php"><button type="submit" name="submit"> <b> A Tourist -></b></button></a>
            <button type="submit" name="submit"> <b>A Service Provider -> </b></button>
        </p>
    </fieldset>
</div>
<?php
require_once("inc/footer.php");
?>

<?php mysqli_close($connection); ?>