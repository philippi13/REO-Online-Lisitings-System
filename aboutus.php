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
    <img src="img/kalvin/about/z.jpg" style="width:100%" height=600>
  </div>
</div>


<!-- Page content -->


<br/><hr>
<h1 align=center>About Us</h1>
<hr>
<div align=center>

Hands On Property is a company of realtors that first established itself in Thunder Bay before <br/>
expanding to Toronto and the surrounding municipalities. Their services include granting estimates<br/>
 to homes on their market value, as well as inspecting homes to help homeowners to understand<br/>
 the condition of their home before putting it on the market.<br/><br>
Hands On Property delivers services to its customers with the latest technologies, <br>
offering them support with timely information and market data.<br/>
<hr>
<h2>The History</h2><hr>
Tim Thomas is the CEO of the real estate intelligent system that is used to find the market value of your property.<br/>
 The contract has been made up on September, 2016. The expectation of the company is to become a leading provider <br/>
 of the house appraisal market in Canada. Tim Thomas is the CEO, and provided the funds for this project.<br/>
  The amount allocated for the development of this system was $35,000. UIDX worked on the real estate<br/>
	 intelligent system by the funds that Tim Thomas provides.
	<br/><br/><br/><br/>
	<br/><br/><br/><br/>


</div>

<?php
showFooter();
?>
