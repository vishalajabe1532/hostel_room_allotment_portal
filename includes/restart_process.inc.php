
<!-- allocation code -->




<?php
// error_reporting(E_ALL & ~E_NOTICE);
// ini_set('display_errors', 0);

if(isset($_POST['submit_and_restart'])){
	require 'config.inc.php';
	
    $username= $_POST['username'];
    $password = $_POST['pwd'];

    
    
    
    
	
    /*echo "<script type='text/javascript'>alert('<?php echo $mis?>')</script>";*/
    $query_imp = "SELECT * FROM admin_hostel_manager WHERE Username = '$username'";
    $result_imp = mysqli_query($conn,$query_imp);
    $row_imp = mysqli_fetch_assoc($result_imp);
    /*echo "<script type='text/javascript'>alert('<?php echo $room_id ?>')</script>";*/
    if($row_imp){
		if($row_imp['Password'] == $password){
			//every thing fine

            $query = "UPDATE Flags SET Application_form_closing = '2025-01-01', Hostel_allocation_done=0,Room_allocation_done=0 WHERE ID=1";
            $result=mysqli_query($conn,$query);
            $query = "DELETE FROM Applications";
            $result=mysqli_query($conn,$query);
            $query = "DELETE FROM Preferences";
            $result=mysqli_query($conn,$query);
            
            echo "<script type='text/javascript'>alert('Process restarted'); window.location.href='../home_manager.php';</script>";



            

        }
        else{
            // header("Location: ../application_form.php?error=incorrectpassword");
            echo "<script type='text/javascript'>alert('Incorrect Password!!'); window.location.href='../allocate_rooms.php?error=incorrectpassword';</script>";
          
        }
    }
	else{
			echo "<script type='text/javascript'>alert('Some error occured for checking password'); window.location.href='../allocate_rooms.php?error=sqlerror';</script>";   
		
	}
}
	
?>
	