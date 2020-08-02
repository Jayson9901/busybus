<?php 
define("Title","Register");
define("Main","Register");
include('header.php');
?>
	<!-- Content -->
	<?php 
			if(isset($_POST['register'])){
				
				$fname = trim($_POST['fname']);
				$lname = trim($_POST['lname']);
				$day = trim($_POST['DAY']);
				$month = trim($_POST['MONTH']);
				$year = trim($_POST['YEAR']);
				$gender = trim($_POST['gender']);
				$email = trim($_POST["email"]);
				$username = trim($_POST['username']);
				$password = trim($_POST['password']);
				$confirm = trim($_POST['confirm']);
				$contact = trim($_POST['contact']);
				$fname = str_replace(" ", "", $fname);
				$lname = str_replace(" ", "", $lname);
				$birthdate = $day.' '.$month.' '.$year;
			
				
				//If all fields not empty
				if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['DAY']) && !empty($_POST['MONTH']) && !empty($_POST['YEAR']) && !empty($_POST['gender']) && !empty($_POST["email"])
					&& !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['confirm']) && !empty($_POST['contact'])){
						
						//If meet requirements
						if(ctype_alpha($_POST['fname']) && ctype_alpha($_POST['lname']) && is_numeric($_POST['contact']) && strcmp($_POST['password'], $_POST['confirm']) == 0 
							&& (strlen((string)$_POST['contact']) >= 10 && strlen((string)$_POST['contact']) <= 11) && filter_var($email, FILTER_VALIDATE_EMAIL)){
								
								//Validate password
								$uppercase = preg_match('@[A-Z]@', $password);
								$lowercase = preg_match('@[a-z]@', $password);
								$number    = preg_match('@[0-9]@', $password);
								$specialChars = preg_match('@[^\w]@', $password);
								
								//If password not meet requirement
								if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
									echo"<script type='text/javascript'> alert('Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.! Please enter again.') </script>";
									register();
								}else{
									//If strong password and all meet requirement
									
											//Connect Database
											$bus = mysqli_connect('localhost', 'root', '');
											
												//Test conneted to database or not
												/*if($bus = mysqli_connect('localhost', 'root', '')){
													print'<p>Sucessfully connected to MYSQL</p>';
												}
												else{
													print'<p style = " color:red; ">Could not connect to MySQL : '.mysqli_error($bus).'</p>';
												}*/
												
											//Create database
											mysqli_query($bus, 'CREATE DATABASE bus');
												
												//Test database created or not
												/*if(mysqli_query($bus, 'CREATE DATABASE bus')){
													print'<p>Database successfully created</p>';
												}
												else{
													print'<p style = " color:red; ">Database did not created : '.mysqli_error($bus).'</p>';
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
												
											//Create table
											$create = "CREATE TABLE register(fname varchar(255), 
																			lname varchar(255), 
																			birthdate varchar(255), 
																			gender varchar(255), 
																			email varchar(255), 
																			contact varchar(255), 
																			username varchar(255), 
																			password varchar(255))";
												
												//Test table created or not												
												/*if(mysqli_query($bus, $create)){
													print'<p>Table is created</p>';
												}
												else{
													print'<p style = " color:red; ">Table did not created : '.mysqli_error($bus).'</p>';
												}*/
											
											//Add into database
											$query = "INSERT INTO register(fname, lname, birthdate, gender, email, contact, username, password) 
											VALUES ('$fname','$lname', '$birthdate', '$gender', '$email', '$contact', '$username', '$password')";
												
											//If add successfully
											if(mysqli_query($bus, $query)){
												echo "<script type='text/javascript'> alert('Register successfully. Thank you!');window.location.href='login.php'; </script>";
												
											}
											else{
												//If failed
												echo"<script type='text/javascript'> alert('Register failed. Please try again.') </script>";
												register();
											}
											//Close database
											mysqli_close($bus);
								}

						}
						else{
							
							//If not meet requirement
							if(!strcmp($_POST['password'], $_POST['confirm']) == 0){
							echo"<script type='text/javascript'> alert('Password and confirm password must be same! Please enter again.') </script>";
							}
							if(!ctype_alpha($_POST['fname'])){
							echo"<script type='text/javascript'> alert('First name must be in alphabets! Please enter again.') </script>";
							}
							if(!ctype_alpha($_POST['lname'])){
							echo"<script type='text/javascript'> alert('Last name must be in alphabets! Please enter again.') </script>";
							}
							if(!is_numeric($_POST['contact'])){
							echo"<script type='text/javascript'> alert('Contact number must be in numbers! Please enter again.') </script>";
							}
							if(!(strlen((string)$_POST['contact']) >= 10 && strlen((string)$_POST['contact']) <= 11)){
								echo"<script type='text/javascript'> alert('Invalid contact number! Please enter again.') </script>";
							}
							if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
							    echo"<script type='text/javascript'> alert('Invalid email! Please enter again.') </script>";
							}
							register();
						}
					
				}
				else{
					//If some or all fields empty
					echo"<script type='text/javascript'> alert('All of these fields must not be empty! Please enter again.') </script>";
					register();
				}
			}
			else{
				register();
			}	
        ?>
	<!-- End of content -->
	
