<?php
	$dblocalhost = mysqli_connect("localhost","root","")
		or die("Could not connect:". mysqli_error());

	mysqli_select_db($dblocalhost, "beersnobs")
		or die("Could not connect:". mysqli_error($dblocalhost));
	echo "<h1> Connected to Database! </h1>";
?>