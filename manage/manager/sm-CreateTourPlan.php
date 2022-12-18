<?php session_start();

require_once('../../inc/connection.php');

if(!isset($_SESSION['userID'])){
    header('Location: login.php');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {  


$season=$_POST['season'];
$Location=$_POST['Location'];
$No_of_Days=$_POST['No_of_Days'];
$Budget=$_POST['Budget'];
$Type_of_Package=$_POST['Type_of_Package'];
$No_of_Nights=$_POST['No_of_Nights'];
$user_id=$_SESSION['user_id'];


$sql="INSERT INTO premadetourplan(budget,userID,season,location,noOfDays,type)
VALUES ($Budget,$user_id,'$season','$Location',$No_of_Days,'$Type_of_Package');";




$result= mysqli_query($connection,$sql);



}



?>
<?php
$title = "Create tour plan";
require_once("../../inc/header.php");
?>
    <div class="body">
        <div class="dashboard">
            <img src="css/profile.png" alt="">
            <p><?php echo $_SESSION['firstName']; ?></p>
            <button class="nav" onclick="location.href = 'sm-myprofile.php';">MY PROFILE</button>
            <button class="nav" onclick="location.href = 'sm-updateprofile.php';">UPDATE PROFILE</button>
            <button class="nav" onclick="location.href = 'sm-GenerateReport.php';">GENERATE REPORT</button>
            <button class="select" onclick="location.href = 'sm-CreateTourPlan.php';">CREATE TOUR PLAN</button>
            <button class="nav" onclick="location.href = 'sm-AP.php';">ACCOMMODATION PROVIDER</button>
            <button class="nav" onclick="location.href = 'sm-VP.php';">VEHICLE PROVIDER</button>
            <button class="nav" onclick="location.href = 'sm-TG.php';">TOURIST GUIDE</button>
        </div>
        <div class="content">


            <!-- Create New Tour Plan -->
        <div class="create-plan">
            <h2>Create New Plan</h2>
            <div class="plan-content">
            
            
            <form action="" method="post">
               <div  class="plan-details">
                    <label for="season">Season</label>
                    <select name="season" id="cars">
                        <option value="NOVEMBER-MARCH">NOVEMBER-MARCH</option>
                        <option value="APRIL-JUNE">APRIL-JUNE</option>
                        <option value="JULY-OCTOMBER">JULY-OCTOMBER</option>
                        <!-- <option value="audi">Audi</option> -->
                    </select>
                </div>
                <div  class="plan-details">
                    
                        <input type="text" placeholder="Location" name="Location"> 
                    
                </div>
                <div  class="plan-details">
                   
                    <input type="text" placeholder="No of Days" name="No_of_Days"> 
                    
                </div>
                <div  class="plan-details">
                    
                    <input type="text" placeholder="Budget" name="Budget"> 
                     
                </div>
                <div  class="plan-details">
                    
                    <input type="text" placeholder="Type of Package" name="Type_of_Package"> 
                    
                </div>
                <div  class="plan-details">
                    
                    <input type="text" placeholder="No of Nights" name="No_of_Nights"> 
                     
                </div>
                <button Type="submit">Create Tour Plan</button>
               </form>

               
            </div>
        </div>
    </div>
<?php require_once("../../inc/footer.php");?>
</body>
</html>