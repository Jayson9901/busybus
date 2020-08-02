<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Home | Busy Bus</title>
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
              <!--Set cookies-->
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image:url(images/bus_1.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-12 ftco-animate text-center">
          	<div class="text mb-5 pb-3">
	            <h1 class="mb-3">Welcome To Busy Bus !</h1>
	            <h2>World's Best Bus Booking Website</h2>
            </div>
          </div>
        </div>
        </div>
      </div>

      <div class="slider-item" style="background-image:url(images/bus_2.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-12 ftco-animate text-center">
          	<div class="text mb-5 pb-3">
	            <h1 class="mb-3">Book Your Journey Today !</h1>
	            <h2>Let's Get Started</h2>
            </div>
          </div>
        </div>
        </div>
      </div>
    </section>