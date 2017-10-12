<?php
session_start();
if(!isset($_SESSION['user']))
{
	header("location:index.php");
}
	include("library.php");
	
	$email = $_SESSION['user'];

	showHeader("Hands on Property Sell My Account", "", 1 , $email);
	loginModal();
	recoverLoginModal();
	signUpModal();
	getDetailedListing();
	
	$user_information = getUserInformation($_SESSION['user']);
	//$appointments = getAppointmentsByUser($_SESSION['user']);
	
	
	// modal view
	if(isset($_GET['mls_id']) && isset($_GET['type']) && isset($_GET['action'])){
		if($_GET['type'] == "favourite_house_listing" && $_GET['action'] == "view"){
			echo "
			<script type='text/javascript'>
				var d = document.getElementById('detailedListingModal').style.display='block';
			</script>
			<br />
			";
		}
	}
	
	// database authentication
	$db = "";
	$server = "localhost";
	$user = "";
	$pass = "";
	$conn = mysqli_connect($server, $user, $pass, $db);
	
	
	/** appointment removal **/
	if(isset($_GET['type'])  && isset($_GET['id']) && isset($_GET['action']) && isset($_GET['status']) ){
		$id = $_GET['id'];
		if(!$conn)
		{	
			die('Error encountered: ' . mysql_error());
		}
		$query = "update appointment set status='inactive' where reference_id='$id' and email='$email'";		
		mysqli_query($conn, $query) or trigger_error("Query".mysqli_error(), E_USER_ERROR);
	}
	
	
	
	/** favourite listing removal **/
	if(isset($_GET['type'])  && isset($_GET['mls_id']) && isset($_GET['action']) && isset($_GET['status']) ){
		$id = $_GET['mls_id'];
		if($_GET['type'] == "favourite_house_listing"){
			if(!$conn)
			{	
				die('Error encountered: ' . mysql_error());
			}
			$query = "update favourite_house_listing set status='inactive' where mls_id='$id' and email='$email'";		
			mysqli_query($conn, $query) or trigger_error("Query".mysqli_error(), E_USER_ERROR);
		}		
	}
	
	
	/** search preferences removal **/
	if(isset($_GET['savedsearch'])  && isset($_GET['status']) && isset($_GET['action'])){
		$id = $_GET['savedsearch'];
		if($_GET['action'] == 'delete'){
		if(!$conn)
		{	
			die('Error encountered: ' . mysql_error());
		}
		$query = "update search_preferences set status='delete' where id='$id' and email='$email'";		
		mysqli_query($conn, $query) or trigger_error("Query".mysqli_error(), E_USER_ERROR);	
		}
	}


	
	/** search preferences activate/deactivate **/
	if(isset($_GET['savedsearch'])  && isset($_GET['status']) && isset($_GET['action'])){
		$id = $_GET['savedsearch'];
		// activate
		if($_GET['action'] == 'activate' && $_GET['status'] == 'inactive' )
		{
			if(!$conn)
			{	
				die('Error encountered: ' . mysql_error());
			}
			$query = "update search_preferences set status='active' where id='$id' and email='$email'";		
			mysqli_query($conn, $query) or trigger_error("Query".mysqli_error(), E_USER_ERROR);	
			
			// check for existing search preference
			if(isset($_SESSION['savedsearch_id'])){
				$query = "update search_preferences set status='inactive' where id='".$_SESSION['savedsearch_id']."'";		
				mysqli_query($conn, $query) or trigger_error("Query".mysqli_error(), E_USER_ERROR);	
			}
			
			// get new search preference and put into session
			$query = "select * from search_preferences where id='$id' and email='$email'";
			$results = mysqli_query($conn, $query) or trigger_error("Query".mysqli_error(), E_USER_ERROR);	
			
			$obj = mysqli_fetch_object($results);
			$_SESSION['savedsearch_id'] = $obj -> id;
			$_SESSION['savedsearch_region'] = $obj -> region;
			$_SESSION['savedsearch_home_type'] = $obj -> home_type;
			$_SESSION['savedsearch_min_price'] = $obj -> min_price;
			$_SESSION['savedsearch_max_price'] = $obj -> max_price;
			$_SESSION['savedsearch_exterior'] = $obj -> exterior;
			$_SESSION['savedsearch_email'] = $obj -> email;
			$_SESSION['savedsearch_status'] = $obj -> status;
			
			//var_dump($_SESSION);
		}
		
		//deactivate
		if($_GET['action'] == 'deactivate' && $_GET['status'] == 'active' )
		{
			if(!$conn)
			{	
				die('Error encountered: ' . mysql_error());
			}
			$query = "update search_preferences set status='inactive' where id='$id' and email='$email'";		
			mysqli_query($conn, $query) or trigger_error("Query".mysqli_error(), E_USER_ERROR);	
			
			// unset current saved preference
			unset($_SESSION['savedsearch_id']);
			unset($_SESSION['savedsearch_region']);
			unset($_SESSION['savedsearch_home_type']);
			unset($_SESSION['savedsearch_min_price'] );
			unset($_SESSION['savedsearch_max_price']);
			unset($_SESSION['savedsearch_exterior']);
			unset($_SESSION['savedsearch_email']);
			unset($_SESSION['savedsearch_status']);
			//var_dump($_SESSION);
			
		}
	}		
	mysqli_close($conn);
	
