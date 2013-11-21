<?php
	$dblocalhost = mysql_connect("localhost","root","")
		or die("Could not connect:". mysql_error());

	mysql_select_db("beersnobs", $dblocalhost)
		or die("Could not connect:". mysql_error());
	echo "<h1> Connected to Database! </h1>";
?>