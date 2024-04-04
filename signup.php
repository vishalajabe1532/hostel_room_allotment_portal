<!DOCTYPE html>
<html lang="en">

<head>
    <title>SIGNUP PAGE</title>
    <!-- meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="Art Sign Up Form Responsive Widget, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates,
		Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design"
    />
    <!-- /meta tags -->
    <!-- custom style sheet -->
    <link href="web/css/style.css" rel="stylesheet" type="text/css" />
    <!-- /custom style sheet -->
    <!-- fontawesome css -->
    <link href="web/css/fontawesome-all.css" rel="stylesheet" />
    <!-- /fontawesome css -->
    <!-- google fonts-->
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- /google fonts-->

</head>


<body>
    <h1>Hostel Room Allotment Portal</h1>
    <div class=" w3l-login-form">
        <h2>Sign Up Here</h2>
        <form action="includes/verify-otp.inc.php" method="POST">

            <div class=" w3l-form-group">
                <label>Student MIS No</label>
                <div class="group">
                    <i class="fas fa-id-badge"></i>
                    <input type="text" class="form-control" name="mis_no" placeholder="MIS No" required="required" />
                </div>
            </div>


            <!-- verify btn to get otp -->
            <button type="button" id="get-otp" name="get_otp">Get OTP</button>


            <div class=" w3l-form-group">
                <label>OTP</label>
                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input type="password" class="form-control" name="otp" placeholder="OTP" required="required" />
                </div>
            </div>


            <!-- verify btn to get otp -->
            <button type="submit" id="verify-otp" name="verify_otp">Verify OTP</button>

            
        </form>
        <p class=" w3l-register-p">Already a member?<a href="index.php" class="register"> Login</a></p>
    </div>
    <footer>
        <p class="copyright-agileinfo"> &copy; 2024 Software engineering Project. All Rights Reserved | Design by Anuj and Vishal</p>
    </footer>

    <!-- Include jQuery library for easier AJAX handling -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            // Attach a click event handler to the "Get OTP" button
            $('#get-otp').click(function () {
                // Get the MIS data from the input field
                var mis = $('[name="mis_no"]').val();
                console.log(mis);

                // Send the MIS data to the backend using AJAX
                $.ajax({
                    url: 'includes/signup.inc.php',
                    method: 'POST',
                    data: {
                        mis_no: mis,
                        get_otp: 'clicked'
                    },
                    success: function (response) {
                        // Handle the response from the backend
                        // This can be displaying a message or performing other actions
                        
                        alert("OTP has been sent to your registered COEP mail address. Valid for 5 minutes.")
                        
                        console.log(response);
                        // console.dir(response);
                    },
                    error: function (xhr, status, error) {
                        // Handle errors, if any
                        console.error(error);
                    }
                });
                // console.log("btn clicked");

            });

            // // Attach a click event handler to the "Verify OTP" button
            // $('#verify-otp').click(function () {
            //     // Get the OTP data from the input field
            //     var otp = $('[name="otp"]').val();
            //     var mis = $('[name="mis_no"]').val();

            //     // Send the OTP data to the backend using AJAX
            //     $.ajax({
            //         url: 'includes/verify-otp.inc.php',
            //         method: 'POST',
            //         data: {
            //             otp: otp,
            //             mis_no: mis,
            //             verify_otp: 'clicked',


            //         },
            //         success: function (response) {
            //             // Handle the response from the backend
            //             // This can be displaying a message or performing other actions
            //             console.log(response);
            //         },
            //         error: function (xhr, status, error) {
            //             // Handle errors, if any
            //             console.error(error);
            //         }
            //     });
            // });
        });
    </script>

</body>

</html>

