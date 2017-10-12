<?php
	session_start();
	
	include("library.php");
	
	
		
	// save search preferences
	if(isset($_POST['save_search_preferences']) && !empty($_SESSION['user'])){
					
		saveSearchPreferences($_SESSION['region_search'], $_SESSION['property_type'],  $_SESSION['min_price'],  $_SESSION['max_price'],  $_SESSION['property_exterior'],  $_SESSION['user']);
			
	}

	
	if(!empty($_SESSION['user'])){
		$email = $_SESSION['user'];
		showHeader("Hands on Property Buy Property", "", 1, $email);
	}else{
		showHeader("Hands on Property Buy Property", "", 0, "");
	}
	

	loginModal();
	recoverLoginModal();
	signUpModal();
	getDetailedListing();
	searchPropertyErrorModal ();
	

	

	

?>
<!-- Page content -->
<div class="w3-container" style="margin-top:50px">

<?php
	if(!empty($_GET['mls_id'])){
		echo "
			<script type='text/javascript'>
				var d = document.getElementById('detailedListingModal').style.display='block';
			</script>
			<br />
		";
	}else{
		echo '<br />';
	}
?>
	<h4 class='w3-wide w3-left'>Property For Sale</h4>
</div>
<div class="w3-content" style="max-width:2000px;margin-top:0px">

	
	<div class="w3-card-2 w3-center w3-padding-8" style="max-width:100%"> <!--style="max-width:800px" id="band" -->
		
		<table class='w3-table' border='1'>
			<tr>
				<td>
					<!-- search fields -->
					<form action='<?php echo $_SERVER['PHP_SELF'];?>' method='post' onsubmit='return validateSearchPropertyForm()' name='SearchPropertyForm'>
					<input type='text' name='region_search' placeholder='Search by region (Scarborough, Markham, etc.)'
					 <?php
						// fill region search value
						if(isset($_SESSION['savedsearch_region'])){
							echo " value='".$_SESSION['savedsearch_region']."'";
						}
					 ?>
					>
					<input type='submit' name='search' value='Search property'>
					
				</td>
				<td >
					<ul class="w3-navbar w3-black" style='margin:0'>
					  <li><a onclick='showHouseType()'>Home Type (4) <i class="fa fa-caret-down"></i></a>
					  
					  		<div class="w3-dropdown-content w3-white w3-card-4" id='dropDownHome'>
								
								<table class='w3-bordered w3-striped w3-small'>
									<tr><td><input type='radio' name='property_type' id='Detached' value='Detached'
									    <?php
											if(isset($_SESSION['savedsearch_home_type']))
												if($_SESSION['savedsearch_home_type'] == "Detached")
													echo "checked='checked'";
										?>
										> Detached</td></tr>
									<tr><td><input type='radio' name='property_type' id='Semi-Detached' value='Semi-Detached'
										<?php
											if(isset($_SESSION['savedsearch_home_type']))
												if($_SESSION['savedsearch_home_type'] == "Semi-Detached")
													echo "checked='checked'";
										?>		
									
										> Semi-Detached</td></tr>
									<tr><td><input type='radio' name='property_type' id='Townhouse' value='Townhouse'
										<?php
											if(isset($_SESSION['savedsearch_home_type']))
												if($_SESSION['savedsearch_home_type'] == "Townhouse")
													echo "checked='checked'";
										?>
										> Townhouse</td></tr>
									<tr><td><input type='radio' name='property_type' id='Apartment' value='Apartment'
										<?php
											if(isset($_SESSION['savedsearch_home_type']))
												if($_SESSION['savedsearch_home_type'] == "Apartment")
													echo "checked='checked'";
										?>
									
									> Apartment</td></tr>
								</table>
							  
							</div>
					  </li>


					  
					  <li><a onclick='showPriceOption()'>Any Price <i class="fa fa-caret-down"></i></a>
					  		<div class="w3-dropdown-content w3-white w3-card-4" id='dropDownPrice'>
								
								<table class='w3-bordered w3-striped w3-small'>
									<tr>
										<td>$ <input type='text' name='min_price' size='10' placeholder="Min" 
											<?php
												if(isset($_SESSION['savedsearch_min_price'])){
													echo " value='".$_SESSION['savedsearch_min_price']."'";
												}
											?>
												></td>
										<td>to</td>
										<td>$ <input type='text' name='max_price' size='10' placeholder="Max"
											<?php
												if(isset($_SESSION['savedsearch_max_price'])){
													echo " value='".$_SESSION['savedsearch_max_price']."'";
												}
											?>
										
										></td>
									</tr>
								</table>
							  
							</div>
					  
					  </li>

					  
							
					  <li><a onclick='showBedAmount()'>Exterior <i class="fa fa-caret-down"></i></a>
					  		<div class="w3-dropdown-content w3-white w3-card-4" id='dropDownExterior'>
								
								<table class='w3-bordered w3-striped w3-small'>
									<tr><td><input type='radio' name='property_exterior' value='Brick'
									    <?php
											if(isset($_SESSION['savedsearch_exterior']))
												if($_SESSION['savedsearch_exterior'] == "Brick")
													echo "checked='checked'";
										?>									
									> Brick</td></tr>
									<tr><td><input type='radio' name='property_exterior' value='Concrete'
									    <?php
											if(isset($_SESSION['savedsearch_exterior']))
												if($_SESSION['savedsearch_exterior'] == "Concrete")
													echo "checked='checked'";
										?>									
									
									> Concrete</td></tr>
									<tr><td><input type='radio' name='property_exterior' value='Stone'
										<?php
											if(isset($_SESSION['savedsearch_exterior']))
												if($_SESSION['savedsearch_exterior'] == "Stone")
													echo "checked='checked'";
										?>								
									> Stone</td></tr>
									<tr><td><input type='radio' name='property_exterior' value='Stucco/Plaster'
										<?php
											if(isset($_SESSION['savedsearch_exterior']))
												if($_SESSION['savedsearch_exterior'] == "Stucco/Plaster")
													echo "checked='checked'";
										?>					
									
									> Stucco/Plaster</td></tr>
								</table>
							  
							</div>
					  
					  </li>

					  
					  </form>
					  <li><a href="#">More</a></li>
					 
					  <?php if(isset($_POST['search'])){
								$counter = count($_POST);
								
								$_SESSION['min_price'] = $_POST['min_price'];
								$_SESSION['max_price'] = $_POST['max_price'];
								$_SESSION['region_search'] =  $_POST['region_search'];
								
								// region, min_price, max_price,           home_type  or exterior
								if($counter == 5){
									if(isset($_POST['property_type']))
										$_SESSION['property_type'] = $_POST['property_type'];
									else
										$_SESSION['property_exterior'] = $_POST['property_exterior'];
										
								}
								
								// every search field
								if($counter == 6){
									$_SESSION['property_type'] = $_POST['property_type'];
									$_SESSION['home_type'] = $_POST['home_type'];

								}								

						  
								  echo " <li class='w3-right'>
								  <form method='post' action='buyproperty.php'>
									 <input type='submit' id='save_search_preferences' name='save_search_preferences' value='Save Search Preferences'></form></li>";
								  }
								  else{
									  echo " <li class='w3-right w3-navitem'>Save search preferences by registering with HOPS.</li>";
								  }
					  ?>
					  
					  

					   
					</ul>
					
			
					
				</td>
			</tr>
			<tr>
				<td style='width:30%;height:100%'>
					<div class='w3-container w3-padding-4' style='overflow:scroll; overflow-x:hidden;width:100%;height:100%'>

					<!-- cardview CONTENT -->
					<?php  
					
					// get generic listing
					if(empty($_POST)){
						// paramters $region, $home_type, $min_price, $max_price, $exterior, $counter
						getPropertyList("", "", "", "", "", "");
					}
					
					// get specific search listing
					else{
						
						
						/*
						if(isset($_POST['save_search_preferences'])){
							
							if(!empty($_SESSION['user'])){
								
							}
							else{
							echo "<script type='text/javascript'>var d = document.getElementById('loginModal').style.display='block';
							
							</script>";
							}
						}*/
						

						
						$counter = count($_POST);
						
						// region, min_price, max_price
						if($counter == 4){
							getPropertyList($_POST['region_search'], "", $_POST['min_price'], $_POST['max_price'], "", $counter);
						}
						
						// region, min_price, max_price,           home_type  or exterior
						if($counter == 5){
							if(isset($_POST['property_type']))
								getPropertyList($_POST['region_search'], $_POST['property_type'], $_POST['min_price'], $_POST['max_price'], "", $counter);
							else
								getPropertyList($_POST['region_search'], "", $_POST['min_price'], $_POST['max_price'], $_POST['property_exterior'], $counter);
						}
						
						// every search field
						if($counter == 6){
							getPropertyList($_POST['region_search'], $_POST['property_type'], $_POST['min_price'], $_POST['max_price'], $_POST['property_exterior'], $counter);
						}
					}
					
					?>
					
					</div>
				</td>
				
				<td>
					<!-- map -->
					<div id="map" style="width:100%;height:800px; z-index:-1"></div>
				</td>


			</tr>
			
		</table>
