<?php 
define("Title","Admin(Edit Bus)");
define("Main","Admin(Edit Bus)");
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
									
							if(isset($_POST['Update'])){
										$pcompany = trim($_POST['pcompany']);
										$company = trim($_POST['company']);
										$departurelocation = trim($_POST['departurelocation']);
										$date = trim($_POST['date']);
										$destination = trim($_POST['Destinations']);
										$departurettime = trim($_POST['departurettime']);
										$arrivaltime = trim($_POST['arrivaltime']);
										$seats = trim($_POST['seats']);
										$adult = trim($_POST['adult']);
										$children = trim($_POST['children']);
										$duration = trim($_POST['duration']);
										$company = str_replace(" ", "", $company);
										$file = addslashes(file_get_contents($_FILES['image']['tmp_name']));
								
										if(!empty($_POST['company']) && !empty($_POST['departurelocation']) && !empty($_POST['Destinations']) && !empty($_POST['departurettime']) && !empty($_POST['seats']) 
											&& !empty($_POST['adult']) && !empty($_POST['children']) && !empty($_POST['departurelocation']) && !empty($_POST['arrivaltime']) && !empty($_POST['pcompany']) && !empty($_POST('date'))){
											if(is_numeric($_POST['arrivaltime']) && is_numeric($_POST['departurettime']) && is_numeric($_POST['seats']) && is_numeric($_POST['adult']) 
												&& is_numeric($_POST['children']) && is_numeric($_POST['duration']) && strlen((string)$_POST['departurettime']) == 4 &&  strlen((string)$_POST['arrivaltime']) == 4 
												&& strlen((string)$_POST['duration']) == 4 && $_POST['seats'] < 50 && $_POST['adult'] < 100 && $_POST['children'] < 100 & strlen((string)$_POST['date'] == 5)){
												
												$departurehrs = substr("$departurettime", 0, 2);
												$departuremin = substr("$departurettime", 2, 4);
												$arrivalhrs = substr("$arrivaltime", 0, 2);
												$arrivalmin = substr("$arrivaltime", 2, 4);
												$durationhrs = substr("$duration", 0, 2);
												$durationmin = substr("$duration", 2, 4);
												$day = substr("$date", 0, 2);
												$month = substr("$date", 3, 5);
												
											if($departurehrs < 24 && $arrivalhrs < 24 && $durationhrs < 24 && $departuremin < 60 && $arrivalmin < 60 && $arrivalmin < 60 && $day <= 31 && $month <= 12){
													$departurettime = $departurehrs . ' : ' . $departuremin;
													$arrivaltime = $arrivalhrs . ' : ' . $arrivalmin;
													$duration = $durationhrs . ' hrs ' . $durationmin . ' min ';
													$date = $day . '/' . $month . '/2020';
													
													//Check connection
													$bus = mysqli_connect('localhost', 'root', '');
													
														//Check connection
														/*if($bus = mysqli_connect('localhost', 'root', '')){
															print'<p>Sucessfully connected to MYSQL</p>';
														}
														else{
															print'<p style = " color:red; ">Could not connect to MySQL : '.mysqli_error($bus).'</p>';
														}*/
													
													//Create database
													mysqli_query($bus, 'CREATE DATABASE bus');
													
														//Check database created or not
														/*if(mysqli_query($bus, 'CREATE DATABASE bus')){
															print'<p>Database successfully created</p>';
														}
														else{
															print'<p style = " color:red; ">Database did not created : '.mysqli_error($bus).'</p>';
														}*/
													
													//Select database
													mysqli_select_db($bus, 'bus');
												
														//Check if select database
														/*if(mysqli_select_db($bus, 'bus')){
															print'<p>Database is selected</p>';
														}
														else{
															print'<p style = " color:red; ">Database did not selected : '.mysqli_error($bus).'</p>';
														}*/
													
													//create table
													$create = "CREATE TABLE bus(company varchar(255), 
																				departure_location varchar(255), 
																				destination varchar(255),
																				date varchar(255),																	
																				departure_time varchar(255), 
																				arrival_time varchar(255), 
																				seats int, 
																				adult_ticket varchar(255),
																				children_ticket varchar(255),
																				duration varchar(255),
																				bus_image BLOB)";
													
													//add bus
													$query = "UPDATE bus SET company = '$company', departure_location = '$departurelocation', destination = '$destination', date = '$date', departure_time = '$departurettime', 
													arrival_time = '$arrivaltime', seats = '$seats',adult_ticket = '$adult', children_ticket = '$children', duration = '$duration', bus_image = '$file'
													WHERE company = '$pcompany'";
													
														//Test table created or not												
														/*if(mysqli_query($bus, $create)){
															print'<p>Table is created</p>';
														}
														else{
															print'<p style = " color:red; ">Table did not created : '.mysqli_error($bus).'</p>';
														}*/
													
													if(mysqli_query($bus, $query)){
														echo"<script type='text/javascript'> alert('Bus information has been updated..') </script>";
													}
													else{
														//print'//<p style = " color:red; ">Record inserted failed: '.mysqli_error($bus).'</p>';
														echo"<script type='text/javascript'> alert('Bus information updated failed.') </script>";
													}
													mysqli_close($bus);
													editBus();
												}
												else{
													echo"<script type='text/javascript'> alert('Invalid departure time, arrival time or duration. Please enter again!') </script>";
													editBus();
												}
												
												
											}
											else{
												if(!(is_numeric($_POST['arrivaltime'])) || strlen((string)$_POST['arrivaltime']) != 4){
													echo"<script type='text/javascript'> alert('Invalid arrival time. Please try again.') </script>";
												}
												if(!(is_numeric($_POST['departurettime'])) || strlen((string)$_POST['departurettime']) != 4){
													echo"<script type='text/javascript'> alert('Invalid departure time. Please try again.') </script>";
												}
												if(!(is_numeric($_POST['duration'])) || strlen((string)$_POST['duration']) != 4){
													echo"<script type='text/javascript'> alert('Invalid Duration. Please try again.') </script>";
												}
												if(!(is_numeric($_POST['seats']))){
													echo"<script type='text/javascript'> alert('Seats no must be in number format. Please try again.') </script>";
												}
												if(!(is_numeric($_POST['adult']))){
													echo"<script type='text/javascript'> alert('Adult ticket price must be in number format. Please try again.') </script>";
												}
												if(!(is_numeric($_POST['children']))){
													echo"<script type='text/javascript'> alert('>Children ticket price must be in number format. Please try again.') </script>";
												}
												if(strlen((string)$_POST['date']) != 5){
													echo"<script type='text/javascript'> alert('Invalid Date. Please try again.') </script>";
												}
												
												editBus();
											}
										}
										else{
											echo"<script type='text/javascript'> alert('All fields must not be empty. Please try again.') </script>";
											editBus();
										}
							
									}
									else{
										editBus();
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
			function editBus(){
				
				echo"<div class='bg-white p-5 contact-form'>";
					echo"<table border = '1' align='center' width='750px'>";
						echo"<tr>";
							echo"<th><h2 align='center'>Edit Bus</h2></th>";
							//echo"</form>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"<form method = 'POST' action='edit.php' class='bg-white p-5 contact-form' enctype='multipart/form-data'>";
										echo"<div class='form-group'>";
											echo"<table cellspacing='2' border='0' width='600px'>";
												echo"<tr>";
													echo"<td width='300px'><h5 align='left'>Previous Bus company</h5></td>";
													echo"<td><h5>:</h5></td>";
													echo"<td width='330px'><input type='text' placeholder='Previous Bus company' size = '40px' name='pcompany'></td>";
												echo"</tr>";
												echo"<tr>";
													echo"<td width='230px'><h5 align='left'>New Bus company</h5></td>";
													echo"<td><h5>:</h5></td>";
													echo"<td width='330px'><input type='text' placeholder='New Bus company' size = '40px' name='company'></td>";
												echo"</tr>";
												echo"<tr>";
													echo"<td width='230px'><h5 align='left'>New Departure Location</h5></td>";
													echo"<td><h5>:</h5></td>";
													echo"<td width='330px'><input type='text' placeholder='New Departure Location' size = '40px' name='departurelocation'></td>";
												echo"</tr>";
												echo"<tr>";
													echo"<td width='230px'><h5 align='left'>New Destinations</h5></td>";
													echo"<td><h5>:</h5></td>";
													echo"<td width='330px'><input type='text' placeholder='New Destinations' size = '40px' name='Destinations'></td>";
												echo"</tr>";
												echo"<tr>";
													echo"<td width='230px'><h5 align='left'>New Departure Date</h5></td>";
													echo"<td><h5>:</h5></td>";
													echo"<td width='330px'><input type='text' placeholder='New Departure Date (For exp: 02/08)' size = '40px' name='date'></td>";
												echo"</tr>";
												echo"<tr>";
													echo"<td width='230px'><h5 align='left'>New Departure Time</h5></td>";
													echo"<td><h5>:</h5></td>";
													echo"<td width='330px'><input type='text' placeholder='New Departure Time (For exp : 0536)' size = '40px' name='departurettime'></td>";
												echo"</tr>";
												echo"<tr>";
													echo"<td width='230px'><h5 align='left'>New Arrival Time</h5></td>";
													echo"<td><h5>:</h5></td>";
													echo"<td width='330px'><input type='text' placeholder='New Arrival Time (For exp : 0536)' size = '40px' name='arrivaltime'></td>";
												echo"</tr>";
												echo"<tr>";
													echo"<td width='230px'><h5 align='left'>New Seats Available</h5></td>";
													echo"<td><h5>:</h5></td>";
													echo"<td width='330px'><input type='text' placeholder='New Seats Available' size = '40px' name='seats'></td>";
												echo"</tr>";
												echo"<tr>";
													echo"<td width='230px'><h5 align='left'>New Ticket Price (Adults)</h5></td>";
													echo"<td><h5>:</h5></td>";
													echo"<td width='330px'><input type='text' placeholder='New Ticket Price (Adults)' size = '40px' name='adult'></td>";
												echo"</tr>";
												echo"<tr>";
													echo"<td width='230px'><h5 align='left'>New Ticket Price (Children)</h5></td>";
													echo"<td><h5>:</h5></td>";
													echo"<td width='330px'><input type='text' placeholder='New Ticket Price (Children)' size = '40px' name='children'></td>";
												echo"</tr>";
												echo"<tr>";
													echo"<td width='230px'><h5 align='left'>New Estimation Duration</h5></td>";
													echo"<td><h5>:</h5></td>";
													echo"<td width='330px'><input type='text' placeholder='New Estimation Duration (For exp : 0536)' size = '40px' name='duration'></td>";
												echo"</tr>";
												echo"<tr>";
													echo"<td width='230px'><h5 align='left'>New Bus Image</h5></td>";
													echo"<td><h5>:</h5></td>";
													echo"<td width='330px'><input type='file' size = '40px' name='image'></td>";
												echo"</tr>";
										echo"</table>";
									echo"</div>";
										echo"<p align='center'><input type='submit' value='Edit' name='Update' class='btn btn-primary py-3 px-5'></p>";
								echo"</form>";
							echo"</td>";
						echo"</tr>";
					echo"</table>";
					
					
			}
		?>

<?php include('footer.php');?>