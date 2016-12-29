<?php

namespace DP\Creational\FactoryMethod\ParameterizedFactory\Products;

class Donut implements IProduct
{
    public function getProperties() {
        return 'Donut';
    }
}
