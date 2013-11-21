<?php
    if (isset($_POST['submit'])) {
        // define variables and set to empty values
        $name = $type = $description = "";

        $name = $_POST["name"];
        $type = $_POST["type"];
        $description = $_POST["description"];

        echo $name;
        echo $type;
        echo $description;
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
          <option>Light Beers</option>
          <option>Belgian</option>
          <option>Ales</option>
          <option>Imports</option>
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
