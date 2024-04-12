
<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
   //echo 'Hello';
   
   
if(isset($_POST['fill_preferences'])){
    require 'config.inc.php';
    $mis= $_POST['mis_no'];
    
    
    $query = "SELECT * FROM Roommates WHERE MIS1 = '$mis'";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result) > 0){

        //they have filled roommates
        echo "<script type='text/javascript'>window.location.href='../fill_preferences.php?';</script>";
        
    }
    else{
        echo "<script type='text/javascript'>alert('You have not selected your roommates. Please select roommates first.'); window.location.href='../fill_roommates.php?error=roommatenotselected';</script>";

    }

}


   
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
            $query = "SELECT * FROM Roommates WHERE MIS1 = '$mis'";
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result) > 0){
                //they have filled their roommates
                // echo "<script type='text/javascript'>alert('Everything is fine.'); window.location.href='../fill_roommates.php?error=incorrectpassword';</script>";



                //cheack if they have already filled their preferences
                $query = "SELECT * FROM Preferences WHERE MIS1 = '$mis'";
                // echo "<script type='text/javascript'>alert('$query');</script>";
                $result = mysqli_query($conn,$query);
                // echo "<script type='text/javascript'>alert('$result');</script>";
                if(mysqli_num_rows($result) > 0){
                    //they have already filled their preferences
                    echo "<script type='text/javascript'>alert('You have already filled your room preferences.'); window.location.href='../fill_roommates.php?error=preferencesalreadyfilled';</script>";
                }
                else{
                    //everything is fine, add their data to preferences

                    $query = "INSERT INTO Preferences (MIS1) VALUES ('$mis') ";
                    $result = mysqli_query($conn,$query);
                    if($result){
                        //mis1 added to preferences
                        //now add all preferences
                        for ($j=0; $j < 50; $j++) { 
                            $temp = "pref".($j+1);
                            $query = "UPDATE Preferences SET $temp = '$preferences[$j]' WHERE MIS1 = '$mis'";
                            $result = mysqli_query($conn,$query);
                            if($result){
                                //added 
                                $added = true;
                            }
                            else{
                                //some error occured
                                echo "<script type='text/javascript'>alert('Some error occured.'); window.location.href='../fill_roommates.php?error=sqlerror';</script>";
                                
                            }
                        }
                        echo "<script type='text/javascript'>alert('Preferences added successfully.'); window.location.href='../home.php?preferencesadded=success';</script>";
                    }
                    else{
                        //some error occured
                        echo "<script type='text/javascript'>alert('Some error occured.'); window.location.href='../fill_roommates.php?error=sqlerror';</script>";

                    }

                }







            }
            else{
                //  they have not filled their roommates
                echo "<script type='text/javascript'>alert('You have not selected your roommates. Please select roommates first.'); window.location.href='../fill_roommates.php?error=roommatenotselected';</script>";
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