?>

<!-- Page content -->
<div class="w3-content" style="max-height:100%;max-width:2000px;margin-top:0px">

  <!-- Personal settings -->
  <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:70%;max-height=100%" id="mypersonalaccount">
    
	<!-- Personal Details -->
	<div class='w3-card-4 w3-margin'>
		<h2 class="w3-wide">Personal Details</h2>
		<table class='w3-table-all' border='0'>
			<form method='post' action='./php/changePersonalDetailsController.php' onsubmit='return validatePersonalDetailsForm()' name='PersonalDetailsForm'>
			
			<tr>
				<td><b>First Name</b></td>
				<td><?php echo $user_information[0]; ?></td>
				<td></td>
				
			</tr>
			<tr>
				<td><b>Last Name</b></td>
				<td><?php echo $user_information[1]; ?></td>
				<td></td>
				
			</tr>
			<tr>
				<td><b>Email</b></td>
				<td><?php echo $user_information[2]; ?></td>
				<td><!--<input type='text' name='email_change' placeholder='Change email'></td>-->
				
			</tr>
			<tr>
				<td><b>Phone Number</b></td>
				<td><?php echo $user_information[3]; ?></td>
				<td><input type='text' name='phone_change' placeholder='Change contact number'></td>
				
			</tr>
			
			<tr><td><input type='submit' value='Change personal details'></td>
			<td colspan='2'><p id='personaldetails_msg' class='w3-text-red'></p></td>
			</tr>
			<input type='hidden' name='user_name' value='<?php echo $_SESSION['user'];?>'>
			</form>
		</table>

	</div>
	
	<!-- Active Appointments -->
	<div class='w3-card-4 w3-margin'>
		<h2 class="w3-wide">Appointments</h2>
		<table class='w3-table-all' border='0'>
			<tr>
				<th>Reference ID</th>
				<th>Property ID</th>
				<th>Appointment Date Submission</th>
				<th>User commments</th>
				<th>Status</th>				
				<th>Actions</th>
			</tr>
			
<?php
		// database authentication

		$table = "appointment";
		$db = "";
		$server = "localhost";
		$user = "";
		$pass = "";
		
		// establishes database connection
		$conn = mysqli_connect($server, $user, $pass, $db);
		if(!$conn)
		{	
			die('Error encountered: ' . mysql_error());
		}
		$user_name = $_SESSION['user'];
		$query = "select reference_id, mls_id, appointment_date, user_comment, status from $table where email='$user_name' and status = 'active'";
		$results = mysqli_query($conn, $query);

		while($row = mysqli_fetch_row($results))
		{
			echo "<tr>";
			$reference_id = $row[0];
			$mls_id = $row[1];
			$appointment_date = $row[2];
			$user_comment = $row[3];
			$status = $row[4];
			echo "<td>". $reference_id. "</td>";
			echo "<td>". $mls_id. "</td>";
			echo "<td>". $appointment_date. "</td>";
			echo "<td>". $user_comment ."</td>";
			echo "<td class='w3-text-green'><b>". $status. "</b></td>";

			if($status == "active"){
				echo "<td><a href='myaccount.php?user=".$_SESSION['user']."&type=appointments&action=remove&id=".$reference_id."&status=".$status."'>Cancel appointment</a></td>";
			}else
	
			echo "</tr>";
			
			
		}
		

		
		mysqli_close($conn);
?>
		</table>
		</div>

	<!-- Saved Preferences -->
	<div class='w3-card-4 w3-margin'>
		<h2 class="w3-wide">Saved Search Property Preferences</h2>
		<table class='w3-table-all' border='0'>
			<tr>
				<th>ID</th>
				<th>Region</th>
				<th>Home Type</th>
				<th>Min Price</th>
				<th>Max Price</th>				
				<th>Exterior</th>
				<th>Status</th>
				<th>Actions</th>
			</tr>
			
