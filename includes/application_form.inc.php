
<?php
   //echo 'Hello';
   
if(isset($_POST['submit'])){

    require 'config.inc.php';
    $mis= $_POST['mis_no'];
    $password = $_POST['pwd'];
    $year_of_study = $_POST['year_of_study'];
    $cgpa = $_POST['cgpa'];
    $backlogs = $_POST['backlogs'];
    
    

    /*echo "<script type='text/javascript'>alert('<?php echo $mis?>')</script>";*/
    $query_imp = "SELECT * FROM Students WHERE MIS = '$mis'";
    $result_imp = mysqli_query($conn,$query_imp);
    $row_imp = mysqli_fetch_assoc($result_imp);
    /*echo "<script type='text/javascript'>alert('<?php echo $room_id ?>')</script>";*/
    if($row_imp){
        if($row_imp['Password'] == $password){
            //correct password login succesfull
            $query_imp2 = "SELECT * FROM Applications WHERE MIS = '$mis'";
            $result_imp2 = mysqli_query($conn,$query_imp2);
            if(mysqli_num_rows($result_imp2)==0){
                //not yet applied
                // $_SESSION['cgpa']=$cgpa;
                $query = "INSERT INTO Applications (MIS,cgpa,Backlogs,IsApproved) VALUES ('$mis','$cgpa','$backlogs',0)";
                $result = mysqli_query($conn,$query);
                if($result){
                    //application recorded succesfully
                    // echo "<script type='text/javascript'>alert('Application sent successfully')</script>";
                    // header("Location: ../application_form.php?application=success");
                    echo "<script type='text/javascript'>alert('Application sent successfully'); window.location.href='../application_form.php?application=success';</script>";

                }
                else{
                    // header("Location: ../application_form.php?error=inserterror");
                    echo "<script type='text/javascript'>alert('Applications not submitted. Some error occured.'); window.location.href='../application_form.php?error=inserterror';</script>";
                }

            }
            else{
                //already applied
                // header("Location: ../application_form.php?error=alreadyapplied");
                echo "<script type='text/javascript'>alert('You have Already applied.'); window.location.href='../application_form.php?error=alreadyapplied';</script>";
            }
        }
        else{
            // header("Location: ../application_form.php?error=incorrectpassword");
            echo "<script type='text/javascript'>alert('Incorrect Password!!'); window.location.href='../application_form.php?error=incorrectpassword';</script>";
        }
    }
    else{
        // header("Location: ../application_form.php?error=sqlerror");
        echo "<script type='text/javascript'>alert('Some error occured for checking password'); window.location.href='../application_form.php?error=sqlerror';</script>";   
    }


}
?>