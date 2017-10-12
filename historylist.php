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
    <img src="img/kalvin/history/sold.jpg" style="width:100%" height=600>
  </div>
</div>


<!-- Page content -->


<br/><hr>
<h1 align=center>Sold Properties</h1>
<hr>
<div align="center">
    <img src="img/kalvin/history/houses.png">
</div><br>
<div align="center">
 <a href="">More Properties</a>
</div>
<br><br><br><br><br><br>

 <br>


<?php
showFooter();
?>
