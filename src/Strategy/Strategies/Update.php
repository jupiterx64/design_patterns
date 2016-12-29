<?php

namespace DP\Strategy\Strategies;

class Update implements IStrategy
{
    public function query() {
        echo 'Update logic...' . '<br>';
    }
}
