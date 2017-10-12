<?php
//Variables

//Address
$input = $_POST['address'];
$bed = $_POST['bed'];
$wash = $_POST['wash'];
$type = $_POST['type'];
$garage = $_POST['garage'];
$floor = $_POST['floor'];
$base = $_POST['basement'];
$sqft = $_POST['squarefoot'];

/*
//Cookies
$cookie_name = "address";
$cookie_value = $input;

$cookie_name = "bed";
$cookie_value = $bed;

$cookie_name = "wash";
$cookie_value = $wash;

$cookie_name = "type";
$cookie_value = $type;

$cookie_name = "garage";
$cookie_value = $garage;

$cookie_name = "floor";
$cookie_value = $floor;

$cookie_name = "base";
$cookie_value = $base;

$cookie_name = "sqft";
$cookie_value = $sqft;

setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
*/



session_start();

include("library.php");

if(!empty($_SESSION['user'])){
  $email = $_SESSION['user'];
  showHeader("Hands on Property Sell Property", "", 1, $email);
}else{
  showHeader("Hands on Property Sell Property", "", 0, "");
}
loginModal();
recoverLoginModal();
signUpModal();
?>
<br><br><br><br>
<!-- Page content -->



<div align=center>
  <a href="sellproperty.php"><button class="submit-button">Back to Estimation</button></a>
  <a href="sellagent.php"><button class="submit-button">Contact Real Estate Agent</button></a>

</div>
<div class="wrap">

  <!-- LEFT SIDE  -->
  <br>

  <div class="floatleft" align="center">


    <br><br><br>
    <div id="map" style="width:80%;height:500px; border-width: 2px; border-style: solid;"></div>



    <div id="floating-panel">
      <input id="address" type="hidden" value="<?php echo "$input";?>"/>

    </div>
    <div id="map"></div>
    <script>
    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
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
    <script async defer src="
    https://maps.googleapis.com/maps/api/js?key=AIzaSyD0Ft18Ti5jfNEv-pLvdTvaH_wU8rDknS0&callback=initMap"
    type="text/javascript"></script>
  </div>


  <!-- RIGHT SIDE  -->
  <div class="floatright" align="center"><br><br><br><br>
    <hr>
    <h2>Address: "<?php echo $input;?>"</h2>
    <hr>
    <h2>Property Estimation: $<?php
    function estimation() {

      $input = $_POST['address'];
      $bed = $_POST['bed'];
      $wash = $_POST['wash'];
      $type = $_POST['type'];
      $garage = $_POST['garage'];
      $floor = $_POST['floor'];
      $base = $_POST['basement'];
      $sqft = $_POST['squarefoot'];

      $price = 0;

      //bedrooms
      if($bed == "1"){
        $price = $price + 1000;
      }
      elseif($bed=="2"){
        $price=$price + 2000;
      }
      elseif($bed=="3"){
        $price=$price + 3000;
      }
      elseif($bed=="4+"){
        $price=$price + 4000;
      }

      //washrooms
      if($wash == "1"){
        $price = $price + 1000;
      }
      elseif($wash=="2"){
        $price=$price + 2000;
      }
      elseif($wash=="3"){
        $price=$price + 3000;
      }
      elseif($wash=="4+"){
        $price=$price + 4000;
      }


      //housetype
      if($type == "Detached"){
        $price = $price + 5000;
      }
      elseif($type=="Semi-Detached"){
        $price=$price + 3000;
      }
      elseif($type=="Linked"){
        $price=$price + 500;
      }
      elseif($type=="Townhouse"){
        $price=$price + 1250;
      }

      //garage
      if($garage == "None"){
        $price = $price + 1000;
      }
      elseif($garage=="1 Car"){
        $price=$price + 2000;
      }
      elseif($garage=="2 Cars"){
        $price=$price + 3000;
      }
      elseif($garage=="3 Cars+"){
        $price=$price + 4000;
      }

      //stories
      if($floor == "None"){
        $price = $price + 1000;
      }
      elseif($floor=="1 Car"){
        $price=$price + 2000;
      }
      elseif($floor=="2 Cars"){
        $price=$price + 3000;
      }
      elseif($floor=="3 Cars+"){
        $price=$price + 4000;
      }

      //basement
      if($base == "None"){
        $price = $price + 1000;
      }
      elseif($base=="Unfinished"){
        $price=$price + 2000;
      }
      elseif($base=="Finished"){
        $price=$price + 3000;
      }
      elseif($base=="Finished with Separate Entrance"){
        $price=$price + 4000;
      }

      //squarefoot
      $price = $price + ($sqft * 500);


      echo $price;
    }
    estimation();
    ?>



  </h2>
  <hr><br>
  <table class="sad" border=0px>
    <tr>
      <td class="sad">
        <?php echo "<b>Bedrooms:</b> " . $bed?> <br><br>
      </td>
      <td class="sad">
        <?php echo "<b>Washrooms:</b> " . $wash?><br><br>
      </td>
    </tr>
    <tr>
      <td class="sad" colspan=2>
        <?php echo "<b>House Type:</b> " . $type?><br><br>
      </td>
    </tr>
    <tr>
      <td class="sad">
        <?php echo "<b>Garage Size:</b> " . $garage?><br><br>
      </td>
      <td class="sad">
        <?php echo "<b>Stories:</b> " . $floor?><br><br>
      </td>
    </tr>
    <tr>
      <td class="sad" colspan=2>
        <?php echo "<b>Basement:</b>   " . $base?><br><br>
      </td>
    </tr>
    <tr>
      <td class="sad" colspan=2>
        <?php echo "<b>Approx. Square Ft:</b> " . $sqft . " sq ft"?><br>
      </td>
    </tr>
  </table>
</div>

</div>
<br /><br /><br /><br />
</body>
</html>
