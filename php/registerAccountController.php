<?php
if(!empty($_POST))
{

	
	// database authentication

	$table = "user";
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
		
	
	// remove sql injection and encrypt password
	$passWord_unecrypted = $_POST['passWord'];
	$firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
	$lastName =  mysqli_real_escape_string($conn, $_POST['lastName']);
	$phoneNumber =  mysqli_real_escape_string($conn, $_POST['phone_num']);
	$email =  mysqli_real_escape_string($conn, $_POST['email']);
	$passWord =  crypt(mysqli_real_escape_string($conn, $_POST['passWord']), $email);
	$role = 'customer';
	
	$query = "select * from $table where email='$email'";
	$results = mysqli_query($conn, $query);	
	$count = mysqli_num_rows($results);
		
	// user already exists
	if($count == 1)
	{
		 /*
		//echo "no secret $username<br />$password";
		session_register('username');
		session_register('password');
		header("location:upload.php");
		*/
		header("location:../index.php?registration=1");
	}
	else
	{
		
		$query = "insert into $table (first_name, last_name, email, phone_num, password, role) values('$firstName', '$lastName', '$email', '$phoneNumber', '$passWord', 'customer')";

		if(mysqli_query($conn, $query)){
			$conn = null;
			
			client_email($email, "AccountSupport@handsonproperty.com", $firstName, $lastName, $email, $passWord_unecrypted);
			header("location:".$_SERVER['HTTP_REFERER']);
		}else{
			echo 'No record added';
			echo (mysqli_error($conn));
		}
		//print_r($query);
		
	}
		
		
}
else{
	header("location:../index.php?registration=1");
}

	function client_email($to, $from, $fname, $lname, $username, $password) { 

		
		// subject
		$subject = "Welcome to Hands On Property";

		// message
		$message = "
		<html>
		<head>
		<title>Client Information</title>
		</head>
		<body>
		
		<p>
		Dear <b>$fname $lname</b>,
		<br /><br />
		Thank you for signing up with Hands on Property. Your personal details are below:
		<br /><br />
		Username: $username
		<br />
		Password: $password
		<br /><br />
		To login, visit <a href=''>Hands on Property</a>
		<br /><br />
		Best Regards,
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