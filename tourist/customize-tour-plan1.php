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
        <p>Select a city you prefer to visit *</p>
        <div class="checkbox-list">
            <div class="checkbox-items1">
                <div class="item"><h6 style="margin-right:60px">Trincomalee</h6><input type="checkbox" name="" id="">  </div>
                <div class="item"><h6 style="margin-right:92px">Jaffna</h6><input type="checkbox" name="" id="">  </div>
                <div class="item"><h6 style="margin-right:100px">Galle</h6><input type="checkbox" name="" id=""> </div> 
            </div>
            <div class="checkbox-items1">
                <div class="item"><h6 style="margin-right:100px">Kandy</h6><input type="checkbox" name="" id=""> </div>  
                <div class="item"><h6 style="margin-right:60px">Nuwara Eliya</h6><input type="checkbox" name="" id=""> </div>  
                <div class="item"><h6 style="margin-right:81px">Dambulla</h6><input type="checkbox" name="" id=""> </div>
            </div>
        </div>
        <br><br>
        <p>What do you wish to experience in Sri Lanka other than the includes in the tour plan *</p>
        <div class="checkbox-list">
                <div class="checkbox-items1">
                    <div class="item"><h6 style="margin-right:20px">Cultural & Heritage</h6><input type="checkbox" name="" id="">  </div>
                    <div class="item"><h6 style="margin-right:46px">Beach Holidays</h6><input type="checkbox" name="" id="">  </div>
                    <div class="item"><h6 style="margin-right:69px">City Breaks</h6><input type="checkbox" name="" id="">  </div>
                </div>
                <div class="checkbox-items1">
                <div class="item"><h6 style="margin-right:90px">Wild Life</h6><input type="checkbox" name="" id="">  </div>
                    <div class="item"><h6 style="margin-right:77px">Adventure</h6><input type="checkbox" name="" id="">  </div>
                    <div class="item"><h6 style="margin-right:40px">Colonical Tours</h6><input type="checkbox" name="" id="">  </div> 
                </div>
        </div>
        <div class="form-buttons">
            <button class="cancelbutton" type="submit" name="submit"><a href="/travelPal/tourist/customize-tour-plan2.php">Cancel</a></button>
            <button class="nextbutton" type="submit" name="submit" style="margin-left: 400px;"><a href="/travelPal/tourist/customize-tour-plan2.php">Next</a></button>
        </div>
    </div>
    </form>
</div>

<?php require_once("../inc/footer.php");?>

<?php mysqli_close($connection); ?>