<?php
if(!empty($_POST)){
	if(!empty($_POST['resetpassword']) && !empty($_POST['email'])){
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
		
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$new_password = mysqli_real_escape_string($conn, $_POST['password']);
		$new_password_crypted = crypt($new_password, $email);
	
		$query = "select * from $table where email='$email'";
		$results = mysqli_query($conn, $query);	
		$count = mysqli_num_rows($results);
		
		if($count == 1){
			
			$value = mysqli_fetch_object($results);
			$firstName = $value->first_name;
			$lastName = $value->last_name;
			$update_query = "update user set password='$new_password_crypted' where email='$email'";
			if(mysqli_query($conn, $update_query)){
				$conn = null;
				client_email($email, "AccountSupport@handsonproperty.com", $firstName, $lastName, $email, $new_password);
				
				header("location:../index.php");
			}else{
				echo 'No new password added';
				echo (mysqli_error($conn));
			}
		}
	}	
}
else{
	header("location:../index.php");
}

	function client_email($to, $from, $fname, $lname, $username, $password) { 

		
		// subject
		$subject = "Your password has been reset - Hands on Property";

		// message
		$message = "
		<html>
		<head>
		<title>Client Information</title>
		</head>
		<body>
		
		<p>
		Dear $fname $lname,
		<br /><br />
		Your new login credentials are:
		<br /><br />
		Username: $username
		<br />
		Password: $password
		<br /><br />
		Best Regards,<br />
		Team HOPS
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