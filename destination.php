<?php 
define("Title","Destination");
define("Main","Destination");
include('header.php');
?>

<?php
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
							
							
							
							echo"<h4 align='center'>Routine available</h4>";
							echo"<table border = '1' align='center'>";
												
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
									echo"<td align='center'> ---> </td>";
									echo"<td align='center'>" . $row['destination'] . "</td>";

									echo"</tr>";
									$count++;
								}
							}
												
							echo"</table>";
					
							mysqli_close($bus);
?>

<?php include('footer.php');?>