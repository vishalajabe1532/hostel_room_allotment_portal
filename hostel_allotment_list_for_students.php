

<?php
  require 'includes/config.inc.php';
  $mis = $_SESSION['mis'];
  $query = "SELECT * FROM Flags WHERE ID = 1";
  $result=mysqli_query($conn,$query);
  $row = mysqli_fetch_assoc($result);
  
  if($row['Hostel_allocation_done']==1 ){
    



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


require 'includes/config.inc.php';




//every thing fine
$branch_list = array('civil','comp','elec','entc','instru','mech','meta','prod');







echo '<div class="container ">';
echo '<h3 class="heading text-capitalize " >Hostel Allotment List :</h3>';
for ($i = 0; $i < 8; $i++) { 
    echo '<h3 class="heading text-capitalize " >'.$branch_list[$i].' :</h3>';
    echo '<table class="table table-hover">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>MIS</th>';
    echo '<th>Student Name</th>';
    echo '<th>Branch</th>';
    echo '<th>CGPA</th>';
    echo '<th>Backlogs</th>';
    echo '<th>Category</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    $br = $branch_list[$i];


    $query =  "SELECT * FROM Applications A JOIN Students S ON A.MIS=S.MIS WHERE A.IsAllocated=1 AND S.Branch='$br' ORDER BY A.CGPA DESC";
    $result = mysqli_query($conn,$query);


    while($row = mysqli_fetch_assoc($result)){
        $mis = $row['MIS'];
        $name = $row['Name'];
        $branch = $row['Branch'];
        $cgpa = $row['CGPA'];
        $backlogs = $row['Backlogs'];
        $category = $row['Category'];
        echo '<tr>';
        echo '<td>'.$mis.'</td>';
        echo '<td>'.$name.'</td>';
        echo '<td>'.$branch.'</td>';
        echo '<td>'.$cgpa.'</td>';
        echo '<td>'.$backlogs.'</td>';
        echo '<td>'.$category.'</td>';
        echo '</tr>';
        
    }
    echo '</tbody>';
    echo '</table>';
}
// // echo '<input type="button" class="btn btn-primary" value="Notify Students about Allotment" name="notify_students_allotment"></input>';
// echo '<form action="allocate_hostel.php" method="POST">';
// 	echo '<input type="submit" class="btn btn-primary" value="Notify Students about Allotment" name="notify_students_allotment">';
// echo '</form>';
// Add a form for the button









	
?>





















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
  else if($row['Hostel_allocation_done']==0){
    echo "<script type='text/javascript'>alert('Hostel Allocation is not done yet.'); window.location.href='home.php?error=allocationnotdone';</script>";
    
  }
?>
  