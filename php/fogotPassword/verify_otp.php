<head>
    
    <link rel="stylesheet" href="../../css/main.css">
    <script type="text/javascript" src="../../js/profile.js"></script>

    <style>
        .container {
            max-width: 500px;
            margin: 100px auto;
            padding: 20px;
            background-color: rgba(0, 53, 122, 0.5);
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 53, 122, 0.5);
        }

        label {
            margin-top: 10px;
            font-weight: 600;
            font-size: 14px;
            line-height: 30px;
            letter-spacing: 0.1em;
            color: var(--accentcolor);
        }

        input[type="email"],
        input[type="password"],
        input[type="text"],
        input[type="number"] {
            padding: 10px;
            margin: 5px 0;
            background: rgba(255, 255, 255, 0.75);
            border: 1px solid #FFFFFF;
            border-radius: 15px;
            height: 40px;
            width: 100%;
        }

        input[type="submit"] {
            background: var(--secondarycolor);
            border-radius: 15px;
            padding: 10px;
            margin: 12px 0;
            font-weight: 600;
            font-size: 16px;
            color: #FFFFFF;
            height: 50px;
            width: 100%;
        }
    </style>
</head>

<?php

if (isset($_GET['email'])) {
    $email = $_GET['email'];
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Get the email, password, confirm password, and OTP from the form
        $email = $_POST['email'];
        $hasedPass = password_hash($_POST["password"], null);
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $otp = $_POST['otp'];

        // Validate email and passwords
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '<script language ="javascript">';
            echo 'alert("Invalid email format")';
            echo '</script>';
        } elseif ($password !== $confirm_password) {
            echo '<script language ="javascript">';
            echo 'alert("Passwords do not match!")';
            echo '</script>';
        } else {
            // Connect to the database
            require "../DbConfig.php";

            // Check if the email exists in the database
            $stmt = $conn->prepare("SELECT * FROM user WHERE email=?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 0) {
                echo "Email not found";
            } else {
                // Check if the entered OTP matches the stored OTP
                $row = $result->fetch_assoc();
                if ($otp == $row['otp']) {
                    // Update the user's password and clear the OTP
                    $stmt = $conn->prepare("UPDATE user SET password=?, otp=NULL WHERE email=?");
                    $stmt->bind_param("ss", $hasedPass, $email);
                    $stmt->execute();
                    echo '<script language ="javascript">';
                    echo 'onResetSuccess()';
                    echo '</script>';
                } else {
                    echo '<script language ="javascript">';
                    echo 'alert("Invalid OTP!")';
                    echo '</script>';
                }
            }

            $conn->close();
        }
    }
}

?>

<div class="container">
    <p>
        An OTP has been sent to your email address. Please enter it below to reset your password.
    </p>
    <br>
    <form action="verify_otp.php" method="POST">
        <label for="email">Email :</label> <br>
        <input type="text" name="email" id="email" value="<?php echo $email; ?>" readonly>
        <br>
        <label for="password">New Password :</label> <br>
        <input type="password" name="password" id="password" placeholder="***********" required>
        <br>
        <label for="confirm_password">Re enter the same password :</label> <br>
        <input type="password" name="confirm_password" id="confirm_password" placeholder="***********" required>
        <br>
        <label for="otp">OTP :</label> <br>
        <input type="number" id="otp" name="otp" required>
        <br>
        <input type="submit" value="Submit">
    </form>
</div>