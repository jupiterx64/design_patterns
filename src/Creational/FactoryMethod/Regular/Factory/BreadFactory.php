<?php

namespace DP\Creational\FactoryMethod\Regular\Factory;

use DP\Creational\FactoryMethod\Regular\Products\Bread;

class BreadFactory extends Baker
{
    protected function make() {
        echo 'Making bread... Some hidden complex tasks client should not depend on...';

        return new Bread();
    }
}
