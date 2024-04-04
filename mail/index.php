<?php
// Include PHPMailer
require 'vendor/autoload.php';

// Create a new PHPMailer instance
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.office365.com'; // Your SMTP server host
    $mail->SMTPAuth   = true;
    $mail->Username   = 'ajabeva21.comp@coeptech.ac.in'; // Your SMTP username
    $mail->Password   = 'Maharaj@1532'; // Your SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587; // TCP port to connect to

    //Recipients
    $mail->setFrom('ajabeva21.comp@coeptech.ac.in', 'Ajabe Vishal Ashok'); // Sender's email and name
    $mail->addAddress('abhangap21.comp@coeptech.ac.in', 'Soham'); // Recipient's email and name

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Test Email Subject'; // Email subject
    $mail->Body    = 'This is a test email'; // Email body

    $mail->send(); // Send the email
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
