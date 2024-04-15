<?php
  require 'includes/config.inc.php';
  $today_date = date("Y-m-d");

  $query = "SELECT * FROM Flags WHERE ID = 1";
  $result=mysqli_query($conn,$query);
  $row = mysqli_fetch_assoc($result);
  if($row['Application_form_open'] == 1 && $today_date <= $row['Application_form_closing']){
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title> HRAP | Student | Application Form</title>
	
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

			<h1><a class="navbar-brand" href="home.php">COEP <span class="display"></span></a></h1>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
					</li>

					
					<li class="dropdown nav-item">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Operations
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu agile_short_dropdown">
							
							<li>
								<a  href="application_form.php">Application Form</a>
							</li>
							<li>
								<a href="hostel_allotment_list_for_students.php">View Hostel Allotment List</a>
							</li>
							
							<li>
								<a  href="fill_roommates.php">Fill Roommates</a>
							</li>
							

							<li>
								<a href="view_my_room.php">View My Room</a>
							</li>


						</ul>
					</li>
					
					

					<li class="dropdown nav-item">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><?php echo $_SESSION['mis']; ?>
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu agile_short_dropdown">
							<li>
								<a href="profile.php">My Profile</a>
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

<section class="contact py-5">
	<div class="container">
		<h2 class="heading text-capitalize mb-sm-5 mb-4"> Application Form </h2>
			<div class="mail_grid_w3l">
				<form action="includes/application_form.inc.php?" method="POST">
					<div class="row">
						<div class="col-md-6 contact_left_grid" data-aos="fade-right">
							<div class="contact-fields-w3ls">
								<input type="text" name="name" placeholder="Name" value="<?php echo $_SESSION['name']; ?>" required="" readonly>
							</div>
							<div class="contact-fields-w3ls">
								<input type="text" name="mis_no" placeholder="MIS" value="<?php echo $_SESSION['mis']?>" required="" readonly>
							</div>
							<div class="contact-fields-w3ls">
								<input type="text" name="year_of_study" placeholder="Year of study" value="<?php echo $_SESSION['year_of_study']?>" required="" readonly>
							</div>
							<div class="contact-fields-w3ls">
								<input type="text" name="cgpa" placeholder="CGPA"  required="" >
							</div>
							<div class="contact-fields-w3ls">
								<input type="text" name="backlogs" placeholder="Number of Backlogs"  required="" >
							</div>
							<div class="contact-fields-w3ls">
								<input type="password" name="pwd" placeholder="Password" required="">
							</div>
						</div>
						
						<input type="submit" name="submit" value="Click to Apply">
						
					</div>

				</form>
			</div>
		
	</div>
</section>

<!-- footer -->
<footer class="py-5">
	<div class="container py-md-5">
		<div class="footer-logo mb-5 text-center">
			<a class="navbar-brand" href="https://www.coeptech.ac.in/" target="_blank">COEP TECH</a>
		</div>
	</div>
</footer>
<!-- footer -->

<!-- js-scripts -->		

	<!-- js -->
	<script type="text/javascript" src="web_home/js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="web_home/js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap --> 
	<!-- //js -->
		
	<!-- stats -->
	<script src="web_home/js/jquery.waypoints.min.js"></script>
	<script src="web_home/js/jquery.countup.js"></script>
	<script>
		$('.counter').countUp();
	</script>
	<!-- //stats -->

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


<?php
  }
  else{
	// echo "<script type='text/javascript'>alert('Application forms are not open for Applications.')</script>";
	echo "<script type='text/javascript'>alert('Application forms are not open for Applications.'); window.location.href='home.php?error=formnotopen';</script>";

  }
?>