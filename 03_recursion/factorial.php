<?php

echo factorial(3) . PHP_EOL;

function factorial($n)
{
    if ($n === 1) {
        return 1;
    }

    return $n * factorial($n - 1);
}
