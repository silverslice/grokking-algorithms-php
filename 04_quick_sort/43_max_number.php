<?php

/*
 * Max number in list
 */

$ar = [5, 2, 3, 9, 6, 18];

echo maxAr($ar) . PHP_EOL;

function maxAr($ar)
{
    if (count($ar) === 1) {
        return $ar[0];
    }

    $maxNext = maxAr(array_slice($ar, 1));
    if ($ar[0] > $maxNext) {
        return $ar[0];
    }

    return $maxNext;
}
