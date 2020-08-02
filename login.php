<?php 
define("Title","Login");
define("Main","Login");
include('header.php');
?>

<!-- Content -->
	 <?php 
		if(isset($_POST['login'])){
			
			$username = trim($_POST['username']);
			$password = trim($_POST['password']);
			
			if(!empty($_POST['username']) && !empty($_POST['password'])){
				
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
				
				$check = "SELECT password FROM register WHERE username = '$username'";
				$result = mysqli_query($bus, $check);
				
					//Check can select or not
					/*if(mysqli_query($bus, $check)){
						echo "<script type='text/javascript'> alert('successfullt. Thank you!') </script>";
					}
					else{
					//If failed
					echo"<script type='text/javascript'> alert('Failed. Please try again.') </script>";
					}*/
				
				//Loop for checking password
				while($row = mysqli_fetch_assoc($result)){
					$pwCheck = trim($row['password']);
				}
				if($pwCheck == $password){
					date_default_timezone_set("Singapore");
					echo"<form method = 'POST' action='#' class='bg-white p-5 contact-form' align='center'>";
							echo"<div class='row'>";
								echo"<div class='col-3'>";
								echo"<ul class='product-category' align = 'left'>";
								echo"<table cellspacing='2' border='1' width='1330px' align='center'>";
									echo"<tr>";
										echo"<td width='380px'>";
											echo"<a href='#'><h3>Home</h3></a><br>";
										echo"</td>";
										echo"<td rowspan='6' align='center' width='600px'>";
										echo"<h2>Welcome, " . $username . "!</h2>";
										echo"<h4>Last updated at " . date('Y-m-d')." ".date('h:i:s a') . ".</h4>";
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
						

						$_SESSION['username'] = "$username";
						
				}
				else{
					echo"<script type='text/javascript'> alert('Wrong username or password! Please try again!') </script>";
					signIn();	//display again sign in page
				}
			}
			else{
				//if empty
				if(empty($_POST['username'] && !empty($_POST['password']))){
					echo"<script type='text/javascript'> alert('Username cannot be empty! Please enter again!') </script>";
				}
				if(empty($_POST['password'] && !empty($_POST['username']))){
					echo"<script type='text/javascript'> alert('Password cannot be empty! Please enter again!') </script>";
				}
				if(empty($_POST['username']) && empty($_POST['password'])){
					echo"<script type='text/javascript'> alert('Username and password cannot be empty! Please enter again!') </script>";
				}
				signIn();
			}
		}
		else{
			//Not submitted
			signIn();
		}
		
    ?>
	<!--End of content -->
	
<?php
	function signIn(){
		echo"<br>";
		echo"<br>";
		
	echo"<table border='0' width='1000px' align='center'>";
	echo"<tr>";
	echo"<th width='490px'><h2 align='center'><a href='register.php' class='active'>Register</a></h2></th>";
	echo"<th width='20px'><h2 align='center'>|</h2></th>";
	echo"<th width='490px'><h2 align='center'><a href='login.php'>Login</a></h2></th>";
	echo"</tr>";
	echo"</table>";
		echo"<table cellpadding = '1' border = '1' width= '750px' align ='center'>";
				echo"<tr>";
					echo"<th width='500px'><h2 align = 'center'>Sign in</h2></th>";
				echo"</tr>";
				
				echo"<tr>";
					echo"<td>";
						echo"<form method='POST' action='login.php' class='bg-white p-5 contact-form'>";
							echo"<div class='form-group'>";
								echo"<input type='text' class='form-control' placeholder='Username' name='username'>";
							echo"</div>";
							echo"<div class='form-group'>";
								echo"<input type='password' class='form-control' placeholder='Password' name='password' id='psinput'>";
								echo"<p align='center'><input type='checkbox' onclick='showPassword()'>Show Password</p>";
								echo"<br>";
								echo"<table cellspacing ='1' border='0'>";
									echo"<tr>";
										echo"<td width='325'><p align='left'><a href ='forgot_password.php'>Forgot password?</a></p></td>";
										echo"<td width='325'><p align='right'>New user? <a href ='register.php'>Register</a></p></td>";
									echo"</tr>";
								echo"</table>";
							echo"</div>";
							echo"<div class='form-group'>";
								echo"<p align='center'><input type='submit' value='Sign in' name='login' class='btn btn-primary py-3 px-5'></p>";
							echo"</div>";
					  
							echo"<div class='form-group'>";
							echo"<br>";
							echo"<br>";
						
							echo"<table cellspacing ='1' border='0'>";
								echo"<tr>";
									echo"<td><hr size='5' width=300px' align='left'><p>  </p></td>";
									echo"<td width='250px'><p align='center'>  or  </p></td>";
									echo"<td><p>  </p><hr size='5' width=300px' align='right'></td>";
								echo"</tr>";
							echo"</table>";
						
							echo"<table cellspacing ='1' border='0'>";
								echo"<tr>";
									echo"<td><a href= ''><input value='Facebook' class='btn btn-primary py-3 px-5' size='13px'></a></td>";
									echo"<td  width='500px'></td>";
									echo"<td><a href= ''><input value='Google' class='btn btn-primary py-3 px-5' size='13px'></a></td>";
								echo"</tr>";
							echo"</table>";
						echo"</div>";
					  echo"</td>";
					echo"</tr>";
				echo"</form>";
			echo"</table>";
			echo"<br>";
			echo"<br>";
	}
?>

<script>
	function showPassword(){
		
		
		var x = document.getElementById('psinput');
		if(x.type == 'password'){
			x.type = 'text';
		}
		else{
			x.type = 'password';
		}
	}
		</script>
		
<?php include('footer.php');?>