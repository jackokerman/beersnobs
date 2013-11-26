<?php
    function typeDisplayToDb($display_type) {
        $words = explode(" ", $display_type);
        $db_type = "";
        for ($i = 0; $i < count($words); $i++) {
            $db_type = $db_type . lcfirst($words[$i]);
            if ($i < count($words) - 1)
                $db_type = $db_type . "-";
        }
        return $db_type;
    }

    function typeDbToDisplay($display_type) {
        $words = explode("-", $display_type);
        $db_type = "";
        for ($i = 0; $i < count($words); $i++) {
            $db_type = $db_type . ucfirst($words[$i]);
            if ($i < count($words) - 1)
                $db_type = $db_type . " ";
        }
        return $db_type;
    }

    function roundRating($rating) {
        return number_format((round($rating * 2) / 2), 1);
    }
?>