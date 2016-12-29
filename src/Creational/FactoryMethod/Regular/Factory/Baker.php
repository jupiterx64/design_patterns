<?php

namespace DP\Creational\FactoryMethod\Regular\Factory;

// Could be an interface too!
// Depends on what do we need
abstract class Baker
{
    protected abstract function make();

    public function bake() {
        return $this->make();
    }
}
