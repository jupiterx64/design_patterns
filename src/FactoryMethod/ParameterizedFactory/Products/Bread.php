<?php

namespace DP\FactoryMethod\ParameterizedFactory\Products;

class Bread implements IProduct
{
    public function getProperties() {
        return 'Bread';
    }
}
