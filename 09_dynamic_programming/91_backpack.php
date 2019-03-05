<?php

$weights['player'] = 4;
$weights['notebook'] = 3;
$weights['guitar'] = 1;
$weights['iphone'] = 1;
$weights['mp3'] = 1;

$costs['player'] = 3000;
$costs['notebook'] = 2000;
$costs['guitar'] = 1500;
$costs['iphone'] = 2000;
$costs['mp3'] = 1000;

$res = fillBackpack($weights, $costs, 4);
print_r($res);

function fillBackpack($weights, $costs, $size)
{
    // calculate step - the minimum weight
    $step = min(...array_values($weights));

    // $cell[$i][$j] = ['cost' => 1500, 'objects' => ['player']]
    $cell = [];
    $objects = array_keys($weights);
    foreach ($objects as $i => $object) {
        for ($j = $step; $j <= $size; $j += $step) {

            $previousCell = $cell[$i-1][$j] ?? null;

            // if object is too big..
            if ($weights[$object] > $j) {
                if ($previousCell) {
                    $cell[$i][$j] = $previousCell;
                } else {
                    $cell[$i][$j] = [
                        'cost' => 0,
                        'objects' => [],
                    ];
                }
            } else {
                // select max cost between previous cell and current object + remaining weight cell
                $newCost = $costs[$object];
                $remainingWeightCell = $cell[$i-1][$j - $weights[$object]] ?? null;

                if ($remainingWeightCell) {
                    $newCost = $costs[$object] + $remainingWeightCell['cost'];
                }

                if ($previousCell) {
                    if ($newCost > $previousCell['cost']) {
                        $newObjects = $remainingWeightCell['objects'];
                        $newObjects[] = $object;
                        $cell[$i][$j] = [
                            'cost' => $newCost,
                            'objects' => $newObjects,
                        ];
                    } else {
                        $cell[$i][$j] = $previousCell;
                    }
                } else {
                    $cell[$i][$j] = [
                        'cost' => $newCost,
                        'objects' => [$object],
                    ];
                }
            }
        }
    }

    $res = $cell[$i][$j-$step] ?? [
        'cost' => 0,
        'objects' => [],
    ];

    //print_r($cell);

    return $res;
}

