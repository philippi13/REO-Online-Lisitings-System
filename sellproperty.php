<?php
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

<!-- Page content -->
<br><br><br><br><hr>
<h1 align=center>Intelligence Estimation System	</h1>
<hr>
<table border=1px; align=center class="sad">
	<div style="max-width:2000px;margin-top:0px">

		<thead>
			<th class="sad" colspan="2">
				<br>
				<form action="sellpage2.php" method="post" name="enterstuff">Enter your address: <br><br>
					<input type="text" id="address" name="address" placeholder="e.g. 4700 Keele St, Toronto, M3J 1P3"><br>
					<br>
				</th>
			</thead>

		</div>

		<tr align="center">

			<td class="sad">
				<br>	Bedrooms:<br>
				<select id=soflow name="bed">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4+">4+</option>
				</select>
				<br>
			</td>

			<td class="sad">
				<br>	Washrooms:<br>
				<select id=soflow name="wash">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4+">4+</option>
				</select>
				<br>
			</td>

		</tr>

		<tr align="center">
			<td class="sad" colspan="2">
				<br>	House Type: <br>
				<select id=soflow name="type">
					<option value="Detached">Detached</option>
					<option value="Semi-Detached">Semi-Detached</option>
					<option value="Linked">Linked</option>
					<option value="Townhouse">Townhouse</option>
				</select>
			</td>
		</tr>
		<br>
		<tr align="center">
			<td class="sad">
				<br>	Garage Size: <br>
				<select id=soflow name="garage">
					<option value="None">None</option>
					<option value="1 Car">1 Car</option>
					<option value="2 Cars">2 Cars</option>
					<option value="3 Cars+">3 Cars+</option>
				</select>
			</td>
			<td class="sad">
				<br>	Stories: <br>
				<select id=soflow name="floor">
					<option value="Ground floor">Ground floor</option>
					<option value="2 stories">2 stories</option>
					<option value="3rd floor+">3 stories+</option>
				</select>
				<br>
			</td>
		</tr>

		<tr align="center">
			<td class="sad" colspan="2">
				<br>Basement: <br>
				<select id="soflow" name="basement">
					<option value="None">None</option>
					<option value="Unfinished">Unfinished</option>
					<option value="Finished">Finished</option>
					<option value="Finished with Separate Entrance">Finished with Separate Entrance</option>
				</select>
			</td>
		</tr>

		<br>

		<tr align="center">
			<td class="sad" colspan="2">
				<br>	Approximate Square Footage:<br><br>
				<div class="squarefoot"><input type="text" name="squarefoot" placeholder="e.g. 2000"> sq ft
					<br><br></div>
				</td>
			</tr>

			<br>
			<br>

			<tr align="center">
				<td class="sad" colspan="2">
					<br>
					<input class="submit-button" type="submit" onclick="" value="Get Estimate">
					<br><br>
				</form>
			</td>
		</tr>


	</table>

	<br><br><br><br><br><br><br><br><br><br>


	<?php
	showFooter();
	?>
