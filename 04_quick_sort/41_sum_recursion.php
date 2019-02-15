<?php

/*
 * Sum of elements - recursion
 */

$ar = [5, 2, 3, 1, 6];

echo sumAr($ar) . PHP_EOL;

function sumAr($ar)
{
    if (!$ar) {
        return 0;
    }

    return $ar[0] + sumAr(array_slice($ar, 1));
}
