<?php 
define("Title","Forgot Password");
define("Main","Forgot Password");
include('header.php');
?>
<?php

	if(isset($_POST['reset'])){
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		$confirm = $_POST['confirm'];
		
		if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['confirm']) && strcmp($_POST['password'], $_POST['confirm']) == 0){
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
				
				$edit = "UPDATE register SET password = $password WHERE username = $username";
				
				if(mysqli_query($bus, $edit)){
					echo"<script type='text/javascript'> alert('Your password has been changed! Please login again.') </script>";
					echo"<script type='text/javascript'> window.location.href = 'login.php'</script>";
				}
				else{
					echo"<script type='text/javascript'> alert('Updated failed! Please try again!') </script>";
					forgotPassword();
				}
		}
		else{
			echo"<script type='text/javascript'> alert('All the fields must not be empty! Please try again!') </script>";
			forgotPassword();
		}
	}
	else{
		forgotPassword();
	}
?>

<?php
	function forgotPassword(){
		echo"<br>";
		echo"<br>";
												echo"<form method='POST' action='forgot_password.php' class='bg-white p-5 contact-form'>";
													echo"<div class='form-group'>";
														echo"<table cellspacing='2' border='0' align = 'center'>";
															echo"<tr>";
																echo"<td colspan='3'><h3 align='center'>Reset Password</h3></td>";
															echo"</tr>";
															
															echo"<tr>";
																echo"<td width='280px'><h3 align='left'>Username</h3></td>";
																echo"<td><h3>:</h3></td>";
																echo"<td width='630px'><input type='password' placeholder='Username' size = '80px' name='username'></td>";
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
												echo"</form>";
												echo"<div class='form-group'>";
													echo"<br>";
													echo"<p align='center'><input type='submit' value='Reset' name='reset' class='btn btn-primary py-3 px-5'></p>";
												echo"</div>";
			echo"<br>";
			echo"<br>";
	}
?>
<?php include('footer.php');?>