<?php
		// database authentication
		
		$table = "search_preferences";
		$db = "";
		$server = "localhost";
		$user = "";
		$pass = "";
		
		// establishes database connection
		$conn = mysqli_connect($server, $user, $pass, $db);
		if(!$conn)
		{	
			die('Error encountered: ' . mysql_error());
		}
		$user_name = $_SESSION['user'];
		$query = "select id, region, home_type, min_price, max_price, exterior, status from $table where email='$email' and (status ='active' or status='inactive')";
		$results = mysqli_query($conn, $query);

		while($row = mysqli_fetch_row($results))
		{
			echo "<tr>";
			$id = $row[0];
			$region = $row[1];
			$home_type = $row[2];
			$min_price = $row[3];
			$max_price = $row[4];
			$exterior = $row[5];
			$status = $row[6];					
			echo "<td>". $id. "</td>";
			//echo "<td>". $email. "</td>";
			echo "<td>". $region. "</td>";
			echo "<td>". $home_type ."</td>";
			echo "<td>$". $min_price ."</td>";
			echo "<td>$". $max_price ."</td>";
			echo "<td>". $exterior ."</td>";

			if($status == "active")
				echo "<td class='w3-text-green'><b>". $status. "</b></td>";
			if($status == "inactive")
				echo "<td class='w3-text-red'><b>". $status. "</b></td>";

			if($status == "active"){
				echo "<td><a href='myaccount.php?savedsearch=".$id."&status=".$status."&action=deactivate'>Deactivate search preference</a><br /><br />";
				echo "<a href='myaccount.php?savedsearch=".$id."&status=".$status."&action=delete'>Remove saved search preference</a></td>";
			}else
			{
				echo "<td><a href='myaccount.php?savedsearch=".$id."&status=".$status."&action=activate'>Activate search preference</a><br /><br />";
				echo "<a href='myaccount.php?savedsearch=".$id."&status=".$status."&action=delete'>Remove saved search preference</a></td>";
			}
			echo "</tr>";
			
			
		}
		

		
		mysqli_close($conn);
?>
			

		</table>
    <!--<p class="w3-opacity"><i>Company Second Info</i></p>
	<div class='w3-row w3-padding-32'>
    <p class="w3-justify">
		Filler information here.adfadsafd
	</p>
	</div>-->
	</div>
	
	
	<!-- Favourite Listing -->
	<div class='w3-card-4 w3-margin'>
		<h2 class="w3-wide">Favourite Property Listings</h2>
		<table class='w3-table-all' border='0'>
			<tr>
				<th>ID</th>
				<th>Property ID</th>
				<th>Status</th>
				<th>Actions</th>
			</tr>
			
<?php
		// database authentication
		
		$table = "favourite_house_listing";
		$db = "";
		$server = "localhost";
		$user = "";
		$pass = "";
		
		// establishes database connection
		$conn = mysqli_connect($server, $user, $pass, $db);
		if(!$conn)
		{	
			die('Error encountered: ' . mysql_error());
		}
		$user_name = $_SESSION['user'];
		$query = "select id, mls_id, status from $table where email='$user_name' and status = 'active'";
		$results = mysqli_query($conn, $query);
		
		while($row = mysqli_fetch_row($results))
		{
			echo "<tr>";
			$id = $row[0];
			$mls_id = $row[1];
			$status = $row[2];
				
			echo "<td>". $id. "</td>";
			echo "<td><a href='myaccount.php?user=".$_SESSION['user']."&type=favourite_house_listing&action=view&mls_id=".$mls_id."&status=".$status."'>". $mls_id. "</a></td>";
		
			echo "<td class='w3-text-green'><b>". $status. "</b></td>";

			if($status == "active"){
				echo "<td><a href='myaccount.php?user=".$_SESSION['user']."&type=favourite_house_listing&action=remove&mls_id=".$mls_id."&status=".$status."'>Remove listing</a></td>";
				
			}/*else{
				echo "<td><a href='myaccount.php?user=".$_SESSION['user']."&type=favourite_house_listing&action=remove&mls_id=".$mls_id."&status=".$status."'>Remove listing</a></td>";
			}*/
			
			echo "</tr>";
			
			
		}
		
		mysqli_close($conn);
?>
		</table>
		</div>	
	
	
  </div>
</div>

<?php
	showFooter();
?>