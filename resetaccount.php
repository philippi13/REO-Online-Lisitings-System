<?php
if(!empty($_GET)){
	 
	// check if user exists
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
	
	$email = $_GET['email'];
	$new_key = $_GET['reset'];
	
	$query = "select * from $table where email='$email' and password='$new_key'";
	$results = mysqli_query($conn, $query);	
	$count = mysqli_num_rows($results);

	
	if($count == 1){

		// Reset Password Page
		include("library.php");
		showHeader("Hands on Property", "", 0, "");
		loginModal();
		recoverLoginModal();
		signUpModal();
		echo "
			
			<!-- Page content -->
			<div class='w3-content' style='max-width:2000px;margin-top:0px'>
				<div class='w3-container w3-content w3-center w3-padding-64' style='max-width:800px'>
				<form method='post' action='./php/resetAccountController.php' name='ResetPasswordForm' onsubmit='return validateResetPasswordForm()'>
				<table>
					<tr>
						<td>New password:</td>
						<td><input type='password' name='password' size='25' > </td>
						
					</tr>
					
					<tr>
						<td></td>
						<td class='w3-left'><input type=\"submit\" name=\"resetpassword\" value='Reset password'>
						<input type='hidden' name='email' value='".$_GET['email']."'> </td>
					</tr>
				</table>
				</form>
				<p id='resetpassword_msg'>
				
				</p>
				</div>
			</div>
			<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
			";
		showFooter();
		//header("location:index.php");
			
	}
	else{
		header("location:index.php");
	}
	

	

	
	
}
else{
	header("location:index.php");
	/*
		if(!isset($_SERVER)){
		header("location: {$_SERVER['HTTP_REFERER']}");
	}
	else{
		header("location: index.php");
	}
	*/
}

?>


