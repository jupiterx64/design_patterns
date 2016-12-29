<?php

namespace DP\Strategy\Strategies;

class Get implements IStrategy
{
    public function query() {
        echo 'Get logic...' . '<br>';
    }
}
