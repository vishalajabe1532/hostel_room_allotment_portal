<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
session_start();


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['get_otp'])) {
    require 'config.inc.php';
    require 'vendor/autoload.php';

    $mis = $_POST['mis_no'];
    $_SESSION['mis'] = $mis;

    if (!preg_match("/^[a-zA-Z0-9]*$/", $mis)) {
        header("Location: ../signup.php?error=invalidroll");
        exit();
    }

    $sql = "SELECT * FROM mails WHERE MIS = '$mis'";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        $student_mail = $row['Mail'];
        $is_registered = $row['Is_registered'];
        if ($is_registered == 1) {
            echo "<script type='text/javascript'>alert('You have already registered to HRAP.'); window.location.href='../index.php?error=alreadyregistered';</script>";
            exit();

        }

        $otp = rand(111111, 999999);
        // Store OTP in session along with timestamp
        $_SESSION['otp'] = $otp;
        $_SESSION['otp_timestamp'] = time();

        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.office365.com'; // Your SMTP server host
            $mail->SMTPAuth   = true;
            $mail->Username   = 'ajabeva21.comp@coeptech.ac.in'; // Your SMTP username
            $mail->Password   = 'Maharaj@1532'; // Your SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
            $mail->Port       = 587; // TCP port to connect to

            // Recipients
            $mail->setFrom('ajabeva21.comp@coeptech.ac.in', 'Ajabe Vishal Ashok');
            $mail->addAddress($student_mail, $mis);

            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'OTP for COEP\'s Hostel Room Allotment Portal SignUp';
            $mail->Body    = 'OTP for MIS No.: ' . $mis . ' for COEP\'s Hostel Room Allotment Portal SignUp is ' . $otp . '. Please do not share your OTP with anyone. Thank you';

            $mail->send(); // Send the email
            // echo "success"; // This is unnecessary if you're redirecting
            echo "<script type='text/javascript'>alert('OTP has been sent to your registered COEP mail address. Valid for 5 minutes.'); window.location.href='../signup2.php?otpsent=success';</script>";

            exit();
        } catch (Exception $e) {
            echo "<script type='text/javascript'>alert('OTP not due to some problem.'); window.location.href='../signup.php?error=someerror';</script>";

        }
    } else {
        header("Location: ../signup.php?error=nouser");
        exit();
    }
} else {
    header("Location: ../signup.php");
    exit();
}
?>
