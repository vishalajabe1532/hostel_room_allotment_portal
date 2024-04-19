<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
if (isset($_POST['login-submit'])) {

  require 'config.inc.php';

  $mis= $_POST['student_mis_no'];
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
        echo "<script type='text/javascript'>alert('Wrong Password!!.'); window.location.href='../index.php?error=wrongpwd';</script>";

        // header("Location: ../index.php?error=wrongpwd");
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
      echo "<script type='text/javascript'>alert('User not found.'); window.location.href='../index.php?error=nouser';</script>";
      // header("Location: ../index.php?error=nouser");
      exit();
    }
  }

}
else {
  header("Location: ../index.php");
  exit();
}
