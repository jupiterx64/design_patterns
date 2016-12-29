<?php

namespace DP\Creational\FactoryMethod\Regular\Products;

class Donut implements IProduct
{
    public function getProperties() {
        return 'Some properties from donut...' . '<br>';
    }
}
