<?php

namespace DP\Creational\FactoryMethod\ParameterizedFactory\Factory;

use DP\Creational\FactoryMethod\ParameterizedFactory\Products\Bread;
use DP\Creational\FactoryMethod\ParameterizedFactory\Products\IProduct;

class BakerFactory extends Baker
{
    protected function make(IProduct $product) {
        echo 'Making ' . $product->getProperties() . '. Some hidden complex tasks client should not depend on...' . '<br>';

        return new Bread();
    }
}
