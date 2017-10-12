<?php
if(!empty($_POST)){
	// database authentication

	$table_user = "user";
	$table_favourite_house_listing = "favourite_house_listing";
	$table_appointment = "appointment";
	$table_search_preferences = "search_preferences";
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
	
	//$email = mysqli_real_escape_string($conn, $_POST['email_change']);
	$phone_num = mysqli_real_escape_string($conn, $_POST['phone_change']);
	$user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
	
	$query = "update $table_user set phone_num='$phone_num' where email='$user_name'";
	$results = mysqli_query($conn, $query);


	mysqli_close($conn);

	header("location:".$_SERVER['HTTP_REFERER']);
}else
{
	header("location:".$_SERVER['HTTP_REFERER']);
}
?>