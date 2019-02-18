<?php

/**
 * Quick sort
 */

$ar = [20, 2, 5, 177, 89, 0, 39, 2, 28];

$res = quickSort($ar);
echo implode(' ', $res) . PHP_EOL;

function quickSort($list)
{
    $count = count($list);
    if ($count < 2) {
        return $list;
    }

    $pivot = $list[0];
    $less = [];
    $greater = [];
    for ($i = 1; $i < $count; $i++ ) {
        if ($list[$i] <= $pivot) {
            $less[] = $list[$i];
        } else {
            $greater[] = $list[$i];
        }
    }

    return array_merge(quickSort($less), [$pivot], quickSort($greater));
}
