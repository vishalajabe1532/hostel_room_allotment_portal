<?php
session_start();
if (isset($_POST['verify_otp'])) {
    if(isset($_SESSION['otp'])  && isset($_POST['otp'])){
        $submitted_otp = $_POST['otp'];
        $mis = $_POST['mis_no'];
        $stored_otp = $_SESSION['otp'];
        // $stored_otp = '222222';
        $otp_timestamp = $_SESSION['otp_timestamp'];


        if($submitted_otp == $stored_otp && (time() - $otp_timestamp) <= 300){
            // header("Location: ../signupaddinfo.php?verification=success");
            header("Location: ../signupaddinfo.php?verification=success&mis=$mis");
        }
        else{
            echo "<script>alert('Invalid OTP or OTP has expired. Please try again.');</script>";
        }
    }
    else {
        // OTP not found in session
        echo "<script>alert('OTP not found.');</script>";
    }
    unset($_SESSION['otp']);
    unset($_SESSION['otp_timestamp']);
}
else {
    header("Location: ../signup.php");
    exit();
}
?>
<!-- 
  require 'config.inc.php';

  $mis= $_POST['mis_no'];
  $password = $_POST['pwd'];

  if (empty($mis) || empty($password)) {
    header("Location: ../index.php?error=emptyfields");
    exit();
  }
  else {
    //echo $_SESSION['lname'];
    // echo "<script type='text/javascript'>alert('$mis')</script>";
    // echo "<script type='text/javascript'>alert('$password')</script>";
    // echo $mis;
    // echo $password;

    $sql = "SELECT *FROM Students WHERE MIS = '$mis'";
    $result = mysqli_query($conn, $sql);
    if($row = mysqli_fetch_assoc($result)){
      echo $row;
      // $pwdCheck = password_verify($password, $row['Pwd']);
      $pwdCheck=false ;
      if($row['Password']==$password){
        $pwdCheck = true;
      }
      if($pwdCheck == false){
        header("Location: ../index.php?error=wrongpwd");
        exit();
      }
      else if($pwdCheck == true) {

        //session_start();
        $_SESSION['mis'] = $row['MIS'];
        $_SESSION['name'] = $row['Name'];
        $_SESSION['mob'] = $row['Mob'];
        $_SESSION['branch'] = $row['Branch'];
        $_SESSION['year_of_study'] = $row['Year_of_study'];
        $_SESSION['category'] = $row['Category'];
        if(isset($_SESSION['branch'])){
          echo "<script type='text/javascript'>alert('Set')</script>";
        }
        else {
          echo "<script type='text/javascript'>alert('Not SET')</script>";
        }
        //echo $_SESSION['lname'];
        header("Location: ../home.php?login=success");
        //exit();
      }
      else {
        header("Location: ../index.php?error=strangeerr");
        exit();
      }
    }
    else{
      header("Location: ../index.php?error=nouser");
      exit();
    }
  }

}
else {
  header("Location: ../index.php");
  exit();
} -->
