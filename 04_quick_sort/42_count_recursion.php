<?php

/*
 * Count of elements - recursion
 */

$ar = [5, 2, 3, 1, 6];

echo countAr($ar) . PHP_EOL;

function countAr($ar)
{
    if (!$ar) {
        return 0;
    }

    return 1 + countAr(array_slice($ar, 1));
}
