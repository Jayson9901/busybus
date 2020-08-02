<?php 
define("Title","Admin(Settings)");
define("Main","Admin(Settings)");
include('header.php');
?>

<?php
		
			echo"<br><br>";
						echo"<table cellspacing='2' border='1' width='1330px' align='center'>";
							echo"<tr>";
								echo"<td width='380px'>";
									echo"<h3><a href=''>My Admin</a><br></h3>";
								echo"</td>";
								echo"<td rowspan='5' align='center'>";
									if(isset($_POST['Submit'])) {
					
					$padmin = trim($_POST['padmin']);
					$admin = trim($_POST['admin']);
					$adminPassword = trim($_POST['adminPassword']);
					$confirm = trim($_POST['confirm']);
					
					if(!empty($_POST['admin']) && !empty($_POST['adminPassword']) && !empty($_POST['padmin']) && !empty($_POST['confirm'])){
						if(strcmp($_POST['adminPassword'], $_POST['confirm']) == 0 ){
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
							
							$query = "UPDATE admin SET admin = '$admin', password = '$password' WHERE admin = '$padmin'";
							
							
							//Check can select or not
							if(mysqli_query($bus, $quety)){
								echo "<script type='text/javascript'> alert('Admin profile updated successfully. Thank you!') </script>";
							}
							else{
							//If failed
								echo"<script type='text/javascript'> alert('Admin profile updated fail. Please try again.') </script>";
							}
							
							
							
								echo"<br><br>";
								echo"<table cellspacing='2' border='1' width='1330px' align='center'>";
									echo"<tr>";
										echo"<td width='380px'>";
											echo"<h3><a href=''>My Admin</a><br></h3>";
										echo"</td>";
										echo"<td rowspan='5' align='center'>";
											echo"<h2>Welcome, Admin!</h2>";
											echo"<h4>Last updated at (+" . date_default_timezone_set("Singapore"); echo ") " . date('Y-m-d')." ".date('h:i:s a') . ".</h4>";
											echo"<img src='images/bus_2.jpg' alt='Welcome' width='650px' height='400px'>";
											
										echo"</td>";								
									echo"</tr>";
									echo"<tr>";
										echo"<td width='280px'>";
											echo"<h3><a href='addBus.php'>Add buses</a><br></h3>";
										echo"</td>";
									echo"</tr>";
									echo"<tr>";
										echo"<td width='280px'>";
											echo"<h3><a href='viewBus.php'>View buses</a><br></h3>";
										echo"</td>";
									echo"</tr>";
									echo"<tr>";
										echo"<td width='280px'>";
											echo"<h3><a href='adminSetting.php'>Admin settings</a><br></h3>";
										echo"</td>";
									echo"</tr>";
									echo"<tr>";
										echo"<td width='280px'>";
											echo"<h3><a href='logout.php'>Log Out</a><br></h3>";
										echo"</td>";
									echo"</tr>";
								echo"</table>";
							echo"<br><br>";
									
									//session_start();
									//$_SESSION['username'] = '$_POST[username]';
						}
						else{
							echo"<script type='text/javascript'> alert('New password and confirm password must be same.') </script>";
							editAdmin();
						}
							
						
						
					}
					else{
						echo"<script type='text/javascript'> alert('Please enter admin and password.') </script>";
						editAdmin();
					}
				}
				else{
					editAdmin();
				}
								echo"</td>";								
							echo"</tr>";
							echo"<tr>";
								echo"<td width='280px'>";
									echo"<h3><a href='addBus.php'>Add buses</a><br></h3>";
								echo"</td>";
							echo"</tr>";
							echo"<tr>";
								echo"<td width='280px'>";
									echo"<h3><a href='viewBus.php'>View buses</a><br></h3>";
								echo"</td>";
							echo"</tr>";
							echo"<tr>";
								echo"<td width='280px'>";
									echo"<h3><a href='adminSetting.php'>Admin settings</a><br></h3>";
								echo"</td>";
							echo"</tr>";
							echo"<tr>";
								echo"<td width='280px'>";
									echo"<h3><a href='logout.php'>Log Out</a><br></h3>";
								echo"</td>";
							echo"</tr>";
						echo"</table>";
					echo"</ul>";
				echo"</div>";
			echo"</div>";
		echo"<br><br>";
					
?>

<?php
			function editAdmin(){

				echo"<br><br>";
					echo"<table border = '1' align='center'>";
						echo"<tr>";
							echo"<th><h2 align='center'>My Admin</h2></th>";
							//echo"</form>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"<form method = 'POST' action='adminSetting.php' class='bg-white p-5 contact-form'>";
										echo"<div class='form-group'>";
											echo"<table cellspacing='2' border='0'>";
												echo"<tr>";
													echo"<td width='280px'><h3 align='left'>Prevoius Admin</h3></td>";
													echo"<td><h3>:</h3></td>";
													echo"<td width='630px'><input type='text' placeholder='Admin' size = '80px' name='padmin'></td>";
												echo"</tr>";
												echo"<tr>";
													echo"<td width='280px'><h3 align='left'>New Admin</h3></td>";
													echo"<td><h3>:</h3></td>";
													echo"<td width='630px'><input type='text' placeholder='Admin' size = '80px' name='admin'></td>";
												echo"</tr>";
												echo"<tr>";
													echo"<td width='280px'><h3 align='left'>New Password</h3></td>";
													echo"<td><h3>:</h3></td>";
													echo"<td width='630px'><input type='password' placeholder='New Password' size = '80px' name='adminPassword' id='adminPassword'></td>";
												echo"</tr>";
												echo"<tr>";
													echo"<td width='280px'><h3 align='left'>New Password</h3></td>";
													echo"<td><h3>:</h3></td>";
													echo"<td width='630px'><input type='password' placeholder='Confirm Password' size = '80px' name='adminPassword' id='confirm'></td>";
												echo"</tr>";
										echo"</table>";
									echo"</div>";
									echo"<p align='center'><input type='submit' value='Submit' name='Submit' class='btn btn-primary py-3 px-5'></p>";
								echo"</form>";
							echo"</td>";
						echo"</tr>";
					echo"</table>";
				echo"<br><br>";

			}
		?>

<?php include('footer.php');?>