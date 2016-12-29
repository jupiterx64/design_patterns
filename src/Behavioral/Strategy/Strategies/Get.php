<?php

namespace DP\Behavioral\Strategy\Strategies;

class Get implements IStrategy
{
    public function query() {
        echo 'Get logic...' . '<br>';
    }
}
