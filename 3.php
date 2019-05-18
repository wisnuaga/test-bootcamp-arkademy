<?php

function myCountChar($string, $char)
{
    $count = 0;
    for ($i = 0; $i < strlen($string); $i++) {
        if ($char == $string[$i]) {
            $count++;
        }
    }
    return $count;
}

echo myCountChar("bootcamp", "o");
