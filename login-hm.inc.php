<?php

if (isset($_POST['login-submit'])) {

  require 'config.inc.php';

  $username = $_POST['username'];
  $password = $_POST['pwd'];

  if (empty($username) || empty($password)) {
    header("Location: ../login-hostel_manager.php?error=emptyfields");
    exit();
  }
  else {
    $sql = "SELECT *FROM Admin_Hostel_Manager WHERE Username = '$username'";
    $result = mysqli_query($conn, $sql);
    if($row = mysqli_fetch_assoc($result)){

      // $pwdCheck = password_verify($password, $row['Pwd']);
      // if($pwdCheck == false){
      //   header("Location: ../login-hostel_manager.php?error=wrongpwd");
      //   exit();
      // }
      if($row['Password']==$password) {

        //session_start();
        $_SESSION['id'] = $row['ID'];
        $_SESSION['name'] = $row['Name'];
        $_SESSION['Mob'] = $row['MobNo'];
        $_SESSION['username'] = $row['Username'];
        $_SESSION['email'] = $row['Mail'];
        $_SESSION['isadmin'] = $row['IsAdmin'];
        $_SESSION['password'] = $row['Password'];

        //Just for checking if session variables are working properly
        if(isset($_SESSION['username'])){
          echo "<script type='text/javascript'>alert('Set')</script>";
        }
        else {
          echo "<script type='text/javascript'>alert('Not SET')</script>";
        }
        //echo $_SESSION['lname'];
        if($_SESSION['isadmin']==0){
          header("Location: ../home_manager.php?login=success");
        }
        else {
          header("Location: ../admin/admin_home.php?login=success");
        }
        //exit();
      }
      else {
        header("Location: ../login-hostel_manager.php?error=strangeerr");
        exit();
      }
    }
    else{
      header("Location: ../login-hostel_manager.php?error=nouser");
      exit();
    }
  }

}
else {
  header("Location: ../login-hostel_manager.php");
  exit();
}
