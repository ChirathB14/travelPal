<?php
// Get the email, password, confirm password, and OTP from the form
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$otp = $_POST['otp'];

// Validate email and passwords
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format";
} elseif ($password !== $confirm_password) {
    echo "Passwords do not match";
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
            echo "Your password has been reset.";
        } else {
            echo "Invalid OTP";
        }
    }

    $conn->close();
}
?>
