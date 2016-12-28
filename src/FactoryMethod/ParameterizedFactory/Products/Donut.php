<?php

namespace DP\FactoryMethod\ParameterizedFactory\Products;

class Donut implements IProduct
{
    public function getProperties() {
        return 'Donut';
    }
}
