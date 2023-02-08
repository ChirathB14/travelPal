<?php require_once('../inc/connection.php')?>

<?php
$title = "Add Service Details";
require_once("../inc/header.php");
?>

<head>
        <link rel="stylesheet" href="/travelPal/css/main.css" type="text/css">
        <link rel="stylesheet" href="/travelPal/css/form.css" type="text/css">
</head>

<div class="page-content">
    <div class="services-container">
        <h2>Add Service Details</h2>
        <div class="services-sub-container">
            <div class="input-elements">
                <input type="text" name="name" placeholder="  Service Provider Name *" required>
                <input type="tel" name="phone-number" placeholder="  Phone Number *" required>
                <div class="select">
                    <select id="" name="" placeholder="  Service Type" style="width: 350px;  margin-top: 12px; 
                            background-color: var(--accentcolor); opacity: 0.75; height: 40px;
                            box-sizing: border-box; border: none; border-radius: 5px;
                            font-size: 10px; font-weight: bold; color:#808080;">
                        <option value="" disabled selected>SERVICE TYPE</option>
                        <option value="">Accommodation Provider</option>
                        <option value="">Vehicle Provider</option>
                        <option value="">Tour Guide</option>
                    </select>
                </div>
            </div>
            <div class="input-elements">
                <input type="text" name="NIC" placeholder="  Service Provider NIC *" required>
                <input type="email" name="email" placeholder="  Service Provider Email *" required>
                <input type="file" name="profile" placeholder="Upload Photo" style="padding: 10px;">
            </div>
        </div>
        <hr> <br>
        <h5 style="margin-left: 45px;">If you an Accommodation provider,</h5>
        <div class="services-sub-container">
            <div class="input-elements">
                <input type="text" name="reg-number" placeholder="  Registration Number" required>
                <input type="tel" name="phone-number" placeholder="  Phone Number" required>
                <div class="preference">
                    <p>with food</p>
                    <input type="checkbox" name="" id=""> <h6>Yes</h6> 
                    <input type="checkbox" name="" id=""> <h6>No</h6> 
                </div>
            </div>
            <div class="input-elements">
                <input type="text" name="address" placeholder="  Service Provider address" required>
                <input type="text" name="price" placeholder="  Price per room" required>
                <div class="preference">
                    <p>with A/C</p>
                    <input type="checkbox" name="" id=""> <h6>Yes</h6> 
                    <input type="checkbox" name="" id=""> <h6>No</h6> 
                </div>
            </div>
        </div>
        <hr> <br>
        <h5 style="margin-left: 45px;">If you a Vehicle provider,</h5>
        <div class="services-sub-container">
            <div class="input-elements">
                <input type="text" name="vehicle-number" placeholder="  Vehicle Number" required>
                <input type="text" name="price" placeholder="  Price per KM" required>
            </div>
            <div class="input-elements">
                <input type="text" name="" placeholder="  Vehicle Type" required>
                <input type="text" name="" placeholder=" Fuel Type" required>
            </div>
        </div>
        <hr> <br>
        <h5 style="margin-left: 45px;">If you a Tour Guide,</h5>
        <div class="services-sub-container">
            <div class="input-elements">
                <input type="text" name="reg-number" placeholder="  Registration Number" required>
                <input type="text" name="price" placeholder="  Price Per Day" required>
            </div>
            <div class="input-elements">
                <input type="text" name="" placeholder="  Experience" required>
                <input type="text" name="" placeholder="  Languages" required>
            </div>
        </div>
        <hr> <br>
        <div class="form-bottom">
            <input type="checkbox" name="" id="" style="margin: 0px 15px 15px 45px;"> <h6>I assure that all the details given by me are true</h6>
        </div>
        <button type="submit" name="submit">Add Details</button>
        <br>
    </div>
</div>

<?php require_once("../inc/footer.php");?>

<?php mysqli_close($connection); ?>