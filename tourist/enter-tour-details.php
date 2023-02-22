<?php require_once('../inc/connection.php')?>

<?php
$title = "Enter Tour Details";
require_once("../inc/header.php");
?>

<head>
        <link rel="stylesheet" href="/travelPal/css/main.css" type="text/css">
        <link rel="stylesheet" href="/travelPal/css/form.css" type="text/css">
</head>

<div class="customize-page-content">
    <form action="">
    <div class="services-container" style="width: 70%; padding-left: 140px;">
    <h2>Enter the Tour Details</h2>
    <br>
        <div class="checkbox-list">
            <div class="checkbox-items">
                <div class="input-item"><h6 style="margin-right:80px">City</h6><input type="text" name="" id="" style="width:180px;">  </div>
                <div class="input-item"><h6 style="margin-right:42px">Experience</h6><input type="text" name="" id="" style="width:460px;"> </div>  
                <div class="input-item"><h6 style="margin-right:50px">Duration</h6><input type="text" name="" id="" style="width:460px;"> </div>    
            </div>
        </div>
        <br>

        <p>Set Duration *</p>
        <div class="checkbox-list">
            <div class="checkbox-items">
                <div class="item"><h6 style="margin-right:30px">Start Date</h6><input type="date" name="" id="">  </div>
            </div>
            <div class="checkbox-items">
                <div class="item"><h6 style="margin-right:30px">End Date</h6><input type="date" name="" id=""> </div>   
            </div>
        </div>
        <br>

        <div class="checkbox-list">
            <div class="checkbox-items">
                <div class="input-item"><p style="margin-right:60px;">No of Tourists *</p><input type="text" name="" id="" style="width:40px;" placeholder="  XXX">  </div>
            </div>
        </div>
        <br>

        <p>Select prefered Accommodation Type</p>
        <div class="checkbox-list">
            <div class="checkbox-items">
                <div class="item"><h6 style="margin-right:90px">Star Class Hotel</h6><input type="checkbox" name="" id="">  </div>
                <div class="item"><h6 style="margin-right:126px">Bungalow</h6><input type="checkbox" name="" id="">  </div>
            </div>
            <div class="checkbox-items">
                <div class="item"><h6 style="margin-right:125px">Guest House</h6><input type="checkbox" name="" id=""> </div>  
                <div class="item"><h6 style="margin-right:170px">Villa</h6><input type="checkbox" name="" id=""> </div>  
            </div>
        </div>
        <br>

        <p>Select prefered Accommodation facilities</p>
        <div class="checkbox-list">
            <div class="checkbox-items">
                <div class="item"><h6 style="margin-right:126px">With food</h6><input type="checkbox" name="" id="">  </div>
            </div>
            <div class="checkbox-items">
                <div class="item"><h6 style="margin-right:117px">Without Food</h6><input type="checkbox" name="" id=""> </div>   
            </div>
        </div>
        <br>

        <p>Select prefered Food Type</p>
        <div class="checkbox-list">
            <div class="checkbox-items">
                <div class="item"><h6 style="margin-right:164px">Veg</h6><input type="checkbox" name="" id="">  </div>
            </div>
            <div class="checkbox-items">
                <div class="item"><h6 style="margin-right:145px">Non Veg</h6><input type="checkbox" name="" id=""> </div>   
            </div>
        </div>
        <br>

        <p>Select A/C Facilities</p>
        <div class="checkbox-list">
            <div class="checkbox-items">
                <div class="item"><h6 style="margin-right:164px">A/C</h6><input type="checkbox" name="" id="">  </div>
            </div>
            <div class="checkbox-items">
                <div class="item"><h6 style="margin-right:145px">Non A/C</h6><input type="checkbox" name="" id=""> </div>   
            </div>
        </div>
        <br>

        <p>Select prefered transportation Type</p>
        <div class="checkbox-list">
            <div class="checkbox-items">
                <div class="item"><h6 style="margin-right:161px">Public</h6><input type="checkbox" name="" id="">  </div>
            </div>
            <div class="checkbox-items">
                <div class="item"><h6 style="margin-right:141px">Private</h6><input type="checkbox" name="" id=""> </div>   
            </div>
        </div>
        <br>

        <p>Do you need a Tour Guide</p>
        <div class="checkbox-list">
            <div class="checkbox-items">
                <div class="item"><h6 style="margin-right:164px">Yes</h6><input type="checkbox" name="" id="">  </div>
            </div>
            <div class="checkbox-items">
                <div class="item"><h6 style="margin-right:165px">No</h6><input type="checkbox" name="" id=""> </div>   
            </div>
        </div>
        <br>
        <div class="form-buttons">
            <button class="cancelbutton" type="submit" name="submit"><a href="/travelPal/tourist/customize-tour-plan2.php">Cancel</a></button>
            <button class="nextbutton" type="submit" name="submit"><a href="/travelPal/tourist/proceed-to-pay.php">Next</a></button>
        </div>
    </div>
    <br>
    </form>
</div>

<?php require_once("../inc/footer.php");?>

<?php mysqli_close($connection); ?>