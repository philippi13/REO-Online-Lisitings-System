<?php

if(empty($_POST)){
	// database authentication

	$table = "property";
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
	
	echo "<link rel='stylesheet' type='text/css' href='../css/w3.css'>";
	
	$query = "select street_num, street_name, postal_code, region, city, province_territory, price from $table where city='Toronto'";
	if($results = mysqli_query($conn, $query)){
		

		
		/* fetch associative array */
		while($row = mysqli_fetch_row($results)){
			$street_num = $row[0];
			$street_name = $row[1];
			$postal_code = $row[2];
			$region = $row[3];
			$city = $row[4];
			$province_territory = $row[5];
			$price = $row[6];
			
			// header for each cardview
			echo "<div class='w3-card-2'>";
			echo "<table><tr>";
			

				
				echo "<td>";
				// every images for each 
				$image_query = "select image_path from property_images where mls_id = 'C3659403'";
				if($image_results = mysqli_query($conn, $image_query)){
					
					
					// one image using break
					while($row = mysqli_fetch_row($image_results)){
						//$image_path = $_SERVER['SERVER_NAME']."/reo".$row[0];
						$image_path = "/reo".$row[0];
						echo "<img src='$image_path' width='100' height='100' />" . "<br />";
						break;
					}
				}
				echo "</td>";
				
				// fill data
				echo "<td>";
				echo "<b>$street_num $street_name</b>
					<br /><br />
					\$$price
					<br />
					<a href='#'>Buy property</a>
					";
				echo "</td>";
				
			echo "</tr></table>";
			
			// footer for cardview
			echo "</div>";
			echo "<br />";
		}
		
		
	}
	
	mysqli_close($conn);
}
else{
	
}
?>