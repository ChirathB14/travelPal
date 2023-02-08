<?php
require_once('../inc/connection.php');
require_once('../inc/functions.php');

$firstName = '';
$lastName = '';
$email = '';
$password = '';
$confirmPassword = '';
$userType = '';
$location = '';
$phoneNo = '';
$nic = '';

if (isset($_POST['submit'])) {
    $firstName = mysqli_real_escape_string($connection, trim($_POST['firstName']));
    $lastName = mysqli_real_escape_string($connection, trim($_POST['lastName']));
    $email = mysqli_real_escape_string($connection, trim($_POST['email']));
    $password = mysqli_real_escape_string($connection, trim($_POST['password']));
    $confirmPassword = mysqli_real_escape_string($connection, trim($_POST['confirmPassword']));
    $userType = mysqli_real_escape_string($connection, trim($_POST['userType']));
    $location = mysqli_real_escape_string($connection, trim($_POST['location']));
    $phoneNo = mysqli_real_escape_string($connection, trim($_POST['phoneNo']));
    $nic = mysqli_real_escape_string($connection, trim($_POST['NIC']));

    $passwordHash = sha1($password);

    $errors = array();

    //checking required fields
    if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($confirmPassword) || empty($phoneNo) || empty($nic) ) {
        array_push($errors, "All the fields are required");
    }
    
    //checking user type is selected
    if (empty($location)  ) {
        array_push($errors, "Location is not selected");
    }

    //checking email address
    if (!is_email($email)) {
        array_push($errors, "Email address is invalid.");
    }

    //checking nic
    if (!is_nic($nic)) {
        array_push($errors, "NIC is invalid.");
    }

    //checking maxlength
    $max_len_fields = array('firstName' => 50, 'lastName' => 50, 'email' => 50, 'phoneNo'=> 10, 'nic' => 12);

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
    
    //checking email is existing
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $query = "SELECT * FROM Users WHERE email = '{$email}' LIMIT 1";
    
    $result_set = mysqli_query($connection, $query);

    verify_query($result_set);
    
    if (mysqli_num_rows($result_set) == 1) {
        $errors[] = "Email address already exists.";
    }
    
    if (empty($errors)) {
        $query = "INSERT INTO Users (
                    `firstName`, `lastName`, `email`, `password`
                  ) VALUES (
                    '{$firstName}', '{$lastName}', '{$email}', '{$passwordHash}'
                  )";

        $result = mysqli_query($connection, $query);

        if ($result) {
            $last_id = mysqli_insert_id($connection);
            if($userType == 'serviceProvider'){
                $query = "INSERT INTO serviceprovider(
                        `userID`, `location`, `phoneNo`, `NIC`, `availability`
                        ) VALUES (
                            {$last_id},  '{$location}', '{$phoneNo}', '{$nic}', 0
                        )";
                $result = mysqli_query($connection, $query);
                verify_query($result);
            }

            header('Location: registration.php?success=yes');
            $firstName = "";
            $lastName = "";
            $email = "";
            
        } else {
            header('Location: registration.php?failed=yes');
        }
    }
}
?>

<?php
$title = "Login";
require_once("../inc/header.php");
?>

<head>
    <link rel="stylesheet" href="../css/registration.css">
</head>

<body class="registration">
    <div class="register">
        <form action="registration.php" method="post">
            <h1>CREATE AN ACCOUNT</h1>

            <?php
                if (!empty($errors)) {
                    display_errors($errors);
                }
            ?>

            <?php
            if (isset($_GET['success'])) {
                echo '<p class="info">You have successfully registered.</p>';
            }
            ?>

            <?php
            if (isset($_GET['failed'])) {
                echo "<p class='error'> Failed to add the new record. Error: " .mysqli_error($connection)."</p>";
            }
            ?>

            <div class="input-elements">
                <input type="text" name="firstName" id="" placeholder="  FIRST NAME" <?php echo 'value="' . $firstName . '"'; ?> >
                <input type="text" name="lastName" id="" placeholder="  LAST NAME" <?php echo 'value="' . $lastName . '"'; ?> >
                <input type="email" name="email" id="" placeholder="  EMAIL" <?php echo 'value="' . $email . '"'; ?> >
                <input type="password" name="password" id="" placeholder="  PASSWORD">
                <input type="password" name="confirmPassword" id="" placeholder="  CONFIRM PASSWORD">
                <input type="hidden" value="serviceProvider" name="userType">
                <div class="selectLocation">
                    <select id="" name="location" placeholder="Pleae Select the Location" style="width: 400px;  margin-top: 12px; 
                            background-color: var(--accentcolor); opacity: 0.75; height: 40px;
                            box-sizing: border-box; border: none; border-radius: 5px;
                            font-size: 10px; font-weight: bold; color:#808080;">
                        <option value="" disabled selected>PLEASE SELECT THE LOCATION</option>
                        <option value="Colombo">COLOMBO</option>
                        <option value="Gampaha">GAMPAHA</option>
                        <option value="Kalutara">KALUTARA</option>
                    </select>
                </div>
                <input type="tel" name="phoneNo" id="" placeholder="  PHONE NUMBER" <?php echo 'value="' . $phoneNo . '"'; ?> >
                <input type="text" name="NIC" id="" placeholder="  NIC" <?php echo 'value="' . $nic . '"'; ?> >
            </div>

            <div class="new-user">
                <button type="submit" name="submit">
                    Register
                </button>
                <P>
                    <a href="login.php"> Already have an Account? Log in</a>
                </P>
            </div>
        </form>
    </div>
<?php
require_once("../inc/footer.php");
?>

<?php mysqli_close($connection); ?>