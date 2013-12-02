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
    echo "<table class='table'>" .
            "<thead>" .
                "<tr>" .
                    "<th>#</th>" .
                    "<th>Image</th>" .
                    "<th>Name</th>" .
                    "<th>Type</th>" .
                    "<th>Rating</th>" .
                "<tr>" .
            "</thead>" .
            "<tbody>";
            foreach ($beerRank as $name => $rating) {
                echo "<tr>" .
                        "<td>{$i}</td>" .
                        "<td>" .
                            "<a href='index.php?page=reviews&name=" . urlencode($name) . "'>" .
                                "<img src='img/beer.jpg' style='height: 150px;'>" .
                            "</a>" .
                        "</td>" .
                        "<td>{$name}</td>" .
                        "<td>" . getBeerType($name, $dblocalhost) . "</td>" .
                        "<td>" . number_format($rating, 1) . "</td>" .
                    "</tr>";
                $i++;
            }
     echo   "</tbody>" .
        "</table>";

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
