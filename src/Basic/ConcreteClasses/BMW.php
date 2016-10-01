<?php

namespace DP\Basic\ConcreteClasses;

use DP\Basic\Interfaces\CarInterface;

class BMW implements CarInterface
{
    public function drive() {
        echo 'Driving bmw...';
    }
}
