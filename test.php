<?php
  require 'includes/config.inc.php';
  // $hashPwd = password_hash('root', PASSWORD_DEFAULT);
  $sql = "INSERT INTO Hostel_Manager (Username, Fname, Lname, Mob, Hostel_id, Pwd, Isadmin) VALUES ('admin', 'deepika', 'padukone', '8891735573', 2,1234, 1)";
  $result = mysqli_query($conn, $sql);
  if(!$result){
    echo mysqli_error($conn);
  }
  


  // $pssass = password_hash()
 ?>
