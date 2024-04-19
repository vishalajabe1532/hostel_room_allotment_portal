<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['notify_room_allotment'])) {
    require 'config.inc.php';
    require 'vendor/autoload.php';

   

    $sql = "SELECT * FROM Rooms WHERE Is_alloted = 1";
    $result = mysqli_query($conn, $sql);

    
    
    while($row = mysqli_fetch_assoc($result)){
        
        
        for ($i=0; $i < 4; $i++) { 
            $mis = "MIS".($i+1);
            $mis = $row[$mis];
            $room_no = $row['room_no'];
            
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
                    $mail->Username   = 'hrap.coeptech@outlook.com'; // Your SMTP username
                    $mail->Password   = 'Hrap@2024'; // Your SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
                    $mail->Port       = 587; // TCP port to connect to
                
                    // Recipients
                    $mail->setFrom('hrap.coeptech@outlook.com', 'HRAP COEP HOSTEL');
                    $mail->addAddress($student_mail, $mis);
                    
                    // Content
                    $mail->isHTML(true); // Set email format to HTML
                    $mail->Subject = 'Regarding Hostel Room Allocation';
                    $mail->Body    = 'Dear '.$mis.', You have been allocated to Room No. '.$room_no.' COEP hostel. Please login to HRAP for further actions. Thank You.';
                
                    $mail->send(); // Send the email
                    // echo "success"; // This is unnecessary if you're redirecting
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    exit();
                }
            
                
            }


        }
        
        
        
    }
    // echo "<script type='text/javascript'>alert('Students are notified via email.')</script>";
    echo "<script type='text/javascript'>alert('Students are notified via email.'); window.location.href='../allocated_rooms.php?notification=success';</script>";



}
?>


