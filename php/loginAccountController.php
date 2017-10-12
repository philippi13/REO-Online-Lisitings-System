<?php
if(!empty($_POST)){
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
	$userName =  mysqli_real_escape_string($conn, $_POST['userName']);
	$password = crypt(mysqli_real_escape_string($conn, $_POST['passWord']), $userName);
	
	
	$query = "select * from $table where email='$userName' and password = '$password'";
	$results = mysqli_query($conn, $query);	
	$count = mysqli_num_rows($results);
	
	// user exists
	if($count == 1){
		
		// start session
		session_start();
		
		$_SESSION['user'] = $userName;
		
		// redirect to page the user came in but start session
		header("location:".$_SERVER['HTTP_REFERER']);
	}
	else{
		header("location:".$_SERVER['HTTP_REFERER']);
	}
}	
else{
	header("location:../index.php?login=failed");
}
?>