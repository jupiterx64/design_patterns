<?php

namespace DP\Behavioral\Strategy\Strategies;

class Update implements IStrategy
{
    public function query() {
        echo 'Update logic...' . '<br>';
    }
}
