<?php
require_once('../inc/connection.php');
require_once('../inc/functions.php');

$firstName = '';
$lastName = '';
$email = '';
$password = '';
$confirmPassword = '';
$userType = '';

if (isset($_POST['submit'])) {
    $firstName = mysqli_real_escape_string($connection, trim($_POST['firstName']));
    $lastName = mysqli_real_escape_string($connection, trim($_POST['lastName']));
    $email = mysqli_real_escape_string($connection, trim($_POST['email']));
    $password = mysqli_real_escape_string($connection, trim($_POST['password']));
    $confirmPassword = mysqli_real_escape_string($connection, trim($_POST['confirmPassword']));
    $userType = mysqli_real_escape_string($connection, trim($_POST['userType']));

    $passwordHash = sha1($password);

    $errors = array();

    //checking required fields
    if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($confirmPassword) ) {
        array_push($errors, "All the fields are required");
    }
    
    //checking user type is selected
    if (empty($userType)  ) {
        array_push($errors, "User type is not selected");
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
    
    //checking email is existing
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $query = "SELECT * FROM Users WHERE email = '{$email}' LIMIT 1";
    
    $result_set = mysqli_query($connection, $query);

    verify_query($result_set);
    
    if (mysqli_num_rows($result_set) == 1) {
        array_push($errors, "Password does not match");
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
            if($userType == 'tourist'){
                $query = "INSERT INTO Tourist(userID) VALUES ({$last_id})";
                $result = mysqli_query($connection, $query);
                verify_query($result);
            }

            // echo "<p class='info'>You have successfully registered</p>";
            header('Location: registration.php?success=yes');
            $firstName = "";
            $lastName = "";
            $email = "";
            
        } else {
            header('Location: registration.php?failed=yes');
            // echo "<p class='error'> Failed to add the new record. Error: " .mysqli_error($connection)."</p>";
        }
    }
}
?>

<?php
$title = "Registration";
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
            <input type="hidden" value="tourist" name="userType">
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
