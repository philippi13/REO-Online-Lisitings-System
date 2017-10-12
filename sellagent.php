<?php
session_start();

include("library.php");
if(!isset($_SESSION['user']) || empty($_SESSION['user'])){
	header("location:index.php");
}
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
    <img src="img/kalvin/sellproperty/real.jpg" style="width:100%; height:850px">
  </div>
</div>


<!-- Page content -->


<br/><hr>
<h1 align=center>Send to Real Estate Agent</h1>
<hr>
<div id="contactform" style="width: 25%;margin: auto; padding: 10px;">
  <form method="post" action="#">
    <br/>	<label for="Name">First Name:</label><br />
    <input type="text" size="50" name="fName" id="fName" /><br />

    <br/>	<label for="Name">Last Name:</label><br />
    <input type="text" size="50" name="lName" id="lName" /><br />

    <br/>	<label for="Email">Phone Number:</label><br />
    <input type="text" size="50" name="phone" id="phone" /><br />

    <br/>	<label for="Email">Email:</label><br />
    <input type="text" size="50" name="Email" id="Email" /><br />


    <div>
      <br/><br/>
      <input type="submit" name="submit" onclick="sendEmail()" value="Send" class="submit-button" />
    </div>
  </form>



  <br/><br/><br/><br/><hr>

</div>


<br/><br/><br/><br/>
<br/><br/><br/><br/>


</div>

<?php
showFooter();
?>
