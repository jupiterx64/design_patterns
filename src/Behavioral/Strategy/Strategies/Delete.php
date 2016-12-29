<?php

namespace DP\Behavioral\Strategy\Strategies;

class Delete implements IStrategy
{
    public function query() {
        echo 'Delete logic...' . '<br>';
    }
}
