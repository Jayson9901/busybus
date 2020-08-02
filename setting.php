<?php	
	if (isset($_POST['submitted'])){
		
		$country = $_POST['country'];
		$language = $_POST['language'];
		$currency = $_POST['currency'];
		
		setcookie('country',$_POST['country']);
		setcookie('language',$_POST['language']);
		setcookie('currency',$_POST['currency']);

		setting();
	}
	else{
		setting();
	}
?>

<?php
	function setting(){
		
define("Title","Settings");
define("Main","Settings");
include('header.php');

		echo"<div class='bg-white p-5 contact-form'>";
					echo"<table border = '1' align='center'>";
						echo"<tr>";
							echo"<th><h2 align='center'>Settings</h2></th>";
							//echo"</form>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"<form method = 'POST' action='setting.php' class='bg-white p-5 contact-form'>";
										echo"<div class='form-group'>";
											echo"<table cellspacing='2' border='0'>";
												echo"<tr>";
													echo"<td width='150px'><h3 align='left'>Country</h3></td>";
													echo"<td><h3>:</h3></td>";
													echo"<td width='150px'>
													<select type = 'dropdown' name='country' style='width:150px;'>
													<option value='MYS'>Malaysia</option>
													<option value='SGP'>Singapore</option>
													<option value='THA'>Thailand</option>
													<option value='JPN'>Japan</option>
													<option value='CHN'>China</option>
													</select>
													</td>";
												echo"</tr>";
												echo"<tr>";
													echo"<td width='150px'><h3 align='left'>Language</h3></td>";
													echo"<td><h3>:</h3></td>";
													echo"<td width='150px'>
													<select type='dropdown' name='language' style='width:150px;'>
													<option value='English'>English</option>
													<option value='Chinese'>Chinese</option>
													<option value='Bahasa Melayu'>Bahasa Melayu</option>
													<option value='Japanese'>Japanese</option>
													<option value='Thai'>Thaie</option>
													</select>
													</td>";
												echo"</tr>";
												echo"<tr>";
													echo"<td width='150px'><h3 align='left'>Currency</h3></td>";
													echo"<td><h3>:</h3></td>";
													echo"<td width='150px'>
													<select type='dropdown' name='currency' style='width:150px;'>
													<option value='MYR'>MYR</option>
													<option value='SGD'>SGD</option>
													<option value='Baht'>Baht</option>
													<option value='Yen'>Yen</option>
													<option value='RMB'>RMB</option>
													</select>
													</td>";
												echo"</tr>";
												
												
										echo"</table>";
									echo"</div>";
									echo"<p align='center'><input type='submit' value='Submit' name='submitted' class='btn btn-primary py-3 px-5'></p>";
								echo"</form>";
							echo"</td>";
						echo"</tr>";
					echo"</table>";
				echo"</div>";
	}
?>

<?php include'footer.php';?>