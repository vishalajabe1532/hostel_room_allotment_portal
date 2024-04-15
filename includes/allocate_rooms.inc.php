
<!-- allocation code -->




<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);

if(isset($_POST['submit_and_allocate'])){
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

            //continue with allotment
            $queries = array();
            $results=array();
            $rows=array();
            $branches = array('civil','comp','elec','entc','instru','mech','meta','prod');

            for ($i=0; $i < 8; $i++) { 
                $br = $branches[$i];
                $queries[] = "SELECT A.MIS FROM Applications A JOIN Students S ON A.MIS=S.MIS WHERE A.IsAllocated=1 AND S.Branch='$br' ORDER BY A.CGPA DESC";
                $results[] = mysqli_query($conn,$queries[$i]);
                $rowOfBranch = array();
                while($temp_row = mysqli_fetch_assoc($results[$i])){
                    //insert each row into array
                    $rowOfBranch[] = $temp_row;
                }
                //insert that array into bigger array
                $rows[] = $rowOfBranch;
            }


            $remaining = true;
            for($i=0; $i < 200; $i++){
                $remaining = false;
                for ($j=0; $j < 8; $j++) { 
                    
                    if($i < count($rows[$j])){       
                        $remaining = true;
                        $student_mis = $rows[$j][$i]['MIS'];

                        //check if room allocation is already done
                        $q = "SELECT * FROM Rooms WHERE MIS1 = '$student_mis'";
                        $r = mysqli_query($conn,$q);
                        if(mysqli_num_rows($r) > 0){
                            echo "<script type='text/javascript'>alert('Room Allocation is already done'); window.location.href='../allocated_rooms.php?error=allocationalreadydone';</script>";
                            exit();

                        }



                        $query  = "SELECT * FROM Roommates WHERE MIS1 = '$student_mis'";
                        $result = mysqli_query($conn,$query);
                        if(mysqli_num_rows($result) > 0){
                            //student has filled roommates
                            
                            //now check if he has filled preferences
                            $query  = "SELECT * FROM Preferences WHERE MIS1 = '$student_mis'";
                            $result = mysqli_query($conn,$query);
                            if(mysqli_num_rows($result) > 0){
                                //student has filled preferences

                                //now allocate him a room
                                $row = mysqli_fetch_assoc($result);
                                
                                //load preferences into array
                                $preferences = array();
                                for ($k=0; $k < 50; $k++) { 
                                    $temp = "pref".($k+1);
                                    $preferences[] = $row[$temp];

                                }

                                for ($k=0; $k < 50; $k++) { 
                                    $room_num = $preferences[$k];

                                    //check if that room is free
                                    $q = "SELECT * FROM Rooms WHERE room_no = '$room_num'";
                                    $res = mysqli_query($conn,$q);
                                    $rw = mysqli_fetch_assoc($res);

                                    if($rw['Is_alloted'] == 0){
                                        //room is free allot to current student

                                        //fetch other students details

                                        $q = "SELECT * FROM Roommates WHERE MIS1 = '$student_mis'";
                                        $res = mysqli_query($conn,$q);
                                        $rw = mysqli_fetch_assoc($res);
                                        
                                        
                                        //insert students mis in rooms table
                                        $student_mis2 = $rw['MIS2'];
                                        $student_mis3 = $rw['MIS3'];
                                        $student_mis4 = $rw['MIS4'];
                                        $q = "UPDATE Rooms SET MIS1='$student_mis', MIS2='$student_mis2' , MIS3='$student_mis3' , MIS4='$student_mis4', Is_alloted=1 WHERE room_no = '$room_num'";
                                        $res = mysqli_query($conn,$q);

                                        if($res){
                                            //if added successfully break for current student
                                            break;
                                        }



                                        //after alloting this room break
                                    }
                                    //else continue to next preference



                                }



                            }
                            else{
                                //student has not filled preferences
                            }

                        }
                        else{
                            //student has not filled roommates
                        }
                        
                        // operation to allot
                        $branch = $branches[$i];

                        //check if that student is not in any room
                        // look into this later

                        
                    }
                }
                if($remaining == false){
                    // allotment completed
                    $query = "UPDATE Flags SET Room_allocation_done = 1 WHERE ID=1";
                    $result = mysqli_query($conn,$query);
                    echo "<script type='text/javascript'>alert('Allotment Completed'); window.location.href='../allocated_rooms.php?allocation=success';</script>";
                    break;

                }

            }


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
	