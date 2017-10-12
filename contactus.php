<?php
session_start();

include("library.php");

if(!empty($_SESSION['user'])){
	$email = $_SESSION['user'];
	showHeader("Hands on Property Contact Us", "", 1, $email);
}else{
	showHeader("Hands on Property Contact Us", "", 0, "");
}
loginModal();
recoverLoginModal();
signUpModal();
?>

<div class="w3-content" style="max-width:2000px;margin-top:0px">

	<!-- Automatic Slideshow Images -->
	<div class="mySlides w3-display-container w3-center">
		<img src="img/kalvin/contactform/cc.jpg" style="width:100%">
	</div>
</div>


<!-- Page content -->


<br/><hr>
<h1 align=center>Contact Us</h1>
<hr>
<div id="contactform" style="width: 25%;margin: auto; padding: 10px;">
	<form method="post" action="#">

		<label for="Subject">Subject:</label><br />
		<input type="text" size="50" name="Subject" id="Subject" /><br />

		<br/>	<label for="Name">Name:</label><br />
		<input type="text" size="50" name="Name" id="Name" /><br />

		<br/>	<label for="Email">Email:</label><br />
		<input type="text" size="50" name="Email" id="Email" /><br />

		<div>
			<br />	<label for="Message">Message:</label><br />
			<textarea name="Message" rows="10" cols="50" id="Message"></textarea>
			<br/><br/>
			<input type="submit" name="submit" onclick="sendEmail()" value="Send" class="submit-button" />
		</div>
	</form>

	<br/><br/><br/><br/><hr>
	<div align=center	>
		<h1 align=center>Our Location</h1>
<hr>


		<img src="img/kalvin/contactform/map.png" style="width:80%; 	border: 1px solid black;">
		<br/><br/>
		<b>Head Office</b> <br/>
		Hands On Properties <br/>
		144 Simcoe Street,<br> Toronto, ON<br> M5H 3G4<br><br>
		1-416-523-153
	</div>


	<br/><br/><br/><br/>
	<br/><br/><br/><br/>


</div>

<?php
showFooter();
?>
