<?php 
define("Title","User(Purcahse History)");
define("Main","User(Purchase History)");
include('header.php');
?>

<!-- Content -->
	 <?php 
		
				
				//Connect database
				$bus = mysqli_connect('localhost', 'root', '');
					//Test conneted to database or not
					/*if($bus = mysqli_connect('localhost', 'root', '')){
						print'<p>Sucessfully connected to MYSQL</p>';
					}
					else{
						print'<p style = " color:red; ">Could not connect to MySQL : '.mysqli_error($bus).'</p>';
					}*/
				
				//Select database
				mysqli_select_db($bus, 'bus');
					//Test database selected or not
					/*if(mysqli_select_db($bus, 'bus')){
						print'<p>Database is selected</p>';
					}
					else{
						print'<p style = " color:red; ">Database did not selected : '.mysqli_error($bus).'</p>';
					}*/	
				

				
					//Check can select or not
					/*if(mysqli_query($bus, $check)){
						echo "<script type='text/javascript'> alert('successfullt. Thank you!') </script>";
					}
					else{
					//If failed
					echo"<script type='text/javascript'> alert('Failed. Please try again.') </script>";
					}*/
				
				//Loop for checking password

				 date_default_timezone_set("Singapore");
					echo"<form method = 'POST' action='#' class='bg-white p-5 contact-form' align='center'>";
							echo"<div class='row'>";
								echo"<div class='col-3'>";
								echo"<ul class='product-category' align = 'left'>";
								echo"<table cellspacing='2' border='1' width='1330px' align='center'>";
									echo"<tr>";
										echo"<td width='280px'>";
											echo"<a href='#'><h3>Home</h3></a><br>";
										echo"</td>";
										echo"<td rowspan='6' align='center' width='600px'>";
										echo"<h2>Purchase History</h2>";
										echo"<h4>Last updated at " . date('Y-m-d')." ".date('h:i:s a') . ".</h4>";
											echo"<table border = '1'>";
												echo"<tr>";
													//echo"<th colspan = '8'><h3 align='center'>Purchase History</h3></th>";
												echo"</tr>";
												echo"<tr>";
													echo"<th></th>";
												echo"</tr>";
												echo"<tr>";
													echo"<th>No</th>";
													echo"<th>Company</th>";
													echo"<th>Departure Location</th>";
													echo"<th>Destination</th>";
													echo"<th>Departure Time</th>";
													echo"<th>Arrival Time</th>";
													echo"<th>Your Purchase</th>";
													echo"<th>Purchase Time</th>";
												echo"</tr>";
												echo"<tr>";
													$count = 1;
													$query = "SELECT * FROM register;";
													$result = mysqli_query($bus, $query);
													$resultCheck = mysqli_num_rows($result);
													if($resultCheck > 0){
														while($row = mysqli_fetch_assoc($result)){					
															echo"<td align='center'>" . $count . "</td>";
															echo"<td align='center'>" . $row['company'] . "</td>";
															echo"<td align='center'>" . $row['departure_location'] . "</td>";
															echo"<td align='center'>" . $row['destination'] . "</td>";
															echo"<td align='center'>" . $row['departure_time'] . "</td>";
															echo"<td align='center'>" . $row['arrival_time'] . "</td>";
															echo"<td align='center'RM>" . $row['purchase_history'] . "</td>";
															echo"<td align='center'>" . $row['purchase_time'] . "</td>";
															$count++;
														}
													}
												echo"</tr>";
											echo"</table>";
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
	<!--End of content -->
	

		
<?php include('footer.php');?>