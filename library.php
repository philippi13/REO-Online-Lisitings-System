<?php
// REO Library Functions



	// HTML Header
	function showHeader($title, $body_css, $logout, $username){
		echo "<!DOCTYPE html><html>

		<title>".$title."</title>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<link rel='stylesheet' type='text/css' href='./css/w3.css'>
		<link rel='stylesheet' type='text/css' href='./css/kalvin.css'>
		<link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
		<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
		";

		
		echo "
		<script type='text/javascript' src='./js/library.js'></script>
		<script type='text/javascript' src='./js/kalvin.js'></script>
		<body ".$body_css.">
		";
		
		echo "
		<!-- Navigation -->
			<div class='w3-top'>
			<div class='w3-center'>
				<ul class='w3-navbar w3-black w3-large w3-left-align'>
				  <!--<li class='w3-hide-medium w3-hide-large w3-opennav w3-right'>
					<a class='w3-padding-large' href='javascript:void(0)' onclick='myFunction()' title='Toggle Navigation Menu'><i class='fa fa-bars'></i></a>
				  </li>-->
		
					<li class='w3-hide-small'><a class='w3-hover-none' href='index.php'><img src='./img/logo.png' border='0' /></a></li>
					<li class='w3-hide-small'><a href='buyproperty.php'>Buy</a></li>
					<li class='w3-hide-small'><a href='sellproperty.php'>Sell</a></li>
					<li class='w3-hide-small'><a href='historylist.php'>Sold Properties</a></li>
					<li class='w3-hide-small'><a href='aboutus.php'>About</a></li>
					<li class='w3-hide-small'><a href='contactus.php'>Contact</a></li>
					
					
					<li class='w3-right w3-hide-small'><a href='javascript:void(0)' class='w3-hover-red'><i class='fa fa-search'></i></a>
	
		";
		
		if($logout == 0){
			echo "
					<li class='w3-right w3-hide-small'><a href='#' class='w3-hover-red' 
						onclick=\"document.getElementById('signUpModal').style.display='block';
						document.forms['SignUpForm']['firstName'].value = '';
						document.forms['SignUpForm']['lastName'].value = '';
						document.forms['SignUpForm']['email'].value = '';
						document.forms['SignUpForm']['phone_num'].value = '';
						document.forms['SignUpForm']['passWord'].value = '';
						document.getElementById('signup_msg').innerHTML = '';
						\">Sign up</a></li>
					<li class='w3-right w3-hide-small'><a href='#' class='w3-hover-red'
							onclick=\"document.getElementById('loginModal').style.display='block';
							document.forms['LoginForm']['userName'].value='';
							document.forms['LoginForm']['passWord'].value='';
							document.getElementById('login_msg').innerHTML='';
					
						\">Login</a></li>
					<!-- <li class='w3-right'><input type='text' class='w3-input' placeholder='Search by postal code'></li>-->
				</ul>
			</div>
			</div>
			";
		}
		else{
			// database authentication
	$db = "";
	$table = "user";
	$server = "localhost";
	$user = "";
	$pass = "";
			
			// establishes database connection
			$conn = mysqli_connect($server, $user, $pass, $db);
			if(!$conn)
			{	
				die('Error encountered: ' . mysql_error());
			}
			
			$query = "select * from $table where email='$username'";
			$results = mysqli_query($conn, $query);	
			$count = mysqli_num_rows($results);
			$value = mysqli_fetch_object($results);
			
			$firstName = $value->first_name;
			
			echo "
				<li class='w3-right w3-hide-small'><a href='logout.php'>Log out</a></li>
				<li class='w3-right w3-hide-small'><a href='myaccount.php'>My Account</a></li>
				<li class='w3-right w3-hide-small w3-navitem'>Hello ".$firstName."!</li>
				</ul>
			</div>
			</div>
			";	
		}
	}
	
	// modal view for logging in users
	function loginModal(){
		echo "
		  <div id=\"loginModal\" class=\"w3-modal\">
				<div class=\"w3-modal-content w3-animate-top w3-card-8\" style=\"max-width:400px\">
				  <header class=\"w3-container w3-black\"> 
					<span onclick=\"document.getElementById('loginModal').style.display='none'\" 
					class=\"w3-closebtn\">&times;</span>
					<h2>Login </h2>
				  </header>
				  <div class=\"w3-container w3-padding-16 w3-center\">
						<form action='./php/loginAccountController.php' method=\"post\" onsubmit='return validateLoginForm()' name='LoginForm'>
							<table border='0'>
								<tr>
									<td class='w3-right'>Email: </td>
									<td><input type=\"text\" name=\"userName\" size='25'></td>
								</tr>
								<tr>
									<td class='w3-right'>Password:</td>
									<td><input type=\"password\" name=\"passWord\" size='25'></td>
								</tr>
								<tr>
									<td></td>
									<td class='w3-left'>
										<input type=\"submit\" name=\"login\" value='Submit Login'>
									</td>
								</tr>
								
								<tr>
									<td></td>
									<td class='w3-left'><a href='#' onclick=\"document.getElementById('recoverLoginModal').style.display='block';
										document.forms['RecoverAccountForm']['email'].value='';
										document.getElementById('recover_msg').innerHTML = '';
										document.getElementById('loginModal').style.display='none'\">Forgot password?</a></td>
								</tr>
										
								
								<!-- modal error -->
								<tr>
								<td></td>
								<td>
									<div class='w3-text-red'>
									<p id='login_msg'>
									
									</p>
									</div>
								</td>
								</tr>
								
							</table>
							
							 
						</form>
				  </div>
				  <footer class=\"w3-container w3-black\">
					
				  </footer>
				</div>
			  </div>
		";
		
		// modal view for recovering users
		function recoverLoginModal (){
			echo "
			  <div id=\"recoverLoginModal\" class=\"w3-modal\">
					<div class=\"w3-modal-content w3-animate-top w3-card-8\" style=\"max-width:400px\">
					  <header class=\"w3-container w3-black\"> 
						<span onclick=\"document.getElementById('recoverLoginModal').style.display='none'\" 
						class=\"w3-closebtn\">&times;</span>
						<h2>Recover Account </h2>
					  </header>
					  <div class=\"w3-container w3-padding-16 w3-center\">
							<form action='./php/recoverAccountController.php' method=\"post\" onsubmit='return recoverLoginAccount()' name='RecoverAccountForm'>
								<table border='0'>
									<tr>
										<td>Email: </td>
										<td><input type=\"text\" name=\"email\" size='25'></td>
									</tr>
									<tr>
										<td></td>
										<td class='w3-left'>
											<input type=\"submit\" name=\"recover\" value='Recover account'>

										</td>
									</tr>
									
									<!-- modal error -->
									<tr>
									<td></td>
									<td>
										<div class='w3-text-red'>
										<p id='recover_msg'>
										
										</p>
										</div>
									</td>
									</tr>
									
								</table>
								
								 
							</form>
					  </div>
					  <footer class=\"w3-container w3-black\">
						
					  </footer>
					</div>
				  </div>
			";			
		}
		
		// modal view for signing up new customers
		function signUpModal(){
		  echo "
		  <div id=\"signUpModal\" class=\"w3-modal\">
				<div class=\"w3-modal-content w3-animate-top w3-card-8\" style=\"max-width:400px\">
				  <header class=\"w3-container w3-black\"> 
					<span onclick=\"document.getElementById('signUpModal').style.display='none'\" 
					class=\"w3-closebtn\">&times;</span>
					<h2>Register Account </h2>
				  </header>
				  <div class=\"w3-container w3-padding-16 w3-center\">
						<form action='./php/registerAccountController.php' method=\"post\" onsubmit='return validateSignUpForm()' name='SignUpForm'>
							<table border='0'>
								<tr>
									<td class='w3-right'>First Name: </td>
									<td><input type=\"text\" name=\"firstName\" size='25'></td>
								</tr>
								<tr>
									<td class='w3-right'>Last Name: </td>
									<td><input type=\"text\" name=\"lastName\" size='25'></td>
								</tr>
								<tr>
									<td class='w3-right'>Email: </td>
									<td><input type=\"text\" name=\"email\" size='25'></td>
								</tr>
								<tr>
									<td class='w3-right'>Phone #: </td>
									<td><input type=\"text\" name=\"phone_num\" size='25'></td>
								</tr>
								<tr>
									<td class='w3-right'>Password:</td>
									<td><input type=\"password\" name=\"passWord\" size='25'></td>
								</tr>
								<tr>
									<td></td>
									<td class='w3-left'>
										<input type=\"submit\" name=\"register\" value='Register Account'>
									</td>
								</tr>
								
										
								
								<!-- modal error -->
								<tr>
								<td></td>
								<td>
									<div class='w3-text-red'>
									<p id='signup_msg'>
									
									</p>
									</div>
								</td>
								</tr>
								
							</table>
							
							 
						</form>
				  </div>
				  <footer class=\"w3-container w3-black\">
					
				  </footer>
				</div>
			  </div>
			  ";
		}
		// modal view for recovering users
		function searchPropertyErrorModal (){
			echo "
			  <div id=\"searchPropertyErrorModal\" class=\"w3-modal\">
					<div class=\"w3-modal-content w3-animate-top w3-card-8\" style=\"max-width:400px\">
					  <header class=\"w3-container w3-red\"> 
						<span onclick=\"document.getElementById('searchPropertyErrorModal').style.display='none'\" 
						class=\"w3-closebtn\">&times;</span>
						<h2>Error encountered searching for property</h2>
					  </header>
					  <div class=\"w3-container w3-padding-16 w3-center\">
						
						<p>
						At minimum, a <b>region</b>, <b>minimum price</b>, and <b>maximum price</b> has to be specified.
						</p>
						
						<p>
						<b>Region</b> must not be empty and be text only.<br />
						<b>Minimum price</b> and <b>maximum price</b> must be integers and be within range.
						</p>
								
						
					  </div>
					  <footer class=\"w3-container w3-red\">
						
					  </footer>
					</div>
				  </div>
			";			
		}		

		// modal view for recovering users
		function savedSearchPreferenceErrorModal (){
			echo "
			  <div id=\"savedSearchPreferenceErrorModal\" class=\"w3-modal\">
					<div class=\"w3-modal-content w3-animate-top w3-card-8\" style=\"max-width:400px\">
					  <header class=\"w3-container w3-red\"> 
						<span onclick=\"document.getElementById('savedSearchPreferenceErrorModal').style.display='none'\" 
						class=\"w3-closebtn\">&times;</span>
						<h2>Error saving search preferences</h2>
					  </header>
					  <div class=\"w3-container w3-padding-16 w3-center\">
						
						<p>
						You will need to be logged in to save your search preferences.
						</p>
								
						
					  </div>
					  <footer class=\"w3-container w3-red\">
						
					  </footer>
					</div>
				  </div>
			";			
		}			
		
		// modal view for signing up new customers
		function getDetailedListing(){

			if(isset($_GET['mls_id'])){
				// database authentication
				$db = "transitc_reo";
				$table = "property";
				$server = "localhost";
				$user = "transitc_reo";
				$pass = "hopishere";
				
				$mls_id = $_GET['mls_id'];
				
				// establishes database connection
				$conn = mysqli_connect($server, $user, $pass, $db);
				if(!$conn)
				{	
					die('Error encountered: ' . mysql_error());
				}

				// array
				$arr = array(array());
				$counter = 0;

				// Detailed House
				$query_detailed_listing = "select street_num, street_name, postal_code, description, region, city, province_territory, price, num_of_bedroom, num_of_bathroom, latitude, longitude from property where mls_id = '$mls_id'";
				if($results = mysqli_query($conn, $query_detailed_listing)){
					while($row = mysqli_fetch_row($results)){
					$arr[$counter][0] = $row[10];
					$arr[$counter][1] = $row[11];
					$counter++;
					// detailed listing header
					echo "
					<div id=\"detailedListingModal\" class=\"w3-modal\">
					<div class=\"w3-modal-content w3-animate-top w3-card-8\" style=\"max-width:800px\">
					  <header class=\"w3-container w3-black\"> 
						<span onclick=\"document.getElementById('detailedListingModal').style.display='none'\" 
						class=\"w3-closebtn\">&times;</span>
						<h2>".$row[0]. " " .$row[1]. " " .$row[2]. "</h2>
					  </header>
					  
						
					  
					  <div class=\"w3-container w3-padding-16 w3-center\">
					  <table class='w3-table' border='1'>

					  ";				


					echo "<tr><td>
								<table class='w3-table-all' style='width:100%'>
								<tr>
									<td colspan='3'><b>Detailed Listing Information</b></td>
								</tr>
									
								<tr>
					";
					
					
							// image querying
							$image_query = "select image_path from property_images where mls_id = '$mls_id'";
							if($image_results = mysqli_query($conn, $image_query)){
				
								// one image using break
								while($image_row = mysqli_fetch_row($image_results)){
								//$image_path = $_SERVER['SERVER_NAME']."/reo".$row[0];
								$image_path = $image_row[0];
								echo "<td><img src='$image_path' width='200' height='150' /></td>";
											
							}
						}
					
					echo "
									
									<tr>
										<td colspan='3'>
										<b>Description: </b>
										<p>".$row[3]."</p>
										<b>Bedroom(s): </b>".$row[8]."<br />
										<b>Bathroom(s): </b>".$row[9]."<br />
										<b>Region: </b>".$row[4]."<br />
										<b>City: </b>".$row[5]."<br />
										<b>Province/Territory: </b>".$row[6]."<br />
										<b>Price: </b>$".$row[7]."<br />
										<b>MLS #: </b>".$mls_id."<br />
										</td>
									</tr>
									</table>
					</td></tr>";
					}
				}



				// Property Detailed
				$query_detailed_listing = "select mls_id, type, levels, size, lot_size, maintenance_fee from property_details where mls_id = '$mls_id'";
				if($results = mysqli_query($conn, $query_detailed_listing)){

					/* fetch associative array */
					while($row = mysqli_fetch_row($results)){
						echo "<tr>
							<td>
								<table class='w3-table-all' style='width:100%'>
									<tr>
										<td colspan='2'><b>Details</b></td>
									</tr>
									<tr><td class='w3-left'>MLS ID</td>
										<td class='w3-right'>".$row[0]."</td>
									</tr>
									<tr><td class='w3-left'>Type</td>
										<td class='w3-right'>".$row[1]."</td>
									</tr>								
									<tr><td class='w3-left'>Levels</td>
										<td class='w3-right'>".$row[2]."</td>
									</tr>
									<tr><td class='w3-left'>Size</td>
										<td class='w3-right'>".$row[3]."</td>
									</tr>	
									<tr><td class='w3-left'>Lot Size</td>
										<td class='w3-right'>".$row[4]."</td>
									</tr>	
									<tr><td class='w3-left'>Maintenance Fees</td>
										<td class='w3-right'>".$row[5]."</td>
									</tr>								
								</table>
							</td>
							</tr>
						";
							
					}
				}
				
				// Property Exterior
				$query_detailed_exterior = "select exterior, basement, garage, driveway from property_exterior where mls_id = '$mls_id'";
				if($results = mysqli_query($conn, $query_detailed_exterior)){

					/* fetch associative array */
					while($row = mysqli_fetch_row($results)){
						echo "<tr>
							<td>
								<table class='w3-table-all' style='width:100%'>
									<tr>
										<td colspan='2'><b>Building</b></td>
									</tr>
									<tr><td class='w3-left'>Exterior</td>
										<td class='w3-right'>".$row[0]."</td>
									</tr>
									<tr><td class='w3-left'>Basement</td>
										<td class='w3-right'>".$row[1]."</td>
									</tr>								
									<tr><td class='w3-left'>Garage</td>
										<td class='w3-right'>".$row[2]."</td>
									</tr>
									<tr><td class='w3-left'>Driveway</td>
										<td class='w3-right'>".$row[3]."</td>
									</tr>	

																
								</table>
							</td>
							</tr>
						";
							
					}
				}
				
				// Property Utilities
				$query_detailed_utilities = "select heat, air_conditioning, heating_fuel from property_utilities where mls_id = '$mls_id'";
				if($results = mysqli_query($conn, $query_detailed_utilities)){

					/* fetch associative array */
					while($row = mysqli_fetch_row($results)){
						echo "<tr>
							<td>
								<table class='w3-table-all' style='width:100%'>
									<tr>
										<td colspan='2'><b>Utilities</b></td>
									</tr>
									<tr><td class='w3-left'>Heat</td>
										<td class='w3-right'>".$row[0]."</td>
									</tr>
									<tr><td class='w3-left'>Air Conditioning</td>
										<td class='w3-right'>".$row[1]."</td>
									</tr>								
									<tr><td class='w3-left'>Heating Fuel</td>
										<td class='w3-right'>".$row[2]."</td>
									</tr>							
																	
								</table>
							</td>
							</tr>
						";
							
					}
				}
				// Property Layout
				$query_detailed_layout = "select living, dining, kitchen, master, other from property_layout where mls_id = '$mls_id'";
				if($results = mysqli_query($conn, $query_detailed_layout)){

					/* fetch associative array */
					while($row = mysqli_fetch_row($results)){
						echo "<tr>
							<td>
								<table class='w3-table-all' style='width:100%'>
									<tr>
										<td colspan='2'><b>Room Layout</b></td>
									</tr>
									<tr><td class='w3-left'>Living</td>
										<td class='w3-right'>".$row[0]."</td>
									</tr>
									<tr><td class='w3-left'>Dining</td>
										<td class='w3-right'>".$row[1]."</td>
									</tr>								
									<tr><td class='w3-left'>Kitchen</td>
										<td class='w3-right'>".$row[2]."</td>
									</tr>
									<tr><td class='w3-left'>Master</td>
										<td class='w3-right'>".$row[3]."</td>
									</tr>	
									<tr><td class='w3-left'>Other</td>
										<td class='w3-right'>".$row[4]."</td>
									</tr>								
																	
								</table>
							</td>
							</tr>
						";
							
					}
				}

				
				// Appointment Form
				echo "<tr><td>";
				
				if(!empty($_SESSION['user'])){
					bookAppointmentForm(1, getUserInformation($_SESSION['user']), $mls_id);
				}else{
					bookAppointmentForm(0, "" , $mls_id);
				}
				

				
				echo "</td></tr>";

						
					// footer of detailed listing
					echo "</table>
					  </div>
					  <footer class=\"w3-container w3-black\">
						
					  </footer>
					</div>
				  </div>
				  ";
				  /*
				  
				  $query = "selection latitude and longitude from property where mls_id = '$mls_id'";
				  $results =  mysqli_query($conn, $query);
				  $obj = mysqli_fetch_object ($results);
				  
				  $arr = array($obj->latitude, $obj->longitude);*/
				  mysqli_close($conn);
				  
				  return $arr;
				  
				  
			}
			
			
		}
		
	}
	
	// HTML Footer
	function showFooter(){
		echo "
			<!-- Footer Content -->
			
			<footer class='w3-display-container w3-padding-16 w3-black w3-medium'>
		
			<nav class='w3-topnav w3-black w3-center'>
		  <a href='#'>Terms of Use</a> | 
		  <a href='#'>Privacy Policy</a> |
		  <a href='contactus.php'>Contact Us</a> |
		  <a href='#'>Free Android App</a> |
		  <a href='#'>Free iOS App</a> 
		</nav>
		
		<div class='w3-center'>
			
		  <i class='fa fa-facebook-official w3-hover-text-indigo'></i>
		  <i class='fa fa-instagram w3-hover-text-purple'></i>
		  <i class='fa fa-snapchat w3-hover-text-yellow'></i>
		  <i class='fa fa-pinterest-p w3-hover-text-red'></i>
		  <i class='fa fa-twitter w3-hover-text-light-blue'></i>
		  <i class='fa fa-linkedin w3-hover-text-indigo'></i> 
		</div>
		</footer>
		
		";
		
		echo
		"</body>
		</html>
		";
	}
	
	function getPropertyList($region, $home_type, $min_price, $max_price, $exterior, $counter){
		// database authentication
		$db = "";
		$property = "property";
		$property_details = "property_details";
		$property_exterior = "property_exterior";
		$server = "localhost";
		$user = "";
		$pass = "";
		
		// establishes database connection
		$conn = mysqli_connect($server, $user, $pass, $db);
		if(!$conn)
		{	
			die('Error encountered: ' . mysql_error());
		}	
	
		
		// region, min_price, max_price
		if($counter == 4){
			$query = "select street_num, street_name, postal_code, region, city, province_territory, price, mls_id, num_of_bedroom, num_of_bathroom, latitude, longitude from $property p where region like '%$region%' 
			and p.price >= $min_price and p.price <= $max_price";
		}
		
		// region, min_price, max_price,      home_type or exterior
		else if($counter == 5)
		{
			// home type
			if(!empty($home_type)){
				$query = "select street_num, street_name, postal_code, region, city, province_territory, price, mls_id, num_of_bedroom, num_of_bathroom, latitude, longitude from $property p join $property_details pd on p.mls_id = pd.mls_id 
				where region like '%$region%' and pd.type like '%$home_type%' and p.price >= $min_price and p.price <= $max_price";
			}
			// exterior
			else{
				$query = "select street_num, street_name, postal_code, region, city, province_territory, price, mls_id, num_of_bedroom, num_of_bathroom, latitude, longitude from $property p join $property_exterior pe on p.mls_id = pe.mls_id 
				where region like '%$region%' and pe.exterior like '%$exterior%' and p.price >= $min_price and p.price <= $max_price";

			}		
			
		}
		// region, min_price, max_price, home_type, exterior
		else if($counter == 6){
			$query = "select street_num, street_name, postal_code, region, city, province_territory, price, mls_id, num_of_bedroom, num_of_bathroom, latitude, longitude from $property p join $property_details pd on p.mls_id = pd.mls_id 
			join $property_exterior pe on pd.mls_id = pe.mls_id 
			where region like '%$region%' and pd.type like '%$home_type%' 
			and pe.exterior like '%$exterior%' 
			and p.price >= $min_price and p.price <= $max_price";	
			
		}
		else{
			$query = "select street_num, street_name, postal_code, region, city, province_territory, price, mls_id, num_of_bedroom, num_of_bathroom, latitude, longitude from $property";
		}
		
		
		
		if($results = mysqli_query($conn, $query)){
			
			
			
			$rowcount = mysqli_num_rows($results);
			if($rowcount > 0){
				/* fetch associative array */
				while($row = mysqli_fetch_row($results)){
					$street_num = $row[0];
					$street_name = $row[1];
					$postal_code = $row[2];
					$region = $row[3];
					$city = $row[4];
					$province_territory = $row[5];
					$price = $row[6];
					$mls_id = $row[7];
					
					$num_of_bedroom = $row[8];
					$num_of_bathroom = $row[9];
					$latitude = $row[10];
					$longitude = $row[11];
					
					// header for each cardview
					echo "<div class='w3-card-2'>";
					echo "<table><tr>";
					

						
						echo "<td>";
						// every images for each 
						$image_query = "select image_path from property_images where mls_id = '$mls_id'";
						if($image_results = mysqli_query($conn, $image_query)){
							
							
							// one image using break
							while($row = mysqli_fetch_row($image_results)){
								//$image_path = $_SERVER['SERVER_NAME']."/reo".$row[0];
								$image_path = $row[0];
								echo "<img src='$image_path' width='100' height='100' />" . "<br />";
								break;
							}
						}
						echo "</td>";
						
						// fill data
						echo "<td>";
						echo "<b>$street_num $street_name</b>
							<br /><b>$postal_code</b>
							<p class='w3-text-orange'><b>\$$price</b></p>
							<p>$num_of_bathroom bathroom(s)<br />$num_of_bedroom bedroom(s) </p>
							$region
							<br />
								<a href='buyproperty.php?mls_id=".$mls_id."'>More details...</a>
							";
						echo "</td>";
						
					echo "</tr></table>";
					
					// footer for cardview
					echo "</div>";
					echo "<br />";
					$check =true;
				}
			}else{
				echo "<div class='w3-card-2'><table><tr><td><h2 class='w3-text-black'>No results found.</h2></td></tr>
				<tr><td><a href='buyproperty.php'>Click to refresh search</a></td></tr>
				</table></div>";
			}
			
		}	
		mysqli_close($conn);
	}
	
	// Obtain user information
	function getUserInformation($user_name){
		// database authentication
		$db = "";
		$table = "user";
		$server = "localhost";
		$user = "";
		$pass = "";
		
		// establishes database connection
		$conn = mysqli_connect($server, $user, $pass, $db);
		if(!$conn)
		{	
			die('Error encountered: ' . mysql_error());
		}
		
		$query = "select first_name, last_name, email, phone_num from $table where email='$user_name'";
		$results = mysqli_query($conn, $query);
		
		$value = mysqli_fetch_object($results);
		
		$firstName = $value->first_name;
		$lastName = $value->last_name;
		$email = $value->email;
		$phoneNum = $value->phone_num;
		
		mysqli_close($conn);
		return array($firstName, $lastName, $email, $phoneNum);
		
		
	}
	
	// Logically remove appointment
	
	// Retrieves active user appointment
	function getAppointmentsByUser($user_name){
		// database authentication
		$db = "";
		$table = "appointment";
		$server = "localhost";
		$user = "";
		$pass = "";
		
		// establishes database connection
		$conn = mysqli_connect($server, $user, $pass, $db);
		if(!$conn)
		{	
			die('Error encountered: ' . mysql_error());
		}
		
		$query = "select reference_id, mls_id, appointment_date, user_comment, status from $table where email='$user_name'";
		$results = mysqli_query($conn, $query);
		
		
		$arr = array(array());
		$counter = 0;
		
		while($value = mysqli_fetch_object($results))
		{
		$reference_id = $value->reference_id;
		$mls_id = $value->mls_id;
		$appointment_date = $value->appointment_date;
		$user_comment = $value->user_comment;
		$status = $value->status;
		
		$arr[counter][0] = $reference_id;
		$arr[counter][1] = $mls_id;
		$arr[counter][2] = $appointment_date;
		$arr[counter][3] = $user_comment;
		$arr[counter][4] = $status;
		
		$counter++;
		}
		

		
		mysqli_close($conn);
		return $arr;
		//return array($refernce_id, $mls_id, $appointment_date, $user_comment, $status);		
	}	
	
	// Book Appointment Form
	function bookAppointmentForm($flag, $arr, $mls_id){
		$empty_var = "";
			echo "<table class='w3-table-all' style='width:100%'>
						<form action='./php/bookAppointmentController.php' method=\"post\" name='BookAppointmentForm'>
							<table border='0'>
								<tr>
							
									<td class='w3-right'><b>First Name: </b></td>
									<td><input type=\"text\" name=\"firstName_detailed\" size='25' value='".($flag == 0 ? $empty_var : $arr[0])."'></td>
								</tr>
								<tr>
									<td class='w3-right'><b>Last Name: </b></td>
									<td><input type=\"text\" name=\"lastName_detailed\" size='25' value='".($flag == 0 ? $empty_var : $arr[1])."'></td>
								</tr>
								<tr>
									<td class='w3-right'><b>Email: </b></td>
									<td><input type=\"text\" name=\"email_detailed\" size='25' value='".($flag == 0 ? $empty_var : $arr[2])."'></td>
								</tr>
								<tr>
									<td class='w3-right'><b>Phone #: </b></td>
									<td><input type=\"text\" name=\"phone_num_detailed\" size='25' value='".($flag == 0 ? $empty_var : $arr[3])."'></td>
								</tr>
								<tr>
									<td class='w3-right'><b>Add to Favourites: </b></td>
									<td><input type='checkbox' name='favourite_detailed' value='favourite_detailed' /></td>
								</tr>
			
								<tr>
									<td class='w3-right'><b>Comments: </b></td>
									<td><textarea rows='4' cols='50' name='user_comments_detailed'></textarea></td>
								</tr>
								
								";
								
								// login credentials in order to book an appointment
								if($flag == 0){
									echo "
								<tr>
									<td class='w3-right'><b>Login: </b></td>
									<td><input type=\"password\" name=\"login_detailed\" size='25'></td>
								</tr>
								<tr>
									<td class='w3-right'><b>Password: </b></td>
									<td><input type=\"password\" name=\"password_detailed\" size='25'></td>
								</tr>
									";
								}
			
								echo "

										<tr>
										<td></td>
										<td class='w3-left'>
										<input type=\"submit\" name=\"book_appointment_detailed\" value='Book Appointment'>
										</td>
										</tr>
								
								<!-- hidden mls field -->
								<input type = 'hidden' name='mls_id_detailed' value ='".($flag == 0 ? $empty_var : $mls_id)."'>
										
								
								<!-- modal error -->
								<tr>
								<td></td>
								<td>
									<div class='w3-text-red'>
									<p id='bookappointment_msg'>
									
									</p>
									</div>
								</td>
								</tr>
								</form>
							</table>";
				
	}
	
	// save search preferences
	function saveSearchPreferences($region, $home_type, $min_price, $max_price, $exterior, $email){
		// database authentication
		$db = "";
		$table = "search_preferences";
		$server = "localhost";
		$user = "";
		$pass = "";
		
		// establishes database connection
		$conn = mysqli_connect($server, $user, $pass, $db);
		if(!$conn)
		{	
			die('Error encountered: ' . mysql_error());
		}
		
		$query = "insert into $table (region, home_type, min_price, max_price, exterior, email, status) values('$region', '$home_type', '$min_price', '$max_price', '$exterior', '$email', 'inactive')";
		
		if(mysqli_query($conn, $query)){
			$conn = null;
			
			
			header("location:".$_SERVER['HTTP_REFERER']);
		}else{
			echo 'No saved search preferences added';
			echo (mysqli_error($conn));
		}
		
	}
	

?>