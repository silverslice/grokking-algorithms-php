<?php

require 'Dijkstra.php';

/**
 * Dijkstra's algorithm
 */

$d = new Dijkstra();
$d->graph = [
    'START' => [
        'A' => 10,
    ],
    'A' => [
        'B' => 20,
    ],
    'B' => [
        'FIN' => 30,
        'C' => 1
    ],
    'C' => [
        'B' => 1,
    ],
    'FIN' => []
];
$d->costs = [
    'A' => 10,
    'B' => INF,
    'C' => INF,
    'FIN' => INF,
];
$d->parents = [
    'A' => 'START',
    'B' => null,
    'C' => null,
    'FIN' => null,
];
$d->calc();

echo 'Min: ' . $d->getMinCost() . PHP_EOL;
echo 'Path: ' . $d->getPath() . PHP_EOL;



