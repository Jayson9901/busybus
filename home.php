<?php include('header.php');?>
<?php
						echo"<form method = 'POST' action='#' class='bg-white p-5 contact-form' align='center'>";
							echo"<div class='row'>";
								echo"<div class='col-3'>";
								echo"<ul class='product-category' align = 'left'>";
								echo"<table cellspacing='2' border='1' width='1330px' align='center'>";
									echo"<tr>";
										echo"<td width='380px'>";
											echo"<a href='home.php'><h3>Home</h3></a><br>";
										echo"</td>";
										echo"<td rowspan='6' align='center' width='600px'>";
										echo"<h2>Welcome!</h2>";
										
										echo"<h4>Last updated at (+" . date_default_timezone_set("Singapore"); echo ") " . date('Y-m-d')." ".date('h:i:s a') . ".</h4>";
											echo"<img src='images/bus_2.jpg' alt='Welcome' width='650px' height='400px'>";
										echo"</td>";
									echo"</tr>";
									echo"<tr>";
										echo"<td width='280px'>";
											echo"<a href='reward.php'><h3>My Rewards</h3></a><br>";
										echo"</td>";
									echo"</tr>";
									echo"<tr>";
										echo"<td width='280px'>";
											echo"<a href='inbox.php'><h3>My Inbox</h3></a><br>";
										echo"</td>";
									echo"</tr>";
									echo"<tr>";
										echo"<td width='280px'>";
											echo"<a href='user_setting.php'><h3>Settings</h3></a><br>";
										echo"</td>";
									echo"</tr>";
									echo"<tr>";
										echo"<td width='280px'>";
											echo"<a href='logout.php'><h3>Log Out</h3></a><br>";
										echo"</td>";
									echo"</tr>";
								echo"</table>";
								echo"</ul>";
								echo"</div>";
							echo"</div>";
						echo"</form>";
?>
<?php include('footer.php');?>