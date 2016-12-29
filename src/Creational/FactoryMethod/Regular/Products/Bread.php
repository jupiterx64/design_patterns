<?php

namespace DP\Creational\FactoryMethod\Regular\Products;

class Bread implements IProduct
{
    public function getProperties() {
        return 'Some properties from bread...' . '<br>';
    }
}
