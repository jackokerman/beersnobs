<?php
    include("include/utilities.php");
    include("include/dbconnect.php");
    if (isset($_POST['submit'])) {
        // define variables and set to empty values
        $name = $type = $description = "";

        $name = mysqli_real_escape_string($dblocalhost,$_POST["name"]);
        $type = typeDisplayToDb($_POST["type"]);
        $description = mysqli_real_escape_string($dblocalhost,$_POST["description"]);

        $insertbeer = "INSERT INTO beer (beer_name,type,description) VALUES('$name', '$type', '$description')";
        $dbbeerrecord = mysqli_query($dblocalhost,$insertbeer)
            or die("Problem writing to table: " . mysqli_error($dblocalhost));

        // $allowedExts = array("gif", "jpeg", "jpg", "png");
        // $temp = explode(".", $_FILES["file"]["name"]);
        // $extension = end($temp);
        // if ((($_FILES["file"]["type"] == "image/gif")
        // || ($_FILES["file"]["type"] == "image/jpeg")
        // || ($_FILES["file"]["type"] == "image/jpg")
        // || ($_FILES["file"]["type"] == "image/pjpeg")
        // || ($_FILES["file"]["type"] == "image/x-png")
        // || ($_FILES["file"]["type"] == "image/png"))
        // && ($_FILES["file"]["size"] < 800000)
        // && in_array($extension, $allowedExts))
        // {
        //     if ($_FILES["file"]["error"] > 0) {
        //     echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
        //     }
        //     else {
        //         echo "Upload: " . $_FILES["file"]["name"] . "<br>";
        //         echo "Type: " . $_FILES["file"]["type"] . "<br>";
        //         echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
        //         echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

        //         if (file_exists("/img/" . $_FILES["file"]["name"])) {
        //             echo $_FILES["file"]["name"] . " already exists. ";
        //         }
        //         else{
        //             move_uploaded_file($_FILES["file"]["tmp_name"],
        //                 "/img/" . $_FILES["file"]["name"]);
        //           echo "Stored in: " . "/img/" . $_FILES["file"]["name"];
        //         }
        //     }
        // }
        // else
        // {
        //   echo "Invalid file";
        // }


        /*echo $name;
        echo $type;
        echo $description;*/
        echo "<h2>Sumbission Sucessful</h2>";
        mysqli_close($dblocalhost);
    }
    else {
?>

<h2>Add A Beer</h2>
<form method="post" action="" role="form" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="beername">Beer Name</label>
                <input type="text" class="form-control" id="beername" placeholder="Beer Name" name="name">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
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
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Beer Description</label>
                <textarea class="form-control" rows="5" name="description"></textarea>
            </div>
        </div>
    </div>
<!--    
    <div class="row">
        <div class="col-md-6"> 
            <div class="form-group">
                <label for="file">Upload Image: </label>
                <input type="file" name="file" id="file"><br>
            </div>
        </div>
    </div> -->

    <button type="submit" class="btn btn-default" value="submit" name="submit">Submit</button>
</form>

<?
    }
?>
