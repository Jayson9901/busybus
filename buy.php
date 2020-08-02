<?php 
define("Title","Buy Ticket");
define("Main","Buy Ticket");
include('header.php');
?>

<?php
	
	
	
	$date = $_SESSION['date'];
	$departure = $_SESSION['departure'];
	
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
							
							$query = "SELECT adult_ticket, children_ticket FROM bus WHERE date = '$date' AND departure_location = '$departure';";
	
	$result = mysqli_query($bus, $query);
	$resultCheck = mysqli_num_rows($result);
	if($resultCheck > 0){
		while($row = mysqli_fetch_assoc($result)){
			$a_price = $row['adult_ticket'];
			$c_price = $row['children_ticket'];
		}
	}
	
	
	
	
	if(isset($_POST['buy'])){
		$username = $_SESSION['username'];
		$adult = trim($_POST['adult']);
		$children = trim($_POST['children']);
		date_default_timezone_set("Singapore");
		$total = ($adult * $a_price) + ($children * $c_price);
		$time = date('Y-m-d')." ".date('h:i:s a');
		$company = "SELECT * FROM bus WHERE date = '$date' AND departure_location = '$departure'";
		$result = mysqli_query($bus, $company);
		$resultCheck = mysqli_num_rows($result);
		
		if($_POST['children'] > 1 || $_POST['adult'] > 1){
			if($resultCheck > 0){
			while($row = mysqli_fetch_assoc($result)){
				$com = $row['company'];
				$dep = $row['departure_location'];
				$arr = $row['destination'];
				$dept = $row['departure_time'];
				$arrt = $row['arrival_time'];
			}
		}
		echo"<br>";
		echo"<br>";
			
			//$query = "INSERT INTO register(purchase_history) VALUES ('$total') WHERE username = '$username'";
			$update = "UPDATE register SET purchase_history = '$total', purchase_time = '$time', company = '$com', departure_location = '$dep', destination = '$arr', departure_time = '$dept', arrival_time = '$arrt'  WHERE username = '$username'";
			if(mysqli_query($bus, $update)){
														//echo"<script type='text/javascript'> alert('Bus information has been updated..') </script>";
													}
													else{
														//print'//<p style = " color:red; ">Record inserted failed: '.mysqli_error($bus).'</p>';
														//echo"<script type='text/javascript'> alert('Bus information updated failed.') </script>";
														//print"Updated dailed" . mysqli_error($bus);
													}
			
			echo"<h2 align='center'>Your total ticket price is RM" . $total . "</h2>";
			echo"<h3 align='center'>Thank you!</h3>";
			echo"<br>";
		echo"<br>";
			echo"<table align='center'>";
				echo"<tr>";
					echo"<th colspan = '4'><h4 align = 'center'>Pay With : </h4></th>";
				echo"</tr>";
				echo"<tr>";
					echo"<th><h4 align = 'cemter'><img src='images/pay_1.jpg' alt='Bus' width='125px' height='125px'></h4></th>";
					echo"<th><h4 align = 'cemter'><img src='images/pay_2.jpg' alt='Bus' width='125px' height='125px'></h4></th>";
					echo"<th><h4 align = 'cemter'><img src='images/pay_3.jpg' alt='Bus' width='200px' height='125px'></h4></th>";
					echo"<th><h4 align = 'cemter'><img src='images/pay_4.jpg' alt='Bus' width='125px' height='125px'></h4></th>";
				echo"</tr>";
			echo"</table>";

		echo"<br>";
		echo"<br>";
		}
		else{
			echo"<script type='text/javascript'> alert('Please select your ticket.') </script>";
		}
	}
	else{
		buy();
	}
?>

