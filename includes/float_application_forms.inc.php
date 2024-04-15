<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);


if(isset($_POST['submit'])){
    require 'config.inc.php';

    $username = $_POST['username'];
    $password = $_POST['pwd'];
    $application_closing_date = $_POST['application_closing_date'];

    $query_imp = "SELECT * FROM admin_hostel_manager WHERE Username = '$username'";
    $result_imp = mysqli_query($conn,$query_imp);
    $row_imp = mysqli_fetch_assoc($result_imp);
    /*echo "<script type='text/javascript'>alert('<?php echo $room_id ?>')</script>";*/
    if($row_imp){
		if($row_imp['Password'] == $password){
            $query= "SELECT * FROM Flags";
            $result= mysqli_query($conn,$query);
            if($row=mysqli_fetch_assoc($result)){
                if($row['Application_form_open'] == 0){
                    //fine
                    $query = "UPDATE Flags SET Application_form_open = 1, Application_form_closing='$application_closing_date' WHERE ID=1";
                    $result= mysqli_query($conn,$query);
                    if($result){
                        echo "<script type='text/javascript'>alert('Forms are floated, Students can fill them'); window.location.href='../home_manager.php?error=sqlerror';</script>";
        
                    }
                    else{
                        echo "<script type='text/javascript'>alert('Something went wrong'); window.location.href='../float_application_forms.php?error=sqlerror';</script>";
        
                    }
        
                }
                else{
                    echo "<script type='text/javascript'>alert('Forms are already floated'); window.location.href='../float_application_forms.php?error=formsopen';</script>";
        
                }
            }
            else{
                echo "<script type='text/javascript'>alert('Something went wrong'); window.location.href='../float_application_forms.php?error=sqlerror';</script>";
        
            }

        }
        else{
            // header("Location: ../application_form.php?error=incorrectpassword");
            echo "<script type='text/javascript'>alert('Incorrect Password!!'); window.location.href='../float_application_forms.php?error=incorrectpassword';</script>";
          
        }
    }


}




if(isset($_POST['close_applications'])){
    require 'config.inc.php';

    $username = $_POST['username'];
    $password = $_POST['pwd'];
    $today_date = date("Y-m-d");
    $query_imp = "SELECT * FROM admin_hostel_manager WHERE Username = '$username'";
    $result_imp = mysqli_query($conn,$query_imp);
    $row_imp = mysqli_fetch_assoc($result_imp);
    /*echo "<script type='text/javascript'>alert('<?php echo $room_id ?>')</script>";*/
    if($row_imp){
		if($row_imp['Password'] == $password){
            $query= "SELECT * FROM Flags";
            $result= mysqli_query($conn,$query);
            if($row=mysqli_fetch_assoc($result)){
                if($row['Application_form_open'] == 1){
                    //fine
                    $query = "UPDATE Flags SET Application_form_open = 0, Application_form_closing='$today_date' WHERE ID=1";
                    $result= mysqli_query($conn,$query);
                    if($result){
                        echo "<script type='text/javascript'>alert('Application forms are closed'); window.location.href='../home_manager.php?error=sqlerror';</script>";
        
                    }
                    else{
                        echo "<script type='text/javascript'>alert('Something went wrong'); window.location.href='../float_application_forms.php?error=sqlerror';</script>";
        
                    }
        
                }
                else{
                    echo "<script type='text/javascript'>alert('Forms are not open for Applications'); window.location.href='../float_application_forms.php?error=formsclosed';</script>";
        
                }
            }
            else{
                echo "<script type='text/javascript'>alert('Something went wrong'); window.location.href='../float_application_forms.php?error=sqlerror';</script>";
        
            }

        }
        else{
            // header("Location: ../application_form.php?error=incorrectpassword");
            echo "<script type='text/javascript'>alert('Incorrect Password!!'); window.location.href='../float_application_forms.php?error=incorrectpassword';</script>";
          
        }
    }
    




}





?>
