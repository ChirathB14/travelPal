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

<?php require_once('../../inc/connection.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add SiteManager | TravelPal</title>

    <!-- CSS Import -->
    <link rel="stylesheet" href="../../css/admin-styles.css">
    <!--<link rel="stylesheet" href="../../css/styles.css"> -->
    <!-- <link rel="stylesheet" href="../../css/add_siteManager.css"> -->

    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <?php
    require_once("../../inc/header.php");
    ?>
    <div class="body">
        <div class="dashboard">
            <img src="../../assets/profile.png" alt="">
            <p><?php echo $_SESSION['firstName']; ?></p>
            <button class="select" onclick="location.href = 'admin_profile.php';">SITE MANAGER</button>
            <button class="nav" onclick="location.href = 'admin_tourist.php';">TOURIST</button>
            <button class="nav" onclick="location.href = 'accomodation_provider.php';">ACCOMODATION PROVIDER</button>
            <button class="nav" onclick="location.href = 'vehicle_provider.php';">VEHICLE PROVIDER</button>
            <button class="nav" onclick="location.href = 'tourist_guide.php';">TOURIST GUIDE</button>
        </div>
        <div class="content">
            <h2>Site Manager</h2>
            <div class="container">
                <form action="add_siteManager.php" method="post">

                    <div class="input-field-input">
                        <label>First Name</label>
                        <input type="text" placeholder="Enter first name" name="firstName" required style="color:black;">
                    </div>
                    <div class="input-field-input">
                        <label>Last Name</label>
                        <input type="text" placeholder="Enter last name" name="lastName" required style="color:black;">
                    </div>
                    <div class="input-field-input">
                        <label>Email</label>
                        <input type="text" placeholder="Enter your email" name="email" required style="color:black;">
                    </div>
                    <div class="input-field-input">
                        <label>Password</label>
                        <input type="password" placeholder="Enter password" name="password" required style="color:black;">
                    </div>
                    <div class="input-field-input">
                        <label>Conform Password</label>
                        <input type="password" placeholder="Enter password" name="confirm_password" required style="color:black;">
                    </div>
                    <button class="nextBtn" type="submit" name="submit">
                        <span class="btnText">Submit</span>
                    </button>
                </form>

            </div>


        </div>
    </div>
    </div>
    <div class="footer">
        <hr>
        <p>© 2022 TRAVEL PAL ALL RIGHTS RESERVED</p>
    </div>
</body>

</html>