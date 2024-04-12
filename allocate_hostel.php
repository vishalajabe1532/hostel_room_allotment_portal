<!-- <?php
  require 'includes/config.inc.php';
  
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
<title> HRAP | Manager | Allocate Hostel</title>
	
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Intrend Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--bootsrap -->

	<!--// Meta tag Keywords -->
		
	<!-- css files -->
	<link rel="stylesheet" href="web_home/css_home/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="web_home/css_home/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
	<link rel="stylesheet" href="web_home/css_home/fontawesome-all.css"> <!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->
	
	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	<!-- //web-fonts -->
	
</head>

<body>

<!-- banner -->
<div class="inner-page-banner" id="home"> 	   
	<!--Header-->
	<header>
		<div class="container agile-banner_nav">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				
				<h1><a class="navbar-brand" href="home_manager.php">COEP<span class="display"></span></a></h1>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="home_manager.php">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
						<a class="nav-link" href="allocate_room.php">Allocate Room</a>
					<li class="dropdown nav-item">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Rooms
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu agile_short_dropdown">
							<li>
								<a href="allocated_rooms.php">Allocated Rooms</a>
							</li>
							<li class="nav-item">
						<a class="nav-link" href="message_hostel_manager.php">Messages Received</a>
					</li>
							<li>
								<a href="empty_rooms.php">Empty Rooms</a>
							</li>
							<li>
								<a href="vacate_rooms.php">Vacate Rooms</a>
							</li>
						</ul>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="contact_manager.php">Contact</a>
					</li>
					<li class="dropdown nav-item">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><?php echo $_SESSION['username']; ?>
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu agile_short_dropdown">
							<li>
								<a href="admin/manager_profile.php">My Profile</a>
							</li>
							<li>
								<a href="includes/logout.inc.php">Logout</a>
							</li>
						</ul>
					</li>
					</ul>
				</div>
			</nav>
		</div>
	</header>
	<!--Header-->
</div>
<!-- //banner --> 
<br><br><br>



<section class="contact py-5">
	<div class="container">
        <h2 class="heading text-capitalize mb-sm-5 mb-4">Enter Number of seats per branch</h2>
			<div class="mail_grid_w3l">
				<form action="allocate_hostel.php" method="POST" onsubmit="return validateForm()">
					<div>
						<label class="heading text-capitalize" style="font-weight:bold;" for="civil">civil</label>
                        <input class="allocate_inp" type="number" id="civil" name="civil" required>
                    </div>
                    <div>
						<label class="heading text-capitalize" style="font-weight:bold;" for="computer">Computer</label>
                        <input class="allocate_inp" type="number" id="computer" name="comp" required>
                    </div>
                    <div>
						<label class="heading text-capitalize" style="font-weight:bold;" for="electrical">electrical</label>
                        <input class="allocate_inp" type="number" id="electrical" name="elec" required>
                    </div>
                    <div>
						<label class="heading text-capitalize" style="font-weight:bold;" for="electronics">electronics</label>
                        <input class="allocate_inp" type="number" id="electronics" name="entc" required>
                    </div>
                    <div>
						<label class="heading text-capitalize" style="font-weight:bold;" for="instrumentation">instrumentation</label>
                        <input class="allocate_inp" type="number" id="instrumentation" name="instru" required>
                    </div>
                    <div>
						<label class="heading text-capitalize" style="font-weight:bold;" for="mechanical">mechanical</label>
                        <input class="allocate_inp" type="number" id="mechanical" name="mech" required>
                    </div>
                    <div>
						<label class="heading text-capitalize" style="font-weight:bold;" for="metallurgy">metallurgy</label>
                        <input class="allocate_inp" type="number" id="metallurgy" name="meta" required>
                    </div>
                    <div>
						<label class="heading text-capitalize " style="font-weight:bold;" for="production">production</label>
                        <input class="allocate_inp mb-4" type="number" id="production" name="prod" required>
                    </div>
					<div class="contact-fields-w3ls">
						<input type="text" name="username" placeholder="Username" value="<?php echo $_SESSION['username']; ?>" required="" readonly>
					</div>
					<div class="contact-fields-w3ls">
						<input type="password" name="pwd" placeholder="Password" required="">
					</div>
                    
                    <input type="submit" value="Submit and Allocate Hostel" name="submit_and_allocate"></input>
				</form>
			</div>
	</div>
