<?php
    include("include/dbconnect.php");
    if (isset($_POST['submit'])) {
        // define variables and set to empty values
        $name = $type = $description = "";

        $user    = mysqli_real_escape_string($dblocalhost,$_POST["username"]);
        $name    = mysqli_real_escape_string($dblocalhost,$_POST["name"]);
        $taste   = $_POST["taste"];
        $aroma   = $_POST["aroma"];
        $value   = $_POST["value"];
        $comment = mysqli_real_escape_string($dblocalhost,$_POST["comment"]);

        $insertreview = "INSERT INTO review (user,beer_name,date,taste,aroma,value,comment)
                        VALUES('$user','$name',now(),'$taste','$aroma','$value','$comment')";
        $dbbeerrecord = mysqli_query($dblocalhost,$insertreview)
            or die("Problem writing to table: " . mysqli_error($dblocalhost));
        // echo "<h2>Sumbission Sucessful</h2>";

        // echo $name;
        // echo $taste;
        // echo $aroma;
        // echo $value;
        header("Location: index.php?page=reviews&name=" . urlencode($_POST["name"]) . "&reviewed={$user}");
        mysqli_close($dblocalhost);
    }
    else {
?>

<form method="post" action="" role="form" onsubmit="return validateReview()">
    <div class="row">
        <div class="col-md-12">
            <hr><h1>Submit A Review</h1><hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Ex: John Doe" name="username">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Beer</label>
                <select class="form-control" name="name">
                    <?php
                        include("include/dbconnect.php");
                        $dbbeerrecord = mysqli_query($dblocalhost,"SELECT beer_name FROM beer")
                            or die("Problem writing to table: " . mysqli_error($dblocalhost));
                        while ($row = mysqli_fetch_array($dbbeerrecord)) {
                            if (isset($_GET["beer"]) && $row["beer_name"] == $_GET["beer"]) {
                                echo "<option selected='selected'>" .$row['beer_name'] . "</option>";
                            }
                            else
                                echo "<option>" .$row['beer_name'] . "</option>";
                        }
                        mysqli_close($dblocalhost);
                    ?>
                </select>
            </div>
        </div>
    </div>
    <div id="setratingtaste" class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label>Taste</label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <input id = "tasterate" type="hidden" class="form-control" name="taste">
                <img src="img/rate_0.gif" id="T1" alt="0" title="Not at All"/>
                <img src="img/rate_0.gif" id="T2" alt="1" title="Somewhat" />
                <img src="img/rate_0.gif" id="T3" alt="2" title="Average" />
                <img src="img/rate_0.gif" id="T4" alt="3" title="Good" />
                <img src="img/rate_0.gif" id="T5" alt="4" title="Very Good"/>
            </div>
        </div>
    </div>
    <div id="setratingaroma" class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label>Aroma</label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <input id = "aromarate" type="hidden" class="form-control" name="aroma">
                <img src="img/rate_0.gif" id="A1" alt="0" title="Not at All"/>
                <img src="img/rate_0.gif" id="A2" alt="1" title="Somewhat" />
                <img src="img/rate_0.gif" id="A3" alt="2" title="Average" />
                <img src="img/rate_0.gif" id="A4" alt="3" title="Good" />
                <img src="img/rate_0.gif" id="A5" alt="4" title="Very Good"/>
            </div>
        </div>
    </div>
    <div id="setratingvalue" class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label>Value</label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <input id = "valuerate" type="hidden" class="form-control" name="value">
                <img src="img/rate_0.gif" id="V1" alt="0" title="Not at All"/>
                <img src="img/rate_0.gif" id="V2" alt="1" title="Somewhat" />
                <img src="img/rate_0.gif" id="V3" alt="2" title="Average" />
                <img src="img/rate_0.gif" id="V4" alt="3" title="Good" />
                <img src="img/rate_0.gif" id="V5" alt="4" title="Very Good"/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Comments</label>
                <textarea id="comment" class="form-control" rows="5" name="comment"></textarea>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-default" value="submit" name="submit" style="margin-bottom: 50px;">Submit</button>
</form>

<?
    }
?>