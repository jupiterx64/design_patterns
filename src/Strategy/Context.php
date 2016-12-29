<?php

namespace DP\Strategy;

use DP\Strategy\Strategies\IStrategy;

class Context
{
    private $strategy;

    public function __construct(IStrategy $strategy = null) {
        $this->strategy = $strategy;
    }

    public function apply() {
        if (is_null($this->strategy)) {
            echo 'No strategy defined!' . '<br>';
            return;
        }

        $this->strategy->query();
    }

    public function setStrategy(IStrategy $strategy) {
        $this->strategy = $strategy;
    }
}