</section>


<!-- allocation code -->







<?php
// display_branch_student($branches,$branch_list){
	
// }

error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);

function getStudentName($mis){
	require 'config.inc.php';
    $sql = "SELECT `Name` FROM Students WHERE MIS='$mis'";
    $result = mysqli_query($conn, $sql);
    // ysqli_connect
    if($row = mysqli_fetch_assoc($result)){
        return $row['Name'];

    }
}

if(isset($_POST['submit_and_allocate'])){
	require 'includes/config.inc.php';
    require 'includes/allotment_helpers.inc.php';
	
    $username= $_POST['username'];
    $password = $_POST['pwd'];
    $civil = $_POST['civil'];
    $comp = $_POST['comp'];
    $elec = $_POST['elec'];
    $entc = $_POST['entc'];
    $instru = $_POST['instru'];
    $mech = $_POST['mech'];
    $meta = $_POST['meta'];
    $prod = $_POST['prod'];
    
    
    
	
    /*echo "<script type='text/javascript'>alert('<?php echo $mis?>')</script>";*/
    $query_imp = "SELECT * FROM admin_hostel_manager WHERE Username = '$username'";
    $result_imp = mysqli_query($conn,$query_imp);
    $row_imp = mysqli_fetch_assoc($result_imp);
    /*echo "<script type='text/javascript'>alert('<?php echo $room_id ?>')</script>";*/
    if($row_imp){
		if($row_imp['Password'] == $password){
			//every thing fine
			$branch_list = array('civil','comp','elec','entc','instru','mech','meta','prod');
			$branch_capacity = array($civil, $comp, $elec, $entc, $instru,  $mech, $meta, $prod); // Example capacities for each branch

			// Create an array to hold the branches
			$branches = array();

			// Create and add Branch objects to the array with different capacities
			for ($i = 0; $i < count($branch_capacity); $i++) {
				$branches[] = createBranch($branch_capacity[$i]);
				// echo  "size: {".$branches[$i]->size."} total seats: {".$branches[$i]->total_seats."} open seats: {".$branches[$i]->open."} ews seats: {".$branches[$i]->ews."} obc seats: {".$branches[$i]->obc."} sc seats: {".$branches[$i]->sc."} st seats: {".$branches[$i]->st."} <br>";
			}
			fetch_students_data($branches,$branch_list);
			Allocation($branches);
			// display_branch_student($branches,$branch_list);







			
			echo '<div class="container ">';
			for ($i = 0; $i < 8; $i++) { 
				echo '<h3 class="heading text-capitalize " >Selected Students of <b>'.$branch_list[$i].'</b> are :</h3>';
				echo '<table class="table table-hover">';
				echo '<thead>';
				echo '<tr>';
				echo '<th>MIS</th>';
				echo '<th>Student Name</th>';
				echo '<th>CGPA</th>';
				echo '<th>Backlogs</th>';
				echo '<th>Category</th>';
				echo '</tr>';
				echo '</thead>';
				echo '<tbody>';
				$size = $branches[$i]->size;
				for ($j = 0; $j < $size; $j++) { 
					// Assuming you have a function to get the student name based on MIS
					$stdmis = $branches[$i]->alloted_students[$j]->mis;
					$sql = "SELECT `Name` FROM Students WHERE MIS='$stdmis'";
					$result = mysqli_query($conn, $sql);
					$row = mysqli_fetch_assoc($result);
					if(!$row){
						continue;
						
					}
					echo '<tr>';
					echo '<td>'.$branches[$i]->alloted_students[$j]->mis.'</td>';
					echo '<td>'.$row['Name'].'</td>';
					echo '<td>'.$branches[$i]->alloted_students[$j]->cgpa.'</td>';
					echo '<td>'.$branches[$i]->alloted_students[$j]->backlogs.'</td>';
					echo '<td>'.$branches[$i]->alloted_students[$j]->category.'</td>';
					echo '</tr>';
					
					$sqlupdate = "UPDATE Applications SET IsApproved = 1 WHERE MIS='$stdmis'";
					$resultupdate = mysqli_query($conn,$sqlupdate);
					// if($resultupdate){
					// 	echo 'Applications table updated successfully!';
					// } else {
					// 	echo 'Error updating applications table: ' . mysqli_error($conn);
					// }

				}
				echo '</tbody>';
				echo '</table>';
			}
			// // echo '<input type="button" class="btn btn-primary" value="Notify Students about Allotment" name="notify_students_allotment"></input>';
			// echo '<form action="allocate_hostel.php" method="POST">';
			// 	echo '<input type="submit" class="btn btn-primary" value="Notify Students about Allotment" name="notify_students_allotment">';
			// echo '</form>';
			// Add a form for the button
			echo '<form id="notify_form" action="allocate_hostel.php" method="POST">';
			echo '<input type="submit" class="btn btn-primary" value="Notify Students about Allotment" name="notify_students_allotment">';
			echo '</form>';
			
			echo '</div>';



			// Add JavaScript to check if the button is clicked
			echo '<script>';
			echo 'document.getElementById("notify_form").addEventListener("submit", function(event) {';
			echo '    alert("Button clicked!");'; // Replace this with your desired JavaScript code
			echo '});';
			echo '</script>';
			








        }
        else{
            // header("Location: ../application_form.php?error=incorrectpassword");
            echo "<script type='text/javascript'>alert('Incorrect Password!!'); window.location.href='../allocate.php?error=incorrectpassword';</script>";
          
        }
    }
	else{
			echo "<script type='text/javascript'>alert('Some error occured for checking password'); window.location.href='../allocate.php?error=sqlerror';</script>";   
		
		}
}
	
