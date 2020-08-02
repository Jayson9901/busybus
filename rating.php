<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Busy Bus</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/style2.css">
	
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	
	
  </head>

  <body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Busy Bus</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item active"><a href="news.php" class="nav-link">News</a></li>
	          <li class="nav-item active"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item active"><a href="contact.php" class="nav-link">Contact</a></li>
	          <li class="nav-item active"><a href="career.php" class="nav-link">Career</a></li>
			  <li class="nav-item active"><a href="register.php" class="nav-link">Register/Login</a></li>
			  <li class="nav-item active"><a href="setting.php" class="nav-link">Settings</a></li>
			  <?php
			  if(isset($_COOKIE["country"])){?>
				  <?php echo"<li class='nav-item'><a href='#' class='nav-link'>";?><?php echo $_COOKIE["country"];?><?php echo"</a></li>";?>
			  <?php } 	
			  else{ ?>
			  <?php echo"<li class='nav-item'><a href='#' class='nav-link'>";?><?php echo "--"?><?php echo"</a></li>";?>
			  <?php } ?>
			   <?php
			  if(isset($_COOKIE["language"])){?>
				  <?php echo"<li class='nav-item'><a href='#' class='nav-link'>";?><?php echo $_COOKIE["language"];?><?php echo"</a></li>";?>
			  <?php } 	
			  else{ ?>
			  <?php echo"<li class='nav-item'><a href='#' class='nav-link'>";?><?php echo "--"?><?php echo"</a></li>";?>
			  <?php } ?>
			   <?php
			  if(isset($_COOKIE["currency"])){?>
				  <?php echo"<li class='nav-item'><a href='#' class='nav-link'>";?><?php echo $_COOKIE["currency"];?><?php echo"</a></li>";?>
			  <?php } 	
			  else{ ?>
			  <?php echo"<li class='nav-item'><a href='#' class='nav-link'>";?><?php echo "--"?><?php echo"</a></li>";?>
			  <?php } ?>
			   <?php
			  if(isset($_SESSION["username"])){?>
				  <?php echo"<li class='nav-item'><a href='#' class='nav-link'>";?><?php echo $_SESSION["username"];?><?php echo"</a></li>";?>
			  <?php } 	
			  else{ ?>
			  <?php echo"<li class='nav-item'><a href='#' class='nav-link'>";?><?php echo "--"?><?php echo"</a></li>";?>
			  <?php } ?>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

<?php
	
	

echo " <div class=\"hero-wrap\" style=\"background-image: url('images/bus_1.jpg');\">\n";
echo "      <div class=\"overlay\"></div>\n";
echo "      <div class=\"container\">\n";
echo "        <div class=\"row no-gutters slider-text d-flex align-itemd-end justify-content-center\">\n";
echo "          <div class=\"col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center\">\n";
echo "          	<div class=\"text\">\n";
echo "	            <p class=\"breadcrumbs mb-2\"><span class=\"mr-2\"><a href=\"index.html\">Home</a></span> <span>Rating / Subscribe</span></p>\n";
echo "	            <h1 class=\"mb-4 bread\">Rating / Subscribe</h1>\n";
echo "            </div>\n";
echo "          </div>\n";
echo "        </div>\n";
echo "      </div>\n";
echo "    </div>";
echo "<section class=\"ftco-section ftco-counter img\" id=\"section-counter\" style=\"background-image: url(images/bg_2.jpg);\">\n";
echo "      <div class=\"parallax-img d-flex align-items-center\">\n";
echo "        <div class=\"container\">\n";
echo "          <div class=\"row d-flex justify-content-center\">\n";
echo "            <div class=\"col-md-7 text-center heading-section heading-section-white ftco-animate\">\n";
echo "              <h2>Subcribe to our Newsletter</h2>\n";
echo "              <p>Enter your email address to get notify of all news from our awsone website !!!</p>\n";
echo "              <div class=\"row d-flex justify-content-center mt-5\">\n";
echo "                <div class=\"col-md-8\">\n";
echo "                  <form action=\"#\" class=\"subscribe-form\">\n";
echo "                    <div class=\"form-group d-flex\">\n";
echo "                      <input type=\"text\" class=\"form-control\" placeholder=\"Enter email address\">\n";
echo "                      <input type=\"submit\" value=\"Subscribe\" class=\"submit px-3\">\n";
echo "                    </div>\n";
echo "                  </form>\n";
echo "                </div>\n";
echo "              </div>\n";
echo "            </div>\n";
echo "          </div>\n";
echo "        </div>\n";
echo "      </div>\n";
echo "    </section>";

