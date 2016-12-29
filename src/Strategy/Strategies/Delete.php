<?php

namespace DP\Strategy\Strategies;

class Delete implements IStrategy
{
    public function query() {
        echo 'Delete logic...' . '<br>';
    }
}