?>
	
	
<script type="text/javascript">
    function validateForm() {
        var inputs = document.querySelectorAll('.allocate_inp');
        for (var i = 0; i < inputs.length; i++) {
            if (inputs[i].value < 0 || isNaN(inputs[i].value) || inputs[i].value.indexOf('.') !== -1) {
                alert("Please enter a non-negative integer.");
                inputs[i].focus();
                return false;
            }
        }
        return true;
    }
</script>


<br>
<br>
<br>

<!-- footer -->
<footer class="py-5">
	<div class="container py-md-5">
		<div class="footer-logo mb-5 text-center">
			<a class="navbar-brand"  href="https://www.coeptech.ac.in/" target="_blank" >COEP TECH</a>
		</div>
		<div class="footer-grid">
			
			<div class="list-footer">
				<ul class="footer-nav text-center">
					<li>
						<a href="home_manager.php">Home</a>
					</li>
					<li>
						<a href="allocate_room.php">Allocate</a>
					</li>
					
					<li>
						<a href="contact_manager.php">Contact</a>
					</li>
					<li>
						<a href="admin/manager_profile.php">Profile</a>
					</li>
				</ul>
			</div>
			
		</div>
	</div>
</footer>
<!-- footer -->

<!-- js-scripts -->

	<!-- js -->
	<script type="text/javascript" src="web_home/js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="web_home/js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap -->
	<!-- //js -->

	<!-- banner js -->
	<script src="web_home/js/snap.svg-min.js"></script>
	<script src="web_home/js/main.js"></script> <!-- Resource jQuery -->
	<!-- //banner js -->

	<!-- flexSlider --><!-- for testimonials -->
	<script defer src="web_home/js/jquery.flexslider.js"></script>
	<script type="text/javascript">
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	</script>
	<!-- //flexSlider --><!-- for testimonials -->

	<!-- start-smoth-scrolling -->
	<script src="web_home/js/SmoothScroll.min.js"></script>
	<script type="text/javascript" src="web_home/js/move-top.js"></script>
	<script type="text/javascript" src="web_home/js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script>
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
				};
			*/

			$().UItoTop({ easingType: 'easeOutQuart' });

			});
	</script>
	<!-- //here ends scrolling icon -->
	<!-- start-smoth-scrolling -->

<!-- //js-scripts -->

</body>
</html>


