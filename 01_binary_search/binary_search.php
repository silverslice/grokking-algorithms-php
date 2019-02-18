<?php

/**
 * Binary search
 */

$list = [0, 2, 5, 20, 28, 39, 89, 177];

echo binarySearch($list, 5) . PHP_EOL;

function binarySearch($list, $item)
{
    $low = 0;
    $high = count($list) - 1;

    while ($low <= $high) {
        $mid = floor(($low + $high) / 2);
        $guess = $list[$mid];
        if ($guess === $item) {
            return $mid;
        }
        if ($item < $guess) {
            $high = $mid - 1;
        } else {
            $low = $mid + 1;
        }
    }

    return null;
}
