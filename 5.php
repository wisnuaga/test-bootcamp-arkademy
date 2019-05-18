<?php

function minmax($data)
{
    // find min
    $min = 0;
    for ($i = 1; $i < sizeof($data); $i++) {
        if ($data[$i] < $data[$min]) {
            $min = $i;
        }
    }

    // find max
    $max = $min;
    for ($i = $max; $i < sizeof($data); $i++) {
        if ($data[$i] > $data[$max]) {
            $max = $i;
        }
    }

    return [$data[$min], $data[$max]];
}

$data = ['h', 'g', 'a', 'b', 'd', 'f'];
$data2 = ['a', 'b', 'c', 'd'];

$a = minmax($data);
$b = minmax($data2);

var_dump($data);
var_dump($a);

var_dump($data2);
var_dump($b);
