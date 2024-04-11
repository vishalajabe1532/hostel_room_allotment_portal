<?php



if(isset($_POST['submit'])){
    require 'config.inc.php';

    $username = $_POST['username'];
    $password = $_POST['pwd'];



    $query= "SELECT * FROM Flags";
    $result= mysqli_query($conn,$query);
    if($row=mysqli_fetch_assoc($result)){
        if($row['Application_form_open'] == 0){
            //fine
            $query = "UPDATE Flags SET Application_form_open = 1 WHERE ID=1";
            $result= mysqli_query($conn,$query);
            if($result){
                echo "<script type='text/javascript'>alert('Forms are floated, Students can fill them'); window.location.href='../home_manager.php?error=sqlerror';</script>";

            }
            else{
                echo "<script type='text/javascript'>alert('Something went wrong'); window.location.href='../float_application_forms.php?error=sqlerror';</script>";

            }

        }
        else{
            echo "<script type='text/javascript'>alert('Forms are already floated'); window.location.href='../float_application_forms.php?error=sqlerror';</script>";

        }
    }
    else{
        echo "<script type='text/javascript'>alert('Something went wrong'); window.location.href='../float_application_forms.php?error=sqlerror';</script>";

    }

}





?>