<?php
	function buy(){
		
		$date = $_SESSION['date'];
		$departure = $_SESSION['departure'];

		echo"<table border = '1' align = 'center' width = '750px'>";
		echo"<tr>";
		echo"<th colspan = '2'><h2 align='center'>Buy Ticket</h2></th>";
		echo"</tr>";
		echo"<tr>";
		echo"<td><img src='images/bus_11.jpg' alt='Bus' width='300px' height='180px'></td>";
		
		echo"<td>";
		
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
							
							$query = "SELECT * FROM bus;";
							$result = mysqli_query($bus, $query);
							$resultCheck = mysqli_num_rows($result);
							if($resultCheck > 0){
								while($row = mysqli_fetch_assoc($result)){
									$dateCheck = trim($row['date']);
									$depCheck = trim($row['departure_location']);
								}
							}
							
							
							
							if($dateCheck = $date && $depCheck = $departure){
								$count = '1';
							
												
							$query = "SELECT * FROM bus WHERE date = '$date' AND departure_location = '$departure';";
							$result = mysqli_query($bus, $query);
							$resultCheck = mysqli_num_rows($result);
							if($resultCheck > 0){
								while($row = mysqli_fetch_assoc($result)){
									echo"<form method = 'POST' action='buy.php' class='bg-white p-5 contact-form'>";
									echo"<table width='450px' >";
									echo"<tr>";
									echo"<t colspan='3'h><h3 align='center'>" . $row['company'] . "</th></h3>";
									echo"</tr>";
									echo"<br>";
									echo"<tr>";
									echo"<th width='250px'><h4> Route </th>";
									echo"<th><h4>:</h4>";
									echo"<th><h4>" . $row['departure_location'] . " TO " . $row['destination'] . "</h4></th>";
									echo"</tr>";
									echo"<tr>";
									echo"<th width='250px'><h4> Departure Date </th>";
									echo"<th><h4>:</h4>";
									echo"<th><h4>" . $row['date'] . "</h4></th>";
									echo"</tr>";
									echo"<tr>";
									echo"<th width='250px'><h4> Departure Time </th>";
									echo"<th><h4>:</h4>";
									echo"<th><h4>" . $row['departure_time'] . "</h4></th>";
									echo"</tr>";
									echo"<tr>";
									echo"<th width='250px'><h4> Arrival Time </th>";
									echo"<th><h4>:</h4>";
									echo"<th><h4>" . $row['arrival_time'] . "</h4></th>";
									echo"</tr>";
									echo"<tr>";
									echo"<th width='250px'><h4> Duration </th>";
									echo"<th><h4>:</h4>";
									echo"<th><h4>" . $row['duration'] . "</h4></th>";
									echo"</tr>";
									echo"<tr>";
									echo"<th width='250px'><h4> Seats Available </th>";
									echo"<th><h4>:</h4>";
									echo"<th><h4>" . $row['seats'] . "</h4></th>";
									echo"</tr>";
									echo"<tr>";
									echo"<th width='250px'><h4> Adult Ticket Price </th>";
									echo"<th><h4>:</h4>";
									echo"<th><h4>RM " . $row['adult_ticket'] . "</h4></th>";
									echo"</tr>";
									echo"<tr>";
									echo"<th width='250px'><h4> Children Ticket Price </th>";
									echo"<th><h4>:</h4>";
									echo"<th><h4>RM " . $row['children_ticket'] . "</h4></th>";
									echo"</tr>";
									
									
									echo"<tr>";
									echo"<table>";
									echo"<tr><th></th></tr>";
									echo"<tr>";
									echo"<th width='180px'><h4>Adult</h4></th>";
									echo"<th><h4>:</h4></th>";
									echo"<th><h4>
									<select name = 'adult' align='center' style= 'width:250px'>
									<option value = '0'>Adult</option>";
									for($y = 1; $y < 50;$y++){
										echo"<option value = '$y'>$y</option>";
									}
									echo"</select></h4></th>";
									
									echo"</tr>";
									echo"<tr>";
									echo"<th width='180px'><h4>Children</h4></th>";
									echo"<th><h4>:</h4></th>";
									echo"<th><h4>
									<select name = 'children' align='center' style= 'width:250px'>
									<option value ='0'>Children</option>";
									for($x = 1; $x < 50;$x++){
										echo"<option value = '$x'>$x</option>";
									}
									echo"</select></h4></th>";
									
									echo"</tr>";
									echo"</table>";
									echo"<p align='center'><input type='submit' value='Buy' name='buy' class='btn btn-primary py-3 px-5'></p>";
									echo"</tr>";
									echo"</table>";
									echo"<br><br>";
									echo"</form>";
									
								}
							}
							}
							else{
								echo"<script type='text/javascript'> alert('Invalid date and location! Please enter again.') </script>";
							}
		echo"</td>";
		echo"</tr>";
		echo"</table>";

	}
?>

<?php include('footer.php');?>

