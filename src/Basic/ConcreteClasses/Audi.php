<?php

namespace DP\Basic\ConcreteClasses;

use DP\Basic\Interfaces\CarInterface;

class Audi implements CarInterface
{
    public function drive() {
        echo 'Driving audi...';
    }
}
