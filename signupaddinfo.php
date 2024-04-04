<?php
session_start();

if (isset($_GET['verification']) && $_GET['verification'] == 'success' && isset($_GET['mis'])) {
    $mis = $_GET['mis'];
    // Use $mis as needed
}
?>


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
        <h2>Add your Info here</h2>
        <form action="includes/signupinfo.inc.php" method="POST">

            <div class=" w3l-form-group">
                <label>Student MIS No</label>
                <div class="group">
                    <i class="fas fa-id-badge"></i>
                    <input type="text" class="form-control" name="student_mis_no" placeholder="MIS No" value="<?php echo isset($_GET['mis']) ? $_GET['mis'] : ''; ?>" required="required" readonly/>
                </div>
            </div>
            
            <div class=" w3l-form-group">
                <label>Name (As in your Markshhet) </label>
                <div class="group">
                    <i class="fas fa-user"></i>
                    <input type="text" class="form-control" name="student_name" placeholder="Name" required="required" />
                </div>
            </div>
            
            <div class=" w3l-form-group">
                <label>Mobile No</label>
                <div class="group">
                    <i class="fas fa-phone"></i>
                    <input type="text" class="form-control" name="mobile_no" placeholder="Mobile No" required="required" />
                </div>
            </div>
            <div class="w3l-form-group">
                <label for="branch">Branch</label>
                <div class="group">
                    <i class="fas fa-graduation-cap"></i>
                    <select class="form-control" name="branch" id="branch" required="required">
                        <option value="" selected disabled>Select Branch</option>
                        <option value="comp">Computer</option>
                        <option value="civil">Civil</option>
                        <option value="elec">Electrical</option>
                        <option value="entc">Electronics and Telecommunication</option>
                        <option value="instru">Instrumentation</option>
                        <option value="prod">Production</option>
                        <option value="meta">Metallurgy</option>
                        <option value="mech">Mechanical</option>
                        
                    </select>
                </div>
            </div>

            <div class="w3l-form-group">
                <label for="year_of_study">Year of Study</label>
                <div class="group">
                    <i class="fas fa-calendar"></i>
                    <select class="form-control" name="year_of_study" id="year_of_study" required="required">
                        <option value="" selected disabled>Select Year of Study</option>
                        <option value="fy">First Year (FY)</option>
                        <option value="sy">Second Year (SY)</option>
                        <option value="ty">Third Year (TY)</option>
                        <option value="final">Final Year</option>
                    </select>
                </div>
            </div>
            <div class="w3l-form-group">
                <label for="category">Category</label>
                <div class="group">
                    <i class="fas fa-users"></i>
                    <select class="form-control" name="category" id="category" required="required">
                        <option value="" selected disabled>Select Category</option>
                        <option value="open">Open</option>
                        <option value="ews">EWS</option>
                        <option value="obc">OBC</option>
                        <option value="st">ST</option>
                        <option value="sc">SC</option>
                    </select>
                </div>
            </div>


          <!--  <div class=" w3l-form-group">
                <label>Email:</label>
                <div class="group">
                    <i class="fas fa-envelope"></i>
                    <input type="text" class="form-control" name="mail" placeholder="Email" required="required" />
                </div>
            </div>-->

            <div class=" w3l-form-group">
                <label>Password:</label>
                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input type="password" class="form-control" name="pwd" placeholder="Password" required="required" />
                </div>
            </div>

            <div class=" w3l-form-group">
                <label>Confirm Password:</label>
                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input type="password" class="form-control" name="confirmpwd" placeholder="Confirm Password" required="required" />
                </div>
            </div>
            <!--<div class="forgot">
                <a href="#">Forgot Password?</a>
                <p><input type="checkbox">Remember Me</p>
            </div>-->
            <button type="submit" name="signup-submit">Sign Up</button>
        </form>
        <p class=" w3l-register-p">Already a member?<a href="index.php" class="register"> Login</a></p>
    </div>
    <footer>
        <p class="copyright-agileinfo"> &copy; 2024 Software engineering Project. All Rights Reserved | Design by Anuj and Vishal</p>
    </footer>

</body>

</html>
