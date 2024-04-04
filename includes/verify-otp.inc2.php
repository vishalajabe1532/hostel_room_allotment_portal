<?php
session_start();
ob_start();

if (isset($_POST['verify_otp'])) {
    if (isset($_SESSION['otp']) && isset($_POST['otp'])) {
        $submitted_otp = $_POST['otp'];
        // $stored_otp = $_SESSION['otp'];
        $stored_otp = '222222';
        $otp_timestamp = $_SESSION['otp_timestamp'];

        // Check if OTP is correct and not expired
        // if ($submitted_otp == $stored_otp && (time() - $otp_timestamp) <= 300) { // 300 seconds = 5 minutes
        if ($submitted_otp == $stored_otp ) { // 300 seconds = 5 minutes
            // OTP is correct and not expired
            // Proceed with registration or any other action
            // header("Location: ../index.php");
            header("Location: ../index.php?login=success");
            ob_end_flush();
            exit();
        } else {
            // Invalid OTP or expired
            echo "<script>alert('Invalid OTP or OTP has expired. Please try again.');</script>";
        }
    } else {
        // OTP not found in session
        echo "<script>alert('OTP not found.');</script>";
    }
    // Clear OTP from session after use
    unset($_SESSION['otp']);
    unset($_SESSION['otp_timestamp']);
} else {
    header("Location: ../signup.php");
    exit();
}
?>



