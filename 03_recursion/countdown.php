<?php

countdown(5);
echo PHP_EOL;

function countdown($i)
{
    if ($i <= 0) {
        return;
    }

    echo $i . ' ';
    countdown($i - 1);
}
