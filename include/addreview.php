<?php
    if (isset($_POST['submit'])) {
        // define variables and set to empty values
        $name = $type = $description = "";

        $name = $_POST["name"];
        $taste = $_POST["taste"];
        $aroma = $_POST["aroma"];
        $value = $_POST["value"];
        $comment = $_POST["comment"];

        echo $name;
        echo $taste;
        echo $aroma;
        echo $value;
    }
    else {

?>

<h2>Submit A Review</h2>
<form method="post" action="" role="form">
    <div class="form-group">
        <label>Beer</label>
        <select class="form-control" name="type">
            <?php
                include "dbconnect.php";
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
