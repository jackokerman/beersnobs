<?php
    include("include/utilities.php");
    include("include/dbconnect.php");
    if (isset($_POST['submit'])) {
        // define variables and set to empty values
        $name = $type = $description = $imglocation = "";
        $upgood = 0;

        $name = mysqli_real_escape_string($dblocalhost,$_POST["name"]);
        $type = typeDisplayToDb($_POST["type"]);
        $description = mysqli_real_escape_string($dblocalhost,$_POST["description"]);

        $allowedExts = array("gif", "jpeg", "jpg", "png");
        $temp = explode(".", $_FILES["file"]["name"]);
        $extension = end($temp);
        if ((($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/jpg")
        || ($_FILES["file"]["type"] == "image/pjpeg")
        || ($_FILES["file"]["type"] == "image/x-png")
        || ($_FILES["file"]["type"] == "image/png"))
        && ($_FILES["file"]["size"] < 800000)
        && in_array($extension, $allowedExts))
        {
            if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
            }
            else {
                $imglocation =  "img/uploaded/" . preg_replace("/[^a-zA-Z0-9]/", "", $_POST["name"]) . "." . $extension;
                if (file_exists($imglocation)) {
                    echo "<div class='col-md-12'>" .
                        "<div class='alert alert-danger' style='margin-top: 20px;'>".
                            "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" .
                            "<strong>" . $imglocation . "already exists!</strong>" .
                        "</div>" .
                    "</div>";
                }
                else {
                    move_uploaded_file($_FILES["file"]["tmp_name"], $imglocation);
                    $upgood = 1;
                }
            }
        }
        else if ($_FILES["file"]["name"] == "") {
            $imglocation = "img/stock.jpg";
        }
        else {
            echo "<div class='col-md-12'>" .
                    "<div class='alert alert-danger' style='margin-top: 20px;'>".
                        "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" .
                        "<strong>Invalid File!</strong>" .
                    "</div>" .
                "</div>";
        }

        if ($upgood == 1) {
            $insertbeer = "INSERT INTO beer (beer_name,type,description,image) VALUES('$name', '$type', '$description', '$imglocation')";
            $dbbeerrecord = mysqli_query($dblocalhost,$insertbeer)
                or die("Problem writing to table: " . mysqli_error($dblocalhost));
            header("Location: index.php?page=reviews&added=" . urlencode($_POST["name"]));
        }
        mysqli_close($dblocalhost);
    }
?>

<hr><h1>Add A Beer</h1><hr>
<form method="post" action="" role="form" enctype="multipart/form-data" onsubmit="return validateBeer()">
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
                <textarea id="description" class="form-control" rows="5" name="description"></textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div style="position:relative;">
                    <a class='btn btn-default'>
                        Upload Image
                        <input type="file" style='position:absolute; z-index:2; top:0; left:0; opacity:0; width:115px; height: 37px;' name="file" id='file' size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                     </a>
                     &nbsp;
                    <span class='label label-info' id="upload-file-info"></span>
                </div>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-default" value="submit" name="submit">Submit</button>
</form>