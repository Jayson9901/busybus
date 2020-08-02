<?php 
define("Title","Log Out");
define("Main","Log Out");
include('header.php');
?>
<?php
	echo"<br>";
	echo"<br>";
	 date_default_timezone_set("Singapore"); 
		
					echo"<h2 align='center'>You have been logged out at " . date('Y-m-d')." ".date('h:i:s a') . ".</h2>";
					echo"<h3 align='center'>Thank you!</h3>";
					echo"<p align='center'><img src='images/bus_11.jpg' alt='Bus' width='650px' height='400px'></p>";
	unset($_SESSION['username']);
	session_destroy( );
	echo"<br>";
	echo"<br>";
?>
<?php include('footer.php');?>