<?php

function generateString($n = 6)
{
    $length = 32;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomArray = array();

    for ($i = 0; $i < $n; $i++) {
        $randomString = '';
        for ($j = 0; $j < $length; $j++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $randomArray[$i] = $randomString;
    }

    return $randomArray;
}

function checkDuplicate($genArray)
{
    $len = sizeof($genArray);
    for ($i = 0; $i < $len - 1; $i++) {
        for ($j = $i + 1; $j < $len; $j++) {
            if ($genArray[$i] == $genArray[$j]) {
                return false;
            }
        }
    }
    return true;
}

$gen = generateString(5);
$check = checkDuplicate($gen);

var_dump($gen);
var_dump($check);
