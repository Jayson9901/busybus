<?php 
define("Title","Career(Job)");
define("Main","Career(Job)");
include('header.php');
?>
	  
	<!-- Content -->
	<?php
		if(isset($_POST['career'])){
			
		$fname = trim($_POST['fname']);
		$lname = trim($_POST['lname']);
		$ic = trim($_POST['ic']);
		$contact = trim($_POST['contact']);
		$day = trim($_POST['DAY']);
		$month = trim($_POST['MONTH']);
		$year = trim($_POST['YEAR']);
		$gender = trim($_POST['gender']);
		$email = trim($_POST['email']);
		$mail = trim($_POST['mail']);
		$postcode = trim($_POST['postcode']);
		$state = trim($_POST['STATE']);
		$country = 'Malaysia';
		$position = trim($_POST['POSITION']);
		$interest = trim($_POST['interest']);
		$fname = str_replace(" ", "", $fname);
		$lname = str_replace(" ", "", $lname);
		$birthdate = $day.' '.$month.' '.$year;
		$address = $mail. ',' .$postcode. ',' .$state. ',' .$country;
		
			if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['ic']) && !empty($_POST['contact']) && !empty($_POST['DAY']) && !empty($_POST['MONTH']) 
				&& !empty($_POST['YEAR']) && !empty($_POST['gender']) && !empty($_POST['email']) && !empty($_POST['mail']) && !empty($_POST['postcode']) 
				&& !empty($_POST['STATE']) && !empty($_POST['POSITION']) && !empty($_POST['interest'])){
					
					if(ctype_alpha($_POST['fname']) && ctype_alpha($_POST['lname']) && is_numeric($_POST['postcode']) && is_numeric($_POST['contact']) 
						&& (strlen((string)$_POST['contact']) >= 10 && strlen((string)$_POST['contact']) <= 11) && strlen((string)$_POST['postcode']) == 5 
						&& strlen((string)$_POST['ic']) == 12 && is_numeric($_POST['ic']) && filter_var($email, FILTER_VALIDATE_EMAIL)){
							
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
											$create = "CREATE TABLE career(fname varchar(255), 
																			lname varchar(255),
																			ic int(12),
																			contact varchar(255),																			
																			birthdate varchar(255), 
																			gender varchar(255), 
																			email varchar(255), 
																			address varchar(255), 
																			position varchar(255), 
																			interest varchar(255))";
												
												//Test table created or not												
												/*if(mysqli_query($bus, $create)){
													print'<p>Table is created</p>';
												}
												else{
													print'<p style = " color:red; ">Table did not created : '.mysqli_error($bus).'</p>';
												}*/
											
											//Add into database
											$query = "INSERT INTO career(fname, lname, ic, contact, birthdate, gender, email, address, position, interest) 
											VALUES ('$fname','$lname', '$ic', $contact, '$birthdate', '$gender', '$email', '$address', '$position', '$interest')";
												
											//If add successfully
											if(mysqli_query($bus, $query)){
												echo "<script type='text/javascript'> alert('Your job application had been submitted successfully. Thank you!') </script>";
												career();
											}
											else{
												//If failed
												echo"<script type='text/javascript'> alert('Your job application failed to submit. Please try again.') </script>";
												//print'<p style = " color:red; ">fail : '.mysqli_error($bus).'</p>';
												career();
											}
											//Close database
											mysqli_close($bus);

						}
						else{
							if(!ctype_alpha($_POST['fname'])){
								echo"<script type='text/javascript'> alert('First name must be in alphabets! Please enter again.') </script>";
							}
							if(!ctype_alpha($_POST['lname'])){
								echo"<script type='text/javascript'> alert('Last name must be in alphabets! Please enter again.') </script>";
							}
							if(!is_numeric($_POST['postcode'])){
								echo"<script type='text/javascript'> alert('Postcode must be in numbers! Please enter again.') </script>";
							}
							if(!is_numeric($_POST['contact'])){
								echo"<script type='text/javascript'> alert('Contact number must be in numbers! Please enter again.') </script>";
							}
							if(!(strlen((string)$_POST['contact']) >= 10 && strlen((string)$_POST['contact']) <= 11)){
								echo"<script type='text/javascript'> alert('Invalid contact number! Please enter again.') </script>";
							}
							if(!strlen((string)$_POST['postcode']) == 5){
								echo"<script type='text/javascript'> alert('Invalid postcode! Please enter again.') </script>";
							}
							if(!strlen((string)$_POST['ic']) == 12 || !is_numeric($_POST['ic'])){
								echo"<script type='text/javascript'> alert('Invalid IC number! Please enter again.') </script>";
							}
							if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
							    echo"<script type='text/javascript'> alert('Invalid email! Please enter again.') </script>";
							}
							career();
						}
				
			}
			else{
				echo"<script type='text/javascript'> alert('All of the fields must not be empty! Please enter again.') </script>";
				career();
			}
		}
		else{
			career();
		}
	?>
	<!-- End of content -->
	
	<?php
		function career(){
			echo"<br><br>";
			echo"<table border='0' width='1000px' align='center'>";
			echo"<tr>";
			echo"<th width='490px'><h2 align='center'><a href='career.php' class='active'>Our Career</a></h2></th>";
			echo"<th width='20px'><h2 align='center'>|</h2></th>";
			echo"<th width='490px'><h2 align='center'><a href='job.php'>Join Us</a></h2></th>";
			echo"</tr>";
			echo"</table>";
			 echo"<section class='ftco-section contact-section bg-light'>";
			  echo"<div class='container'>";
			  echo"<table cellpadding = '1' border = '1' width= '1000px' align ='center'>";
				echo"<tr>";
				echo"<td align = 'center' width='500px'><h2>Career</h2></td>";
				echo"</tr>";
					
					echo"<tr>";
					echo"<td>";
					
					echo"<form action='job.php' method='POST' class='bg-white p-5 contact-form'>";
						echo"<div class='form-group'>";
							echo"<table cellspacing='2' border='0'>";
								echo"<tr>";
									echo"<td width='280px'><h3 align='left'>First Name</h3></td>";
									echo"<td><h3>:</h3></td>";
									echo"<td width='630px'><input type='text' placeholder='First Name' name='fname' size = '80px'></td>";
								echo"</tr>";
						
								echo"<tr>";
									echo"<td width='280px'><h3 align='left'>Last Name</h3></td>";
									echo"<td><h3>:</h3></td>";
									echo"<td width='630px'><input type='text' placeholder='Last Name' name='lname' size = '80px'></td>";
								echo"</tr>";
								
								echo"<tr>";
									echo"<td width='280px'><h3 align='left'>I/C Number</h3></td>";
									echo"<td><h3>:</h3></td>";
									echo"<td width='630px'><input type='text' placeholder='I/C Number' name='ic' size = '80px'></td>";
								echo"</tr>";
								
								echo"<tr>";
									echo"<td width='280px'><h3 align='left'>Contact Number</h3></td>";
									echo"<td><h3>:</h3></td>";
									echo"<td width='630px'><input type='text' placeholder='Contact Number' name='contact' size = '80px'></td>";
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
												for($y = 2020; $y >= 1900; $y--){
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
									echo"<td width='630px'><input type='text' placeholder='E-mail Address' name='email' size = '80px'></td>";
									echo"</tr>";
									
								echo"<tr>";
									echo"<td width='280px'><h3 align='left'>Mailing Address</h3></td>";
									echo"<td><h3>:</h3></td>";
									echo"<td width='630px'><input type='text' placeholder='Mailing Address' name='mail' size = '80px'></td>";
								echo"</tr>";
									
								echo"<tr>";
									echo"<td width='280px'><h3 align='left'>Postcode</h3></td>";
									echo"<td><h3>:</h3></td>";
									echo"<td width='630px'><input type='text'  placeholder='Postcode' name='postcode' size = '80px'></td>";
								echo"</tr>";
									
								echo"<tr>";
									echo"<td width='280px'><h3 align='left'>State</h3></td>";
									echo"<td><h3>:</h3></td>";
									echo"<td width='630px'>";
										echo"<table border ='0'>";
											echo"<tr>";
												echo"<td width = '190px'><p><select name='STATE' align='center' style='width:623px'>";
													echo"<option>State</option>";
													echo"<option value='Johor'>Johor</option>";
													echo"<option value='Kedah'>Kedah</option>";
													echo"<option value='Kelantan'>Kelantan</option>";
													echo"<option value='Negeri Sembilan'>Negeri Sembilan</option>";
													echo"<option value='Pahang'>Pahang</option>";
													echo"<option value='Penang'>Penang</option>";
													echo"<option value='Perak'>Perak</option>";
													echo"<option value='Perlis'>Perlis</option>";
													echo"<option value='Sabah'>Sabah</option>";
													echo"<option value='Sarawak'>Sarawak</option>";
													echo"<option value='Selangor'>Selangor</option>";
													echo"<option value='Terengganu'>Terengganu</option>";
												echo"</select><p></td>";
											echo"</tr>";
									echo"</td>";
								echo"</table>";
						
								echo"<tr>";
									echo"<td width='280px'><h3 align='left'>Country</h3></td>";
									echo"<td><h3>:</h3></td>";
									echo"<td width='630px'><h4 align='left'>  &nbsp;Malaysia&nbsp;&nbsp; <font color='red'>*Only Malaysians are applicable*</font></h4></td>";
								echo"</tr>";
								
								echo"<tr>";
									echo"<td width='280px'><h3 align='left'>Position</h3></td>";
									echo"<td><h3>:</h3></td>";
									echo"<td width='630px'>";
										echo"<table border ='0'>";
											echo"<tr>";
												echo"<td width = '190px'><p><select name='POSITION' align='center' style='width:623px'>";
													echo"<option>Position</option>";
													echo"<option value='Admin'>Admin</option>";
													echo"<option value='Transport Coordinator'>Transport Coordinator</option>";
													echo"<option value='Cashier'>Cashier</option>";
													echo"<option value='IT Specialist'>IT Specialist</option>";
													echo"<option value='Driver'>Driver</option>";
												echo"</select><p></td>";
											echo"</tr>";
										echo"</table>";
									echo"</td>";
								echo"</tr>";
							echo"</td>";
						echo"</table>";
					echo"</div>";
					
					echo"<div class='form-group'>";
					  echo"<br>";
					  echo"<br>";
					  echo"<h4 align='left'>In 200 words, introduce yourself and express why you interest to become one of us.</h4>";
					  echo"<textarea name='interest' id='' cols='30' rows='7' class='form-control' placeholder='In 200 words, introduce yourself and express why you interest to become one of us.'></textarea>";
					echo"</div>";

					echo"<div class='form-group'>";
						echo"<br>";
						echo"<p align='center'><input type='submit' value='Submit' name='career' class='btn btn-primary py-3 px-5'></p>";
					echo"</div>";

				 echo"</table>";
				echo"</div>";
			  echo"</form>";
			 echo"</td>";
			echo"</tr>";
		echo"</section>";
		}
	?>
	
	<?php include'footer.php';?>