<?php
	function register(){
		//Form
		echo"<br>";
		echo"<br>";

	echo"<table border='0' width='1000px' align='center'>";
	echo"<tr>";
	echo"<th width='490px'><h2 align='center'><a href='register.php' class='active'>Register</a></h2></th>";
	echo"<th width='20px'><h2 align='center'>|</h2></th>";
	echo"<th width='490px'><h2 align='center'><a href='login.php'>Login</a></h2></th>";
	echo"</tr>";
	echo"</table>";
		echo"<table cellpadding = '1' border = '1' width= '1000px' align ='center'>";
				echo"<tr color='#908181'>";
				echo"<td align = 'center' width='500px'><h2>Register / Sign up</h2></td>";
				echo"</tr>";
					
					echo"<tr>";
					echo"<td>";
					
					echo"<form method='POST' action='#' class='bg-white p-5 contact-form'>";
						echo"<div class='form-group'>";
							echo"<table cellspacing='2' border='0'>";
								echo"<tr>";
									echo"<td width='280px'><h3 align='left'>First Name</h3></td>";
									echo"<td><h3>:</h3></td>";
									echo"<td width='630px'><input type='text' placeholder='First Name' size = '80px' name='fname'></td>";
								echo"</tr>";
						
								echo"<tr>";
									echo"<td width='280px'><h3 align='left'>Last Name</h3></td>";
									echo"<td><h3>:</h3></td>";
									echo"<td width='630px'><input type='text' placeholder='Last Name' size = '80px' name='lname'></td>";
								echo"</tr>";
					
								echo"<tr>";
									echo"<td width='280px'><h3 align='left'>Date of Birth</h3></td>";
									echo"<td><h3>:</h3></td>";
									echo"<td width='630px'>";
										echo"<table border ='0'>";
											echo"<tr>";
												echo"<td width = '190px'><p><select name='DAY' align='center' style='width:207px'>";
												echo"<option>Day</option>";
												for($d = 1; $d <= 31; $d++){
													echo"<option value = '$d'>$d</option>";
												}
												echo"</select><p></td>";
											
											echo"<td width = '210px'><p><select name='MONTH' align='center' style='width:207px'>";
												echo"<option>Month</option>";
												echo"<option value='January'>January</option>";
												echo"<option value='February'>February</option>";
												echo"<option value='March'>March</option>";
												echo"<option value='April'>April</option>";
												echo"<option value='May'>May</option>";
												echo"<option value='June'>June</option>";
												echo"<option value='July'>July</option>";
												echo"<option value='August'>August</option>";
												echo"<option value='September'>September</option>";
												echo"<option value='October'>October</option>";
												echo"<option value='November'>November</option>";
												echo"<option value='December'>December</option>";
											echo"</select><p></td>";
											
											echo"<td width = '190px'><p><select name='YEAR' align='center' style='width:207px'>";
												echo"<option>Year</option>";
												for($y = 1900; $y <= 2020; $y++){
													echo"<option value = '$y'>$y</option>";
												}
											echo"</select><p></td>";
										echo"</tr>";
									echo"</table>";
								echo"</tr>";
						
								echo"<tr>";
									echo"<td width='280px'><h3 align='left'>Gender</h3></td>";
									echo"<td><h3>:</h3></td>";
									echo"<td width='630px'>";
										echo"<table border='0'>";
											echo"<tr>";
												echo"<td width='300px' align='center'>";
													echo"<input type='radio' id='male' name='gender' value='male'>";
													echo"<label for='male'>Male</label>";
												echo"</td>";
												echo"<td width='300px' align='center'>";
													echo"<input type='radio' id='female' name='gender' value='female'>";
													echo"<label for='female'>Female</label>";
												echo"</td>";
											echo"</tr>";
										echo"</table>";
									echo"</td>";
								echo"</tr>";
						
								echo"<tr>";
									echo"<td width='280px'><h3 align='left'>E-mail Address</h3></td>";
									echo"<td><h3>:</h3></td>";
									echo"<td width='630px'><input type='text' placeholder='E-mail Address' size = '80px' name='email'></td>";
								echo"</tr>";
								
								echo"<tr>";
									echo"<td width='280px'><h3 align='left'>Contact Number</h3></td>";
									echo"<td><h3>:</h3></td>";
									echo"<td width='630px'><input type='text' placeholder='Contact Number (For exp: 0123456789)' size = '80px' name='contact'></td>";
								echo"</tr>";

								echo"<tr>";
									echo"<td width='280px'><h3 align='left'>Username</h3></td>";
									echo"<td><h3>:</h3></td>";
									echo"<td width='630px'><input type='text' placeholder='Username' size = '80px' name='username'></td>";
								echo"</tr>";
								
								echo"<tr>";
									echo"<td width='280px'><h3 align='left'>Password</h3></td>";
									echo"<td><h3>:</h3></td>";
									echo"<td width='630px'><input type='password' placeholder='Password' size = '80px' name='password'></td>";
								echo"</tr>";
								
								echo"<tr>";
									echo"<td width='280px'><h3 align='left'>Password</h3></td>";
									echo"<td><h3>:</h3></td>";
									echo"<td width='630px'><input type='password' placeholder='Confirm password' size = '80px' name='confirm'></td>";
								echo"</tr>";
							echo"</td>";
						echo"</table>";
						echo"<p align='center'><input type='checkbox' onclick='showPassword()'>Show Password</p>";
					echo"</div>";

					echo"<div class='form-group'>";
						echo"<br>";
						echo"<p align='right'>Have an account? <a href ='sign in.php'>Sign in</a></p>";
						echo"<p align='center'><input type='submit' value='Sign up' name='register' class='btn btn-primary py-3 px-5'></p>";
					echo"</div>";

				 echo"</table>";
				echo"</div>";
			  echo"</form>";
			 echo"</td>";
			echo"</tr>";
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