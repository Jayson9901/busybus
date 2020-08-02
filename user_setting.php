<?php 
define("Title","User(Settings)");
define("Main","User(Settings)");
include('header.php');
?>

<!-- Content -->
	 <?php 
		if(isset($_POST['update'])){
			$pusername = trim($_POST['pusername']);
			$email = trim($_POST['email']);
			$contact = trim($_POST['contact']);
			$username = trim($_POST['username']);
			$password = trim($_POST['password']);
			$confirm = trim($_POST['confirm']);
			
			if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['username'])){
				
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
				
				$edit = "UPDATE register SET username = '$username', email = '$email', contact = '$contact', password = '$password' WHERE username = $pusername";
				
				if(mysqli_query($bus, $edit)){
					echo"<script type='text/javascript'> alert('Your profile has been updated! Please login again.') </script>";
					echo"<script type='text/javascript'> window.location.href = 'login.php'</script>";
				}
				else{
					echo"<script type='text/javascript'> alert('Updated failed! Please try again!') </script>";
					register();
				}
						
			}
			else{
				//if empty
				echo"<script type='text/javascript'> alert('All the fields must not be empty! Please try again.') </script>";
				register();
			}
		}
		else{
			//Not submitted
			register();
		}
		
    ?>
	<!--End of content -->

<?php
	function register(){
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
										echo"<table cellpadding = '1' border = '1' width= '1000px' align ='center'>";
											echo"<tr>";
											echo"<td align = 'center' width='500px'><h2>Edit Profile</h2></td>";
											echo"</tr>";
												
												echo"<tr>";
												echo"<td>";
												
												echo"<form method='POST' action='user_setting.php' class='bg-white p-5 contact-form'>";
													echo"<div class='form-group'>";
														echo"<table cellspacing='2' border='0'>";
															echo"<tr>";
																echo"<td width='280px'><h3 align='left'>Previous Username</h3></td>";
																echo"<td><h3>:</h3></td>";
																echo"<td width='630px'><input type='text' placeholder='Previous Username' size = '80px' name='pusername'></td>";
															echo"</tr>";
															
															echo"<tr>";
																echo"<td width='280px'><h3 align='left'>New Username</h3></td>";
																echo"<td><h3>:</h3></td>";
																echo"<td width='630px'><input type='text' placeholder='New Username' size = '80px' name='username'></td>";
															echo"</tr>";
															
															echo"<tr>";
																echo"<td width='280px'><h3 align='left'>New E-mail Address</h3></td>";
																echo"<td><h3>:</h3></td>";
																echo"<td width='630px'><input type='text' placeholder='New E-mail Address' size = '80px' name='email'></td>";
															echo"</tr>";
															
															echo"<tr>";
																echo"<td width='280px'><h3 align='left'>New Contact Number</h3></td>";
																echo"<td><h3>:</h3></td>";
																echo"<td width='630px'><input type='text' placeholder='New Contact Number (For exp: 0123456789)' size = '80px' name='contact'></td>";
															echo"</tr>";

															echo"<tr>";
																echo"<td width='280px'><h3 align='left'>New Password</h3></td>";
																echo"<td><h3>:</h3></td>";
																echo"<td width='630px'><input type='password' placeholder='New Password' size = '80px' name='password'></td>";
															echo"</tr>";
															
															echo"<tr>";
																echo"<td width='280px'><h3 align='left'>New Password</h3></td>";
																echo"<td><h3>:</h3></td>";
																echo"<td width='630px'><input type='password' placeholder='Confirm password' size = '80px' name='confirm'></td>";
															echo"</tr>";
														echo"</td>";
													echo"</table>";
													
												echo"</div>";

												echo"<div class='form-group'>";
													echo"<br>";
													echo"<p align='center'><input type='submit' value='Submit' name='update' class='btn btn-primary py-3 px-5'></p>";
												echo"</div>";

											 echo"</table>";
											echo"</div>";
										  //echo"</form>";
										 echo"</td>";
										echo"</tr>";
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
		
		//Form
		
		
		
	}
?>



		
<?php include('footer.php');?>