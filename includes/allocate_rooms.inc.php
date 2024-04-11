
<?php
   //echo 'Hello';
   
if(isset($_POST['submit_preferences'])){

    require 'config.inc.php';
    $mis= $_POST['mis_no'];
    $password = $_POST['pwd'];
    $preferences = array();
    for ($i=0; $i < 50; $i++) { 
        $p = "pref".($i+1);
        $preferences[] = $_POST[$p];
    }
    
    // $backlogs = $_POST['backlogs'];
    
    

    /*echo "<script type='text/javascript'>alert('<?php echo $mis?>')</script>";*/
    $query_imp = "SELECT * FROM Students WHERE MIS = '$mis'";
    $result_imp = mysqli_query($conn,$query_imp);
    $row_imp = mysqli_fetch_assoc($result_imp);
    /*echo "<script type='text/javascript'>alert('<?php echo $room_id ?>')</script>";*/
    if($row_imp){
        if($row_imp['Password'] == $password){
            //correct password login succesfull
            
            //check if they have filled their roommates
            $query = "SELECT * FROM Preferencesforrooms WHERE MIS1 = '$mis'";
            $result = mysqli_query($conn,$query);
            if($result){
                //they have filled their roommates
                // echo "<script type='text/javascript'>alert('Everything is fine.'); window.location.href='../fill_roommates.php?error=incorrectpassword';</script>";

                //continue with allotment
                $queries = array();
                $results=array();
                $rows=array();
                $branches = array('civil','comp','elec','entc','instru','mech','meta','prod');

                for ($i=0; $i < 8; $i++) { 
                    $br = $branches[$i];
                    $queries[] = "SELECT A.*, S.Branch,S.Name FROM Applications A JOIN Students S ON A.MIS=S.MIS WHERE A.IsApproved=1 AND S.Branch='$br' ORDER BY A.CGPA DESC";
                    $results[] = mysqli_query($conn,$queries[$i]);
                    $rows[] = mysqli_fetch_assoc($results[$i]);
                }


                while(true){
                    $remaining = false;
                    for ($i=0; $i < 8; $i++) { 
                        
                        if($rows[$i]){
                            $remaining = true;

                            
                            // operation to allot
                            $branch = $branches[$i];

                            //check if that student is not in any room
                            // look into this later
    
                            
                        }
                    }
                    if($remaining == false){
                        // allotment completed
                        break;

                    }

                }






            }
            else{
                //  they have not filled their roommates
                echo "<script type='text/javascript'>alert('You have not selected your roommates. Please select roommates first.'); window.location.href='../fill_roommates.php?error=incorrectpassword';</script>";
            }

            



        }
        else{
            // header("Location: ../application_form.php?error=incorrectpassword");
            echo "<script type='text/javascript'>alert('Incorrect Password!!'); window.location.href='../fill_roommates.php?error=incorrectpassword';</script>";
        }
    }
    else{
        // header("Location: ../application_form.php?error=sqlerror");
        echo "<script type='text/javascript'>alert('Some error occured for checking password'); window.location.href='../fill_roommates.php?error=sqlerror';</script>";   
    }


}
?>