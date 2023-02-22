<?php require_once('../inc/connection.php')?>

<?php
$title = "Customize Tour Plan";
require_once("../inc/header.php");
?>

<head>
        <link rel="stylesheet" href="/travelPal/css/main.css" type="text/css">
        <link rel="stylesheet" href="/travelPal/css/form.css" type="text/css">
</head>

<div class="customize-page-content">
    <form action="">
    <div class="services-container">
    <h2>Customize Tour</h2>
    <br>
        <p>Select prefered destinations to visit *</p>
        <div class="checkbox-list">
            <div class="checkbox-items">
                <div class="item"><h6 style="margin-right:92px">Fort Federick</h6><input type="checkbox" name="" id="">  </div>
                <div class="item"><h6 style="margin-right:91px">Marble Beach</h6><input type="checkbox" name="" id="">  </div>
                <div class="item"><h6 style="margin-right:13px">Sri Thirukoneswaram Kovil</h6><input type="checkbox" name="" id=""> </div>
                <div class="item"><h6 style="margin-right:18px">Kinniya Hot Water Springs</h6><input type="checkbox" name="" id=""> </div> 
            </div>
            <div class="checkbox-items">
                <div class="item"><h6 style="margin-right:117px">Seruwila Temple</h6><input type="checkbox" name="" id=""> </div>  
                <div class="item"><h6 style="margin-right:130px">Pegion Island</h6><input type="checkbox" name="" id=""> </div>  
                <div class="item"><h6 style="margin-right:60px">Trincomalee War Cemetry</h6><input type="checkbox" name="" id=""> </div>
                <div class="item"><h6 style="margin-right:30px">Velgam Vehera Buddhist Temple</h6><input type="checkbox" name="" id=""> </div>
            </div>
        </div>
        <div class="form-buttons">
            <button class="cancelbutton" type="submit" name="submit"><a href="/travelPal/tourist/customize-tour-plan2.php">Cancel</a></button>
            <button class="proceedbtn" type="submit" name="submit">
                <a href="/travelPal/tourist/enter-tour-details.php">Proceed to plan</a>   
            </button>   
    </div>
    </div>
    </form>
</div>

<?php require_once("../inc/footer.php");?>

<?php mysqli_close($connection); ?>