<?php

	session_start();
	
	include("library.php");
	
	if(!empty($_SESSION['user'])){
		$email = $_SESSION['user'];
		showHeader("Hands on Property", "", 1, $email);
	}else{
		showHeader("Hands on Property", "", 0, "");
	}
	loginModal();
	recoverLoginModal();
	signUpModal();
	getDetailedListing();
	

?>


<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:0px">

  <!-- Automatic Slideshow Images -->
  <div class="mySlides w3-display-container w3-center">
    <img src="./img/img1.jpg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
    <!--  <h3>House 1</h3>
      <p><b>Best house ever!</b></p>   -->
    </div>
  </div>
  <div class="mySlides w3-display-container w3-center">
    <img src="./img/img2.jpg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
     <!-- <h3>House 2</h3>
      <p><b>Not as good as house!</b></p>    -->
    </div>
  </div>
  <div class="mySlides w3-display-container w3-center">
    <img src="./img/img3.jpg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
    <!--  <h3>House 3</h3>
      <p><b>What a house!</b></p>    -->
    </div>
  </div>
  <div class="mySlides w3-display-container w3-center">
    <img src="./img/img4.jpg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
     <!-- <h3>House 4</h3>
      <p><b>It's ok!</b></p>    -->
    </div>
  </div>

  <!-- The Company Section -->
  <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="company">
    <h2 class="w3-wide"><b>Hands On Property</b></h2>
    <p class="w3-opacity"><i>Welcome to Hands on Property where we make property handling a breeze!</i></p>
	<div class='w3-row w3-padding-32'>
    <p class="w3-justify">
		
	</p>
	</div>

	<h2 class="w3-wide">Featured Houses</h2>

  </div>
</div>
	<center>
	<table class='w3-centered'>
		<tr>
		<td><a href='index.php?build=alpha&mls_id=C3651227'><img src='./img/property_images/featured/mls_id_C3651227.png'></a></td>
		<td><a href='index.php?build=alpha&mls_id=E3658226'><img src='./img/property_images/featured/mls_id_E3658226.png'></a></td>
		<td><a href='index.php?build=alpha&mls_id=N3662235'><img src='./img/property_images/featured/mls_id_N3662235.png'></a></td>
		</tr>
		</tr>
	</table>
	</center>
<br /><br /><br /><br /><br /><br /><br /><br /><br />


<script>
// Automatic Slideshow - change image every 4 seconds
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 4000);    
}

// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}

// When the user clicks anywhere outside of the modal, close it
var modal = document.getElementById('ticketModal');
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

<?php
if(isset($_GET['mls_id']) && isset($_GET['build'])){
	
			echo "
			<script type='text/javascript'>
				var d = document.getElementById('detailedListingModal').style.display='block';
			</script>
			<br />
			";
		
}
	showFooter();
?>