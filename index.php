<?php session_start();?>
<?php include('index_header.php');?>

    <?php
	if(isset($_POST['search'])){
		$departure = trim($_POST['departurelocation']);
		$destination = trim($_POST['destination']);
		$date = trim($_POST['date']);
		
		if(!empty($_POST['departurelocation']) && !empty($_POST['destination']) && !empty($_POST['date'])){
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
							
							index();
							$query = "SELECT * FROM bus;";
							$result = mysqli_query($bus, $query);
							$resultCheck = mysqli_num_rows($result);
							if($resultCheck > 0){
								while($row = mysqli_fetch_assoc($result)){
									$dateCheck = trim($row['date']);
								}
							}
							
							if($dateCheck = $date){
								$count = '1';
							echo"<br><br>";
							echo"<table border = '1' width='1450px' align='center'>";
							echo"<tr>";
							echo"<th><strong>No</strong></th>";
							echo"<th><strong>Image</strong></th>";
							echo"<th><strong>Company Name</strong></th>";
							echo"<th><strong>Departure location</strong></th>";
							echo"<th><strong>Destination</strong></th>";
							echo"<th><strong>Departure date</strong></th>";
							echo"<th><strong>Departure time</strong></th>";
							echo"<th><strong>Arrival time</strong></th>";
							echo"<th><strong>Seats</strong></th>";
							echo"<th><strong>Adult ticket (RM)</strong></th>";
							echo"<th><strong>Children ticket (RM)</strong></th>";
							echo"<th><strong>Duration Estimated</strong></th>";
							echo"<th><strong>Buy Ticket</strong></th>";
							echo"</tr>";
												
							$query = "SELECT * FROM bus WHERE date = '$date';";
							$result = mysqli_query($bus, $query);
							$resultCheck = mysqli_num_rows($result);
							if($resultCheck > 0){
								while($row = mysqli_fetch_assoc($result)){
									echo"<tr>";						
									echo"<td align='center'>" . $count . "</td>";
									echo"<td align='center' width='140px'>";
									echo'<img src="data:image/jpeg;base64,'.base64_encode($row['bus_image'] ).'" height="120" width="120"/>';
									echo"</td>";
									echo"<td align='center'>" . $row['company'] . "</td>";
									echo"<td align='center'>" . $row['departure_location'] . "</td>";
									echo"<td align='center'>" . $row['destination'] . "</td>";
									echo"<td align='center'>" . $row['date'] . "</td>";
									echo"<td align='center'>" . $row['departure_time'] . "</td>";
									echo"<td align='center'>" . $row['arrival_time'] . "</td>";
									echo"<td align='center'>" . $row['seats'] . "</td>";
									echo"<td align='center'>" . $row['adult_ticket'] . "</td>";
									echo"<td align='center'>" . $row['children_ticket'] . "</td>";
									echo"<td align='center'>" . $row['duration'] . "</td>";
									echo"<td align='center'><a href='buy.php'?id='" .$row['id'] . "'>Buy now</a></td>";
									echo"</tr>";
									$count++;
								}
							}

							$_SESSION['date'] = "$date";
							$_SESSION['departure'] = "$departure";
							
  				
							echo"</table>";
							echo"<br><br>";
							}
							else{
								echo"<script type='text/javascript'> alert('Sorry! Please select another date!') </script>";
								index();
							}
					
							mysqli_close($bus);
		}
		else{
			echo"<script type='text/javascript'> alert('Departure location, destinations and date must not be empty! Please try again!') </script>";
			index();
		}
	}
	else{
		index();
		include('index_body.php');
	}
	?>


  <?php include('footer.php')?>

