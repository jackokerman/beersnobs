<!-- <h1 class="text-center">Reviews</h1> -->

<?php
    include("include/utilities.php");
    include("include/dbconnect.php");
    // define variables and set to empty values

    function printSection($type, $db) {
        echo "<hr><h2>" . typeDbToDisplay($type) . "</h2><hr>";
        $result = mysqli_query($db, "SELECT * FROM beer WHERE type='{$type}'")
            or die("Problem querrying table: " . mysqli_error($db));
        echo "<div class='row'>";
        while ($row = mysqli_fetch_array($result)) {
            $url = $_SERVER['REQUEST_URI'] . "&name=" . urlencode($row['beer_name']);
            echo "<div class='col-md-3 col-sm-4 text-center'>" .
                "<h3>" . $row['beer_name'] . "<h3>" .
                "<a href='" . $url . "''>" .
                    "<img src='img/beer.jpg' style='width: 200px; margin: auto'>" .
                "</a>" .
            "</div>";
        }
        echo "</div>";
    }

    function printBeerPage($name, $db) {
        printBeerHeader($name, $db);
        printBeerReviews($name, $db);
    }

    function printBeerHeader($name, $db) {
        $queryName = mysqli_real_escape_string($db,$name);
        $tasteAvg    = getColAverage("taste", $queryName, $db);
        $aromaAvg    = getColAverage("aroma", $queryName, $db);
        $valueAvg    = getColAverage("value", $queryName, $db);
        $overallAvg  = roundRating(($tasteAvg + $aromaAvg + $valueAvg) / 3);
        $description = getBeerDescription($queryName, $db);
        echo "<div class='row'>" .
                "<div class='col-md-4 text-center'>" .
                    "<img src='img/beer.jpg'>".
                "</div>".
                "<div class='col-md-8'>" .
                    "<h3>" . $name . "</h3><br>" .
                    "<h5>Rating</h5>" .
                    "<div class='row'>" .
                        "<div class='col-md-3'>Taste</div>" .
                        "<div class='col-md-4'>" . numberToBeer(roundRating($tasteAvg)) . "</div>" .
                    "</div>".
                    "<div class='row'>" .
                        "<div class='col-md-3'>Aroma</div>" .
                        "<div class='col-md-4'>" . numberToBeer(roundRating($aromaAvg)) . "</div>" .
                    "</div>".
                    "<div class='row'>" .
                        "<div class='col-md-3'>Value</div>" .
                        "<div class='col-md-4'>" . numberToBeer(roundRating($valueAvg)) . "</div>" .
                    "</div>".
                    "<div class='row'>" .
                        "<div class='col-md-3'>Overall</div>" .
                        "<div class='col-md-4'>" . numberToBeer(roundRating($overallAvg)) . "</div>" .
                    "</div><br>".
                    "<h5>Description</h5>" .
                    "<div class='row'>" .
                        "<div class='col-md-12'>" . $description . "</div>" .
                    "</div>" .
                "</div>".
            "</div><hr>";
    }

    function getColAverage($col, $name, $db) {
        $result = mysqli_query($db, "SELECT AVG({$col}) FROM review WHERE beer_name='{$name}'")
            or die("Problem querrying table: " . mysqli_error($db));
        $row = mysqli_fetch_row($result);
        $avg = $row[0];
        return roundRating($avg);
    }

    function getBeerDescription($name, $db) {
        //$name = mysqli_real_escape_string($db,$name);
        $result = mysqli_query($db, "SELECT description FROM beer WHERE beer_name='{$name}'")
            or die("Problem querrying table: " . mysqli_error($db));
        $row = mysqli_fetch_row($result);
        $description = $row[0];
        return $description;
    }

    function printBeerReviews($name, $db) {
        $name = mysqli_real_escape_string($db,$name);
        echo "<div class='row'><h3>Reviews</h3></div>";
        echo "<div class='row'>Want to submit your own beer review? Go to our <a href='index.php?page=addreview'>Write a Review</a> page to make it happen</div><br>";
        $result = mysqli_query($db, "SELECT * FROM review WHERE beer_name='{$name}' ORDER BY date")
            or die("Problem querrying table: " . mysqli_error($db));
        while ($review = mysqli_fetch_array($result)) {
            printReview($review);
        }
    }

    function printReview($review) {
        $overallAvg = roundRating(($review["taste"] + $review["aroma"] + $review["value"]) / 3);
        echo "<div class='row'>" .
                "<div class='row'>" .
                    "<div class='col-md-4'><em>" . $review["user"] . ", " . $review['date'] . "</em></div>" .
                "</div>" .
                "<div class='row'>" .
                    "<div class='col-md-4'>" .
                        "<div class='row'>" .
                            "<div class='col-md-6'>Taste</div>" .
                            "<div class='col-md-6'>" . numberToBeer(roundRating($review['taste'])) ."</div>" .
                        "</div>" .
                        "<div class='row'>" .
                            "<div class='col-md-6'>Aroma</div>" .
                            "<div class='col-md-6'>" . numberToBeer(roundRating($review['aroma'])) ."</div>" .
                        "</div>" .
                        "<div class='row'>" .
                            "<div class='col-md-6'>Value</div>" .
                            "<div class='col-md-6'>" . numberToBeer(roundRating($review['value'])) ."</div>" .
                        "</div>" .
                        "<div class='row'>" .
                            "<div class='col-md-6'>Overall</div>" .
                            "<div class='col-md-6'>" . numberToBeer($overallAvg) ."</div>" .
                        "</div>" .
                    "</div>" .
                    "<div class='col-md-8'>" .
                        $review["comment"] .
                    "</div>" .
                "</div>".
            "</div><br>";
    }

    if (isset($_GET['name'])) {
        printBeerPage($_GET['name'], $dblocalhost);
    }

    else {
        if (isset($_GET['type'])) {
            printSection($_GET['type'], $dblocalhost);
        }

        else {
            $types = array("american-lager", "light-beer", "belgian", "ale", "import");
            foreach($types as $type) {
                printSection($type, $dblocalhost);
            }
        }
    }

    mysqli_close($dblocalhost);
?>