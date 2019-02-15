<?php

class Dijkstra
{
    public $graph = [];
    public $costs = [];
    public $parents = [];

    protected $processed = [];

    public function calc()
    {
        // get node with lowest cost
        $node = $this->findLowestCostNode();
        while ($node) {
            // update costs of neighbors
            $nodeCost = $this->costs[$node];
            $neighbors = $this->graph[$node];
            foreach ($neighbors as $neighbor => $weight) {
                $newCost = $nodeCost + $weight;
                // if the cost of the neighbor was decreased, update costs and parents
                if ($newCost < $this->costs[$neighbor]) {
                    $this->costs[$neighbor] = $newCost;
                    $this->parents[$neighbor] = $node;
                }
            }
            $this->processed[] = $node;

            // get next node
            $node = $this->findLowestCostNode();
        }
    }

    public function getMinCost()
    {
        return $this->costs['FIN'];
    }

    public function getPath()
    {
        $node = 'FIN';
        $steps = [$node];
        while ($node !== 'START') {
            $steps[] = $node = $this->parents[$node];
        }

        $rSteps = array_reverse($steps);

        return implode(' -> ', $rSteps);
    }

    protected function findLowestCostNode()
    {
        $lowestCost = INF;
        $lowestNode = null;
        foreach ($this->costs as $node => $cost) {
            if ($cost < $lowestCost && !in_array($node, $this->processed)) {
                $lowestCost = $cost;
                $lowestNode = $node;
            }
        }

        return $lowestNode;
    }
}