<?php
	function index(){
	echo"<section class='ftco-booking'>";
    	echo"<div class='container'>";
    		echo"<div class='row'>";
    			echo"<div class='col-lg-12'>";
    				echo"<form action='index.php' method='POST' class='booking-form'>";
	        		echo"<div class='row'>";
					
						echo"<div class='col-md-3 d-flex'>";
	        				echo"<div class='form-group p-4 align-self-stretch d-flex align-items-end'>";
								echo"<div class='wrap'>";
									echo"<label for='#'>From</label>";
										echo"<div class='form-field'>";
											echo"<div class='select-wrap'>";
												echo"<div class='icon'><span class='ion-ios-arrow-down'></span></div>";
													echo"<select name='departurelocation' id='' class='form-control'>";
														  echo"<option value='Kuala Lumpur'>Kuala Lumpur</option>";
														  echo"<option value='Genting Highlands'>Genting Highlands</option>";
														  echo"<option value='Cameron Highlands'>Cameron Highlands</option>";
														  echo"<option value='Penang'>Penang</option>";
														  echo"<option value='Melaka'>Melaka</option>";
														  echo"<option value='Ipoh'>Ipoh</option>";
														  echo"<option value='Sabah'>Sabah</option>";
														  echo"<option value='Sarawak'>Sarawak</option>";
														  echo"<option value='Johor'>Johor</option>";
														  echo"<option value='Taiping'>Taiping</option>";
													echo"</select>";
											echo"</div>";
										 echo"</div>";
								echo"</div>";
			    			echo"</div>";
	        			echo"</div>";
						
						echo"<div class='col-md-3 d-flex'>";
	        				echo"<div class='form-group p-4 align-self-stretch d-flex align-items-end'>";
								echo"<div class='wrap'>";
									echo"<label for='#'>To</label>";
										echo"<div class='form-field'>";
											echo"<div class='select-wrap'>";
												echo"<div class='icon'><span class='ion-ios-arrow-down'></span></div>";
													echo"<select name='destination' id='' class='form-control'>";
														  echo"<option value='Kuala Lumpur'>Kuala Lumpur</option>";
														  echo"<option value='Genting Highlands'>Genting Highlands</option>";
														  echo"<option value='Cameron Highlands'>Cameron Highlands</option>";
														  echo"<option value='Penang'>Penang</option>";
														  echo"<option value='Melaka'>Melaka</option>";
														  echo"<option value='Ipoh'>Ipoh</option>";
														  echo"<option value='Sabah'>Sabah</option>";
														  echo"<option value='Sarawak'>Sarawak</option>";
														  echo"<option value='Johor'>Johor</option>";
														  echo"<option value='Taiping'>Taiping</option>";
													echo"</select>";
											echo"</div>";
										 echo"</div>";
								echo"</div>";
			    			echo"</div>";
	        			echo"</div>";
					
	        			echo"<div class='col-md-3 d-flex'>";
	        				echo"<div class='form-group p-4 align-self-stretch d-flex align-items-end'>";
	        					echo"<div class='wrap'>";
				    					echo"<label for='#'>Departure Date</label>";
				    					echo"<input type='text' placeholder='Departure Date' class='form-control' name='date'>";
			    					echo"</div>";
			    				echo"</div>";
	        			echo"</div>";
						
	        			echo"<div class='col-md-3 d-flex'>";
	        				echo"<div class='form-group p-4 align-self-stretch d-flex align-items-end'>";
	        					echo"<div class='wrap'>";
				    					echo"<label for='#'>Direction</label>";
				    					echo"<h5>One way direction</h5>";
			    				echo"</div>";
			    				echo"</div>";
	        			echo"</div>";
						
	        			echo"</div>";
	        			echo"<div class='col-md d-flex'>";
	        				echo"<div class='form-group d-flex align-self-stretch'>";
			              echo"<input type='submit' value='Search For Bus' name='search' class='btn btn-primary py-3 px-4 align-self-stretch'>";
			            echo"</div>";
	        			echo"</div>";
	        		echo"</div>";
	        	echo"</form>";
	    		echo"</div>";
    		echo"</div>";
    	echo"</div>";
    echo"</section>";
	}
?>
