<?php 
define("Title","Admin(Delete Bus)");
define("Main","Admin(Delete Bus)");
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
									
								if(isset($_POST['delete'])){
										
										$company = trim($_POST['company']);
										
										if(!empty($_POST['company'])){
												
										$bus = mysqli_connect('localhost', 'root', '');
																			
												/*if($bus = mysqli_connect('localhost', 'root', '')){
													print'<p>Sucessfully connected to MYSQL</p>';
												}
												else{
													print'<p style = " color:red; ">Could not connect to MySQL : '.mysqli_error($bus).'</p>';
												}*/
												
												//Create database
												/*if(mysqli_query($bus, 'CREATE DATABASE product')){
													print'<p>Database successfully created</p>';
												}
												else{
													print'<p style = " color:red; ">Database did not created : '.mysqli_error($bus).'</p>';
												}*/
											mysqli_select_db($bus, 'bus');	
												/*if(mysqli_select_db($bus, 'product')){
													print'<p>Database is selected</p>';
												}
												else{
													print'<p style = " color:red; ">Database did not selected : '.mysqli_error($bus).'</p>';
												}*/
												
												$delete = "DELETE FROM bus WHERE company='$company'";
												
												//Delete
												if(mysqli_query($bus, $delete)){
													echo"<script type='text/javascript'> alert('Bus is deleted!') </script>";
												}
												else{
													echo"<script type='text/javascript'> alert('Bus is not deleted!') </script>";
												}
												mysqli_close($bus);
												deleteBus();
												
										}
										else{
											echo"<script type='text/javascript'> alert('Company Name cannot be empty! Please enter again!') </script>";
											deleteBus();
										}
										
									}
									else{
										deleteBus();
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
			function deleteBus(){
				
				echo"<div class='bg-white p-5 contact-form'>";
					echo"<table border = '1' align='center' width='750px'>";
						echo"<tr>";
							echo"<th><h2 align='center'>Delete Bus</h2></th>";
							//echo"</form>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"<form method = 'POST' action='delete.php' class='bg-white p-5 contact-form' enctype='multipart/form-data'>";
										echo"<div class='form-group'>";
											echo"<table cellspacing='2' border='0' width='600px'>";
												echo"<tr>";
													echo"<td width='300px'><h5 align='left'>Bus company</h5></td>";
													echo"<td><h5>:</h5></td>";
													echo"<td width='330px'><input type='text' placeholder='Bus company' size = '40px' name='company'></td>";
												echo"</tr>";
										echo"</table>";
									echo"</div>";
										echo"<p align='center'><input type='submit' value='Delete' name='delete' class='btn btn-primary py-3 px-5'></p>";
								echo"</form>";
							echo"</td>";
						echo"</tr>";
					echo"</table>";
					
					
			}
		?>

<?php include('footer.php');?>