<?php

namespace DP\Creational\FactoryMethod\ParameterizedFactory\Factory;

use DP\Creational\FactoryMethod\ParameterizedFactory\Products\IProduct;

// Could be an interface too!
// Depends on what do we need
abstract class Baker
{
    protected abstract function make(IProduct $product);

    public function bake(IProduct $product) {
        return $this->make($product);
    }
}
