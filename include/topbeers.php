<hr><h1>TopBeers</h1><hr>


<?php
    include("include/dbconnect.php");
    include("include/utilities.php");
    // define variables and set to empty values

    // $dbbeerrecord = mysqli_query($dblocalhost,"SELECT * FROM beer")
    //     or die("Problem writing to table: " . mysqli_error($dblocalhost));
    // while($row = mysqli_fetch_array($dbbeerrecord))

    $beerRank = array();
    $result = mysqli_query($dblocalhost, "SELECT beer_name FROM beer")
        or die("Problem querrying table: " . mysqli_error($dblocalhost));
    while ($row = mysqli_fetch_row($result)) {
        //$row[0] = mysqli_real_escape_string($dblocalhost,$row[0]);
        $beerRank[$row[0]] = getReviewsAvg($row[0], $dblocalhost);
    }

    arsort($beerRank);
    $i = 1;
    foreach ($beerRank as $name => $rating) {
        // echo "$name = $rating" . "<br>";
        echo "<div class='row text-center'>" .
                "<div class='col-md-1'>" .
                    "<h3>{$i}</h3>".
                "</div>" .
                "<div class='col-md-3'>" .
                    "<img src='img/beer.jpg' style='height: 150px;'>" .
                "</div>" .
                "<div class='col-md-3'>" .
                    "<h3>{$name}</h3>".
                "</div>" .
                "<div class='col-md-3'>" .
                    "<h3>" . getBeerType($name, $dblocalhost) . "</h3>" .
                "</div>" .
                "<div class='col-md-2'>" .
                    "<h3>" . number_format($rating, 1) . "</h3>" .
                "</div>" .
            "</div>";
        $i++;
    }

    function getBeerType($name, $db) {
        $name = mysqli_real_escape_string($db,$name);
        $result = mysqli_query($db, "SELECT type FROM beer WHERE beer_name='{$name}'")
            or die("Problem querrying table: " . mysqli_error($db));
        return typeDbToDisplay(mysqli_fetch_row($result)[0]);
    }

    function getReviewsAvg($name, $db) {
        $name = mysqli_real_escape_string($db,$name);
        $tasteAvg = getColAverage("taste", $name, $db);
        $aromaAvg = getColAverage("aroma", $name, $db);
        $valueAvg = getColAverage("value", $name, $db);
        $overallAvg = ($tasteAvg + $aromaAvg + $valueAvg) / 3;
        return $overallAvg;
    }

    function getColAverage($col, $name, $db) {
        $name = mysqli_real_escape_string($db,$name);
        $result = mysqli_query($db, "SELECT AVG({$col}) FROM review WHERE beer_name='{$name}' ")
            or die("Problem querrying table: " . mysqli_error($db));
        $row = mysqli_fetch_row($result);
        $avg = $row[0];
        return $avg;
    }

    mysqli_close($dblocalhost);
?>
