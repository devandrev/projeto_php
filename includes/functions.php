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

function msg_susccess($message)
{
    $answer = "<div class='success'><i class='material-icons md-36'>check_circle</i>$message</div>";
    return $answer;
}

function msg_info($message)
{
    $answer = "<div class='info'><i class='material-icons md-36'>info</i>$message</div>";
    return $answer;
}

function msg_error($message)
{
    $answer = "<div class='error'><i class='material-icons md-36'>error</i>$message</div>";
    return $answer;
}
