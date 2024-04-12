<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['notify_hostel_allotment'])) {
    require 'config.inc.php';
    require 'vendor/autoload.php';

   

    $sql = "SELECT MIS FROM Applications WHERE IsAllocated = 1";
    $result = mysqli_query($conn, $sql);

    
    
    while($row = mysqli_fetch_assoc($result)){
        $mis = $row['MIS'];
        
        $query = "SELECT * from Mails WHERE MIS = '$mis'";
        $res = mysqli_query($conn, $query);
        $rw = mysqli_fetch_assoc($res);
        $student_mail = $rw['Mail'];
        $is_registered = $rw['Is_registered'];
        if ($is_registered == 1) {
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
                $mail->Subject = 'Regarding Hostel Allocation';
                $mail->Body    = 'Dear '.$mis.', You have been allocated to COEP hostel. Please login to HRAP for further actions. Thank You.';
            
                $mail->send(); // Send the email
                echo "success"; // This is unnecessary if you're redirecting
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                exit();
            }
        
            
        }
        
        
    }
    echo "<script type='text/javascript'>alert('Students are notified via email.'); window.location.href='../hostel_allotment_list.php?notification=success';</script>";



}
?>
