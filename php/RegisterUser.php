<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="../css/register.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript" src="../js/register.js"></script>
    <script type="text/javascript" src="../js/checkAccess.js"></script>
    <link rel="icon" type="image/x-icon" href="/travelPal/favicon.ico">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>

   <?php
    $title = "TravePal";
    // require_once("Common/header.php");
    ?>

<body>
  <div class="container" onload="loginRegisterAccess()">
    <div class="title" id="heder-login">Registration</div>
    <div class="content">
      <form action="RegisterUser.php" method="post" onsubmit="return cheakpassword()">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" name="fname" id="fname" placeholder="Enter your name" required oninvalid="this.setCustomValidity('Enter first name')" oninput="this.setCustomValidity('')">
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" name="lname" id="lname" placeholder="Enter your username" required oninvalid="this.setCustomValidity('Enter last name')" oninput="this.setCustomValidity('')">
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="email" id="email" placeholder="Enter your email" required pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$">
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" name="address" id="address" placeholder="Enter your number" required oninvalid="this.setCustomValidity('Enter address')" oninput="this.setCustomValidity('')">
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="text" name="Pass" id="Pass" placeholder="Enter your password" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$" title="Must include atleast 1 uppercase letter, 1 lowercase letter, 1 number and 1 special character.
                            Should be more than 8 characters and less than 16 characters.">
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="text" name="rePass" id="rePass" placeholder="Confirm your password" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$" title="Must include atleast 1 uppercase letter, 1 lowercase letter, 1 number and 1 special character.
                            Should be more than 8 characters and less than 16 characters.">
          </div>
          <div class="input-box">
            <span class="details">User Type</span>
            <select id="usertype" name="usertype" required style="width: 640px; 
                                opacity: 0.75; height: 45px;box-sizing: border-box; border-radius: 5px;
                                font-size: 14px; color: grey;">
                                <option value="" disabled selected hidden> &nbsp;Register as</option>
                                <option value="3">Tourist</option>
                                <option value="4">Service Provider</option>
            </select>
          </div>
        </div>
        <button class="button" type="submit" id="registerbtn" name="registerbtn" value="registerbtn">
                            Register
        </button>
        <!-- <div class="button">
          <input type="submit" id="registerbtn" name="registerbtn" value="Register">
        </div> -->
        <center>
        <P>
            <a href="./Login.php"> Already have an Account? Log in</a>
        </P>
        </center>
      </form>
    </div>
  </div>

  <?php
    require './DbConfig.php';
    if (isset($_POST['registerbtn'])) {
        $hasedPass = password_hash($_POST["Pass"], null);
        $first = $_POST["fname"];
        $last = $_POST["lname"];
        $address = $_POST["address"];
        $email = $_POST["email"];
        $psw = $hasedPass;
        $isActive = true;
        $userType = $_POST["usertype"];
        $createdDate = date('Y-m-d H:i:s');

        $sql = "SELECT * FROM user WHERE email= '" . $email . "'";
        $result = $conn->query($sql);
        if ($result) {
            if ($result->num_rows > 0) {
                echo '<script language = "javascript">';
                echo 'Swal.fire({
                    title: "Email Already Exists :( ",
                    text: "Please try again",
                    icon: "error",
                    confirmButtonText: "OK",
                    confirmButtonColor: "var(--primarycolor)",
                    footer: "TravelPal"
                    })';
                // echo 'alert("Email Already Exists :( ")';
                echo '</script>';
            } else {
                $sqltwo = "INSERT INTO user (user_Id, first_name, last_name, address, email, password, isActive,  user_type, created_date)
                                    VALUES (0,'$first','$last','$address','$email','$psw','$isActive', '$userType', '$createdDate' )";

                if ($conn->query($sqltwo) === TRUE) {
                    echo '<script language = "javascript">';
                    echo 'Swal.fire({
                      title: "Register Successfully!",
                      text: "Welcome to TravelPal",
                      icon: "success",
                      confirmButtonText: "OK",
                      confirmButtonColor: "var(--primarycolor)",
                      footer: "TravelPal"
                      })
                    window.location = "Login.php";';
                    // echo 'success()';
                    echo '</script>';

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
                    // echo 'alert("Unsuccessfully :( ")';
                    echo '</script>';
                }
                $conn->close();
            }
        }
    }

    ?>

</body>
</html>