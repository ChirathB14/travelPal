<?php
session_start();
require_once('../../inc/connection.php');
require_once('../../inc/functions.php');


if (isset($_POST["submit"])) {
    // echo "Kalana";
    $email = $_POST['email'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    $passwordHash = sha1($password);
    $errors = array();

    if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($confirmPassword)) {
        array_push($errors, "All the fields are required");
    }


    //checking email address
    if (!is_email($email)) {
        array_push($errors, "Email address is invalid.");
    }

    //checking maxlength
    $max_len_fields = array('firstName' => 50, 'lastName' => 50, 'email' => 50);

    //checking max length fields
    $errors = array_merge($errors, check_max_length($max_len_fields));

    //checking minimum password length
    if (strlen($password) < 8) {
        array_push($errors, "Password must be at least 8 character long");
    }

    //checking password match
    if ($password !== $confirmPassword) {
        array_push($errors, "Password does not match");
    }

    $query = "SELECT * FROM Users WHERE email = '{$email}' LIMIT 1";

    $result_set = mysqli_query($connection, $query);

    verify_query($result_set);

    if (mysqli_num_rows($result_set) == 1) {
        // array_push($errors, "Password does not match");
        $errors[] = "Email address already exists.";
    }

    if (empty($errors)) {
        $query = "INSERT INTO users (
                    `firstName`, `lastName`, `email`, `password`
                  ) VALUES (
                    '{$firstName}', '{$lastName}', '{$email}', '{$passwordHash}'
                  )";

        $result = mysqli_query($connection, $query);

        if ($result) {
            $last_id = mysqli_insert_id($connection);

            $Name = $firstName . " " . $lastName;

            $query = "INSERT INTO sitemanager(userID)  VALUES ('{$last_id}')";
            $result = mysqli_query($connection, $query);
            verify_query($result);


            header('Location: admin_profile.php');
            // $firstName = "";
            // $lastName = "";
            // $email = "";

        } else {
            echo "<p class='error'> Failed to add the new record. Error: " . mysqli_error($connection) . "</p>";
        }
    }
}
?>

<?php 
$title = "Add SiteManager";
require_once('../../inc/header.php') 
?>

<head>
    <!-- CSS Import -->
    <link rel="stylesheet" href="../../css/main.css" type="text/css">
</head>

<div class="body">
    <!-- Profile page content -->
    <div class="page-content">
        <!-- Dashboard - Service Provider -->
        <div class="Dashboard">
            <div class="Dashboard-top">
                <img src="../../assets/profile.png" alt="Profile pic">
                <h4><?php echo $_SESSION['full_name']; ?></h4>
            </div>
            <div class="Dashboard-bottom">
                <button class="active" onclick="location.href = 'admin_profile.php';">Site Manager</button>
                <button onclick="location.href = 'admin_tourist.php';">Tourist</button>
                <button onclick="location.href = 'accomodation_provider.php';">Accommodation Provider</button>
                <button onclick="location.href = 'vehicle_provider.php';">Vehicle Provider</button>
                <button onclick="location.href = 'tourist_guide.php';">Tourist Guide</button>
                <br> <br> <br> <br> <br>
            </div> 
        </div>

        
    <div class="content">
        <?php
        if (!empty($errors)) {
            display_errors($errors);
        }
        ?>

        <h2>Site Manager</h2>
        <div class="profile-content" style="height: 300px">
        <form action="add_siteManager.php" class="" method='post'>
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <div class="details-update" style="width:300px">
                    <p>
                        &nbsp; First Name : 
                        <input type="text" name="first_name" id="" placeholder="Enter first name" required>
                    </p> 
                </div>
                <div class="details-update" style="width:300px">
                    <p>
                        &nbsp; Last Name : 
                        <input type="text" name="last_name" id="" placeholder="Enter last name" required>
                    </p> 
                </div>
                <div class="details-update" style="width:300px">
                    <p>
                        &nbsp; Email : 
                        <input type="email" name="email" id="" placeholder="Enter your email" required>
                    </p> 
                </div>
                <div class="details-update" style="width:300px">
                    <p>
                        &nbsp; Password : 
                        <input type="password" id="" name="password" placeholder="Enter password" required>
                    </p> 
                </div>
                <div class="details-update" style="width:300px">
                    <p>
                        &nbsp; Confirm Password : 
                        <input type="password" id="" name="confirm_password" placeholder="Enter password" required  style="width:140px">
                    </p> 
                </div>
                <button type="submit" name="submit" style="margin-left:30px">Submit</button>
        </form>
        </div>
    </div>
    </div>
</div>

<?php
require_once("../../inc/footer.php");
?>

<?php mysqli_close($connection); ?>
