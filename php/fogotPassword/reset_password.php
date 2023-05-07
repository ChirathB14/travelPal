<?php
// Get the email and new password from the form
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Validate email and passwords
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format";
} elseif ($password !== $confirm_password) {
    echo "Passwords do not match";
} else {
    // Connect to the database
    require "../DbConfig.php";


    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the email exists in the database
    $stmt = $conn->prepare("SELECT * FROM user WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        echo "Email not found";
    } else {
        // Generate OTP and send it to user's email
        $otp = rand(100000, 999999);
        $to = $email;
        $subject = "Password Reset OTP";
        $message = "Your OTP is: " . $otp;
        $headers = "From: webmaster@example.com" . "\r\n" .
                   "Reply-To: webmaster@example.com" . "\r\n" .
                   "X-Mailer: PHP/" . phpversion();

        if (mail($to, $subject, $message, $headers)) {
            // Store the OTP in the database
            $stmt = $conn->prepare("UPDATE user SET otp=? WHERE email=?");
            $stmt->bind_param("ss", $otp, $email);
            $stmt->execute();
            echo "An OTP has been sent to your email address. Please enter it below to reset your password.";
            echo '<form action="reset_password_confirm.php" method="POST">
                    <input type="hidden" name="email" value="' . $email . '">
                    <input type="hidden" name="password" value="' . $password . '">
                    <input type="hidden" name="confirm_password" value="' . $confirm_password . '">
                    <label for="otp">OTP</label>
                    <input type="text" id="otp" name="otp" required>
                    <input type="submit" value="Submit">
                  </form>';
        } else {
            echo "Failed to send OTP";
        }
    }

    $conn->close();
}
?>
