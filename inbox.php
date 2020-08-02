<?php 
define("Title","User(Inbox)");
define("Main","User(Inbox)");
include('header.php');
?>

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
										echo"<h2>All caught up!";
										echo"<h4>No new inbox!</h4>";
											echo"<img src='images/uptodate.jpg' alt='Up To date' width='650px' height='400px'>";
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
											echo"<a href='history.php'><h3>Purchase History</h3></a><br>";
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