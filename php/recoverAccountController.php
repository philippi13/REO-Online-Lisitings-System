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
	
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	
	$query = "select * from $table where email='$email'";
	$results = mysqli_query($conn, $query);	
	$count = mysqli_num_rows($results);
	
	if($count == 1){
		$value = mysqli_fetch_object($results);
		$firstName = $value->first_name;
		$lastName = $value->last_name;
		
		// unique user password reset key with combination of email and current time as salt
		$new_key = crypt($email, time());
		
		// password url 
		$pwurl = "http://handsonproperty.peterhuang.net/resetaccount.php?email=".$email."&reset=".$new_key;
		
		$update_query = "update user set password='$new_key' where email='$email'";
		
		if(mysqli_query($conn, $update_query)){
			$conn = null;
			
			// send email with reset key
			client_email($email, "AccountSupport@handsonproperty.com", $firstName, $lastName, $email, $pwurl);
			//header("location:".$_SERVER['HTTP_REFERER']);
			header("location:../index.php");
		}
		else{
			echo 'No record changed';
			echo (mysqli_error($conn));
		}
		
		
		


	}
	else{
		echo "problem";
	}
}
else{
	header("location:../index.php?registration=1");
	
}
	function client_email($to, $from, $fname, $lname, $username, $pwurl) { 

		
		// subject
		$subject = "Reset Password - Hands on Property";

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
		It appears that you have requested a password reset at our website. Please follow the link below to reset your password:
		<br /><br />
		<a href='".$pwurl."'>$pwurl</a>
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