<?php 
/*
	if(!empty($_POST)){
		print_r($_POST);
	}*/
?>
	</div>
	


</div>
<br /><br /><br /><br />
<script>
	function showHouseType() {
		// hide other drop menus
		var y = document.getElementById("dropDownExterior").style.visibility = 'hidden';
		var z = document.getElementById("dropDownPrice").style.visibility = 'hidden';
		
		var x = document.getElementById("dropDownHome");
		x.style.visibility = 'visible';
		if (x.className.indexOf("w3-show") == -1) {
			x.className += " w3-show";
		} else { 
			x.className = x.className.replace(" w3-show", "");
		}
	    //var y = document.getElementById("dropDownExterior").style.visibility = 'visible';
		//var z = document.getElementById("dropDownPrice").style.visibility = 'visible';
	}
	
	
	function showBedAmount() {
		// hide other drop menus
		var y = document.getElementById("dropDownHome").style.visibility = 'hidden';
		var z = document.getElementById("dropDownPrice").style.visibility = 'hidden';
		
		var x = document.getElementById("dropDownExterior");
		x.style.visibility = 'visible';
		if (x.className.indexOf("w3-show") == -1) {
			x.className += " w3-show";
		} else { 
			x.className = x.className.replace(" w3-show", "");
		}
	}
	
	function showPriceOption() {
		// hide other drop menus
		var y = document.getElementById("dropDownExterior").style.visibility = 'hidden';
		var z = document.getElementById("dropDownHome").style.visibility = 'hidden';
		
		var x = document.getElementById("dropDownPrice");
		x.style.visibility = 'visible';
		if (x.className.indexOf("w3-show") == -1) {
			x.className += " w3-show";
		} else { 
			x.className = x.className.replace(" w3-show", "");
		}
	}
