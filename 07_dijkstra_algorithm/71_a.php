<?php

require 'Dijkstra.php';

/**
 * Dijkstra's algorithm
 */

$d = new Dijkstra();
$d->graph = [
    'START' => [
        'A' => 5,
        'B' => 2,
    ],
    'A' => [
        'C' => 4,
        'D' => 2,
    ],
    'B' => [
        'A' => 8,
        'D' => 7
    ],
    'C' => [
        'FIN' => 3,
        'D' => 6,
    ],
    'D' => [
        'FIN' => 1
    ],
    'FIN' => []
];
$d->costs = [
    'A' => 5,
    'B' => 2,
    'C' => INF,
    'D' => INF,
    'FIN' => INF,
];
$d->parents = [
    'A' => 'START',
    'B' => 'START',
    'C' => null,
    'D' => null,
    'FIN' => null,
];
$d->calc();

echo 'Min: ' . $d->getMinCost() . PHP_EOL;
echo 'Path: ' . $d->getPath() . PHP_EOL;



