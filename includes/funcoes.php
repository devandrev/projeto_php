<?php
function thumb($arc)
{
    $way = "images/$arc";

    if (is_null($arc) || !file_exists($way)) {
        return "images/ndis.png";
    } else {
        return $way;
    }
}
?>