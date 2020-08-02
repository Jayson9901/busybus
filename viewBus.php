<?php 
define("Title","Admin(View Bus)");
define("Main","Admin(View Bus)");
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
									
							$count = '1';
							
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
							
							
							
							
							echo"<table border = '1' width='1000px'>";
							echo"<tr>";
							echo"<th><strong>No</strong></th>";
							echo"<th><strong>Image</strong></th>";
							echo"<th><strong>Company Name</strong></th>";
							echo"<th><strong>Departure location</strong></th>";
							echo"<th><strong>Destination</strong></th>";
							echo"<th><strong>Departure date</strong></th>";
							echo"<th><strong>Action</strong></th>";
							echo"<th><strong>Action</strong></th>";
							echo"</tr>";
												
							$query = "SELECT * FROM bus;";
							$result = mysqli_query($bus, $query);
							$resultCheck = mysqli_num_rows($result);
							if($resultCheck > 0){
								while($row = mysqli_fetch_assoc($result)){
									echo"<tr>";						
									echo"<td align='center'>" . $count . "</td>";
									echo"<td align='center' width='380px'>";
									echo'<img src="data:image/jpeg;base64,'.base64_encode($row['bus_image'] ).'" height="120" width="120"/>';
									echo"</td>";
									echo"<td align='center'>" . $row['company'] . "</td>";
									echo"<td align='center'>" . $row['departure_location'] . "</td>";
									echo"<td align='center'>" . $row['destination'] . "</td>";
									echo"<td align='center'>" . $row['date'] . "</td>";
									echo"<td align='center'><a href='edit.php?id='" .$row['company'] . ">Edit</a></td>";
									echo"<td align='center'><a href='delete.php?id='" . $row['company'] . ">Delete</a></td>";
									echo"</tr>";
									$count++;
								}
							}
												
							echo"</table>";
					
							mysqli_close($bus);
							
							
							

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



<?php include('footer.php');?>