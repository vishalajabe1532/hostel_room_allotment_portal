<?php
  require 'includes/config.inc.php';
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
	require 'includes/config.inc.php';
    $sql = "SELECT `Name` FROM Students WHERE MIS='$mis'";
    $result = mysqli_query($conn, $sql);
    // ysqli_connect
    if($row = mysqli_fetch_assoc($result)){
        return $row['Name'];

    }
}
function getStudentBranch($mis){
	require 'includes/config.inc.php';
    $sql = "SELECT `Branch` FROM Students WHERE MIS='$mis'";
    $result = mysqli_query($conn, $sql);
    // ysqli_connect
    if($row = mysqli_fetch_assoc($result)){
        return $row['Branch'];

    }
}
function getStudentCGPA($mis){
	require 'includes/config.inc.php';
    $sql = "SELECT `CGPA` FROM Applications WHERE MIS='$mis'";
    $result = mysqli_query($conn, $sql);
    // ysqli_connect
    if($row = mysqli_fetch_assoc($result)){
        return $row['CGPA'];

    }
}
function getStudentBacklogs($mis){
	require 'includes/config.inc.php';
    $sql = "SELECT `Backlogs` FROM Applications WHERE MIS='$mis'";
    $result = mysqli_query($conn, $sql);
    // ysqli_connect
    if($row = mysqli_fetch_assoc($result)){
        return $row['Backlogs'];

    }
}


require 'includes/config.inc.php';





$mis = $_SESSION['mis'];





echo '<div class="container ">';
echo '<h3 class="heading text-capitalize " >Your Room :</h3>';


echo '<table class="table table-hover">';
echo '<thead>';
echo '<tr>';
echo '<th>Room Number</th>';
echo '<th>Member 1</th>';
echo '<th>Member 2</th>';
echo '<th>Member 3</th>';
echo '<th>Member 4</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

$query = "SELECT * FROM Rooms WHERE MIS1 = '$mis' OR MIS2 = '$mis' OR MIS3 = '$mis' OR MIS4 = '$mis'";
$result = mysqli_query($conn,$query);

if($row = mysqli_fetch_assoc($result)){
    //room alloted to him
    $room_no = $row['room_no'];
    $mis1 = $row['MIS1'];
    $mis2 = $row['MIS2'];
    $mis3 = $row['MIS3'];
    $mis4 = $row['MIS4'];

    
    $name1 = getStudentName($mis1);
    $name2 = getStudentName($mis2);
    $name3 = getStudentName($mis3);
    $name4 = getStudentName($mis4);

    $branch1 = getStudentBranch($mis1);
    $branch2 = getStudentBranch($mis2);
    $branch3 = getStudentBranch($mis3);
    $branch4 = getStudentBranch($mis4);

    $cgpa1 = getStudentCGPA($mis1);
    $cgpa2 = getStudentCGPA($mis2);
    $cgpa3 = getStudentCGPA($mis3);
    $cgpa4 = getStudentCGPA($mis4);

    $backlogs1 = getStudentBacklogs($mis1);
    $backlogs2 = getStudentBacklogs($mis2);
    $backlogs3 = getStudentBacklogs($mis3);
    $backlogs4 = getStudentBacklogs($mis4);

    echo '<tr>';
    echo '<td>'.$room_no.'</td>';
    echo '<td>'.$mis1.'<br>'.$name1.'<br>Branch : '.$branch1.'<br>CGPA : '.$cgpa1.'<br> Backlogs : '.$backlogs1.'</td>';
    echo '<td>'.$mis2.'<br>'.$name2.'<br>Branch : '.$branch2.'<br>CGPA : '.$cgpa2.'<br> Backlogs : '.$backlogs2.'</td>';
    echo '<td>'.$mis3.'<br>'.$name3.'<br>Branch : '.$branch3.'<br>CGPA : '.$cgpa3.'<br> Backlogs : '.$backlogs3.'</td>';
    echo '<td>'.$mis4.'<br>'.$name4.'<br>Branch : '.$branch4.'<br>CGPA : '.$cgpa4.'<br> Backlogs : '.$backlogs4.'</td>';

    
    echo '</tr>';
    
    echo '</tbody>';
    echo '</table>';
}
else{
    //room not alloted to him
    echo "<script type='text/javascript'>alert('You are not alloted to any room.'); window.location.href='home.php?error=roomnotalloted';</script>";

}

    
	
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
