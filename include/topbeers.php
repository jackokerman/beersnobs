<h1>TopBeers</h1>

<table class = "table-bordered">
	<tr>
		<th>Beer Name</th>
		<th>Type</th>
		<th>Description</th>
	</tr>	
<?php
    include("include/dbconnect.php");
    // define variables and set to empty values

    $dbbeerrecord = mysql_query("SELECT * FROM beer", $dblocalhost)
        or die("Problem writing to table: " . mysql_error());
    while($row = mysql_fetch_array($dbbeerrecord))
  	{
  		echo "<tr>";
  		echo "<td>" .$row['beer_name'] . "</td>";
  		echo "<td>" . $row['type'] . "</td>";
  		echo "<td>" . $row['description'] . "</td>";
  		echo "</tr>";
  	}
  	mysql_close($dblocalhost);
?>

</table>