echo "<section class=\"ftco-section \">\n";
echo "    	<div class=\"container\">\n";
echo "    		<div class=\"row justify-content-center mb-5 pb-3\">\n";
echo "          <div class=\"col-md-7 text-center heading-section heading-section-white ftco-animate\">\n";
echo "            <h2 class=\"mb-4\" >Some fun facts</h2>\n";
echo "            <span class=\"subheading\">More than 100,000 websites hosted</span>\n";
echo "          </div>\n";
echo "        </div>\n";
echo "    		<div class=\"row justify-content-center\">\n";
echo "    			<div class=\"col-md-10\">\n";
echo "		    		<div class=\"row\">\n";
echo "		          <div class=\"col-md-3 d-flex justify-content-center counter-wrap ftco-animate\">\n";
echo "		            <div class=\"block-18 text-center\">\n";
echo "		              <div class=\"text\">\n";
echo "		                <strong class=\"number\" data-number=\"100000\">0</strong>\n";
echo "		                <span>Sastified Customers</span>\n";
echo "		              </div>\n";
echo "		            </div>\n";
echo "		          </div>\n";
echo "		          <div class=\"col-md-3 d-flex justify-content-center counter-wrap ftco-animate\">\n";
echo "		            <div class=\"block-18 text-center\">\n";
echo "		              <div class=\"text\">\n";
echo "		                <strong class=\"number\" data-number=\"40000\">0</strong>\n";
echo "		                <span>Destination Travelled</span>\n";
echo "		              </div>\n";
echo "		            </div>\n";
echo "		          </div>\n";
echo "		          <div class=\"col-md-3 d-flex justify-content-center counter-wrap ftco-animate\">\n";
echo "		            <div class=\"block-18 text-center\">\n";
echo "		              <div class=\"text\">\n";
echo "		                <strong class=\"number\" data-number=\"87000\">0</strong>\n";
echo "		                <span>Busses</span>\n";
echo "		              </div>\n";
echo "		            </div>\n";
echo "		          </div>\n";
echo "		          <div class=\"col-md-3 d-flex justify-content-center counter-wrap ftco-animate\">\n";
echo "		            <div class=\"block-18 text-center\">\n";
echo "		              <div class=\"text\">\n";
echo "		                <strong class=\"number\" data-number=\"56400\">0</strong>\n";
echo "		                <span>Total Booking</span>\n";
echo "		              </div>\n";
echo "		            </div>\n";
echo "		          </div>\n";
echo "		        </div>\n";
echo "	        </div>\n";
echo "        </div>\n";
echo "    	</div>\n";
echo "    </section>";

	
echo '<section class="ftco-section ">';
echo '<div class="container2">';
echo '<div class="post2">';
echo '<div class="text2">Thanks for rating us!</div>';
echo '<div class="edit2">EDIT</div>';
echo '</div>';
echo '<h1 style="color:white;">Please Rate Us</h1>';
echo '<span class="subheading">Your feedback is an appreciate token for us !</span>';
echo '<div class="star-widget2">';
echo '<input type="radio" name="rate" id="rate-5">';
echo '<label for="rate-5" class="fas fa-star"></label>';
echo '<input type="radio" name="rate" id="rate-4">';
echo '<label for="rate-4" class="fas fa-star"></label>';
echo '<input type="radio" name="rate" id="rate-3">';
echo '<label for="rate-3" class="fas fa-star"></label>';
echo '<input type="radio" name="rate" id="rate-2">';
echo '<label for="rate-2" class="fas fa-star"></label>';
echo '<input type="radio" name="rate" id="rate-1">';
echo '<label for="rate-1" class="fas fa-star"></label>';
echo '<form action="#">';
echo '<header></header>';
echo '<div class="textarea2">';
echo '<textarea cols="30" placeholder="Describe your experience.."></textarea>';
echo '</div>';
echo '<br />';
echo '<div class="btn">';
echo '<button type="submit">Post</button>';
echo '</div>';
		  
