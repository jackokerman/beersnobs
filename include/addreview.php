<?php
    include("include/dbconnect.php");
    if (isset($_POST['submit'])) {
        // define variables and set to empty values
        $name = $type = $description = "";

        $user = $_POST["username"];
        $name = $_POST["name"];
        $taste = $_POST["taste"];
        $aroma = $_POST["aroma"];
        $value = $_POST["value"];
        $comment = $_POST["comment"];

        $insertreview = "INSERT INTO review (user,beer_name,date,taste,aroma,value,comment)
                        VALUES('$user','$name',now(),'$taste','$aroma','$value','$comment')";
        $dbbeerrecord = mysqli_query($dblocalhost,$insertreview)
            or die("Problem writing to table: " . mysqli_error($dblocalhost));
        echo "<h2>Sumbission Sucessful</h2>";

        echo $name;
        echo $taste;
        echo $aroma;
        echo $value;
        mysqli_close($dblocalhost);
    }
    else {
?>

<h2>Submit A Review</h2>
<form method="post" action="" role="form">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" placeholder="Ex: John Doe" name="username">
    </div>
    <div class="form-group">
        <label>Beer</label>
        <select class="form-control" name="name">
            <?php
                include("include/dbconnect.php");
                $dbbeerrecord = mysqli_query($dblocalhost,"SELECT beer_name FROM beer")
                    or die("Problem writing to table: " . mysqli_error($dblocalhost));

                while($row = mysqli_fetch_array($dbbeerrecord))
                {
                    echo "<option>" .$row['beer_name'] . "</option>";

                }
                mysqli_close($dblocalhost);
            ?>
        </select>
    </div>
    <div class="form-group">
        <label>Taste</label>
        <select class="form-control" name="taste">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
    </div>
    <div class="form-group">
        <label>Aroma</label>
        <select class="form-control" name="aroma">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
    </div>
    <div class="form-group">
        <label>Value</label>
        <select class="form-control" name="value">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
    </div>
    <div class="form-group">
        <label>Comments</label>
        <textarea class="form-control" rows="5" name="comment"></textarea>
    </div>
    <button type="submit" class="btn btn-default" value="submit" name="submit">Submit</button>
</form>

<?
    }
?>