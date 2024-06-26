
<?php
  require 'includes/config.inc.php';
  $today_date = date("Y-m-d");

  $query = "SELECT * FROM Flags WHERE ID = 1";
  $result=mysqli_query($conn,$query);
  $row = mysqli_fetch_assoc($result);
  if($row['Hostel_allocation_done'] == 1  && $row['Room_allocation_done']==0 ){
?>
  
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

			<h1><a class="navbar-brand" href="home_manager.php">COEP <span class="display"></span></a></h1>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="home_manager.php">Home <span class="sr-only">(current)</span></a>
					</li>


					<li class="dropdown nav-item">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Operations
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu agile_short_dropdown">
							
							<li>
								<a href="view_all_students.php">View all Students</a>
							</li>

							<hr>

							<!-- float application forms -->
							<li>
								<a href="float_application_forms.php">Application forms</a>
							</li>

							<hr>

							<li>
								<a href="view_applications.php">View Applications</a>
							</li>

							<hr>

							<li>
								<a href="allocate_hostel.php">Allocate Hostel</a>
							</li>

							<hr>
							
							<li>
								<a href="hostel_allotment_list.php">View Hostel Allotment List</a>
							</li>

							<hr>
							
							<li>
								<a href="allocate_rooms.php">Allocate Rooms</a>
							</li>

							<hr>

							<li>
								<a href="allocated_rooms.php">View Allocated Rooms</a>
							</li>
							
							<li>
								<a href="restart_process.php">Restart Allocation Process</a>
							</li>


						</ul>
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
          <h2 class="heading text-capitalize mb-sm-5 mb-4">Enter your Credentials to Allocate Rooms</h2>
              <div class="mail_grid_w3l">
                  <form action="includes/allocate_rooms.inc.php" method="POST" >
                      <div class="contact-fields-w3ls">
                          <input type="text" name="username" placeholder="Username" value="<?php echo $_SESSION['username']; ?>" required="" readonly>
                      </div>
                      <div class="contact-fields-w3ls">
                          <input type="password" name="pwd" placeholder="Password" required="">
                      </div>
                      
                      <input type="submit" value="Submit and Allocate Rooms" name="submit_and_allocate"></input>
                  </form>
              </div>
      </div>
  </section>
  
  
      

  
  <br>
  <br>
  <br>
  
<!-- footer -->
<footer class="py-5">
	<div class="container py-md-5">
		<div class="footer-logo mb-5 text-center">
			<a class="navbar-brand"  href="https://www.coeptech.ac.in/" target="_blank">COEP TECH</a>
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
  
  


  <?php
  }
  else if($row['Hostel_allocation_done']==0){
	  echo "<script type='text/javascript'>alert('Hostel Allotment is not done yet'); window.location.href='allocate_hostel.php';</script>";

  }
  else if( $row['Room_allocation_done']==1){
	  echo "<script type='text/javascript'>alert('Room allocation is already done.'); window.location.href='allocated_rooms.php';</script>";

  }
  else{
	//   echo "<script type='text/javascript'>alert('You are still accepting application forms, Close the forms first.'); window.location.href='float_application_forms.php?error=formstillopen';</script>";
	  
  }
  
?>