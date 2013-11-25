<h1>Reviews</h1>

<table class = "table-bordered">
	<tr>
		<th>Beer Name</th>
		<th>Taste</th>
		<th>Aroma</th>
    <th>Value</th>
    <th>Comment</th>
	</tr>	
<?php
    include("include/dbconnect.php");
    // define variables and set to empty values

    $dbbeerrecord = mysql_query("SELECT * FROM review", $dblocalhost)
        or die("Problem writing to table: " . mysql_error());
    while($row = mysql_fetch_array($dbbeerrecord))
  	{
  		echo "<tr>";
  		echo "<td>" .$row['beer_name'] . "</td>";
  		echo "<td>" . $row['taste'] . "</td>";
  		echo "<td>" . $row['aroma'] . "</td>";
      echo "<td>" . $row['value'] . "</td>";
      echo "<td>" . $row['comment'] . "</td>";
  		echo "</tr>";
  	}
  	mysql_close($dblocalhost);
?>

</table>