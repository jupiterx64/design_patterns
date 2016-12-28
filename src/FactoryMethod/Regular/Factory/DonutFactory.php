<?php

namespace DP\FactoryMethod\Regular\Factory;

use DP\FactoryMethod\Regular\Products\Donut;

class DonutFactory extends Baker
{
    protected function make() {
        echo 'Making donut... Some hidden complex tasks client should not depend on...';

        return new Donut();
    }
}
