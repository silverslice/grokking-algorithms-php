<?php

require_once __DIR__ . '/../vendor/autoload.php';

/**
 * Breadth First Search
 * O(V+E)
 */

use Ds\Queue;

$graph['you'] = ['alice', 'bob', 'claire'];
$graph['bob'] = ['anuj', 'peggi'];
$graph['alice'] = ['peggi'];
$graph['claire'] = ['thom', 'jonny'];
$graph['anuj'] = [];
$graph['peggi'] = [];
$graph['thom'] = [];
$graph['jonny'] = [];

$res = breadthFirstSearch($graph);
var_dump($res);

function breadthFirstSearch($graph)
{
    $searched = [];
    $searchQueue = new Queue();
    $searchQueue->push(...$graph['you']);

    while (!$searchQueue->isEmpty()) {
        $person = $searchQueue->pop();
        if (!in_array($person, $searched)) {
            if (personIsSeller($person)) {
                return $person;
            } else {
                $searchQueue->push(...$graph[$person]);
                $searched[] = $person;
            }
        }
    }

    return null;
}


function personIsSeller($person)
{
    return $person[-1] === 'm';
}

