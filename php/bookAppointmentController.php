<?php
if(!empty($_POST)){
	// database authentication
	
	$table = "appointment";
	$table_fav = "favourite_house_listing";
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

	// add to favourites
	if(isset($_POST['favourite_detailed'])){
		$email = mysqli_real_escape_string($conn,$_POST['email_detailed']);
		$mls_id = mysqli_real_escape_string($conn, $_POST['mls_id_detailed']);
		$query = "insert into $table_fav (mls_id, email, status) values ('$mls_id', '$email', 'active')";
		mysqli_query($conn, $query);
	}
	
	
	
	$firstName = mysqli_real_escape_string($conn, $_POST['firstName_detailed']);
	$lastName = mysqli_real_escape_string($conn, $_POST['lastName_detailed']);
	$email = mysqli_real_escape_string($conn,$_POST['email_detailed']);
	$phone_num =  mysqli_real_escape_string($conn, $_POST['phone_num_detailed']);
	$user_comment = mysqli_real_escape_string($conn, $_POST['user_comments_detailed']);
	$appointment_date = date("h:i:sa") ." ". date("Y-m-d") ; 
	$status = "active";
	$agent_comment = "";
	$reference_id = rand(10, 100000);
	$mls_id = mysqli_real_escape_string($conn, $_POST['mls_id_detailed']);
	
	$query = "insert into $table (first_name, last_name, email, phone_num, user_comment, appointment_date, status, agent_comment, reference_id, mls_id) 
	values ('$firstName', '$lastName', '$email', '$phoneNumber', '$user_comment', '$appointment_date', '$status', '$agent_comment', '$reference_id', '$mls_id')";

	if(mysqli_query($conn, $query)){
		$conn = null;
			
		client_email($email, "AccountSupport@handsonproperty.com", $firstName, $lastName, $user_comment, $appointment_date, $reference_id, $mls_id);
		//header("location:".$_SERVER['HTTP_REFERER']);
		header("location:../buyproperty.php");
	}else{
		echo 'No record added';
		echo (mysqli_error($conn));
	}	
	
	
}else{
	header("location:".$_SERVER['HTTP_REFERER']);
}

	function client_email($to, $from, $fname, $lname, $user_comment, $appointment_date, $reference_id, $mls_id) { 

		
		// subject
		$subject = "Appointment with Hands on Property";

		// message
		$message = "
		<html>
		<head>
		<title>Appointment with Hands on Property</title>
		</head>
		<body>
		
		<p>
		Dear <b>$fname $lname</b>,
		<br /><br />
		You recently booked an appointment with us in regards to the Property MLS #$mls_id. Your appointment details are below:
		<br /><br />
		<b>Appointment booked on:</b> $appointment_date
		<br />
		<b>Submitted Inquiry:</b> '$user_comment'
		<br />
		<b>Reference ID:</b> $reference_id
		<br /><br /><br />


		Should you have any comment, please contact us at 111-123-1234 with the <b>Reference ID</b> provided.<br /><br />
		With Regards,
		<br />
		Team Hands on Property
		</p>
		</body>
		</html>
		";


		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// Additional headers
		$headers .= "To: $to" . "\r\n";
		$headers .= "From: Hands On Property <$from>" . "\r\n";

		// Mail it
		mail($to, $subject, $message, $headers);
	}
?>