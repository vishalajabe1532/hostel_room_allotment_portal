
<?php
// error_reporting(E_ALL & ~E_NOTICE);
// ini_set('display_errors', 0);
   //echo 'Hello';
   
if(isset($_POST['submit'])){

    require 'config.inc.php';
    $mis= $_POST['mis_no1'];
    $mis2= $_POST['mis_no2'];
    $mis3= $_POST['mis_no3'];
    $mis4= $_POST['mis_no4'];
    $password = $_POST['pwd'];
    $year_of_study = $_POST['year_of_study'];
    $cgpa = $_POST['cgpa'];
    // $backlogs = $_POST['backlogs'];
    
    

    /*echo "<script type='text/javascript'>alert('<?php echo $mis?>')</script>";*/
    $query_imp = "SELECT * FROM Students WHERE MIS = '$mis'";
    $result_imp = mysqli_query($conn,$query_imp);
    $row_imp = mysqli_fetch_assoc($result_imp);
    /*echo "<script type='text/javascript'>alert('<?php echo $room_id ?>')</script>";*/
    if($row_imp){
        if($row_imp['Password'] == $password){
            //correct password login succesfull
            $query_imp2 = "SELECT * FROM Roommates WHERE MIS1 = '$mis'";
            $result_imp2 = mysqli_query($conn,$query_imp2);
            if(mysqli_num_rows($result_imp2)==0){
                //not yet applied
                // $_SESSION['cgpa']=$cgpa;
                // check if other roommates are not in other persons preferences and if they are alloted hostel

                //check if they have hostel
                $query1  = "SELECT * FROM Applications WHERE MIS='$mis' AND IsAllocated=1";
                $query2  = "SELECT * FROM Applications WHERE MIS='$mis2' AND IsAllocated=1";
                $query3  = "SELECT * FROM Applications WHERE MIS='$mis3' AND IsAllocated=1";
                $query4  = "SELECT * FROM Applications WHERE MIS='$mis4' AND IsAllocated=1";

                $result1 = mysqli_query($conn,$query1);
                $result2 = mysqli_query($conn,$query2);
                $result3 = mysqli_query($conn,$query3);
                $result4 = mysqli_query($conn,$query4);

                if(mysqli_num_rows($result1)>0){
                    if(mysqli_num_rows($result2)>0){
                        if(mysqli_num_rows($result3)>0){
                            if(mysqli_num_rows($result4)>0){
                                // all are alloted with hostel
                                // insert them as roommates

                                // now check if roommates have been selected by other person
                                $query1 = "SELECT * FROM Roommates WHERE MIS1 = '$mis'";
                                $query2 = "SELECT * FROM Roommates WHERE MIS2 = '$mis'";
                                $query3 = "SELECT * FROM Roommates WHERE MIS3 = '$mis'";
                                $query4 = "SELECT * FROM Roommates WHERE MIS4 = '$mis'";

                                $query5 = "SELECT * FROM Roommates WHERE MIS1 = '$mis2'";
                                $query6 = "SELECT * FROM Roommates WHERE MIS2 = '$mis2'";
                                $query7 = "SELECT * FROM Roommates WHERE MIS3 = '$mis2'";
                                $query8 = "SELECT * FROM Roommates WHERE MIS4 = '$mis2'";

                                $query9 = "SELECT * FROM Roommates WHERE MIS1 = '$mis3'";
                                $query10 = "SELECT * FROM Roommates WHERE MIS2 = '$mis3'";
                                $query11 = "SELECT * FROM Roommates WHERE MIS3 = '$mis3'";
                                $query12 = "SELECT * FROM Roommates WHERE MIS4 = '$mis3'";

                                $query13 = "SELECT * FROM Roommates WHERE MIS1 = '$mis4'";
                                $query14 = "SELECT * FROM Roommates WHERE MIS2 = '$mis4'";
                                $query15 = "SELECT * FROM Roommates WHERE MIS3 = '$mis4'";
                                $query16 = "SELECT * FROM Roommates WHERE MIS4 = '$mis4'";

                                $result1 = mysqli_query($conn,$query1);
                                $result2 = mysqli_query($conn,$query2);
                                $result3 = mysqli_query($conn,$query3);
                                $result4 = mysqli_query($conn,$query4);

                                $result5 = mysqli_query($conn,$query5);
                                $result6 = mysqli_query($conn,$query6);
                                $result7 = mysqli_query($conn,$query7);
                                $result8 = mysqli_query($conn,$query8);

                                $result9 = mysqli_query($conn,$query9);
                                $result10 = mysqli_query($conn,$query10);
                                $result11 = mysqli_query($conn,$query11);
                                $result12 = mysqli_query($conn,$query12);

                                $result13 = mysqli_query($conn,$query13);
                                $result14 = mysqli_query($conn,$query14);
                                $result15 = mysqli_query($conn,$query15);
                                $result16 = mysqli_query($conn,$query16);


                                if(mysqli_num_rows($result1)==0 && mysqli_num_rows($result2)==0 &&mysqli_num_rows($result3)==0 &&mysqli_num_rows($result4)==0){
                                    if(mysqli_num_rows($result5)==0 && mysqli_num_rows($result6)==0 &&mysqli_num_rows($result7)==0 &&mysqli_num_rows($result8)==0){
                                        if(mysqli_num_rows($result9)==0 && mysqli_num_rows($result10)==0 &&mysqli_num_rows($result11)==0 &&mysqli_num_rows($result12)==0){
                                            if(mysqli_num_rows($result13)==0 && mysqli_num_rows($result14)==0 &&mysqli_num_rows($result15)==0 &&mysqli_num_rows($result16)==0){

                                                // everything is fine
                                                $query = "INSERT INTO Roommates (MIS1,MIS2,MIS3,MIS4) VALUES ('$mis','$mis2','$mis3','$mis4')";
                                                $result = mysqli_query($conn,$query);
                                                if($result){
                                                    //application recorded succesfully
                                                    // echo "<script type='text/javascript'>alert('Application sent successfully')</script>";
                                                    // header("Location: ../application_form.php?application=success");
                                                    echo "<script type='text/javascript'>alert('Roommates Recorded successfully'); window.location.href='../fill_roommates.php?application=success';</script>";
                                
                                                }
                                                else{
                                                    // header("Location: ../application_form.php?error=inserterror");
                                                    echo "<script type='text/javascript'>alert('Applications not submitted. Some error occured.'); window.location.href='../fill_roommates.php?error=inserterror';</script>";
                                                }
                                            }
                                            else{
                                                echo "<script type='text/javascript'>alert('Roommate 3 has been already selected as Roommate, change roommate 3'); window.location.href='../fill_roommates.php?error=alreadyselected';</script>";
            
                                            }
                                        }
                                        else{
                                            echo "<script type='text/javascript'>alert('Roommate 2 has been already selected as Roommate, change roommate 2'); window.location.href='../fill_roommates.php?error=alreadyselected';</script>";
        
                                        }
                                    }
                                    else{
                                        echo "<script type='text/javascript'>alert('Roommate 1 has been already selected as Roommate, change roommate 1'); window.location.href='../fill_roommates.php?error=alreadyselected';</script>";
    
                                    }
                                }
                                else{
                                    echo "<script type='text/javascript'>alert('You have been already selected as Roommate, so you cannot apply'); window.location.href='../fill_roommates.php?error=alreadyselected';</script>";

                                }






                            }
                            else{
                                echo "<script type='text/javascript'>alert('Roommate 3 is not allocated to hostel'); window.location.href='../fill_roommates.php?error=hostelnotalloted';</script>";
                            }
                        }
                        else{
                            echo "<script type='text/javascript'>alert('Roommate 2 is not allocated to hostel'); window.location.href='../fill_roommates.php?error=hostelnotalloted';</script>";
                        }
                    }
                    else{
                        echo "<script type='text/javascript'>alert('Roommate 1 is not allocated to hostel'); window.location.href='../fill_roommates.php?error=hostelnotalloted';</script>";
                    }
                }
                else{
                    echo "<script type='text/javascript'>alert('You are not allocated to hostel'); window.location.href='../fill_roommates.php?error=hostelnotalloted';</script>";
                }



            }
            else{
                //already applied
                // header("Location: ../application_form.php?error=alreadyapplied");
                echo "<script type='text/javascript'>alert('You have Already selected your roommates.'); window.location.href='../home.php?error=alreadyapplied';</script>";
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