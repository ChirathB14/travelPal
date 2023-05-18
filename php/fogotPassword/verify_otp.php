<head>
    <script type="text/javascript" src="../../js/profile.js"></script>
</head>

<?php

if (isset($_GET['email'])) {
    $email = $_GET['email'];
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Get the email, password, confirm password, and OTP from the form
        $email = $_POST['email'];
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
                    $hashed_password = password_hash($password, null);
                    $stmt->bind_param("ss", $hashed_password, $email);
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

<p>
    An OTP has been sent to your email address. Please enter it below to reset your password.
</p>
<form action="verify_otp.php" method="POST">
    <label for="email">Email</label>
    <input type="text" name="email" id="email" value="<?php echo $email; ?>" readonly>
    <br>
    <label for="password">New Password</label>
    <input type="password" name="password" id="password" placeholder="***********" required>
    <br>
    <label for="confirm_password">Re enter the same password</label>
    <input type="password" name="confirm_password" id="confirm_password" placeholder="***********" required>
    <br>
    <label for="otp">OTP</label>
    <input type="number" id="otp" name="otp" required>
    <br>
    <input type="submit" value="Submit">
</form>';