<h1 class="text-center">Reviews</h1>

<?php
    include("include/utilities.php");
    include("include/dbconnect.php");
    // define variables and set to empty values

    function printSection($type, $db) {
        echo "<h2>" . typeDbToDisplay($type) . "</h2>";
        $result = mysqli_query($db, "SELECT * FROM beer WHERE type='{$type}'")
            or die("Problem querrying table: " . mysqli_error($db));
        echo "<div class='row'>";
        while ($row = mysqli_fetch_array($result)) {
            $url = $_SERVER['REQUEST_URI'] . "&name=" . $row['beer_name'];
            echo "<div class='col-md-4'>" .
                "<h3 class='text-center'>" . $row['beer_name'] . "<h3>" .
                "<a href='" . $url . "''>" .
                    "<img src='img/beer.jpg'>" .
                "</a>" .
            "</div>";
        }
        echo "</div>";
    }

    function printReviews($name, $db) {
        $tasteAvg = getColAverage("taste", $name, $db);
        $aromaAvg = getColAverage("aroma", $name, $db);
        $valueAvg = getColAverage("value", $name, $db);
        $overallAvg = ($tasteAvg + $aromaAvg + $valueAvg) / 3;
        echo "taste " . $tasteAvg . "<br>";
        echo "aroma " . $aromaAvg . "<br>";
        echo "value " . $valueAvg . "<br>";
        echo "overall " . $overallAvg . "<br>";
    }

    function getColAverage($col, $name, $db) {
        $result = mysqli_query($db, "SELECT AVG({$col}) FROM review WHERE beer_name='{$name}' ")
            or die("Problem querrying table: " . mysqli_error($db));
        $row = mysqli_fetch_row($result);
        $avg = $row[0];
        return $avg;
    }

    if (isset($_GET['name'])) {
        printReviews($_GET['name'], $dblocalhost);
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