<?php 
define("Title","Contact Us");
define("Main","Contact Us");
include('header.php');
?>

<!-- Content -->
<?php 
echo "<section class=\"ftco-section contact-section bg-light\">\n";
echo "      <div class=\"container\">\n";
echo "        <div class=\"row d-flex mb-5 contact-info\">\n";
echo "          <div class=\"col-md-12 mb-4\">\n";
echo "            <h2 class=\"h3\">Contact Information</h2>\n";
echo "          </div>\n";
echo "          <div class=\"w-100\"></div>\n";
echo "          <div class=\"col-md-3 d-flex\">\n";
echo "          	<div class=\"info bg-white p-4\">\n";
echo "	            <p><span>Address:</span> 203 Penang Mountain, Penang, Malaysia</p>\n";
echo "	          </div>\n";
echo "          </div>\n";
echo "          <div class=\"col-md-3 d-flex\">\n";
echo "          	<div class=\"info bg-white p-4\">\n";
echo "	            <p><span>Phone:</span> <a href=\"tel: \">+ 60 12-345 6789</a></p>\n";
echo "	          </div>\n";
echo "          </div>\n";
echo "          <div class=\"col-md-3 d-flex\">\n";
echo "          	<div class=\"info bg-white p-4\">\n";
echo "	            <p><span>Email:</span> <a href=\"mailto:info@yoursite.com\">info@busybus.com</a></p>\n";
echo "	          </div>\n";
echo "          </div>\n";
echo "          <div class=\"col-md-3 d-flex\">\n";
echo "          	<div class=\"info bg-white p-4\">\n";
echo "	            <p><span>Website</span> <a href=\"#\">BusyBus.com</a></p>\n";
echo "	          </div>\n";
echo "          </div>\n";
echo "        </div>\n";
		
		if(isset($_POST['contact'])){
			
			$name = trim($_POST['name']);
			$email = trim($_POST['email']);
			$subject = trim($_POST['subject']);
			$message = trim($_POST['message']);
			$name = str_replace(" ", "", $name);
			
			if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['subject']) && !empty($_POST['message'])){
				if(ctype_alpha($name) && filter_var($email, FILTER_VALIDATE_EMAIL)){
					
					
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
													$create = "CREATE TABLE contact(name varchar(255), 
																				email varchar(255), 
																				subject varchar(255), 
																				message varchar(255))";
													
													//add bus
													$query = "INSERT INTO contact(name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
													
													mysqli_query($bus, $create);
														//Test table created or not												
														/*if(mysqli_query($bus, $create)){
															print'<p>Table is created</p>';
														}
														else{
															print'<p style = " color:red; ">Table did not created : '.mysqli_error($bus).'</p>';
														}*/
													
													if(mysqli_query($bus, $query)){
														echo"<script type='text/javascript'> alert('Your message have been received! Thank you!') </script>";
													}
													else{
														//print'//<p style = " color:red; ">Record inserted failed: '.mysqli_error($bus).'</p>';
														echo"<script type='text/javascript'> alert('Your message failed to send! Please try again!') </script>";
													}
													mysqli_close($bus);
													contact();
				}
				else{
					if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
						echo"<script type='text/javascript'> alert('Invalid email! Please try again.') </script>";
					}
					if(!ctype_alpha($name)){
						echo"<script type='text/javascript'> alert('Name must be in alphabets only! Please enter again!') </script>";
					}
					contact();
				}
			}
			else{
				if(empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['subject']) && !empty($_POST['message'])){
					echo"<script type='text/javascript'> alert('Name cannot be empty! Please enter again!') </script>";
				}
				if(!empty($_POST['name']) && empty($_POST['email']) && !empty($_POST['subject']) && !empty($_POST['message'])){
					echo"<script type='text/javascript'> alert('Email cannot be empty! Please enter again!') </script>";
				}
				if(!empty($_POST['name']) && !empty($_POST['email']) && empty($_POST['subject']) && !empty($_POST['message'])){
					echo"<script type='text/javascript'> alert('Subject cannot be empty! Please enter again!') </script>";
				}
				if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['subject']) && empty($_POST['message'])){
					echo"<script type='text/javascript'> alert('Message cannot be empty! Please enter again!') </script>";
				}
				if(empty($_POST['name']) && empty($_POST['email']) && !empty($_POST['subject']) && !empty($_POST['message'])){
					echo"<script type='text/javascript'> alert('Name and email cannot be empty! Please enter again!') </script>";
				}
				if(empty($_POST['name']) && !empty($_POST['email']) && empty($_POST['subject']) && !empty($_POST['message'])){
					echo"<script type='text/javascript'> alert('Name and subject cannot be empty! Please enter again!') </script>";
				}
				if(empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['subject']) && empty($_POST['message'])){
					echo"<script type='text/javascript'> alert('Name and message cannot be empty! Please enter again!') </script>";
				}
				if(!empty($_POST['name']) && empty($_POST['email']) && empty($_POST['subject']) && !empty($_POST['message'])){
					echo"<script type='text/javascript'> alert('Email and subject cannot be empty! Please enter again!') </script>";
				}
				if(!empty($_POST['name']) && empty($_POST['email']) && !empty($_POST['subject']) && empty($_POST['message'])){
					echo"<script type='text/javascript'> alert('Email and message cannot be empty! Please enter again!') </script>";
				}
				if(!empty($_POST['name']) && !empty($_POST['email']) && empty($_POST['subject']) && empty($_POST['message'])){
					echo"<script type='text/javascript'> alert('Subject and message cannot be empty! Please enter again!') </script>";
				}
				if(empty($_POST['name']) && empty($_POST['email']) && empty($_POST['subject']) && !empty($_POST['message'])){
					echo"<script type='text/javascript'> alert('Name, email and subject cannot be empty! Please enter again!') </script>";
				}
				if(empty($_POST['name']) && empty($_POST['email']) && !empty($_POST['subject']) && empty($_POST['message'])){
					echo"<script type='text/javascript'> alert('Name, email and message cannot be empty! Please enter again!') </script>";
				}
				if(empty($_POST['name']) && !empty($_POST['email']) && empty($_POST['subject']) && empty($_POST['message'])){
					echo"<script type='text/javascript'> alert('Name, subject and message cannot be empty! Please enter again!') </script>";
				}
				if(!empty($_POST['name']) && empty($_POST['email']) && empty($_POST['subject']) && empty($_POST['message'])){
					echo"<script type='text/javascript'> alert('Email, subject and message cannot be empty! Please enter again!') </script>";
				}
				if(empty($_POST['name']) && empty($_POST['email']) && empty($_POST['subject']) && empty($_POST['message'])){
					echo"<script type='text/javascript'> alert('Name, email, subject and message cannot be empty! Please enter again!') </script>";
				}
				contact();
			}
		}
		else{
			contact();
		}

          echo"<div class='col-md-6 d-flex'>";
          	echo"<div id='map' class='bg-white'></div>";
          echo"</div>";
        echo"</div>";
      echo"</div>";
    echo"</section>";?>
	<!-- End of content -->

