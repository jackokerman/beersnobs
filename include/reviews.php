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

    $dbbeerrecord = mysqli_query($dblocalhost,"SELECT * FROM review")
        or die("Problem writing to table: " . mysqli_error($dblocalhost));
    while($row = mysqli_fetch_array($dbbeerrecord))
  	{
  		echo "<tr>";
  		echo "<td>" .$row['beer_name'] . "</td>";
  		echo "<td>" . $row['taste'] . "</td>";
  		echo "<td>" . $row['aroma'] . "</td>";
      echo "<td>" . $row['value'] . "</td>";
      echo "<td>" . $row['comment'] . "</td>";
  		echo "</tr>";
  	}
  	mysqli_close($dblocalhost);
?>

</table>