<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
if (isset($_POST['signup-submit'])) {

  require 'config.inc.php';

  $mis= $_POST['student_mis_no'];
  $name = $_POST['student_name'];
  $mob = $_POST['mobile_no'];
  $branch = $_POST['branch'];
  $year = $_POST['year_of_study'];
  $category = $_POST['category'];
  $password = $_POST['pwd'];
  $cnfpassword = $_POST['confirmpwd'];


  if(!preg_match("/^[a-zA-Z0-9]*$/",$mis)){
    header("Location: ../signupaddinfo.php?error=invalidmis");
    exit();
  }
  else if($password !== $cnfpassword){
    header("Location: ../signupaddinfo.php?error=passwordcheck");
    exit();
  }
  else {

    $sql = "SELECT MIS FROM Students WHERE MIS=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../signupaddinfo.php?error=sqlerror");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "s", $mis);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);
      if ($resultCheck > 0) {
        header("Location: ../signupaddinfo.php?error=userexists");
        exit();
      }
      else {
        $sql = "INSERT INTO Students (MIS, `Name`, Mob, Branch, Year_of_study, `Password`,Category) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
          header("Location: ../signupaddinfo.php?error=sqlerror");
          exit();
        }
        else {

            mysqli_stmt_bind_param($stmt, "sssssss",$mis, $name, $mob, $branch, $year,$password,$category);
            
            mysqli_stmt_execute($stmt);


            $stmt = $conn->prepare("UPDATE Mails SET Is_registered=1 WHERE MIS=?");
            // Bind parameters
            $stmt->bind_param("s", $mis);
            // Execute the statement
            $stmt->execute();
            // Close the statement
            $stmt->close();
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
  header("Location: ../signupaddinfo.php");
  exit();
}



