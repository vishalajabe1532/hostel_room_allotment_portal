<?php

if (isset($_POST['signup-submit'])) {

  require 'config.inc.php';

  $mis= $_POST['student_mis_no'];
  $fname = $_POST['student_fname'];
  $lname = $_POST['student_lname'];
  $mobile = $_POST['mobile_no'];
  $Branch = $_POST['branch'];
  $year = $_POST['year_of_study'];
  $password = $_POST['pwd'];
  $cnfpassword = $_POST['confirmpwd'];


  if(!preg_match("/^[a-zA-Z0-9]*$/",$mis)){
    header("Location: ../signup.php?error=invalidroll");
    exit();
  }
  else if($password !== $cnfpassword){
    header("Location: ../signup.php?error=passwordcheck");
    exit();
  }
  else {

    $sql = "SELECT MIS FROM Students WHERE MIS=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../signup.php?error=sqlerror");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "s", $mis);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);
      if ($resultCheck > 0) {
        header("Location: ../signup.php?error=userexists");
        exit();
      }
      else {
        $sql = "INSERT INTO Student (MIS, Fname, Lname, Mob, Branch, Year_of_study, Pwd) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
          header("Location: ../signup.php?error=sqlerror");
          exit();
        }
        else {

          mysqli_stmt_bind_param($stmt, "sssssss",$mis, $fname, $lname, $mobile, $Branch, $year,$password);
          mysqli_stmt_execute($stmt);
          header("Location: ../index.php?signup=success");
          exit();
        }
      }
    }

  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);

}
else {
  header("Location: ../signup.php");
  exit();
}





// updated working code


<?php
$otp;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['get_otp'])) {

    // echo "request is accepted";

    require 'config.inc.php';
    // Include PHPMailer
    require 'vendor/autoload.php';

    


    $mis= $_POST['mis_no'];
    //   $fname = $_POST['student_fname'];
    //   $lname = $_POST['student_lname'];
    //   $mobile = $_POST['mobile_no'];
    //   $Branch = $_POST['branch'];
    //   $year = $_POST['year_of_study'];
    //   $password = $_POST['pwd'];
    //   $cnfpassword = $_POST['confirmpwd'];


    if(!preg_match("/^[a-zA-Z0-9]*$/",$mis)){
        header("Location: ../signup.php?error=invalidroll");
        echo "<script type='text/javascript'>alert('Invalid MIS number.')</script>";

        exit();
    }


    $sql = "SELECT * FROM mails WHERE MIS = '$mis'";
    $result = mysqli_query($conn, $sql);

    if($row = mysqli_fetch_assoc($result)){

        $student_mail = $row['Mail'];
        $is_registered = $row['Is_registered'];
        if($is_registered == 1){
            header("Location: ../index.php?error=alreadyregistered");
            echo "<script type='text/javascript'>alert('Your MIS is already registered.')</script>";
            exit();
        }
    
        $otp = rand(111111, 999999);
    
    
        // Create a new PHPMailer instance
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
            $mail->addAddress($student_mail, $mis); // Recipient's email and name
    
            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'OTP for COEP\'s Hostel Room Allotment Portal SignUp'; // Email subject
            $mail->Body    = 'OTP for MIS No.: '.$mis.' for COEP\'s Hostel Room Allotment Portal SignUp is '.$otp.'. Please do not share your OTP with anyone. Thank you'; // Email body
    
            $mail->send(); // Send the email
            echo "success";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    }
    else{
        header("Location: ../signup.php?error=nouser");
        echo "<script type='text/javascript'>alert('MIS number not found in Data.')</script>";
        exit();
    }








}
else {
  header("Location: ../signup.php");
  exit();
}