</script>


<!-- Google Maps -->
<script>/*
      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

        function initMap() {
			
	    // creates a map with Toronto's coordinates, fill markers on top of it
        var map = new google.maps.Map(document.getElementById('map'), {
          //center: new google.maps.LatLng(-33.863276, 151.207977),
		  center: new google.maps.LatLng(43.6532, -79.3832),
		  zoom: 10,
		  draggable: true,
		  mapTypeId: google.maps.MapTypeId.ROADMAP
        });
		

		
		google.maps.event.addDomListener(window, 'load', initialize);
		
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          //downloadUrl('https://storage.googleapis.com/mapsdevsite/json/mapmarkers2.xml', function(data) {
		
		  downloadUrl('regionXMLParser.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');  // xml tag 'marker'
			
			
            Array.prototype.forEach.call(markers, function(markerElem) {
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lon')));

			  // Show Info Window when clicked on marker
			  
			  // create new instance of a label for marker called 'infowindowincontent'
              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
			  
			  
			  // listener for markers to put marker into map
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }
		


	   // opens up a connection
      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
	  */
	     function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: {lat: 43.761539, lng: -79.411079}
      });
      var geocoder = new google.maps.Geocoder();


      geocodeAddress(geocoder, map);

    }

    function geocodeAddress(geocoder, resultsMap) {
      var address = document.getElementById('address').value;
      geocoder.geocode({'address': address}, function(results, status) {
        if (status === 'OK') {
          resultsMap.setCenter(results[0].geometry.location);

          var marker = new google.maps.Marker({
            map: resultsMap,
            position: results[0].geometry.location
          });
        } else {
          alert('Address was not successful for the following reason: ' + status + address);
        }
      });
    }
    </script>
<!--
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script>
var myCenter = new google.maps.LatLng(43.6532, -79.3832);
    
function initMap() {
    var mapProp = {
    center: myCenter,
    zoom: 12,
    scrollwheel: true,
    draggable: true,
    mapTypeId: google.maps.MapTypeId.ROADMAP
};
    
var map = new google.maps.Map(document.getElementById("map"),mapProp);
    
var marker = new google.maps.Marker({
    position: myCenter,
});
    
marker.setMap(map);
}
    
google.maps.event.addDomListener(window, 'load', initialize);
</script>
	  <!-- draws map with key -->
      <script async defer 
	  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHsdmmH0sItPxybhRbKM-Qq5t26Lm4Llg&callback=initMap"></script>

<?php
	showFooter();
?>