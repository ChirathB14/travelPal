 <div class="dashboard">
     <img src="/travelPal/assets/profile.png" alt="">
     <p><?php echo $_SESSION['full_name']; ?></p>
     <button class="select" onclick="location.href = 't-profile.php';">MY PROFILE</button>
     <button class="nav" onclick="location.href = 't-update-profile.php';">UPDATE PROFILE</button>
     <button class="nav" onclick="location.href = 't-view-tours.php';">VIEW TOURS</button>
 </div>