<?php

use Ds\Set;

$statesNeeded = new Set(['mt', 'wa', 'or', 'id', 'nv', 'ut', 'ca', 'az']);
$finalStations = new Set();

$stations = [];
$stations['kone'] = new Set(['id', 'nv', 'ut']);
$stations['ktwo'] = new Set(['wa', 'id', 'mt']);
$stations['kthree'] = new Set(['or', 'nv', 'ca']);
$stations['kfour'] = new Set(['nv', 'ut']);
$stations['kfive'] = new Set(['ca', 'az']);

while (!$statesNeeded->isEmpty()) {
    $bestStation = null;
    $statesCovered = null;

    // we need to loop through the stations and find, which station covers more states
    foreach ($stations as $station => $states) {
        $covered = $statesNeeded->intersect($states);
        if (count($covered) > count($statesCovered)) {
            $bestStation = $station;
            $statesCovered = $covered;
        }
    }

    $statesNeeded = $statesNeeded->diff($statesCovered);
    $finalStations->add($bestStation);
}

echo $finalStations->join(' ') . PHP_EOL;