<?php
function contact(){
echo "        <div class=\"row block-9\">\n";
echo "          <div class=\"col-md-6 order-md-last d-flex\">\n";
echo "            <form action=\"contact.php\" method='POST' class=\"bg-white p-5 contact-form\">\n";
echo "              <div class=\"form-group\">\n";
echo "                <input type=\"text\" class=\"form-control\" placeholder=\"Your Name\" name = 'name'>\n";
echo "              </div>\n";
echo "              <div class=\"form-group\">\n";
echo "                <input type=\"text\" class=\"form-control\" placeholder=\"Your Email\" name = 'email'>\n";
echo "              </div>\n";
echo "              <div class=\"form-group\">\n";
echo "                <input type=\"text\" class=\"form-control\" placeholder=\"Subject\" name = 'subject'>\n";
echo "              </div>\n";
echo "				<div class='form-group'>";
echo "					<textarea id='' cols='30' rows='7' class='form-control' placeholder='Message' name='message'></textarea>";
echo "				</div>";
echo "				<div class='form-group'>";
echo "					<p align='center'><input type='submit' value='Send Message' name='contact' class='btn btn-primary py-3 px-5'></p>";
echo "				</div>";
echo "			 </form>";
echo "			</div>";
}
?>

<?php include('footer.php');?>