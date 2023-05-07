<?php
session_start();
require_once('../../inc/connection.php');
require_once('../../inc/functions.php');

$email = "";
$firstName = "";
$lastName = "";
$password = "";
$confirmPassword = "";

if (isset($_POST["submit"])) {
    $email = $_POST['email'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
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

            $result = send_creds($email, $password, $firstName, $lastName);

            header('Location: admin_profile.php');
            // $firstName = "";
            // $lastName = "";
            // $email = "";

        } else {
            echo "<p class='error'> Failed to add the new record. Error: " . mysqli_error($connection) . "</p>";
        }
    }
}

function send_creds($email, $password, $firstName, $lastName){
    $fullname = $firstName . " " . $lastName;
    $to_email = $email;
    $to = "$fullname < $to_email >";
    $subject = "You were added as a Site Manager in TravelPal website";
    $message = "You were added as a site manager in TravelPal website.\nPlease use\nEmail: $email \nPassword: $password\nto log into your account.";
    $headers = "From: contact.travelpal@gmail.com";

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.mailgun.net/v3/sandboxb7abdc2ab5b74fad93525266b5f06ab3.mailgun.org/messages",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "from=TravelPal <contact.travelpal@gmail.com>&to=$to&subject=$subject&text=$message",
        CURLOPT_HTTPHEADER => [
            "Accept: */*",
            "Authorization: Basic YXBpOjUwMGRiNzU3NDA3MDliNDE1ZjExOTljNzhmNTRlOGZjLTQ4ZDdkOTdjLTU4YTRmMjBj",
            "Content-Type: application/x-www-form-urlencoded",
            $headers
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        return  "cURL Error #:" . $err;
    } else {
        return "success";
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
    <link rel="stylesheet" href="../../css/admin-styles.css" type="text/css">
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
                <button onclick="location.href = 'admin-dashboard.php';">Dashboard</button>
                <button class="active" onclick="location.href = 'admin_profile.php';">Site Manager</button>
                <button onclick="location.href = 'admin_tourist.php';">Tourist</button>
                <button onclick="location.href = 'accomodation_provider.php';">Accommodation Provider</button>
                <button onclick="location.href = 'vehicle_provider.php';">Vehicle Provider</button>
                <button onclick="location.href = 'tourist_guide.php';">Tourist Guide</button>
            </div> 
        </div>

        
    <div class="content">
        <?php
        if (!empty($errors)) {
            display_errors($errors);
        }
        ?>

        <div class="profile-content" style="height: 350px">
        <h2>Site Manager</h2>
        <form action="add_siteManager.php" class="" method='post' style="width: 300px;">
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
                <button type="submit" name="submit" style="width: 100%; margin-bottom: 20px;">Submit</button>
        </form>
        </div>
    </div>
    </div>
</div>

<?php
require_once("../../inc/footer.php");
?>

<?php mysqli_close($connection); ?>
