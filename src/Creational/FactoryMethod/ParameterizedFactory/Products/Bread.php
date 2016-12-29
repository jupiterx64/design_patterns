<?php

namespace DP\Creational\FactoryMethod\ParameterizedFactory\Products;

class Bread implements IProduct
{
    public function getProperties() {
        return 'Bread';
    }
}
