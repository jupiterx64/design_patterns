<?php

namespace DP\Strategy\Strategies;

class Insert implements IStrategy
{
    public function query() {
        echo 'Insert logic...' . '<br>';
    }
}
