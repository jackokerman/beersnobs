<?php
    include("include/utilities.php");
    include("include/dbconnect.php");
    if (isset($_POST['submit'])) {
        // define variables and set to empty values
        $name = $type = $description = "";

        $name = $_POST["name"];
        $type = typeDisplayToDb($_POST["type"]);
        $description = $_POST["description"];

        $insertbeer = "INSERT INTO beer (beer_name,type,description) VALUES('$name', '$type', '$description')";
        $dbbeerrecord = mysqli_query($dblocalhost,$insertbeer)
            or die("Problem writing to table: " . mysqli_error($dblocalhost));
        /*echo $name;
        echo $type;
        echo $description;*/
        echo "<h2>Sumbission Sucessful</h2>";
        mysqli_close($dblocalhost);
    }
    else {
?>

<h2>Add A Beer</h2>
<form method="post" action="" role="form">
    <div class="form-group">
        <label for="beername">Beer Name</label>
        <input type="text" class="form-control" id="beername" placeholder="Beer Name" name="name">
    </div>
    <div class="form-group">
        <label>Beer Type</label>
        <select class="form-control" name="type">
          <option>American Lager</option>
          <option>Light Beer</option>
          <option>Belgian</option>
          <option>Ale</option>
          <option>Import</option>
          <option>Other</option>
        </select>
    </div>
    <div class="form-group">
        <label>Beer Description</label>
        <textarea class="form-control" rows="5" name="description"></textarea>
    </div>
    <button type="submit" class="btn btn-default" value="submit" name="submit">Submit</button>
</form>

<?
    }
?>