echo '<script>';
echo 'const btn2 = document.querySelector("button2");';
echo 'const post2 = document.querySelector(".post2");';
echo 'const widget2 = document.querySelector(".star-widget2");';
echo 'const editBtn = document.querySelector(".edit2");';
echo 'btn2.onclick = ()=>{';
echo 'widget2.style.display = "none";';
echo 'post2.style.display = "block";';
echo 'editBtn.onclick = ()=>{';
echo 'widget2.style.display = "block";';
echo 'post2.style.display = "block";';
echo '}';
echo 'return false;';
echo '}';
echo '</script>';
echo '</section>';

echo '<footer class="ftco-footer ftco-bg-dark ftco-section">';
echo '<div class="container">';
echo '<div class="row mb-5">';
echo '<div class="col-md">';
echo '<div class="ftco-footer-widget mb-4">';
echo '<h2 class="ftco-heading-2">Deluxe Hotel</h2>';
echo '<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>';
echo '<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">';
echo '<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>';
echo '<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>';
echo '<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>';
echo '</ul>';
echo '</div>';
echo '</div>';
echo '<div class="col-md">';
echo '<div class="ftco-footer-widget mb-4 ml-md-5">';
echo '<h2 class="ftco-heading-2">Useful Links</h2>';
echo '<ul class="list-unstyled">';
echo '<li><a href="#" class="py-2 d-block">Blog</a></li>';
echo '<li><a href="#" class="py-2 d-block">Rooms</a></li>';
echo '<li><a href="#" class="py-2 d-block">Amenities</a></li>';
echo '<li><a href="#" class="py-2 d-block">Gift Card</a></li>';
echo '</ul>';
echo '</div>';
echo '</div>';
echo '<div class="col-md">';
echo '<div class="ftco-footer-widget mb-4">';
echo '<h2 class="ftco-heading-2">Privacy</h2>';
echo '<ul class="list-unstyled">';
echo '<li><a href="#" class="py-2 d-block">Career</a></li>';
echo '<li><a href="#" class="py-2 d-block">About Us</a></li>';
echo '<li><a href="#" class="py-2 d-block">Contact Us</a></li>';
echo '<li><a href="#" class="py-2 d-block">Services</a></li>';
echo '</ul>';
echo '</div>';
echo '</div>';
echo '<div class="col-md">';
echo '<div class="ftco-footer-widget mb-4">';
echo '<h2 class="ftco-heading-2">Have a Questions?</h2>';
echo '<div class="block-23 mb-3">';
echo "	              <ul>\n";
echo "	                <li><span class=\"icon icon-map-marker\"></span><span class=\"text\">BUSY BUS COMPANY, Lorong Perindustrian, 11900, Bayan Lepas, Penang.</span></li>\n";
echo "	                <li><a href=\"tel:04567890\"><span class=\"icon icon-phone\"></span><span class=\"text\">+60 4567890</span></a></li>\n";
echo "	                <li><a href=\"mailto:busybus@gmail.com\"><span class=\"icon icon-envelope\"></span><span class=\"text\">busybus@gmail.com</span></a></li>\n";
echo "	              </ul>\n";
echo "	            </div>\n";
echo "            </div>\n";
echo "          </div>\n";
echo "        </div>\n";
echo "        <div class=\"row\">\n";
echo "          <div class=\"col-md-12 text-center\">";
echo "    </footer>";

?>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

  </body>
</html>
