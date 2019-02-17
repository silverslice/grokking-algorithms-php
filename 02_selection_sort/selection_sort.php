<?php

/**
 * Selection sort
 */

$ar = [20, 5, 177, 89, 0, 39, 2, 28];

$res = selectionSort($ar);
echo implode(' ', $res) . PHP_EOL;


function selectionSort($ar)
{
    $res = [];
    $size = count($ar);
    for ($i = 0;  $i < $size; $i++) {
        $smallestIndex = getSmallestIndex($ar);
        $res[] = $ar[$smallestIndex];
        unset($ar[$smallestIndex]);
    }

    return $res;
}

function getSmallestIndex($numbers)
{
    $smallest = null;
    $smallestIndex = null;
    foreach ($numbers as $i => $number) {
        if (is_null($smallest)) {
            $smallest = $number;
            $smallestIndex = $i;
        } elseif ($number < $smallest) {
            $smallest = $number;
            $smallestIndex = $i;
        }
    }

    return $smallestIndex;
}
